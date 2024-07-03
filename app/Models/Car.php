<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $driver_id
 * @property int $comfort_id
 * @property string $model
 * @property ?string $usage_start_time
 * @property ?string $usage_end_time
 * @property bool $is_in_use
 *
 * @property Driver $driver
 * @property Comfort $comfort
 */
class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'comfort_id',
        'usage_start_time',
        'usage_end_time',
        'is_in_use',
        'driver_id',
    ];

    protected $casts = [
        'usage_start_time' => 'datetime:Y-m-d H:i:s',
        'usage_end_time' => 'datetime:Y-m-d H:i:s',
    ];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function comfort(): BelongsTo
    {
        return $this->belongsTo(Comfort::class, 'comfort_id');
    }
}
