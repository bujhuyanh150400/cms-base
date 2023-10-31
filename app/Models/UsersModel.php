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
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'birth' ,
        'department' ,
        'position' ,
        'access_login',
        'phone',
        'address',
        'created_at',
        'updated_at',
        'remember_token',
    ];
    protected $hidden = [
        'password',
    ];
    public function setUserPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
