<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagsnews extends Model
{
    use HasFactory;

    protected $fillable =  [
      'tag_id' ,'newspaper_id'
    ];

    protected $hidden = [
        'created_at' , 'updated_at'
    ];



    public function newspaper()
    {
        return $this->belongsToMany('App\Models\Newspaper','newspaper_id');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag','tag_id');
    }


}
