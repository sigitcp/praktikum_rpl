<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;

// class User extends Authenticatable
// {
//     use HasFactory, Notifiable;

//     protected $fillable = [
//         'username',
//         'email',
//         'password',
//     ];

//     protected $hidden = [
//         'password',
//     ];
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// Menggunakan Authenticatable karena model User dipakai untuk proses autentikasi (login)
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // Trait HasFactory: memungkinkan model ini menggunakan factory
    // Trait Notifiable: memungkinkan user menerima notifikasi (email, database, dsb)
    use HasFactory, Notifiable;

    // $fillable menentukan atribut mana saja yang boleh di-*mass assign*
    // Ini penting agar field yang sensitif tidak bisa diisi sembarangan.
    protected $fillable = [
        'username', // nama user untuk login
        'email',    // email user
        'password', // password user (akan di-hash sebelum disimpan)
    ];

    // $hidden menentukan atribut yang disembunyikan ketika model diubah menjadi array atau JSON.
    // Supaya password tidak ikut tampil saat data user di-serialize.
    protected $hidden = [
        'password',
    ];
}
