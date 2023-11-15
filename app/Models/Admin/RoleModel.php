<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;

    protected $table = 'role';
    public function getKeyName()
    {
        return 'id';
    }
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsToMany(UsersModel::class, 'user-role');
    }
    protected $fillable = [
        'id',
        'title',
        'description',
        'updated_at' ,
        'updated_by' ,
    ];

}
