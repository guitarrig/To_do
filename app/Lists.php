<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Lists extends Model
{

  protected $fillable = ['name', 'user_id', 'private'];

    public function user(){

      return $this->belongsTo('App\User');
    }

    public function todos(){
      return $this->hasMany('App\Todo');
    }
}
