<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogs_category extends Model
{
    //

    public function blogs()
    {
        return $this->hasMany('App\blogs','category_id');
    }

}
