<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopPost extends Model
{
    protected $table = 'Top_posts';
    protected $primaryKey = 'top_id';

    protected $fillable = ['top_post_id'];

    public function post(){
        return $this->hasOne('App\StandardPosts', 'spost_id', 'top_post_id');
    }
}
