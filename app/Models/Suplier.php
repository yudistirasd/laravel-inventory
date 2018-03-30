<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    public $timestamps = false;
    public $fillable   = ['name', 'status', 'user_id'];

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }
}
