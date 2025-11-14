<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('menus', function (Blueprint $table) {
//             $table->id();
//             $table->string('nama_menu', 225);
//             $table->decimal('harga', 10, 2);
//             $table->string('deskripsi', 225)->nullable();
//             $table->integer('stok')->default(0);
//             $table->timestamps();
//         });
//     }

//     public function down(): void
//     {
//         Schema::dropIfExists('menus');
//     }
// };


return new class extends Migration
{
    /**
     * Run the migrations.
     * Method ini akan dijalankan saat perintah:
     * php artisan migrate
     */
    public function up(): void
    {
        // Membuat tabel baru bernama 'menus'
        Schema::create('menus', function (Blueprint $table) {

            // Membuat kolom id (primary key, auto increment)
            $table->id();

            // Kolom nama_menu dengan tipe VARCHAR(225)
            $table->string('nama_menu', 225);

            // Kolom harga dengan tipe DECIMAL(10,2)
            // Cocok untuk menyimpan nilai uang (contoh: 10000.00)
            $table->decimal('harga', 10, 2);

            // Kolom deskripsi dengan panjang 225 karakter
            // ->nullable() artinya boleh dikosongkan
            $table->string('deskripsi', 225)->nullable();

            // Kolom stok dengan tipe INT
            // ->default(0) artinya jika tidak diisi, nilainya otomatis 0
            $table->integer('stok')->default(0);

            // created_at & updated_at otomatis dibuat oleh Laravel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Method ini akan dijalankan saat perintah:
     * php artisan migrate:rollback
     */
    public function down(): void
    {
        // Menghapus tabel 'menus' jika ada
        Schema::dropIfExists('menus');
    }
};

