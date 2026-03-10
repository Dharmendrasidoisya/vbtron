<?php

namespace Botble\Career\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Career extends BaseModel
{
    protected $table = 'careers';

    protected $fillable = [
        // 'question',
        // 'answer',
        'name',
        'company',
        'qualification',
        'experience',
        'location',
        'category_id',
        'status',
    ];

    protected $casts = [
        'status' => BaseStatusEnum::class,
        'question' => SafeContent::class,
        'answer' => SafeContent::class,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CareerCategory::class, 'category_id')->withDefault();
    }
}
