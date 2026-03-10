<?php

namespace Botble\Products;

use Botble\Products\Models\Category;
use Botble\Products\Models\Tag;
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
        Schema::dropIfExists('spost_productstags');
        Schema::dropIfExists('spost_productscategories');
        Schema::dropIfExists('productsposts');
        Schema::dropIfExists('productscategories');
        Schema::dropIfExists('productstags');
        Schema::dropIfExists('productsposts_translations');
        Schema::dropIfExists('productscategories_translations');
        Schema::dropIfExists('productstags_translations');

        Widget::query()
            ->where('widget_id', 'widget_productsposts_recent')
            ->each(fn (DashboardWidget $dashboardWidget) => $dashboardWidget->delete());

        MenuNode::query()
            ->whereIn('reference_type', [Category::class, Tag::class])
            ->each(fn (MenuNode $menuNode) => $menuNode->delete());

        Setting::delete([
            'products_post_schema_enabled',
            'products_post_schema_type',
        ]);
    }
}
