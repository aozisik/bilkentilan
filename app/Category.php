<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function scopeMain($query) {
    	return $query->whereNull('parent_id');
    }

    public function scopeChildren($query) {
    	return $query->whereNotNull('parent_id');
    }        

    public function parent() {
    	return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
