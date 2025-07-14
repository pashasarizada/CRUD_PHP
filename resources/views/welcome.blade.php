@extends('layouts.app')

@section('title', 'Ana Sayfa - Kitap Yönetimi')

@section('content')
<div class="text-center py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">
        Kitap Yönetimi Sistemi
    </h1>
    <p class="text-gray-600 mb-8">
        Kitaplarınızı kolayca yönetin
    </p>
    
    <div class="space-x-4">
        <a href="/books" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600">
            Kitapları Görüntüle
        </a>
        <a href="/books/create" class="bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600">
            Yeni Kitap Ekle
        </a>
    </div>
</div>

<!-- Basit İstatistikler -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
    <div class="bg-white p-6 rounded shadow text-center">
        <h3 class="text-2xl font-bold text-blue-600">0</h3>
        <p class="text-gray-600">Toplam Kitap</p>
    </div>
    <div class="bg-white p-6 rounded shadow text-center">
        <h3 class="text-2xl font-bold text-green-600">0</h3>
        <p class="text-gray-600">Bu Ay Eklenen</p>
    </div>
    <div class="bg-white p-6 rounded shadow text-center">
        <h3 class="text-2xl font-bold text-purple-600">0</h3>
        <p class="text-gray-600">Farklı Tür</p>
    </div>
</div>
@endsection 