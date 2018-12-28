<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Category extends Model
{
    protected $fillable = [
        'name', 'description','parent_id'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * 获取分类层级列表.
     *
     * @return mixed
     */
    public function cats()
    {
        $parentMenus = self::with('children')->whereParentId(0)->get();

        return $parentMenus;
    }
}
