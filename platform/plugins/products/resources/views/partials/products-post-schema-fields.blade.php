<x-core::form.on-off.checkbox
    name="products_post_schema_enabled"
    :label="trans('plugins/products::base.settings.enable_products_post_schema')"
    :checked="setting('products_post_schema_enabled', true)"
    :description="trans('plugins/products::base.settings.enable_products_post_schema_description')"
    data-bb-toggle="collapse"
    data-bb-target=".products_post_schema_type"
    class="mb-0"
    :wrapper="false"
/>

<x-core::form.fieldset
    class="products_post_schema_type mt-3"
    data-bb-value="1"
    @style(['display: none' => !setting('products_post_schema_enabled', true)])
>
    <x-core::form.select
        name="products_post_schema_type"
        :label="trans('plugins/products::base.settings.schema_type')"
        :options="[
            'NewsArticle' => 'NewsArticle',
            'News' => 'News',
            'Article' => 'Article',
            'ProductsPosting' => 'ProductsPosting',
        ]"
        :value="setting('products_post_schema_type', 'NewsArticle')"
    />
</x-core::form.fieldset>
