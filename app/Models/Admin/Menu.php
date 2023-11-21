<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';

    public function getKeyName()
    {
        return 'id';
    }

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'title',
        'description',
        'parent_id',
        'updated_at',
        'updated_by',
    ];
}
