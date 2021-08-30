<?php

namespace Matteomeloni\Swapi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Matteomeloni\Swapi\Database\Factories\PlanetFactory;

class Planet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'diameter',
        'rotation_period',
        'gravity',
        'population',
        'climate',
        'terrain',
        'surface_water',
        'films',
        'url',
    ];

    protected $casts = [
        'films' => 'array'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function peoples()
    {
        return $this->hasMany(People::class);
    }

    protected static function newFactory()
    {
        return PlanetFactory::new();
    }
}
