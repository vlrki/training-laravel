<?php

namespace App\Models;

use App\Observers\BlogCategoryObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategory
 * 
 * @package App\Models
 * 
 * @property-read BlogCategory      $parentCategory
 * @property-read string            $parentTitle
 */
class BlogCategory extends Model
{
    use SoftDeletes;

    const ROOT = 1;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description'
    ];

    /**
     * Родительская категория
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }
    
    /**
     * Аксессор для поля parentTitle.
     *
     * @return string
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'Корень'
                : '???');

        return $title;
    }
    
    /**
     * Является ли текущая категория корневой.
     *
     * @return bool
     */
    public function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }
    
    /**
     * Пример аксессора
     *
     * @param  string $valueFromObject
     * @return bool|mixed|null|string|string[]
     */
    // public function getTitleAttribute($valueFromObject)
    // {
    //     return mb_strtoupper($valueFromObject);
    // }
    
    /**
     * Пример мутатора
     *
     * @param  string $incomingValue
     */
    // public function setTitleAttribute($incomingValue)
    // {
    //     $this->attributes['title'] = mb_strtolower($incomingValue);
    // }
}
