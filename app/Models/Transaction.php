<?php

namespace App\Models;

use App\CategoryType;
use App\Models\Scopes\OwnedByUser;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasUlids;

    protected $fillable = ['amount', 'description', 'category_id', 'type', 'date', 'user_id'];

    protected $casts = [
        'type' => CategoryType::class,
        'amount' => 'decimal:2',
        'date' => 'date',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function booted()
    {
        static::addGlobalScope(new OwnedByUser);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
