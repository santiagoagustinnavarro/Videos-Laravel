<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table='Comments';

     //Relación many to one

     public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function video(){
        return $this->belongsTo('App\Models\Video','video_id');
    }
}
