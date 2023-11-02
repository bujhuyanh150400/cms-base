<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;


class UsersModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_users';
    public function getKeyName()
    {
        return 'id';
    }
    public function fill(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'birth' ,
        'gender' ,
        'address',
        'role' ,
        'access_login',
        'phone',
        'address',
        'updated_at',
    ];

    public function setUserPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
