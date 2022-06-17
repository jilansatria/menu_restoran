@extends('layouts.main')
@section('title', 'Edit restoran')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Edit Restoran</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('restoran.update', $restoran->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="kode_menu">kode menu</label>
                        <input type="text" name="kode menu" class="@error('kode menu') is-invalid @enderror form-control" value="{{ old('kode menu') }}" required>

                        @error('kode_menu')
                        <div class="mt-1">
                            <span class="text-danger">{{ $massage }}</span>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="jenis_menu">jenis menu</label>
                        <input type="text" name="jenis menu" class="form-control" value="{{ old('jenis menu', $restoran->jenis_menu) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="nama_menu">nama menu</label>
                        <input type="text" name="nama menu" class="form-control" value="{{ old('nama menu', $restoran->nama_menu) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="stok_menu">stok menu</label>
                        <input type="text" name="stok menu" class="form-control" value="{{ old('stok menu',  $restoran->stok_menu) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="harga">harga</label>
                        <textarea name="harga" class="form-control">{{ old('harga',  $restoran->harga) }}</textarea>
                    </div>

                    <div class="form-group d-flex justify-content-between">
                        <button type="sumbit" class="btn btn-primary">Sumbit</button> 
                        <a href="{{ route('restoran.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection