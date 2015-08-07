<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

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
            ]
        ]);

        parent::__construct($attributes);
    }	
}
