<?php

namespace Botble\Career\Listeners;

use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Facades\MetaBox;
use Botble\Career\CareerSupport;

class SaveCareerListener
{
    public function handle(CreatedContentEvent|UpdatedContentEvent $event): void
    {
        if (! setting('enable_Career_schema')) {
            return;
        }

        $request = $event->request;
        $model = $event->data;

        if (! is_object($model) || ! in_array($model::class, config('plugins.career.general.schema_supported', []))) {
            return;
        }

        if ($request->has('content') && $request->has('Career_schema_config')) {
            (new CareerSupport())->saveConfigs($model, $request->input('Career_schema_config'));
        }

        MetaBox::saveMetaBoxData($model, 'Career_ids', $request->input('selected_existing_Careers', []));
    }
}
