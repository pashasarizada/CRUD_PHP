@extends('layouts.app')

@section('title', 'Yeni Kitap Ekle - BookManager Pro')
@section('page-title', 'Yeni Kitap Ekle')

@section('content')
<!-- Breadcrumb -->
<nav class="flex mb-8" aria-label="Breadcrumb">
    <ol role="list" class="flex items-center space-x-4">
        <li>
            <div>
                <a href="/" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                    </svg>
                    <span class="sr-only">Dashboard</span>
                </a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="h-5 w-5 flex-shrink-0 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                </svg>
                <a href="/books" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Kitap Koleksiyonu</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="h-5 w-5 flex-shrink-0 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                </svg>
                <span class="ml-4 text-sm font-medium text-gray-500">Yeni Kitap</span>
            </div>
        </li>
    </ol>
</nav>

<!-- Page Header -->
<div class="mb-8">
    <h3 class="text-base font-semibold leading-6 text-gray-900">Yeni Kitap Ekle</h3>
    <p class="mt-2 text-sm text-gray-700">Koleksiyonunuza yeni bir kitap eklemek için aşağıdaki formu doldurun.</p>
</div>

<!-- Form Container -->
<div class="bg-white shadow-sm ring-1 ring-gray-900/5 rounded-xl">
    <form action="/books" method="POST" class="px-4 py-6 sm:p-8">
        @csrf
        
        <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Kitap Bilgileri</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Kitapın temel bilgilerini girin. Zorunlu alanlar (*) ile işaretlenmiştir.</p>
            </div>

            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                <!-- Title -->
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                        Kitap Başlığı <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-2">
                        <input type="text" 
                               id="title" 
                               name="title" 
                               required
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               placeholder="Örn: Suç ve Ceza">
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Author -->
                <div class="sm:col-span-4">
                    <label for="author" class="block text-sm font-medium leading-6 text-gray-900">
                        Yazar <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-2">
                        <input type="text" 
                               id="author" 
                               name="author" 
                               required
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               placeholder="Örn: Fyodor Dostoyevski">
                        @error('author')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Publication Year -->
                <div class="sm:col-span-2">
                    <label for="publication_year" class="block text-sm font-medium leading-6 text-gray-900">
                        Yayın Yılı <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-2">
                        <input type="number" 
                               id="publication_year" 
                               name="publication_year" 
                               required
                               min="1800"
                               max="2024"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               placeholder="2024">
                        @error('publication_year')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Genre -->
                <div class="sm:col-span-3">
                    <label for="genre" class="block text-sm font-medium leading-6 text-gray-900">
                        Tür <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-2">
                        <select id="genre" 
                                name="genre" 
                                required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Tür seçin</option>
                            <option value="Roman">Roman</option>
                            <option value="Hikaye">Hikaye</option>
                            <option value="Şiir">Şiir</option>
                            <option value="Deneme">Deneme</option>
                            <option value="Biyografi">Biyografi</option>
                            <option value="Tarih">Tarih</option>
                            <option value="Bilim">Bilim</option>
                            <option value="Felsefe">Felsefe</option>
                            <option value="Çocuk">Çocuk</option>
                            <option value="Diğer">Diğer</option>
                        </select>
                        @error('genre')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Page Count -->
                <div class="sm:col-span-3">
                    <label for="page_count" class="block text-sm font-medium leading-6 text-gray-900">
                        Sayfa Sayısı
                    </label>
                    <div class="mt-2">
                        <input type="number" 
                               id="page_count" 
                               name="page_count" 
                               min="1"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               placeholder="Örn: 320">
                        @error('page_count')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- ISBN -->
                <div class="sm:col-span-6">
                    <label for="isbn" class="block text-sm font-medium leading-6 text-gray-900">
                        ISBN
                    </label>
                    <div class="mt-2">
                        <input type="text" 
                               id="isbn" 
                               name="isbn" 
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               placeholder="Örn: 978-3-16-148410-0">
                        @error('isbn')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div class="sm:col-span-6">
                    <label for="description" class="block text-sm font-medium leading-6 text-gray-900">
                        Açıklama
                    </label>
                    <div class="mt-2">
                        <textarea id="description" 
                                  name="description" 
                                  rows="4"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                  placeholder="Kitap hakkında kısa bir açıklama yazın..."></textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/books" class="text-sm font-semibold leading-6 text-gray-900 hover:text-gray-700 transition-colors duration-200">
                İptal
            </a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-200 flex items-center">
                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Kitap Ekle
            </button>
        </div>
    </form>
</div>

<!-- Help Section -->
<div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-4">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-medium text-blue-800">İpuçları</h3>
            <div class="mt-2 text-sm text-blue-700">
                <ul class="list-disc pl-5 space-y-1">
                    <li>Kitap başlığını tam ve doğru yazın</li>
                    <li>ISBN numarası kitabın arka kapağında bulunur</li>
                    <li>Açıklama alanında kitabın konusu hakkında kısa bilgi verebilirsiniz</li>
                    <li>Tüm alanları doldurmanız gerekmez, sadece (*) ile işaretli alanlar zorunludur</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection 