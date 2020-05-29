<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Categories extends Model
{
    use Sluggable;

    protected $primaryKey = 'cate_id';
    protected $table = 'Categories';
    protected $fillable = ['cate_name', 'cate_slug'];

    public $timestamps = true;

    public function posts(){
        return $this->hasMany('App\StandardPosts', 'spost_category_id');
    }

    public function sluggable()
    {
        return [
            'cate_slug' => [
                'source' => 'cate_name'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'cate_slug';
    }

}
