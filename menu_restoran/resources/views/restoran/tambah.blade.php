@extends('layouts.main')
@section('title', 'tambah restoran')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Restoran</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('restoran.store') }}" method="post">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="kode menu">kode menu</label>
                        <input type="text" name="kode menu" class="@error('kode menu') is-invalid @enderror form-control" value="{{ old('kode menu') }}" required>

                        @error('kode menu')
                        <div class="mt-1">
                            <span class="text-danger">{{ $massage }}</span>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="jenis menu">jenis menu</label>
                        <input type="text" name="jenis menu" class="form-control" value="{{ old('jenis menu') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="nama menu">nama menu</label>
                        <input type="text" name="nama_menu" class="form-control" value="{{ old('nama menu') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="stok menu">stok menu</label>
                        <input type="text" name="stok menu" class="form-control" value="{{ old('stok menu') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="harga">harga</label>
                        <textarea name="harga" class="form-control">{{ old('harga') }}</textarea>
                    </div>

                    <div class="form-group d-flex justify-content-between">
                        <button type="Sumbit" class="btn btn-primary">Sumbit</button>
                        <a href="{{ route('restoran.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection