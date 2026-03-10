<?php

namespace Botble\Products\Providers;

use Botble\Base\Facades\Assets;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Supports\ServiceProvider;
use Botble\Products\Models\Category;
use Botble\Products\Models\Post;
use Botble\Products\Models\Tag;
use Botble\Products\Products\ProductsService;
use Botble\Dashboard\Events\RenderingDashboardWidgets;
use Botble\Dashboard\Supports\DashboardWidgetInstance;
use Botble\Media\Facades\RvMedia;
use Botble\Menu\Events\RenderingMenuOptions;
use Botble\Menu\Facades\Menu;
use Botble\Page\Models\Page;
use Botble\Page\Tables\PageTable;
use Botble\Shortcode\Compilers\Shortcode;
use Botble\Shortcode\Facades\Shortcode as ShortcodeFacade;
use Botble\Shortcode\Forms\ShortcodeForm;
use Botble\Slug\Models\Slug;
use Botble\Theme\Events\RenderingAdminBar;
use Botble\Theme\Events\RenderingThemeOptionSettings;
use Botble\Theme\Facades\AdminBar;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HookServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Menu::addMenuOptionModel(Category::class);
        Menu::addMenuOptionModel(Tag::class);

        $this->app['events']->listen(RenderingMenuOptions::class, function () {
            add_action(MENU_ACTION_SIDEBAR_OPTIONS, [$this, 'registerMenuOptions'], 2);
        });

        $this->app['events']->listen(RenderingDashboardWidgets::class, function () {
            add_filter(DASHBOARD_FILTER_ADMIN_LIST, [$this, 'registerDashboardWidgets'], 21, 2);
        });

        add_filter(BASE_FILTER_PUBLIC_SINGLE_DATA, [$this, 'handleSingleView'], 2);

        if (defined('PAGE_MODULE_SCREEN_NAME')) {
            add_filter(PAGE_FILTER_FRONT_PAGE_CONTENT, [$this, 'renderProductsPage'], 2, 2);
        }

        PageTable::beforeRendering(function () {
            add_filter(PAGE_FILTER_PAGE_NAME_IN_ADMIN_LIST, [$this, 'addAdditionNameToPageName'], 147, 2);
        });

        $this->app['events']->listen(RenderingAdminBar::class, function () {
            AdminBar::registerLink(
                trans('plugins/products::posts.post'),
                route('productsposts.create'),
                'add-new',
                'productsposts.create'
            );
        });

        if (function_exists('add_shortcode')) {
            shortcode()
                ->register(
                    $shortcodeName = 'products-productsposts',
                    trans('plugins/products::base.short_code_name'),
                    trans('plugins/products::base.short_code_description'),
                    [$this, 'renderProductsproductsposts']
                )
                ->setAdminConfig(
                    $shortcodeName,
                    function (array $attributes) {
                        $productscategories = Category::query()
                            ->wherePublished()
                            ->pluck('name', 'id')
                            ->all();

                        return ShortcodeForm::createFromArray($attributes)
                            ->add('paginate', 'number', [
                                'label' => trans('plugins/products::base.number_productsposts_per_page'),
                                'attr' => [
                                    'placeholder' => trans('plugins/products::base.number_productsposts_per_page'),
                                ],
                            ])
                            ->add(
                                'category_ids[]',
                                SelectField::class,
                                SelectFieldOption::make()
                                    ->label(__('Select productscategories'))
                                    ->choices($productscategories)
                                    ->when(Arr::get($attributes, 'category_ids'), function (SelectFieldOption $option, $productscategoriesIds) {
                                        $option->selected(explode(',', $productscategoriesIds));
                                    })
                                    ->multiple()
                                    ->searchable()
                                    ->helperText(__('Leave productscategories empty if you want to show productsposts from all productscategories.'))
                                    ->toArray()
                            );
                    }
                );
        }

        $this->app['events']->listen(RenderingThemeOptionSettings::class, function () {
            add_action(RENDERING_THEME_OPTIONS_PAGE, [$this, 'addThemeOptions'], 35);
        });

        if (defined('THEME_FRONT_HEADER') && setting('products_post_schema_enabled', 1)) {
            add_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, function ($screen, $post) {
                add_filter(THEME_FRONT_HEADER, function ($html) use ($post) {
                    if (! $post instanceof Post) {
                        return $html;
                    }

                    $schemaType = setting('products_post_schema_type', 'NewsArticle');

                    if (! in_array($schemaType, ['NewsArticle', 'News', 'Article', 'ProductsPosting'])) {
                        $schemaType = 'NewsArticle';
                    }

                    $schema = [
                        '@context' => 'https://schema.org',
                        '@type' => $schemaType,
                        'mainEntityOfPage' => [
                            '@type' => 'WebPage',
                            '@id' => $post->url,
                        ],
                        'headline' => BaseHelper::clean($post->name),
                        'description' => BaseHelper::clean($post->description),
                        'image' => [
                            '@type' => 'ImageObject',
                            'url' => RvMedia::getImageUrl($post->image, null, false, RvMedia::getDefaultImage()),
                        ],
                        'author' => [
                            '@type' => 'Person',
                            'url' => fn () => BaseHelper::getHomepageUrl(),
                            'name' => class_exists($post->author_type) ? $post->author->name : '',
                        ],
                        'publisher' => [
                            '@type' => 'Organization',
                            'name' => theme_option('site_title'),
                            'logo' => [
                                '@type' => 'ImageObject',
                                'url' => RvMedia::getImageUrl(theme_option('logo')),
                            ],
                        ],
                        'datePublished' => $post->created_at->toDateString(),
                        'dateModified' => $post->updated_at->toDateString(),
                    ];

                    return $html . Html::tag('script', json_encode($schema), ['type' => 'application/ld+json'])
                            ->toHtml();
                }, 35);
            }, 35, 2);
        }
    }

    public function addThemeOptions(): void
    {
        $pages = Page::query()
            ->wherePublished()
            ->pluck('name', 'id')
            ->all();

        theme_option()
            ->setSection([
                'title' => trans('plugins/products::base.settings.title'),
                'id' => 'opt-text-subsection-products',
                'subsection' => true,
                'icon' => 'ti ti-edit',
                'fields' => [
                    [
                        'id' => 'products_page_id',
                        'type' => 'customSelect',
                        'label' => trans('plugins/products::base.products_page_id'),
                        'attributes' => [
                            'name' => 'products_page_id',
                            'list' => [0 => trans('plugins/products::base.select')] + $pages,
                            'value' => '',
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ],
                    [
                        'id' => 'number_of_productsposts_in_a_category',
                        'type' => 'number',
                        'label' => trans('plugins/products::base.number_productsposts_per_page_in_category'),
                        'attributes' => [
                            'name' => 'number_of_productsposts_in_a_category',
                            'value' => 12,
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ],
                    [
                        'id' => 'number_of_productsposts_in_a_tag',
                        'type' => 'number',
                        'label' => trans('plugins/products::base.number_productsposts_per_page_in_tag'),
                        'attributes' => [
                            'name' => 'number_of_productsposts_in_a_tag',
                            'value' => 12,
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ],
                ],
            ]);
    }

    public function registerMenuOptions(): void
    {
        if (Auth::guard()->user()->hasPermission('productscategories.index')) {
            Menu::registerMenuOptions(Category::class, trans('plugins/products::categories.menu'));
        }

        if (Auth::guard()->user()->hasPermission('productstags.index')) {
            Menu::registerMenuOptions(Tag::class, trans('plugins/products::tags.menu'));
        }
    }

    public function registerDashboardWidgets(array $widgets, Collection $widgetSettings): array
    {
        if (! Auth::guard()->user()->hasPermission('productsposts.index')) {
            return $widgets;
        }

        Assets::addScriptsDirectly(['/vendor/core/plugins/products/js/products.js']);

        return (new DashboardWidgetInstance())
            ->setPermission('productsposts.index')
            ->setKey('widget_productsposts_recent')
            ->setTitle(trans('plugins/products::posts.widget_productsposts_recent'))
            ->setIcon('fas fa-edit')
            ->setColor('yellow')
            ->setRoute(route('productsposts.widget.recent-productsposts'))
            ->setBodyClass('')
            ->setColumn('col-md-6 col-sm-6')
            ->init($widgets, $widgetSettings);
    }

    public function handleSingleView(Slug|array $slug): Slug|array
    {
        return (new ProductsService())->handleFrontRoutes($slug);
    }

    public function renderProductsproductsposts(Shortcode $shortcode): array|string
    {
        $categoryIds = ShortcodeFacade::fields()->getIds('category_ids', $shortcode);

        $productsposts = Post::query()
            ->wherePublished()
            ->orderByDesc('created_at')
            ->with('slugable')
            ->when(! empty($categoryIds), function ($query) use ($categoryIds) {
                $query->whereHas('productscategories', function ($query) use ($categoryIds) {
                    $query->whereIn('productscategories.id', $categoryIds);
                });
            })
            ->paginate((int)$shortcode->paginate ?: 12);

        $view = 'plugins/products::themes.templates.productsposts';
        $themeView = Theme::getThemeNamespace() . '::views.templates.productsposts';

        if (view()->exists($themeView)) {
            $view = $themeView;
        }

        return view($view, compact('productsposts'))->render();
    }

    public function renderProductsPage(string|null $content, Page $page): string|null
    {
        if ($page->getKey() == $this->getProductsPageId()) {
            $view = 'plugins/products::themes.loop';

            if (view()->exists($viewPath = Theme::getThemeNamespace() . '::views.loop')) {
                $view = $viewPath;
            }

            return view($view, [
                'productsposts' => get_all_productsposts(true, (int)theme_option('number_of_productsposts_in_a_category', 12)),
            ])->render();
        }

        return $content;
    }

    public function addAdditionNameToPageName(string|null $name, Page $page): string|null
    {
        if ($page->getKey() == $this->getProductsPageId()) {
            $subTitle = Html::tag('span', trans('plugins/products::base.products_page'), ['class' => 'additional-page-name'])
                ->toHtml();

            if (Str::contains($name, ' —')) {
                return $name . ', ' . $subTitle;
            }

            return $name . ' —' . $subTitle;
        }

        return $name;
    }

    protected function getProductsPageId(): int|string|null
    {
        return theme_option('products_page_id', setting('products_page_id'));
    }
}
