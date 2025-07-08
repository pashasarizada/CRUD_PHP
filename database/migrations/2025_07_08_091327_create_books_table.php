<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Bu fonksiyon migration çalıştırıldığında (php artisan migrate) çalışır
     * Database'de books tablosunu oluşturur
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            // Primary key - otomatik artan ID
            $table->id();
            
            // Kitap bilgileri - bu alanlar database'de sütun olarak oluşturulacak
            $table->string('title');        // Kitap başlığı - VARCHAR(255)
            $table->string('author');       // Yazar adı - VARCHAR(255)
            $table->text('description');    // Kitap açıklaması - TEXT (uzun metin)
            $table->integer('pages');       // Sayfa sayısı - INTEGER
            $table->decimal('price', 8, 2); // Fiyat - DECIMAL(8,2) - 999999.99 formatında
            $table->boolean('is_published')->default(false); // Yayınlanmış mı? - BOOLEAN
            
            // Laravel'in otomatik created_at ve updated_at alanları
            // Bu alanlar Eloquent tarafından otomatik yönetilir
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Bu fonksiyon migration geri alındığında (php artisan migrate:rollback) çalışır
     * Database'den books tablosunu siler
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
