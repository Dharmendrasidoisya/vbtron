<?php

namespace Botble\Career\Providers;

use Botble\Base\Facades\DashboardMenu;
use Botble\Base\Facades\PanelSectionManager;
use Botble\Base\PanelSections\PanelSectionItem;
use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Career\Contracts\Career as CareerContract;
use Botble\Career\CareerSupport;
use Botble\Career\Models\Career;
use Botble\Career\Models\CareerCategory;
use Botble\Career\Repositories\Eloquent\CareerCategoryRepository;
use Botble\Career\Repositories\Eloquent\CareerRepository;
use Botble\Career\Repositories\Interfaces\CareerCategoryInterface;
use Botble\Career\Repositories\Interfaces\CareerInterface;
use Botble\LanguageAdvanced\Supports\LanguageAdvancedManager;
use Botble\Setting\PanelSections\SettingOthersPanelSection;

class CareerServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register(): void
    {
        $this->app->bind(CareerCategoryInterface::class, function () {
            return new CareerCategoryRepository(new CareerCategory());
        });

        $this->app->bind(CareerInterface::class, function () {
            return new CareerRepository(new Career());
        });

        $this->app->singleton(CareerContract::class, CareerSupport::class);
    }

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/career')
            ->loadHelpers()
            ->loadAndPublishConfigurations(['permissions', 'general'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadRoutes()
            ->loadAndPublishViews()
            ->publishAssets();

        if (defined('LANGUAGE_ADVANCED_MODULE_SCREEN_NAME')) {
            LanguageAdvancedManager::registerModule(Career::class, [
                'question',
                'answer',
            ]);

            LanguageAdvancedManager::registerModule(CareerCategory::class, [
                'name',
            ]);

            LanguageAdvancedManager::addTranslatableMetaBox('Career_schema_config_wrapper');

            foreach (config('plugins.career.general.schema_supported', []) as $item) {
                $translatableColumns = array_merge(LanguageAdvancedManager::getTranslatableColumns($item), ['Career_schema_config', 'Career_ids']);

                LanguageAdvancedManager::registerModule($item, $translatableColumns);
            }
        }

        DashboardMenu::default()->beforeRetrieving(function () {
            DashboardMenu::make()
                ->registerItem([
                    'id' => 'cms-plugins-career',
                    'priority' => 420,
                    'name' => 'plugins/career::career.name',
                    'icon' => 'ti ti-help-octagon',
                ])
                ->registerItem([
                    'id' => 'cms-plugins-career-list',
                    'priority' => 0,
                    'parent_id' => 'cms-plugins-career',
                    'name' => 'plugins/career::career.name',
                    'route' => 'career.index',
                ])
                ->registerItem([
                    'id' => 'cms-packages-career-category',
                    'priority' => 1,
                    'parent_id' => 'cms-plugins-career',
                    'name' => 'plugins/career::career-category.name',
                    'icon' => null,
                    'route' => 'career_category.index',
                ]);
        });

        PanelSectionManager::default()->beforeRendering(function () {
            PanelSectionManager::registerItem(
                SettingOthersPanelSection::class,
                fn () => PanelSectionItem::make('careers')
                    ->setTitle(trans('plugins/career::career.settings.title'))
                    ->withIcon('ti ti-settings-question')
                    ->withPriority(420)
                    ->withDescription(trans('plugins/career::career.settings.description'))
                    ->withRoute('careers.settings')
            );
        });

        $this->app->register(HookServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
    }
}
