<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import BelongsTo

class Book extends Model
{
    use HasFactory;

    // Pastikan category_id didaftarkan agar bisa disimpan
    protected $fillable = [
        'title',
        'author',
        'year',
        'stock',
        'category_id', 
    ];

    // Relasi One-to-Many Inverse: 1 Buku dimiliki oleh 1 Kategori
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}