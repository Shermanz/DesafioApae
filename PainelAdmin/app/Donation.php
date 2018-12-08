<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\User;

class Donation extends Model
{
    protected $fillable = [
        'user_id', 'value', 'document', 'name', 'contact'
    ];

    public function user()
    {
        return $this->HasOne('User');
    }
}
