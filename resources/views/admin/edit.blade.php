@extends('layouts.master')
@section('container')

<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit Data</h1>

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
            <h6 class="m-0 font-weight-bold text-primary">
                Edit Data Menu ({{ $menu->nama_menu }})
            </h6>
        </div>

        <div class="card-body">
            <div class="col-lg-12">

                <form action="/editmenu/{{ $menu->id }}" method="POST" class="user">
                    @csrf

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" 
                                   name="nama_menu"
                                   class="form-control form-control-user" 
                                   value="{{ $menu->nama_menu }}">
                        </div>

                        <div class="col-sm-6">
                            <input type="number" 
                                   name="harga"
                                   class="form-control form-control-user" 
                                   value="{{ $menu->harga }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" 
                                   name="deskripsi"
                                   class="form-control form-control-user" 
                                   value="{{ $menu->deskripsi }}">
                        </div>

                        <div class="col-sm-6">
                            <input type="number" 
                                   name="stok"
                                   class="form-control form-control-user" 
                                   value="{{ $menu->stok }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Update Data Menu
                    </button>

                </form>

            </div>
        </div>

    </div>

</div>

@endsection
