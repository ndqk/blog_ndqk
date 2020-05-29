<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'Comments';
    protected $primarKey = 'comment_id';

    protected $fillable = ['comment_post_id', 'comment_author', 'comment_email', 'comment_content'];

    public function post(){
        return $this->belongsTo('App\StandardPosts', 'comment_post_id');
    }
}
