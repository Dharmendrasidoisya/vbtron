<?php

namespace Botble\Services;

use Botble\Services\Models\Category;
use Botble\Services\Models\Tag;
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
        Schema::dropIfExists('spost_servicestags');
        Schema::dropIfExists('spost_servicescategories');
        Schema::dropIfExists('servicesposts');
        Schema::dropIfExists('servicescategories');
        Schema::dropIfExists('servicestags');
        Schema::dropIfExists('servicesposts_translations');
        Schema::dropIfExists('servicescategories_translations');
        Schema::dropIfExists('servicestags_translations');

        Widget::query()
            ->where('widget_id', 'widget_servicesposts_recent')
            ->each(fn (DashboardWidget $dashboardWidget) => $dashboardWidget->delete());

        MenuNode::query()
            ->whereIn('reference_type', [Category::class, Tag::class])
            ->each(fn (MenuNode $menuNode) => $menuNode->delete());

        Setting::delete([
            'services_post_schema_enabled',
            'services_post_schema_type',
        ]);
    }
}
