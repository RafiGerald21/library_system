<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Import HasMany

class Category extends Model
{
    // Mengizinkan kolom name diisi secara massal
    protected $fillable = ['name'];

    // Relasi One-to-Many: 1 Kategori memiliki Banyak Buku
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}