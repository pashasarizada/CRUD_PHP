@extends('layouts.app')

@section('title', 'Kitap Düzenle - ' . $book->title)

@section('content')
<div class="flex items-center mb-6">
    <a href="/books/{{ $book->id }}" class="text-gray-600 hover:text-gray-800 mr-4">← Geri</a>
    <h1 class="text-2xl font-bold text-gray-800">Kitap Düzenle</h1>
</div>

<div class="bg-white rounded shadow p-6">
    <form action="/books/{{ $book->id }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                Kitap Başlığı *
            </label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   value="{{ old('title', $book->title) }}"
                   required
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="author" class="block text-sm font-medium text-gray-700 mb-1">
                Yazar *
            </label>
            <input type="text" 
                   id="author" 
                   name="author" 
                   value="{{ old('author', $book->author) }}"
                   required
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
            @error('author')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="publication_year" class="block text-sm font-medium text-gray-700 mb-1">
                    Yayın Yılı *
                </label>
                <input type="number" 
                       id="publication_year" 
                       name="publication_year" 
                       value="{{ old('publication_year', $book->publication_year) }}"
                       required
                       min="1800"
                       max="2024"
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
                @error('publication_year')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="genre" class="block text-sm font-medium text-gray-700 mb-1">
                    Tür *
                </label>
                <select id="genre" 
                        name="genre" 
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Tür seçin</option>
                    <option value="Roman" {{ old('genre', $book->genre) == 'Roman' ? 'selected' : '' }}>Roman</option>
                    <option value="Hikaye" {{ old('genre', $book->genre) == 'Hikaye' ? 'selected' : '' }}>Hikaye</option>
                    <option value="Şiir" {{ old('genre', $book->genre) == 'Şiir' ? 'selected' : '' }}>Şiir</option>
                    <option value="Deneme" {{ old('genre', $book->genre) == 'Deneme' ? 'selected' : '' }}>Deneme</option>
                    <option value="Biyografi" {{ old('genre', $book->genre) == 'Biyografi' ? 'selected' : '' }}>Biyografi</option>
                    <option value="Tarih" {{ old('genre', $book->genre) == 'Tarih' ? 'selected' : '' }}>Tarih</option>
                    <option value="Bilim" {{ old('genre', $book->genre) == 'Bilim' ? 'selected' : '' }}>Bilim</option>
                    <option value="Felsefe" {{ old('genre', $book->genre) == 'Felsefe' ? 'selected' : '' }}>Felsefe</option>
                    <option value="Çocuk" {{ old('genre', $book->genre) == 'Çocuk' ? 'selected' : '' }}>Çocuk</option>
                    <option value="Diğer" {{ old('genre', $book->genre) == 'Diğer' ? 'selected' : '' }}>Diğer</option>
                </select>
                @error('genre')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="page_count" class="block text-sm font-medium text-gray-700 mb-1">
                    Sayfa Sayısı
                </label>
                <input type="number" 
                       id="page_count" 
                       name="page_count" 
                       value="{{ old('page_count', $book->page_count) }}"
                       min="1"
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
                @error('page_count')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="isbn" class="block text-sm font-medium text-gray-700 mb-1">
                    ISBN
                </label>
                <input type="text" 
                       id="isbn" 
                       name="isbn" 
                       value="{{ old('isbn', $book->isbn) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
                @error('isbn')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                Açıklama
            </label>
            <textarea id="description" 
                      name="description" 
                      rows="3"
                      class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">{{ old('description', $book->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-3 pt-4">
            <a href="/books/{{ $book->id }}" class="px-4 py-2 border border-gray-300 rounded text-gray-700 hover:bg-gray-50">
                İptal
            </a>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Güncelle
            </button>
        </div>
    </form>
</div>
@endsection 