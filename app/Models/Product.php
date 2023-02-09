<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'bar_code',
        'price',
        'cost',
        'user_id',
        'provider_id',
        'category_id',
        'unit_of_measurement_id',
        'min_amount'

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function unitOfMeasurement(): BelongsTo
    {
        return $this->belongsTo(UnitOfMeasurement::class);
    }

    public function credit(): HasMany
    {
        return $this->hasMany(Stock::class)->where('type', '=', 'CREDIT');
    }

    public function debit(): HasMany
    {
        return $this->hasMany(Stock::class)->where('type', '=', 'DEBIT');
    }

}
