<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kitap Yönetimi')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Basit Navigation -->
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-4xl mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-semibold text-gray-800">
                    <a href="/">📚 Kitap Yönetimi</a>
                </h1>
                <div class="space-x-4">
                    <a href="/" class="text-gray-600 hover:text-gray-800">Ana Sayfa</a>
                    <a href="/books" class="text-gray-600 hover:text-gray-800">Kitaplar</a>
                    <a href="/books/create" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">+ Ekle</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Ana İçerik -->
    <main class="max-w-4xl mx-auto px-4 py-8">
        <!-- Flash Mesajları -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html> 