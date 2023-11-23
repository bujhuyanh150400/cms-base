<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';

    public function getKeyName()
    {
        return 'id';
    }
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'title',
        'description',
        'public',
        'updated_at',
        'updated_by',
    ];

    public function menu(){
        $this->hasMany(Menu::class);
    }
}
