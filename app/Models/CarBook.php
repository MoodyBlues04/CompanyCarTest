<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $car_id
 * @property string $start_time
 * @property string $end_time
 *
 * @property User $user
 * @property Car $car
 */
class CarBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'end_time',
        'user_id',
        'car_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
}
