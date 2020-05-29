<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class StandardPosts extends Model
{
    use Sluggable;

    protected $primaryKey = 'spost_id';
    protected $table = 'Standard_posts';
    protected $fillable = [ 'spost_category_id','spost_title','spost_author',
                            'spost_content','spost_tag','spost_comment_count',
                            'spost_image','spost_date'];

    public $timestamps = true;

    public function category(){
        return $this->belongsTo('App\Categories','spost_category_id');
    }

    public function comment(){
        return $this->hasMany('App\Comments', 'comment_post_id');
    }

    public function toppost(){
        return $this->belongsTo('App\TopPosts', 'spost_id');
    }

    public function sluggable(){
        return [
            'spost_slug' => [
                'source' => 'spost_title'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'spost_slug';
    }
}
