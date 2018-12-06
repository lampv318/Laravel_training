<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = "actions";

    public funtion schedule(){
      return $this->belong_to('App\Schedule','schedule_id','id');
    }
}
