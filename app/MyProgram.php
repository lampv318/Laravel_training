<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyProgram extends Model
{
    protected $table = "my_programs";

    public funtion user(){
      return $this->belong_to('App\Schedule','user_id','id');
    }

    public funtion program(){
      return $this->belong_to('App\Schedule','program_id','id');
    }
}
