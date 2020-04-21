<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'user_id', 'title', 'description', 'image_path'
    ];

    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
