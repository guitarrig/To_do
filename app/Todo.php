<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{


    public function user(){

      return $this->belongsTo('App\User');
    }

    public function list(){
      return $this->belongsTo('App\Lists');
    }
}
