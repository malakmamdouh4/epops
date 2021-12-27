<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newspaper extends Model
{
    use HasFactory;

    protected $fillable = [
      'title' , 'logo' , 'link'
    ];

    protected $hidden = [
        'created_at' , 'updated_at'
    ];


    // public function tagsnews()
    // {
    //     return $this->belongsToMany('App\Models\Tagsnews','newspaper_id');
    // }
    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function folow()
    {
        return $this->hasMany('App\Models\Follow','newspaper_id');
    }

    public function article()
    {
        return $this->hasMany('App\Models\Article','newspaper_id');
    }

}
