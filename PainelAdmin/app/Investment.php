<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $fillable = [
        'user_id', 'value', 'title', 'description', 'image', 'link_video', 'link_general'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
