<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = "post";
    public function category()
    {
        return $this->belongsTo('App\category', 'category_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'id_Owner', 'id');
    }
    public function comment()
    {
        return $this->hasMany('App\comment', 'post_id', 'id');
    }
}
