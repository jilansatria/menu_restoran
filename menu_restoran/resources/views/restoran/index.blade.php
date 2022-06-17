@extends('layouts.main')
@section('title', 'data restoran')
@section('content')

@if(session()->has('berhasil'))
   <div class="alert alert-success">
    {{ session()->get('berhasil') }}
   </div>
@endif
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <div class="card-tittle text-center">
                <h3>Daftar Menu Restoran</h3>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="mb-2">
                    <a href="{{ route('restoran.create') }}" class="btn btn-success">Tambah</a>
                </div>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>no</th>
                            <th>kode menu</th>
                            <th>jenis menu</th>
                            <th>nama menu</th>
                            <th>stok menu</th>
                            <th>harga</th>
                            <th>pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $increment = 1;
                        @endphp
                        @foreach ($restoran as $item)
                        <tr>
                            <td>{{ $increment++ }}</td>
                            <td>{{ $item->kode_menu }}</td>
                            <td>{{ $item->jenis_menu }}</td>
                            <td>{{ $item->nama_menu }}</td>
                            <td>{{ $item->stok_menu }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>
                                <a href="{{ route('restoran.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('restoran.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection