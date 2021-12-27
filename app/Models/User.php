<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

use App\Notifications\ResetPasswordNotification;


class User extends Authenticatable implements JWTSubject , MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $guard = 'api';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at' ,
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }



    public function sendPasswordResetNotification($token)
    {
        $url = 'https://spa.test/reset-password?token='.$token;
        $this->notify(new ResetPasswordNotification($url));
    }



    public function follow()
    {
        return $this->hasMany('App\Models\Follow','user_id');
    }


    public function like()
    {
        return $this->hasMany('App\Models\Like','user_id');
    }


    public function article()
    {
        return $this->belongsToMany('App\Models\Article');
    }






}
