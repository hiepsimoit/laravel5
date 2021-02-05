<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{


    public function category()
    {
        return $this->belongsTo('App\blogs_category','category_id','id');
    }

}
