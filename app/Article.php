<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id', 'section_id', 'title', 'description', 'image_path'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
