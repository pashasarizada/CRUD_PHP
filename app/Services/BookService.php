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

    // Kitap güncelle
    public function updateBook($id, $data)
    {
        $book = Book::find($id);
        if ($book) {
            $book->update($data);
            return $book;
        }
        return null;
    }

    // Kitap sil
    public function deleteBook($id)
    {
        $book = Book::find($id);
        if ($book) {
            return $book->delete();
        }
        return false;
    }
}