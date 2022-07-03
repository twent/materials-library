<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function scopeSearch(Builder $query)
    {
        $query->when(request('search-query'), function (Builder $query) {
            $q = request('search-query');

            return $query->where('title', 'ILIKE', '%' . $q . '%')
                ->orWhere('authors', 'ILIKE', '%' . $q . '%')
                // Categories
                ->orWhereHas('category', function ($query) use ($q) {
                    return $query->where('title', 'ILIKE', '%' . $q . '%');
                })
                // Tags
                ->orWhereHas('tags', function ($query) use ($q) {
                    return $query->where('title', 'ILIKE', '%' . $q . '%');
                });
        });
    }

    public function scopeTag(Builder $query)
    {
        $query->when(request('tag_id'), function (Builder $query) {
            $q = request('tag_id');

            return $query->WhereHas('tags', function ($query) use ($q) {
                    return $query->where('id', '=', $q);
                });
        });
    }

    public function category(): hasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function links(): MorphToMany
    {
        return $this->morphToMany(Link::class, 'linkable');
    }

}
