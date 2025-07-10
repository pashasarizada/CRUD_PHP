<?php

namespace App\Http\Controllers;

use App\Services\BookService;  
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    // tüm kitapları getiriyoruz GET /books
    public function index()
    {
        $books = $this->bookService->getAllBooks();
        return view('books.index', compact('books'));
    }

    // kitap ekleme formu gösteriyoruz GET /books/create
    public function create()
    {
        return view('books.create');
    }

    // belirli bir kitabı getiriyoruz GET /books/{id}
    public function show(int $id)
    {
        $book = $this->bookService->getBookById($id);

        if(!$book){
            return redirect('/books')->with('error', 'Kitap bulunamadı');
        }

        return view('books.show', compact('book'));
    }

    // yeni kitap ekliyoruz POST /books
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_year' => 'required|integer|min:1800|max:2024',
            'genre' => 'required|string|max:100',
            'description' => 'nullable|string',
            'page_count' => 'nullable|integer|min:1',
            'isbn' => 'nullable|string|max:20'
        ]);

        $book = $this->bookService->createBook($data);

        return redirect('/books')->with('success', 'Kitap başarıyla eklendi!');
    }

    // kitap düzenleme formu gösteriyoruz GET /books/{id}/edit
    public function edit(int $id)
    {
        $book = $this->bookService->getBookById($id);

        if(!$book){
            return redirect('/books')->with('error', 'Kitap bulunamadı');
        }

        return view('books.edit', compact('book'));
    }

    // kitap güncelliyoruz PUT /books/{id}
    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_year' => 'required|integer|min:1800|max:2024',
            'genre' => 'required|string|max:100',
            'description' => 'nullable|string',
            'page_count' => 'nullable|integer|min:1',
            'isbn' => 'nullable|string|max:20'
        ]);

        $book = $this->bookService->updateBook($id, $data);

        if(!$book){
            return redirect('/books')->with('error', 'Kitap bulunamadı');
        }

        return redirect('/books')->with('success', 'Kitap başarıyla güncellendi!');
    }

    // kitap siliyoruz DELETE /books/{id}
    public function destroy(int $id)
    {
        $deleted = $this->bookService->deleteBook($id);

        if(!$deleted){
            return redirect('/books')->with('error', 'Kitap bulunamadı');
        }

        return redirect('/books')->with('success', 'Kitap başarıyla silindi!');
    }
}