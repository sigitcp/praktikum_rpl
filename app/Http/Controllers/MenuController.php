<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Menampilkan semua data menu.
     * View yang dipakai: admin.menu
     */
    public function index()
    {
        // Mengambil semua data dari tabel "menus"
        $menus = Menu::all();

        // Mengirimkan data ke view menggunakan compact()
        return view('admin.menu', compact('menus'));
    }

    /**
     * Menampilkan form tambah menu.
     * View: admin.create
     */
    public function create()
    {
        // Hanya menampilkan halaman form tambah menu
        return view('admin.create');
    }

    /**
     * Menyimpan data menu baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_menu'   => 'required|unique:menus,nama_menu|max:225', // wajib, unik, max 225 karakter
            'harga'       => 'required|numeric',                        // harus berupa angka
            'deskripsi'   => 'required|max:225',                        // wajib dan max 225 karakter
            'stok'        => 'required|integer|min:0',                  // harus integer dan minimal 0
        ], [
            // Pesan error custom
            'nama_menu.required' => 'Nama menu wajib diisi.',
            'harga.required'     => 'Harga wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'stok.required'      => 'Stok wajib diisi.',
        ]);

        // Simpan data baru ke database (mass assignment)
        Menu::create([
            'nama_menu' => $request->nama_menu,
            'harga'     => $request->harga,
            'deskripsi' => $request->deskripsi,
            'stok'      => $request->stok,
        ]);

        // Redirect kembali ke halaman menu dengan pesan sukses
        return redirect('/menu')->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit menu.
     * View: admin.edit
     */
    public function edit($id)
    {
        // Mencari data menu berdasarkan ID, jika tidak ada akan error 404
        $menu = Menu::findOrFail($id);

        // Kirim data menu ke form edit
        return view('admin.edit', compact('menu'));
    }

    /**
     * Mengupdate data menu berdasarkan ID.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim dari form edit
        $request->validate([
            'nama_menu'   => 'required|max:225',
            'harga'       => 'required|numeric',
            'deskripsi'   => 'required|max:225',
            'stok'        => 'required|integer|min:0',
        ], [
            // Pesan error custom
            'nama_menu.required' => 'Nama menu wajib diisi.',
            'harga.required'     => 'Harga wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'stok.required'      => 'Stok wajib diisi.',
        ]);

        // Ambil data menu yang ingin diupdate
        $menu = Menu::findOrFail($id);

        // Update data menu
        $menu->update([
            'nama_menu' => $request->nama_menu,
            'harga'     => $request->harga,
            'deskripsi' => $request->deskripsi,
            'stok'      => $request->stok,
        ]);

        // Redirect dengan pesan sukses
        return redirect('/menu')->with('success', 'Menu berhasil diperbarui!');
    }

    /**
     * Menghapus data menu berdasarkan ID.
     */
    public function destroy($id)
    {
        // Cari menu berdasarkan ID
        $menu = Menu::findOrFail($id);

        // Hapus data menu
        $menu->delete();

        // Redirect ke halaman menu dengan notifikasi berhasil
        return redirect('/menu')->with('success', 'Menu berhasil dihapus!');
    }
}
