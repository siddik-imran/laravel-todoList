<?php

namespace App;

use App\Todo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Mutator
    // public function setPassWordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }

    // Accessor
    // public function getNameAttribute($name)
    // {
    //     return 'My name is:' . ucfirst($name);
    // }

    // one to many relationship
    public function todos()
    {
        return $this->hasMany(Todo::class);
    }


}
