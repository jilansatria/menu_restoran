<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\restoran;

class restorancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['restoran'] = restoran::all();
        return view('restoran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restoran.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_menu' => 'unique:restoran,kode_menu'
        ]); 

        $data = [
            'kode_menu' => $request->kode_menu, 
            'jenis_menu' => $request->jenis_menu, 
            'nama_menu' => $request->nama_menu, 
            'stok_menu' => $request->stok_menu, 
            'harga' => $request->harga, 
        ];

        restoran::create($data);

        return redirect()->route('restoran.index')->with('berhasil', 'Data Restoran telah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['restoran'] = Restoran::find($id);

        return view('restoran.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $restoran = Restoran::findOrFail($id);

        $request->validate([
            'kode_menu' => "unique:restoran,kode_menu,$restoran->id"
        ]); 

        $data = [
            'kode_menu' => $request->kode_menu, 
            'jenis_menu' => $request->jenis_menu, 
            'nama_menu' => $request->nama_menu, 
            'stok_menu' => $request->stok_menu, 
            'harga' => $request->harga, 
        ];

        $restoran->update($data);

        return redirect()->route('restoran.index')->with('berhasil', 'Data Restoran telah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restoran = restoran::find($id);

        $restoran->delete();

        return redirect()->route('restoran.index')->with('berhasil', 'Data restoran telah berhasil dihapus');
    }
}
