<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
     use HasFactory;
    protected $table = 'tbl_users';
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'user_password',
        'user_birth',
        'user_department',
        'user_position',
        'user_phone',
    ];use HasFactory;
}
