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
        'action',
        'category_id',
        'parent_id',
        'updated_at',
        'updated_by',
    ];
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function category(){
        $this->belongsTo(Category::class);
    }
}
