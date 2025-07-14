@extends('layouts.app')

@section('title', 'Kitaplar - Kitap Yönetimi')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Kitaplar</h1>
    <a href="/books/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        + Yeni Kitap
    </a>
</div>

@if(isset($books) && count($books) > 0)
    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Kitap</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Yazar</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Tür</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Yıl</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">İşlemler</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($books as $book)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">{{ $book->title }}</div>
                        @if($book->isbn)
                            <div class="text-sm text-gray-500">ISBN: {{ $book->isbn }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-900">{{ $book->author }}</td>
                    <td class="px-6 py-4">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                            {{ $book->genre }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-900">{{ $book->publication_year }}</td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <a href="/books/{{ $book->id }}" class="text-blue-600 hover:text-blue-800">Görüntüle</a>
                            <a href="/books/{{ $book->id }}/edit" class="text-green-600 hover:text-green-800">Düzenle</a>
                            <button onclick="deleteBook({{ $book->id }})" class="text-red-600 hover:text-red-800">Sil</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="bg-white rounded shadow p-12 text-center">
        <h3 class="text-lg font-medium text-gray-900 mb-2">Henüz kitap yok</h3>
        <p class="text-gray-500 mb-4">İlk kitabınızı ekleyerek başlayın</p>
        <a href="/books/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Kitap Ekle
        </a>
    </div>
@endif

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