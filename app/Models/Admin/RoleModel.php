<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_role';
    public function getKeyName()
    {
        return 'id';
    }
    protected $fillable = [
        'id',
        'title',
        'description',
        'updated_at' ,
        'updated_by' ,
    ];
}
