<?php

namespace Botble\Products\Forms;

use Botble\Base\Forms\FieldOptions\ContentFieldOption;
use Botble\Base\Forms\FieldOptions\DescriptionFieldOption;
use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\OnOffFieldOption;
use Botble\Base\Forms\FieldOptions\RadioFieldOption;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\FieldOptions\StatusFieldOption;
use Botble\Base\Forms\FieldOptions\TagFieldOption;
use Botble\Base\Forms\Fields\EditorField;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\Fields\MediaFileField;
use Botble\Base\Forms\Fields\OnOffField;
use Botble\Base\Forms\Fields\RadioField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TagField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\Fields\TreeCategoryField;
use Botble\Base\Forms\FormAbstract;
use Botble\Products\Http\Requests\PostRequest;
use Botble\Products\Models\Category;
use Botble\Products\Models\Post;
use Botble\Products\Models\Tag;
use Botble\Base\Forms\Fields\MediaImagesField;
use Botble\Base\Forms\FieldOptions\EditorFieldOption;

class PostForm extends FormAbstract
{
    public function setup(): void
    {
        $productId = [];
        $this
            ->model(Post::class)
            ->setValidatorClass(PostRequest::class)
            ->hasTabs()
            ->add('name', TextField::class, NameFieldOption::make()->required()->toArray())
            // ->add('description', TextareaField::class, DescriptionFieldOption::make()->toArray())
            ->add(
                'is_featured',
                OnOffField::class,
                OnOffFieldOption::make()
                    ->label(trans('core/base::forms.is_featured'))
                    ->defaultValue(false)
                    ->toArray()
            )

            ->add('content', EditorField::class, ContentFieldOption::make()->allowedShortcodes()->toArray())
            ->add('specification', EditorField::class, EditorFieldOption::make()->placeholder(trans('core/base::forms.description_placeholder'))->toArray())
            // ->add('images[]', 'mediaImages', [
            //     'label' => 'Images',
            //     'is_multiple' => true,
            //     'values' => $productId ? json_decode($this->getModel()->images, true) : [],
            // ])
            ->add('images[]', 'mediaImages', [
                'label' => 'Images',
                'is_multiple' => true,
                'values' => $this->getModel()->images ?? [],
            ])
            ->add('status', SelectField::class, StatusFieldOption::make()->toArray())
            ->when(get_post_formats(true), function (PostForm $form, array $postFormats) {
                if (count($postFormats) > 1) {
                    $choices = [];

                    foreach ($postFormats as $postFormat) {
                        $choices[$postFormat[0]] = $postFormat[1];
                    }

                    $form
                        ->add(
                            'format_type',
                            RadioField::class,
                            RadioFieldOption::make()
                                ->label(trans('plugins/products::posts.form.format_type'))
                                ->choices($choices)
                                ->toArray()
                        );
                }
            })
            ->add(
                'productscategories[]',
                TreeCategoryField::class,
                SelectFieldOption::make()
                    ->label(trans('plugins/products::posts.form.productscategories'))
                    ->choices(get_productscategories_with_children())
                    ->when($this->getModel()->id, function (SelectFieldOption $fieldOption) {
                        return $fieldOption->selected($this->getModel()->productscategories()->pluck('category_id')->all());
                    })
                    ->when(! $this->getModel()->id, function (SelectFieldOption $fieldOption) {
                        return $fieldOption
                            ->selected(Category::query()
                                ->where('is_default', 1)
                                ->pluck('id')
                                ->all());
                    })
                    ->toArray()
            )
            ->add('image', MediaImageField::class)

            ->add('pdf', MediaFileField::class, [
                'label' => ' Brochure',
                'type' => 'file',
                'file_type' => 'themes/wowy/ads/upload',
                'value' => $this->getModel()->pdf ?? null,
            ])

            ->add('manual', MediaFileField::class, [
                'label' => ' Manual',
                'type' => 'file',
                'file_type' => 'themes/wowy/ads/upload',
                'value' => $this->getModel()->manual ?? null,
            ])

            ->add(
                'stag',
                TagField::class,
                TagFieldOption::make()
                    ->label(trans('plugins/products::posts.form.productstags'))
                    ->when($this->getModel()->id, function (TagFieldOption $fieldOption) {
                        return $fieldOption
                            ->selected(
                                $this->getModel()
                                    ->productstags()
                                    ->select('name')
                                    ->get()
                                    ->map(fn(Tag $item) => $item->name)
                                    ->implode(',')
                            );
                    })
                    ->placeholder(trans('plugins/products::base.write_some_productstags'))
                    ->ajaxUrl(route('productstags.all'))
                    ->toArray()
            )
            ->setBreakFieldPoint('status');
    }
}
