<?php

namespace Botble\Career;

use Botble\Base\Facades\Assets;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\MetaBox;
use Botble\Base\Models\BaseModel;
use Botble\Career\Contracts\Career as CareerContract;
use Botble\Career\Models\Career;
use Botble\Theme\Facades\Theme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Throwable;

class CareerSupport implements CareerContract
{
    public function registerSchema(CareerCollection $careers): void
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'CareerPage',
            'mainEntity' => [],
        ];

        foreach ($careers->toArray() as $career) {
            $schema['mainEntity'][] = [
                '@type' => 'Question',
                'name' => $career->getQuestion(),
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $career->getAnswer(),
                ],
            ];
        }

        $schema = json_encode($schema);

        Theme::asset()
            ->container('header')
            ->writeScript('career-schema', $schema, attributes: ['type' => 'application/ld+json']);
    }

    public function saveConfigs(BaseModel|Model $model, string|array|null $data): void
    {
        try {
            $config = $data;

            if (Str::isJson($config)) {
                $config = json_decode($config, true);
            }

            if (! empty($config) && is_array($config)) {
                foreach ($config as $key => $item) {
                    if (! $item[0]['value'] && ! $item[1]['value']) {
                        Arr::forget($config, $key);
                    }
                }
            }

            if (empty($config)) {
                MetaBox::deleteMetaData($model, 'Career_schema_config');
            } else {
                MetaBox::saveMetaBoxData($model, 'Career_schema_config', $config);
            }
        } catch (Throwable $exception) {
            BaseHelper::logError($exception);
        }
    }

    public function renderMetaBox(Model|null $model = null): string
    {
        Assets::addStylesDirectly(['vendor/core/plugins/career/css/career.css'])
            ->addScriptsDirectly(['vendor/core/plugins/career/js/career.js']);
        $value = [];
        $selectedCareers = [];

        if ($model && $model->getKey()) {
            $value = MetaBox::getMetaData($model, 'Career_schema_config', true);
            $selectedCareers = MetaBox::getMetaData($model, 'Career_ids', true) ?: [];
        }

        $hasValue = ! empty($value);

        $value = (array)$value;

        foreach ($value as $key => $item) {
            if (! is_array($item)) {
                continue;
            }

            foreach ($item as $subItem) {
                if (is_array($subItem['value'])) {
                    Arr::forget($value, $key);
                }
            }
        }

        $value = json_encode($value);

        $careers = Career::query()->wherePublished()->pluck('question', 'id')->all();

        return view('plugins/career::schema-config-box', compact('value', 'hasValue', 'careers', 'selectedCareers'))->render();
    }
}
