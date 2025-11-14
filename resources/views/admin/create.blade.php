@extends('layouts.master')
@section('container')

<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Tambah Data</h1>

    {{-- Validasi Error --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan!</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Masukan Data Menu</h6>
        </div>

        <div class="card-body">
            <div class="col-lg-12">

                <form action="/tambahmenu" method="POST" class="user">
                    @csrf

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text"
                                name="nama_menu"
                                class="form-control form-control-user"
                                placeholder="Nama Menu"
                                value="{{ old('nama_menu') }}">
                        </div>

                        <div class="col-sm-6">
                            <input type="number"
                                name="harga"
                                class="form-control form-control-user"
                                placeholder="Harga Menu"
                                value="{{ old('harga') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text"
                                name="deskripsi"
                                class="form-control form-control-user"
                                placeholder="Deskripsi Menu"
                                value="{{ old('deskripsi') }}">
                        </div>

                        <div class="col-sm-6">
                            <input type="number"
                                name="stok"
                                class="form-control form-control-user"
                                placeholder="Jumlah Stok"
                                value="{{ old('stok') }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Tambah Data Menu
                    </button>

                </form>

            </div>
        </div>

    </div>

</div>

@endsection




<!-- <div class="container-fluid">


    <h1 class="h3 mb-2 text-gray-800">Tambah Data</h1>


    {{-- Validasi Error --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan!</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Masukan Data Menu</h6>
        </div>
        <div class="card-body">
            <div class="col-lg-12">
                <div class="p-1">
                    <form class="user">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" placeholder="Nama Menu">
                            </div>
                            <div class="col-sm-6">
                                <input type="number" class="form-control form-control-user" placeholder="Harga Menu">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" placeholder="Deskripsi Menu">
                            </div>
                            <div class="col-sm-6">
                                <input type="Number" class="form-control form-control-user" placeholder="Jumlah Stok">
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary btn-user btn-block">
                            Tambah Data Menu
                        </a>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</div> -->

