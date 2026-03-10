<?php

namespace Botble\Career;

use Botble\PluginManagement\Abstracts\PluginOperationAbstract;
use Botble\Setting\Facades\Setting;
use Illuminate\Support\Facades\Schema;

class Plugin extends PluginOperationAbstract
{
    public static function remove(): void
    {
        Schema::dropIfExists('career_categories');
        Schema::dropIfExists('careers');
        Schema::dropIfExists('Career_categories_translations');
        Schema::dropIfExists('Careers_translations');

        Setting::delete([
            'enable_Career_schema',
        ]);
    }
}
