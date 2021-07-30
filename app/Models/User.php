<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Authenticatable implements AuthenticatableContract, CanResetPasswordContract
{
    use HasFactory, Notifiable;


     /**
   * The database table used by the model.
   *
   * @var string
   */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];
    /**
     * User has many posts
     */
    public function recipes()
    {
        return $this->hasMany('App\Models\Recipes', 'author_id');
    }

    public function can_post()
    {
      $role = $this->role;
      if ($role == 'author' || $role == 'admin') {
        return true;
      }
      return false;
    }

    public function is_admin()
    {
      $role = $this->role;
      if ($role == 'admin') {
        return true;
      }
      return false;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
