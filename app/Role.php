<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['nama_role', 'keterangan'];

    public function user()
    {
    	return $this->hasMany(User::class, 'role_id', 'id');
    }
}
