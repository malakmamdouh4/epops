<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
      'name' , 'source_id'
    ];

    protected $hidden = [
      'created_at' , 'updated_at'
    ];



    public function newspaper()
    {
        return $this->belongsToMany('App\Models\Newspaper');
    }


    public function article()
    {
        return $this->belongsToMany('App\Models\Article');
    }


}
