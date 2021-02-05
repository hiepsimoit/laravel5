<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User','phone_id');
    }
}
