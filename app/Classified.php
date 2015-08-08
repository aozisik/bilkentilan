<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
use Carbon\Carbon;

class Classified extends Model implements StaplerableInterface
{
	use EloquentTrait;

	protected $guarded = ['id', 'approved', 'expires_at', 'visits'];
	protected $dates = ['expires_at'];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('photo', [
            'styles' => [
                'medium' => '800x600#',
                'thumb' => '64x64#'
            ],
            'default_url' => asset('images/placeholder.jpg')
        ]);

        parent::__construct($attributes);
    }

    public function category() {
    	return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeOwnedBy($query, $userId) {
    	return $query->where('user_id', $userId);
    }

    public function scopePopular($query) {
        return $query->orderBy('visits', 'DESC');
    }

    public function scopeRecent($query) {
    	return $query->orderBy('updated_at', 'DESC');
    }

    public function scopeActive($query) {
        return $query->where('expires_at', '>', Carbon::now());
    }

    public function getCategoryNameAttribute() {
    	return $this->category->parent->name.' > '.$this->category->name;
    }

    public function url() {
        return route('classifieds.show', ['id' => $this->id, 'slug' => str_slug($this->title)]);
    }
}
