<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Menampilkan semua data menu.
     * View: admin.menu
     */
    public function index()
    {
        // Ambil semua data dari table menus
        $menus = Menu::all();

        // Kirim data ke view
        return view('admin.menu', compact('menus'));
    }

    /**
     * Menampilkan form tambah menu.
     * View: admin.create
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Menyimpan data menu baru ke database.
     * Redirect: admin.menu
     */
    public function store(Request $request)
    {
        // Validasi inputan form
        $request->validate([
            'nama_menu' => 'required|unique:menus,nama_menu|max:225',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|max:225',
            'stok' => 'required|integer|min:0',
        ], [
            // Custom message
            'nama_menu.required' => 'Nama menu wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'stok.required' => 'Stok wajib diisi.',
        ]);

        // Simpan ke database
        Menu::create([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
        ]);

        // Redirect dengan message sukses
        return redirect('/menu')->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit data menu.
     * View: admin.edit
     */
    public function edit($id)
    {
        // Ambil data sesuai ID
        $menu = Menu::findOrFail($id);

        return view('admin.edit', compact('menu'));
    }

    /**
     * Update data menu berdasarkan ID.
     * Redirect: admin.menu
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diperbarui
        $request->validate([
            'nama_menu' => 'required|max:225',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|max:225',
            'stok' => 'required|integer|min:0',
        ], [
            // Custom message
            'nama_menu.required' => 'Nama menu wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'stok.required' => 'Stok wajib diisi.',
        ]);

        // Cari data menu
        $menu = Menu::findOrFail($id);

        // Update data
        $menu->update([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
        ]);

        return redirect('/menu')->with('success', 'Menu berhasil diperbarui!');
    }

    /**
     * Hapus data menu.
     * Redirect: admin.menu
     */
    public function destroy($id)
    {
        // Cari data menu
        $menu = Menu::findOrFail($id);

        // Hapus data
        $menu->delete();

        return redirect('/menu')->with('success', 'Menu berhasil dihapus!');
    }
}
