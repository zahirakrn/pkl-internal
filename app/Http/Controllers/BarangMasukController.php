<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Barang;
use Illuminate\Http\Request;
use Alert;


class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_masuks= BarangMasuk::latest()->get();
        confirmDelete('Delete User!', "Are you sure you want to delete?");
        return view('admin.barangmasuk.index', compact('barang_masuks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $barang_masuks= BarangMasuk::all();
        $barangs = Barang::all();
        return view('admin.barangmasuk.create', compact('barang_masuks', 'barangs'));
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
            'tanggal_masuk' => 'required ',
            'jumlah' => 'required',
            'keterangan' => 'required ',
        ]);

        $barang_masuks = new BarangMasuk();
        $barang_masuks->id_barang = $request->id_barang;
        $barang_masuks->tanggal_masuk = $request->tanggal_masuk;
        $barang_masuks->jumlah = $request->jumlah;
        $barang_masuks->keterangan = $request->keterangan;

        $barangs = Barang::find($request->id_barang);
        $barangs->jumlah += $request->jumlah;
        $barangs->save();

        $barang_masuks->save();
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('barangmasuk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barang_masuks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barang_masuks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang_masuks = BarangMasuk::findOrFail($id);
        $barangs = Barang::all();
        return view('admin.barangmasuk.edit', compact('barang_masuks', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangMasuk  $barang_masuks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_barang' => 'required',
            'tanggal_masuk' => 'required ',
            'jumlah' => 'required',
            'keterangan' => 'required ',
        ]);

        $barang_masuks = BarangMasuk::findOrFail($id); 
        $barang_masuks->id_barang = $request->id_barang;
        $barang_masuks->tanggal_masuk =$request->tanggal_masuk;
        $barang_masuks->jumlah =$request->jumlah;
        $barang_masuks->keterangan = $request->keterangan;
        $barang_masuks->save();
        Alert::success('Success', 'Data Berhasil Diubah');
        return redirect()->route('barangmasuk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangMasuk  $barang_masuks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang_masuks = BarangMasuk::findOrFail($id);
        $barang_masuks->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('barangmasuk.index');
    }
}
