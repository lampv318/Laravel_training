<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyProgram extends Model
{
    protected $table = "my_programs";

    public function user(){
      return $this->belongsTo('App\Schedule','user_id','id');
    }

    public function program(){
      return $this->belongsTo('App\Schedule','program_id','id');
    }
}
