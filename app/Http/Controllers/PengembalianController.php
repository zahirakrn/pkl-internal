<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Barang;
use Illuminate\Http\Request;
use Alert;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalians= Pengembalian::latest()->get();
        confirmDelete('Delete User!', "Are you sure you want to delete?");
        return view('admin.pengembalian.index', compact('pengembalians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengembalians= Pengembalian::all();
        $barangs= Barang::all();
        return view('admin.pengembalian.create', compact('pengembalians', 'barangs'));
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
            'tanggal_pengembalian' => 'required ',
            'nama_peminjam' => 'required ',
            'jumlah' => 'required',
            'status' => 'required|boolean',
        ]); 

        $pengembalians = new Pengembalian();
        $pengembalians->id_barang = $request->id_barang;
        $pengembalians->tanggal_pengembalian= $request->tanggal_pengembalian;
        $pengembalians->nama_peminjam = $request->nama_peminjam;
        $pengembalians->jumlah = $request->jumlah;
        $pengembalians->status= $request->status;

        $pengembalians = Pengembalian::find($request->id_barang);
        $pengembalians->jumlah -= $request->jumlah;
        $pengembalians->save();

        $pengembalians->save();
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('pengembalian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengembalians = Pengembalian::findOrFail($id);
        $barangs = Barang::all();
        return view('admin.pengembalian.edit', compact('pengembalians', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_barang' => 'required',
            'tanggal_pengembalian' => 'required ',
            'nama_peminjam' => 'required ',
            'jumlah' => 'required',
            'status' => 'required|boolean',
        ]);

        $pengembalians = Pinjaman::findOrFail($id); 
        $pengembalians->id_barang = $request->id_barang;
        $pengembalians->tanggal_pengembalian =$request->tanggal_pengembalian;
        $pengembalians->nama_peminjam =$request->nama_peminjam;
        $pengembalians->jumlah =$request->jumlah;
        $pengembalians->status = $request->status;
        $pengembalians->save();
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('pengembalian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengembalians = Pengembalian::findOrFail($id);
        $pengembalians->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('pengembalian.index');
    }
}
