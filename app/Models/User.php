<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
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
        'name', 'username', 'password','role','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = false;

    /**
     * to ignore remember_token
     * when log out
     */
    public function setAttribute($key, $value)
    {
      $isRememberTokenAttribute = $key == $this->getRememberTokenName();
      if (!$isRememberTokenAttribute)
      {
        parent::setAttribute($key, $value);
      }
    }

    public function role()
    {
      if($this->role == 0){
        return 'admin';
      }elseif($this->role == 1){
        return 'manager';
      }elseif ($this->role == 2) {
        return 'gudang';
      }elseif ($this->role == 3) {
        return 'suplier';
      }else{
        return false;
      }
    }

}
