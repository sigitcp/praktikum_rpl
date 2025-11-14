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
//         Schema::create('users', function (Blueprint $table) {
//             $table->id();
//             $table->string('username', 225);
//             $table->string('email', 225);
//             $table->string('password', 225);
//             $table->timestamps();
//         });
//     }

//     public function down(): void
//     {
//         Schema::dropIfExists('users');
//     }
// };


// Menggunakan class anonim (anonymous class) yang mewarisi class Migration.
// Ini adalah standar Laravel versi terbaru untuk membuat file migrasi.
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Method "up()" akan dijalankan ketika kita menjalankan perintah:
     *     php artisan migrate
     *
     * Di dalam method ini kita mendefinisikan struktur tabel yang ingin dibuat.
     */
    public function up(): void
    {
        // Membuat tabel baru dengan nama 'users'
        Schema::create('users', function (Blueprint $table) {

            // ============================
            // 1. Kolom id (PRIMARY KEY)
            // ============================
            // $table->id() otomatis membuat kolom:
            // - id (tipe BIGINT)
            // - auto increment
            // - primary key
            $table->id();

            // ================================
            // 2. Kolom username
            // ================================
            // string = varchar
            // Panjang 225 karakter
            $table->string('username', 225);

            // ================================
            // 3. Kolom email
            // ================================
            // Disarankan email bersifat UNIQUE,
            // namun pada contoh ini kita belum menambah unique.
            $table->string('email', 225);

            // ================================
            // 4. Kolom password
            // ================================
            // Password yang disimpan adalah password ter-enkripsi
            // menggunakan Hash::make() pada seeder atau controller
            $table->string('password', 225);

            // ================================
            // 5. created_at & updated_at
            // ================================
            // Laravel otomatis membuat 2 kolom:
            // - created_at  (waktu data dibuat)
            // - updated_at  (waktu data diperbarui)
            // Keduanya bertipe TIMESTAMP
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * Method "down()" dijalankan ketika kita menjalankan:
     *     php artisan migrate:rollback
     *
     * Tugasnya adalah membatalkan apa yang sudah dilakukan oleh method up().
     */
    public function down(): void
    {
        // Menghapus tabel 'users' apabila exist.
        // Fungsi dropIfExists() memastikan error tidak muncul jika tabel tidak ditemukan.
        Schema::dropIfExists('users');
    }
};
