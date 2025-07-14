@extends('layouts.app')

@section('title', $book->title . ' - Kitap Detayı')

@section('content')
<div class="flex items-center mb-6">
    <a href="/books" class="text-gray-600 hover:text-gray-800 mr-4">← Kitaplara Dön</a>
    <h1 class="text-2xl font-bold text-gray-800">Kitap Detayı</h1>
</div>

<div class="bg-white rounded shadow p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h2 class="text-xl font-bold text-gray-800 mb-4">{{ $book->title }}</h2>
            
            <div class="space-y-3">
                <div>
                    <span class="text-sm font-medium text-gray-500">Yazar:</span>
                    <p class="text-gray-900">{{ $book->author }}</p>
                </div>
                
                <div>
                    <span class="text-sm font-medium text-gray-500">Tür:</span>
                    <p class="text-gray-900">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                            {{ $book->genre }}
                        </span>
                    </p>
                </div>
                
                <div>
                    <span class="text-sm font-medium text-gray-500">Yayın Yılı:</span>
                    <p class="text-gray-900">{{ $book->publication_year }}</p>
                </div>
                
                @if($book->page_count)
                <div>
                    <span class="text-sm font-medium text-gray-500">Sayfa Sayısı:</span>
                    <p class="text-gray-900">{{ $book->page_count }} sayfa</p>
                </div>
                @endif
                
                @if($book->isbn)
                <div>
                    <span class="text-sm font-medium text-gray-500">ISBN:</span>
                    <p class="text-gray-900">{{ $book->isbn }}</p>
                </div>
                @endif
                
                <div>
                    <span class="text-sm font-medium text-gray-500">Eklenme Tarihi:</span>
                    <p class="text-gray-900">{{ $book->created_at->format('d.m.Y H:i') }}</p>
                </div>
            </div>
        </div>
        
        <div>
            @if($book->description)
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-800 mb-2">Açıklama</h3>
                <p class="text-gray-700 leading-relaxed">{{ $book->description }}</p>
            </div>
            @endif
            
            <div class="flex space-x-3">
                <a href="/books/{{ $book->id }}/edit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Düzenle
                </a>
                <button onclick="deleteBook({{ $book->id }})" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Sil
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function deleteBook(bookId) {
    if (confirm('Bu kitabı silmek istediğinizden emin misiniz?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/books/${bookId}`;
        
        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'DELETE';
        
        const tokenInput = document.createElement('input');
        tokenInput.type = 'hidden';
        tokenInput.name = '_token';
        tokenInput.value = '{{ csrf_token() }}';
        
        form.appendChild(methodInput);
        form.appendChild(tokenInput);
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
@endsection 