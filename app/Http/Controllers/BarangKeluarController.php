<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Http\Request;
use Alert;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_keluars= BarangKeluar::latest()->get();
        confirmDelete('Delete User!', "Are you sure you want to delete?");
        return view('admin.barangkeluar.index', compact('barang_keluars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang_keluars= BarangKeluar::all();
        $barangs= Barang::all();
        return view('admin.barangkeluar.create', compact('barang_keluars', 'barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_barang' => 'required',
            'tanggal_keluar' => 'required ',
            'jumlah' => 'required',
            'keterangan' => 'required ',
        ]);

        $barang_keluars = new BarangKeluar();
        $barang_keluars->id_barang = $request->id_barang;
        $barang_keluars->tanggal_keluar = $request->tanggal_keluar;
        $barang_keluars->jumlah = $request->jumlah;
        $barang_keluars->keterangan = $request->keterangan;

        $barangs = Barang::find($request->id_barang);
        $barangs->jumlah -= $request->jumlah;
        $barangs->save();

        $barang_keluars->save();
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('barangkeluar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang_keluars = BarangKeluar::findOrFail($id);
        $barangs = Barang::all();
        return view('admin.barangkeluar.edit', compact('barang_keluars', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_barang' => 'required',
            'tanggal_keluar' => 'required ',
            'jumlah' => 'required',
            'keterangan' => 'required ',
        ]);

        $barang_keluars = BarangKeluar::findOrFail($id); 
        $barang_keluars->id_barang = $request->id_barang;
        $barang_keluars->tanggal_keluar =$request->tanggal_keluar;
        $barang_keluars->jumlah =$request->jumlah;
        $barang_keluars->keterangan = $request->keterangan;
        $barang_keluars->save();
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('barangkeluar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang_keluars = BarangKeluar::findOrFail($id);
        $barang_keluars->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('barangkeluar.index');
    }
}
