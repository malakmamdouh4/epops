<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
      'article_id' ,'user_id'
    ];


    protected $hidden = [
        'created_at' , 'updated_at'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function article()
    {
        return $this->belongsTo('App\Models\Article','article_id');
    }

}
