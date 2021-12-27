<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id' , 'newspaper_id'
    ];

    protected $hidden = [
        'created_at' , 'updated_at'
    ];

    public function newspaper()
    {
        return $this->belongsTo('App\Models\Newspaper','newspaper_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }


}
