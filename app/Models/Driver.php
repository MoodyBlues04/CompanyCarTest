<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $name
 *
 * @property Car $car
 */
class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function driver(): HasOne
    {
        return $this->hasOne(Car::class, 'driver_id');
    }
}
