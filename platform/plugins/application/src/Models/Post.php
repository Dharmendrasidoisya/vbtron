<?php

namespace Botble\Application\Models;

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

    protected $table = 'applicationposts';

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
        'image',
        'is_featured',
        'format_type',
        'status',
        'author_id',
        'author_type',
    ];

    protected static function booted(): void
    {
        static::deleted(function (Post $post) {
            $post->applicationcategories()->detach();
            $post->applicationtags()->detach();
        });
    }

    protected $casts = [
        'status' => BaseStatusEnum::class,
        'name' => SafeContent::class,
        'description' => SafeContent::class,
    ];

    public function applicationtags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'applicationposts_tags');
    }

    public function applicationcategories(): BelongsToMany
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
            $this->loadMissing('applicationcategories');

            return $this->applicationcategories->first();
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

                return number_format(ceil(str_word_count(strip_applicationtags($this->content)) / 200));
            }
        );
    }
}
