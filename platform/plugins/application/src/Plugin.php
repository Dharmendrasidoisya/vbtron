<?php

namespace Botble\Application;

use Botble\Application\Models\Category;
use Botble\Application\Models\Tag;
use Botble\Dashboard\Models\DashboardWidget;
use Botble\Menu\Models\MenuNode;
use Botble\PluginManagement\Abstracts\PluginOperationAbstract;
use Botble\Setting\Facades\Setting;
use Botble\Widget\Models\Widget;
use Illuminate\Support\Facades\Schema;

class Plugin extends PluginOperationAbstract
{
    public static function remove(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('spost_applicationtags');
        Schema::dropIfExists('spost_applicationcategories');
        Schema::dropIfExists('applicationposts');
        Schema::dropIfExists('applicationcategories');
        Schema::dropIfExists('applicationtags');
        Schema::dropIfExists('applicationposts_translations');
        Schema::dropIfExists('applicationcategories_translations');
        Schema::dropIfExists('applicationtags_translations');

        Widget::query()
            ->where('widget_id', 'widget_applicationposts_recent')
            ->each(fn (DashboardWidget $dashboardWidget) => $dashboardWidget->delete());

        MenuNode::query()
            ->whereIn('reference_type', [Category::class, Tag::class])
            ->each(fn (MenuNode $menuNode) => $menuNode->delete());

        Setting::delete([
            'application_post_schema_enabled',
            'application_post_schema_type',
        ]);
    }
}
