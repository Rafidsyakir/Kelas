<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';
    
    protected $fillable = [
        'nama',
        'slug'
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}