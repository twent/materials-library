<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Material
 *
 * @property int $id
 * @property int $category_id
 * @property string|null $authors
 * @property string $title
 * @property string $type
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Link[] $links
 * @property-read int|null $links_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Database\Factories\MaterialFactory factory(...$parameters)
 * @method static Builder|Material newModelQuery()
 * @method static Builder|Material newQuery()
 * @method static \Illuminate\Database\Query\Builder|Material onlyTrashed()
 * @method static Builder|Material query()
 * @method static Builder|Material search()
 * @method static Builder|Material tag()
 * @method static Builder|Material whereAuthors($value)
 * @method static Builder|Material whereCategoryId($value)
 * @method static Builder|Material whereCreatedAt($value)
 * @method static Builder|Material whereDeletedAt($value)
 * @method static Builder|Material whereDescription($value)
 * @method static Builder|Material whereId($value)
 * @method static Builder|Material whereTitle($value)
 * @method static Builder|Material whereType($value)
 * @method static Builder|Material whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Material withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Material withoutTrashed()
 * @mixin \Eloquent
 */

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
