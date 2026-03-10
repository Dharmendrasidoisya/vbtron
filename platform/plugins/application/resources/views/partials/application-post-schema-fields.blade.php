<x-core::form.on-off.checkbox
    name="application_post_schema_enabled"
    :label="trans('plugins/application::base.settings.enable_application_post_schema')"
    :checked="setting('application_post_schema_enabled', true)"
    :description="trans('plugins/application::base.settings.enable_application_post_schema_description')"
    data-bb-toggle="collapse"
    data-bb-target=".application_post_schema_type"
    class="mb-0"
    :wrapper="false"
/>

<x-core::form.fieldset
    class="application_post_schema_type mt-3"
    data-bb-value="1"
    @style(['display: none' => !setting('application_post_schema_enabled', true)])
>
    <x-core::form.select
        name="application_post_schema_type"
        :label="trans('plugins/application::base.settings.schema_type')"
        :options="[
            'NewsArticle' => 'NewsArticle',
            'News' => 'News',
            'Article' => 'Article',
            'ApplicationPosting' => 'ApplicationPosting',
        ]"
        :value="setting('application_post_schema_type', 'NewsArticle')"
    />
</x-core::form.fieldset>
