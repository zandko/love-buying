<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'is_directory', 'level', 'path'];

    protected $casts = [
        'is_directory' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        /*监听 Category 的创建事件, 用于初始化path 和 level 字段值*/
        static::creating(function (Category $category) {
            if (is_null($category->parent_id)) {
                $category->level = 0;
                $category->path = '-';
            } else {
                $category->level = $category->parent->level + 1;
                /*将 path 值设为父分类的 path 追加父类目 ID 以及最后跟上一个 - 分隔符*/
                $category->path  = $category->parent->path.$category->parent_id.'-';
            }
        });
    }

    /*自连*/
    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /*获取所有祖先分类的ID*/
    public function getPathIdsAttribute()
    {
        return array_filter(explode('-', trim($this->path, '-')));
    }

    /*获取所有祖先分类并排序*/
    public function getAncestorsAttribute()
    {
        return Category::query()
            ->whereIn('id', $this->path_ids)
            ->orderBy('level')
            ->get();
    }

    /*获取以 - 分隔的所有祖先分类名称以及当前分类的名称*/
    public function getFullNameAttribute()
    {
        /*获取所有祖先分类的 name 字段作为一个数组*/
        /*将当前 分类的 name 字段值追加到数组的末尾*/
        /*用 - 把这个数组的值拼接成一个字符串*/
        return $this->ancestors
            ->pluck('name')
            ->push($this->name)
            ->implode(' - ');
    }
}
