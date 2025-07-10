<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    // fillable alanlarını belirtiyoruz
    protected $fillable = [
        'title',
        'author',
        'publication_year',
        'genre',
        'description', 
        'page_count',
        'isbn',
        'is_published'
    ];

    // cast alanlarını belirtiyoruz, veri tiplerini belirtiyoruz
    // veritabanından string olarak geldiği için...
    protected $casts = [
        'is_published' => 'boolean',
        'publication_year' => 'integer',
        'page_count' => 'integer',
    ];

    // default değerleri belirtiyoruz
    protected $attributes = [
        'is_published' => false,
    ];
}
