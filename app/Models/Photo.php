<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Builder;
use Cache;

class Photo extends Model
{
    use HasFactory, HasSlug;

    protected $perPage = 9;

    public static function boot() {
        parent::boot();

        static::created(function() {
            Cache::flush();
        });

        static::updated(function() {
            Cache::flush();
        });

        static::deleted(function() {
            Cache::flush();
        });
    }

    protected static function booted() {
        static::addGlobalScope('active', function(Builder $builder) {
            $builder->where('active', true);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSlugOptions() : SlugOptions {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function album() {
        return $this->belongsTo(Album::class);
    }

    public function sources() {
        return $this->hasMany(Source::class);
    }
}