<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Movie extends Model
{
    use HasFactory;

    protected $appends = [
        'release_year',
    ];

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'studio',
        'runtime',
        'description',
        'genre',
        'release_date',
    ];

    protected $guarded = [];

    protected $casts = [
        'release_date' => 'datetime',
    ];

    protected $dates = [
        'release_date',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeReleaseYear(Builder $builder, string $year = ''): void
    {
        if(empty($year)) return;

        $builder->whereYear('release_date', $year);
    }

    public function scopeSort(Builder $builder, string $sort = 'title', $direction = 'asc'): void
    {
        if(empty($sort)) return;

        $builder->orderBy($sort, $direction);
    }

    public function scopeFilter(Builder $builder): void
    {

        if(! $my_movies = (bool)request('my_movies', false)) return;

        $builder->when($my_movies ?? false, function (Builder $builder) {
            $builder->orWhereHas('user', function(Builder $builder) {
                $builder->where('id', auth()->user()->id);
            });
        });
    }


    public function scopeSearch(Builder $builder, string $search = ''): void
    {
        if(empty($search)) return;

        $builder->where('title', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->orWhere('genre', 'like', "%{$search}%")
            ->orWhereHas('user', function (Builder $builder) use ($search) {
                $builder->where('name', 'like', "%{$search}%");
            });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function releaseYear(): Attribute
    {
        return Attribute::get(function (): string {
            return $this->release_date->format('Y');
        });
    }

}
