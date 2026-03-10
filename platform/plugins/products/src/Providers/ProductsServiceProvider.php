<?php

namespace Botble\Products\Providers;

use Botble\Api\Facades\ApiHelper;
use Botble\Base\Facades\DashboardMenu;
use Botble\Base\Facades\PanelSectionManager;
use Botble\Base\PanelSections\PanelSectionItem;
use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Products\Models\Category;
use Botble\Products\Models\Post;
use Botble\Products\Models\Tag;
use Botble\Products\Repositories\Eloquent\CategoryRepository;
use Botble\Products\Repositories\Eloquent\PostRepository;
use Botble\Products\Repositories\Eloquent\TagRepository;
use Botble\Products\Repositories\Interfaces\CategoryInterface;
use Botble\Products\Repositories\Interfaces\PostInterface;
use Botble\Products\Repositories\Interfaces\TagInterface;
use Botble\Language\Facades\Language;
use Botble\LanguageAdvanced\Supports\LanguageAdvancedManager;
use Botble\SeoHelper\Facades\SeoHelper;
use Botble\Setting\PanelSections\SettingOthersPanelSection;
use Botble\Shortcode\View\View;
use Botble\Slug\Facades\SlugHelper;
use Botble\Theme\Events\ThemeRoutingBeforeEvent;
use Botble\Theme\Facades\SiteMapManager;

/**
 * @since 02/07/2016 09:50 AM
 */
class ProductsServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register(): void
    {
        $this->app->bind(PostInterface::class, function () {
            return new PostRepository(new Post());
        });

        $this->app->bind(CategoryInterface::class, function () {
            return new CategoryRepository(new Category());
        });

        $this->app->bind(TagInterface::class, function () {
            return new TagRepository(new Tag());
        });
    }

    public function boot(): void
    {
        SlugHelper::registerModule(Post::class, 'Products posts');
        SlugHelper::registerModule(Category::class, 'Products categories');
        SlugHelper::registerModule(Tag::class, 'Products productstags');

        SlugHelper::setPrefix(Tag::class, 'stag', true);
        SlugHelper::setPrefix(Post::class, null, true);
        SlugHelper::setPrefix(Category::class, null, true);

        $this
            ->setNamespace('plugins/products')
            ->loadHelpers()
            ->loadAndPublishConfigurations(['permissions', 'general'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes()
            ->loadMigrations()
            ->publishAssets();

        if (ApiHelper::enabled()) {
            $this->loadRoutes(['api']);
        }

        $this->app->register(EventServiceProvider::class);

        $this->app['events']->listen(ThemeRoutingBeforeEvent::class, function () {
            SiteMapManager::registerKey([
                'products-categories',
                'products-productstags',
                'products-posts-((?:19|20|21|22)\d{2})-(0?[1-9]|1[012])',
            ]);
        });

        DashboardMenu::default()->beforeRetrieving(function () {
            DashboardMenu::make()
                ->registerItem([
                    'id' => 'cms-plugins-products',
                    'priority' => 5,
                    'name' => 'plugins/products::base.menu_name',
                    'icon' => 'ti ti-article',
                ])
                ->registerItem([
                    'id' => 'cms-plugins-products-post',
                    'priority' => 1,
                    'parent_id' => 'cms-plugins-products',
                    'name' => 'Posts',
                    'route' => 'productsposts.index',
                ])
                ->registerItem([
                    'id' => 'cms-plugins-products-productscategories',
                    'priority' => 2,
                    'parent_id' => 'cms-plugins-products',
                    'name' => 'Categories',
                    'route' => 'productscategories.index',
                ])
                ->registerItem([
                    'id' => 'cms-plugins-products-productstags',
                    'priority' => 3,
                    'parent_id' => 'cms-plugins-products',
                    'name' => 'Tag',
                    'route' => 'productstags.index',
                ]);
        });

        PanelSectionManager::default()->beforeRendering(function () {
            PanelSectionManager::registerItem(
                SettingOthersPanelSection::class,
                fn () => PanelSectionItem::make('products')
                    ->setTitle(trans('plugins/products::base.settings.title'))
                    ->withIcon('ti ti-file-settings')
                    ->withDescription(trans('plugins/products::base.settings.description'))
                    ->withPriority(120)
                    ->withRoute('products.settings')
            );
        });

        if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            if (
                defined('LANGUAGE_ADVANCED_MODULE_SCREEN_NAME') &&
                $this->app['config']->get('plugins.products.general.use_language_v2')
            ) {
                LanguageAdvancedManager::registerModule(Post::class, [
                    'name',
                    'description',
                    'content',
                ]);

                LanguageAdvancedManager::registerModule(Category::class, [
                    'name',
                    'description',
                ]);

                LanguageAdvancedManager::registerModule(Tag::class, [
                    'name',
                    'description',
                ]);
            } else {
                Language::registerModule([Post::class, Category::class, Tag::class]);
            }
        }

        $this->app->booted(function () {
            SeoHelper::registerModule([Post::class, Category::class, Tag::class]);

            $configKey = 'packages.revision.general.supported';
            config()->set($configKey, array_merge(config($configKey, []), [Post::class]));

            $this->app->register(HookServiceProvider::class);
        });

        if (function_exists('shortcode')) {
            view()->composer([
                'plugins/products::themes.post',
                'plugins/products::themes.category',
                'plugins/products::themes.stag',
            ], function (View $view) {
                $view->withShortcodes();
            });
        }
    }
}
