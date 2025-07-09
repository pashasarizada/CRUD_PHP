<?php

namespace App\Services;  

use App\Models\Book;

class BookService
{
    // Tüm kitapları getir
    public function getAllBooks()
    {
        return Book::all();
    }

    // ID'ye göre kitap getir
    public function getBookById($id)
    {
        return Book::find($id);
    }

    // Yeni kitap oluştur
    public function createBook($data)
    {
        return Book::create($data);
    }
}