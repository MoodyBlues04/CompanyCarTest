<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property int $value
 *
 * @property Collection $roles
 */
class Comfort extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            Role::class,
            'role_has_comfort',
            'comfort_id',
            'role_id'
        );
    }
}
