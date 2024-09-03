<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use App\Models\Barang;
use Illuminate\Http\Request;
use Alert;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjamen= Pinjaman::latest()->get();
        confirmDelete('Delete User!', "Are you sure you want to delete?");
        return view('admin.pinjaman.index', compact('pinjamen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pinjamen= Pinjaman::all();
        $barangs= Barang::all();
        return view('admin.pinjaman.create', compact('pinjamen', 'barangs'));
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
            'tanggal_pinjam' => 'required ',
            'nama_peminjam' => 'required ',
            'jumlah' => 'required',
            'status' => 'required|boolean',
        ]); 

        $pinjamen = new Pinjaman();
        $pinjamen->id_barang = $request->id_barang;
        $pinjamen->tanggal_pinjam = $request->tanggal_pinjam;
        $pinjamen->nama_peminjam = $request->nama_peminjam;
        $pinjamen->jumlah = $request->jumlah;
        $pinjamen->status= $request->status;

        // $pinjamen = Pinjaman::find($request->id_barang);
        // $pinjamen->jumlah -= $request->jumlah;
        // $pinjamen->save();

        $pinjamen->save(); 
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('pinjaman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pinjamen = Pinjaman::findOrFail($id);
        $barangs = Barang::all();
        return view('admin.pinjaman.edit', compact('pinjamen', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_barang' => 'required',
            'tanggal_pinjam' => 'required ',
            'nama_peminjam' => 'required ',
            'jumlah' => 'required',
            'status' => 'required|boolean',
        ]);

        $barang_keluars = Pinjaman::findOrFail($id); 
        $barang_keluars->id_barang = $request->id_barang;
        $barang_keluars->tanggal_pinjam =$request->tanggal_pinjam;
        $barang_keluars->nama_peminjam =$request->nama_peminjam;
        $barang_keluars->jumlah =$request->jumlah;
        $barang_keluars->status = $request->status;
        $barang_keluars->save();
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('pinjaman.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pinjamen = Pinjaman::findOrFail($id);
        $pinjamen->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('pinjaman.index');
    }
}
