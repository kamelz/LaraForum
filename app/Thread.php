<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];

    public function replies(){

        return $this->hasMany(Reply::class);
    }

    public function addReply($reply){

        return $this->replies()->create($reply);
    }


    public function owner(){

        return $this->belongsTo(User::class,'user_id');
    }

    public function path(){

        return '/threads/'.$this->id;
    }
}