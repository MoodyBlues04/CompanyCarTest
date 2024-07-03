<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Collection\Collection;

/**
 * @property int $id
 * @property int $driver_id
 * @property int $comfort_id
 * @property string $model
 *
 * @property Driver $driver
 * @property Comfort $comfort
 * @property Collection $carBooks
 */
class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'comfort_id',
        'driver_id',
    ];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function comfort(): BelongsTo
    {
        return $this->belongsTo(Comfort::class, 'comfort_id');
    }

    public function carBooks(): HasMany
    {
        return $this->hasMany(CarBook::class, 'car_id');
    }

    public function canBook(string $startTime, string $endTime): bool
    {
        return !$this->carBooks()
            ->whereBetween('start_time', [$startTime, $endTime])
            ->orWhereBetween('end_time', [$startTime, $endTime])
            ->exists();
    }
}
