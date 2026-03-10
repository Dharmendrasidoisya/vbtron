<?php

namespace Botble\Career\Providers;

use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use Botble\Base\Facades\MetaBox;
use Botble\Base\Models\BaseModel;
use Botble\Base\Supports\ServiceProvider;
use Botble\Career\Contracts\Career as CareerContract;
use Botble\Career\CareerCollection;
use Botble\Career\CareerItem;
use Botble\Career\CareerSupport;
use Botble\Career\Models\Career;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class HookServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        add_action(BASE_ACTION_META_BOXES, function (string $context, array|string|Model|null $object = null): void {
            if (
                ! $object instanceof BaseModel
                || $context != 'advanced'
                || ! in_array($object::class, config('plugins.career.general.schema_supported', []))
                || ! setting('enable_Career_schema', 0)
            ) {
                return;
            }

            MetaBox::addMetaBox(
                'Career_schema_config_wrapper',
                trans('plugins/career::career.Career_schema_config', [
                    'link' => Html::link(
                        'https://developers.google.com/search/docs/data-types/Careerpage',
                        trans('plugins/career::career.learn_more'),
                        ['target' => '_blank']
                    ),
                ]),
                function () {
                    return (new CareerSupport())->renderMetaBox(func_get_args()[0] ?? null);
                },
                $object::class,
                $context
            );
        }, 39, 2);

        add_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, function ($screen, $object): void {
            if (
                ! in_array($object::class, config('plugins.career.general.schema_supported', []))
                || ! setting('enable_Career_schema', 0)
            ) {
                return;
            }

            $careers = (array)$object->getMetaData('Career_schema_config', true);

            if (is_plugin_active('career')) {
                $selectedExistingCareers = $object->getMetaData('Career_ids', true);

                if ($selectedExistingCareers && is_array($selectedExistingCareers)) {
                    $selectedExistingCareers = array_filter($selectedExistingCareers);

                    if ($selectedExistingCareers) {
                        $selectedCareers = Career::query()
                            ->wherePublished()
                            ->whereIn('id', $selectedExistingCareers)
                            ->pluck('answer', 'question')
                            ->all();

                        foreach ($selectedCareers as $question => $answer) {
                            $careers[] = [
                                [
                                    'key' => 'question',
                                    'value' => $question,
                                ],
                                [
                                    'key' => 'answer',
                                    'value' => $answer,
                                ],
                            ];
                        }
                    }
                }
            }

            $careers = array_filter($careers);

            if (empty($careers)) {
                return;
            }

            foreach ($careers as $key => $item) {
                if (! $item[0]['value'] && ! $item[1]['value']) {
                    Arr::forget($value, $key);
                }
            }

            $schemaItems = new CareerCollection();

            foreach ($careers as $item) {
                $schemaItems->push(
                    new CareerItem(BaseHelper::clean($item[0]['value']), BaseHelper::clean($item[1]['value']))
                );
            }

            app(CareerContract::class)->registerSchema($schemaItems);
        }, 39, 2);
    }
}
