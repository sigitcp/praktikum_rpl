@extends('layouts.master')
@section('container')

<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Data Menu</h1>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <a href="/tambahmenu" class="btn btn-primary mb-3">+ Tambah Menu</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Menu</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Stok</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $menu->nama_menu }}</td>
                                <td>Rp. {{ number_format($menu->harga, 2) }}</td>
                                <td>{{ $menu->deskripsi }}</td>
                                <td>{{ $menu->stok }}</td>

                                <td class="d-flex">
                                    <a href="/editmenu/{{ $menu->id }}" 
                                        class="btn btn-success btn-circle mr-2">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <a href="/hapusmenu/{{ $menu->id }}" 
                                        class="btn btn-danger btn-circle"
                                        onclick="return confirm('Yakin hapus data?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>

</div>

@endsection
