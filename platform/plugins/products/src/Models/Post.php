<?php

namespace Botble\Products\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Botble\Revision\RevisionableTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Post extends BaseModel
{
    use RevisionableTrait;

    protected $table = 'productsposts';

    protected bool $revisionEnabled = true;

    protected bool $revisionCleanup = true;

    protected int $historyLimit = 20;

    protected array $dontKeepRevisionOf = [
        'content',
        'views',
    ];

    protected $fillable = [
        'name',
        'description',
        'content',
        'specification',
        'image',
        'images',
        'pdf',
        'manual',
        'is_featured',
        'format_type',
        'status',
        'author_id',
        'author_type',
    ];

    protected static function booted(): void
    {
        static::deleted(function (Post $post) {
            $post->productscategories()->detach();
            $post->productstags()->detach();
        });
    }

    protected $casts = [
        'status' => BaseStatusEnum::class,
        'name' => SafeContent::class,
        'description' => SafeContent::class,
        'images' => 'array',
    ];


    public function productstags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'productsposts_tags');
    }

    public function productscategories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_categories');
    }

    public function author(): MorphTo
    {
        return $this->morphTo()->withDefault();
    }

    protected function firstCategory(): Attribute
    {
        return Attribute::get(function (): ?Category {
            $this->loadMissing('productscategories');

            return $this->productscategories->first();
        });
    }

    protected function timeReading(): Attribute
    {
        return Attribute::make(
            get: function (): string|null {
                if (! $this->content) {
                    return null;
                }

                $this->loadMissing('metadata');

                $timeToRead = $this->getMetaData('time_to_read', true);

                if ($timeToRead != null) {
                    return number_format((float)$timeToRead);
                }

                return number_format(ceil(str_word_count(strip_productstags($this->content)) / 200));
            }
        );
    }
}
