<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable =
        [
          'author' , 'conclusion' , 'link' , 'media' , 'title' , 'publish_date' , 'updated_date' ,'newspaper_id'
        ];


    protected $hidden = [
      'created_at' , 'updated_at' ,'newspaper_id'
    ];





    public function newspaper()
    {
        return $this->belongsTo('App\Models\Newspaper','newspaper_id');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function like()
    {
        return $this->hasMany('App\Models\Like','article_id');
    }

    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }



    protected $appends = ['newspaper'];


    public function getNewspaperAttribute(){
        if ($this->newspaper_id){


        $newspaper_title =Newspaper::select('title','logo')->whereId($this->newspaper_id)->get();
        return $newspaper_title;

        }
    }

}
