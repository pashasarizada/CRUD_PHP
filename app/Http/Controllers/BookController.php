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
public function index():JsonResponse
{
    $books = $this->bookService->getAllBooks();
    return response()->json([
        'success' => true,
        'data' => $books,
        'message' => 'Kitaplar başarılı getirildi'
    ]);
}

// belirli bir kitabı getiriyoruz GET /books/{id}
public function show(int $id):JsonResponse
{
    $book = $this->bookService->getBookById($id);

    if(!$book){
        return response()->json([
            'success' => false,
            'message' => 'Kitap bulunamadı'
        ],404);
    }

    return response()->json([
        'success' => true,
        'data' => $book,
        'message' => "Şu idli {$id} Kitap başarılı getirildi" 
    ]);
}


// yeni kitap ekliyoruz POST /books
public function store(Request $request):JsonResponse
{
    $data = $request ->all();

    $book = $this->bookService->createBook($data);

    return response()->json([
        'success' => true,
        'data' => $book,
        'message' => 'Yeni kitap başarılı eklendi'
    ]);
}



}