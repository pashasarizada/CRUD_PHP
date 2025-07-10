@extends('layouts.app')

@section('title', 'Dashboard - BookManager Pro')
@section('page-title', 'Dashboard')

@section('content')
<!-- Stats Overview -->
<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
    <!-- Total Books -->
    <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="flex h-8 w-8 items-center justify-center rounded-md bg-indigo-500">
                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
            </div>
            <div class="ml-5 w-0 flex-1">
                <dl>
                    <dt class="text-sm font-medium text-gray-500 truncate">Toplam Kitap</dt>
                    <dd class="text-lg font-medium text-gray-900">{{ $totalBooks ?? 0 }}</dd>
                </dl>
            </div>
        </div>
    </div>

    <!-- This Month -->
    <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="flex h-8 w-8 items-center justify-center rounded-md bg-green-500">
                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
            </div>
            <div class="ml-5 w-0 flex-1">
                <dl>
                    <dt class="text-sm font-medium text-gray-500 truncate">Bu Ay Eklenen</dt>
                    <dd class="text-lg font-medium text-gray-900">{{ $thisMonthBooks ?? 0 }}</dd>
                </dl>
            </div>
        </div>
    </div>

    <!-- Genres -->
    <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="flex h-8 w-8 items-center justify-center rounded-md bg-yellow-500">
                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
            </div>
            <div class="ml-5 w-0 flex-1">
                <dl>
                    <dt class="text-sm font-medium text-gray-500 truncate">Farklı Tür</dt>
                    <dd class="text-lg font-medium text-gray-900">{{ $totalGenres ?? 0 }}</dd>
                </dl>
            </div>
        </div>
    </div>

    <!-- Authors -->
    <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="flex h-8 w-8 items-center justify-center rounded-md bg-purple-500">
                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>
            <div class="ml-5 w-0 flex-1">
                <dl>
                    <dt class="text-sm font-medium text-gray-500 truncate">Farklı Yazar</dt>
                    <dd class="text-lg font-medium text-gray-900">{{ $totalAuthors ?? 0 }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<!-- Welcome Section -->
<div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-lg shadow-xl mb-8">
    <div class="px-6 py-8 sm:px-10 sm:py-12">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                BookManager Pro'ya Hoşgeldiniz
            </h2>
            <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-indigo-100">
                Kitap koleksiyonunuzu profesyonelce yönetin. Modern arayüz ile kitaplarınızı organize edin, takip edin ve keşfedin.
            </p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="/books/create" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white transition-all duration-200">
                    <svg class="inline h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Yeni Kitap Ekle
                </a>
                <a href="/books" class="text-sm font-semibold leading-6 text-white hover:text-indigo-100 transition-colors duration-200">
                    Koleksiyonu Görüntüle <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity & Quick Actions -->
<div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
    <!-- Recent Books -->
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Son Eklenen Kitaplar</h3>
                <a href="/books" class="text-sm text-indigo-600 hover:text-indigo-500">Tümünü Gör</a>
            </div>
            
            @if(isset($recentBooks) && count($recentBooks) > 0)
                <div class="flow-root">
                    <ul role="list" class="-mb-8">
                        @foreach($recentBooks as $index => $book)
                        <li>
                            <div class="relative pb-8">
                                @if($index < count($recentBooks) - 1)
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                @endif
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full bg-indigo-500 flex items-center justify-center ring-8 ring-white">
                                            <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-900 font-medium">{{ $book->title }}</p>
                                            <p class="text-sm text-gray-500">{{ $book->author }}</p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            <time datetime="{{ $book->created_at }}">{{ $book->created_at->diffForHumans() }}</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Henüz kitap yok</h3>
                    <p class="mt-1 text-sm text-gray-500">İlk kitabınızı ekleyerek başlayın.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Hızlı İşlemler</h3>
            <div class="grid grid-cols-1 gap-4">
                <a href="/books/create" class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500 border border-gray-200 rounded-lg hover:border-indigo-300 transition-all duration-200">
                    <div>
                        <span class="rounded-lg inline-flex p-3 bg-indigo-50 text-indigo-700 ring-4 ring-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="mt-8">
                        <h3 class="text-lg font-medium">
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            Yeni Kitap Ekle
                        </h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Koleksiyonunuza yeni bir kitap ekleyin
                        </p>
                    </div>
                    <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z"/>
                        </svg>
                    </span>
                </a>

                <a href="/books" class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500 border border-gray-200 rounded-lg hover:border-indigo-300 transition-all duration-200">
                    <div>
                        <span class="rounded-lg inline-flex p-3 bg-green-50 text-green-700 ring-4 ring-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="mt-8">
                        <h3 class="text-lg font-medium">
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            Koleksiyonu Yönet
                        </h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Mevcut kitaplarınızı görüntüleyin ve düzenleyin
                        </p>
                    </div>
                    <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z"/>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 