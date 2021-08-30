<?php

namespace Matteomeloni\Swapi\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Matteomeloni\Swapi\Database\Factories\PeopleFactory;

class People extends Model
{
    use HasFactory;

    protected $fillable = [
        'planet_id',
        'name',
        'birth_year',
        'eye_color',
        'gender',
        'hair_color',
        'height',
        'mass',
        'skin_color',
    ];

    protected $casts = [
        'planet_id' => 'integer',
    ];

    private $searchbles = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function planet()
    {
        return $this->belongsTo(Planet::class);
    }

    /**
     * @param Builder $builder
     */
    public function scopeTextSearch(Builder $builder)
    {
        $textSearch = request()->search;

        $builder->when($textSearch, function ($query, $textSearch) {
            foreach ($this->searchbles as $i => $column) {
                $query = $query->orWhere(DB::raw("lower({$column})"), 'like', '%' . strtolower($textSearch) . '%');
            }

            return $query;
        });
    }

    /**
     * @param Builder $builder
     */
    public function scopeSort(Builder $builder)
    {
        $sorting = request()->sort;

        $builder->when($sorting, function ($query, $sorting) {
            $sorting = explode(',', $sorting);

            [$column, $direction] = (count($sorting) > 1)
                ? $sorting
                : [$sorting[0], 'asc'];

            return $query->orderBy($column, $direction);
        });
    }

    protected static function newFactory()
    {
        return PeopleFactory::new();
    }
}
