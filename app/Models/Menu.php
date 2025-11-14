<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Menu extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'nama_menu',
//         'harga',
//         'deskripsi',
//         'stok',
//     ];
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // Trait HasFactory digunakan agar model ini bisa menggunakan factory
    // untuk kebutuhan seeding dan testing.
    use HasFactory;

    // $fillable berfungsi untuk menentukan atribut mana saja
    // yang boleh di-*mass assign* (diisi sekaligus melalui create() atau update()).
    // Jika tidak didefinisikan, Laravel akan menolak mass assignment
    // demi keamanan, agar field sensitif tidak bisa disuntik data sembarangan.
    protected $fillable = [
        'nama_menu',   // nama menu makanan/minuman
        'harga',       // harga menu
        'deskripsi',   // deskripsi singkat tentang menu (boleh nullable)
        'stok',        // jumlah stok yang tersedia
    ];
}
