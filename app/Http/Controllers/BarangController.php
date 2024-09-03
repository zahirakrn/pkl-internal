<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
Use Alert;

class barangcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = barang::all();
        confirmDelete('Delete User!', "Are you sure you want to delete?");
        return view('admin.barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.barang.create');
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
            'nama_barang' => 'required',
            'jumlah' => 'required ',
            'keterangan' => 'required|boolean',
        ]);

        $barangs = new barang();
        $barangs->nama_barang = $request->nama_barang;
        $barangs->jumlah = $request->jumlah;
        $barangs->keterangan = $request->keterangan;
        $barangs->save();
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
        public function show(barang $barangs)
        {
            // return view('user.show', compact('users'));
        }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangs = barang::findOrFail($id);
        return view('admin.barang.edit', compact('barangs'));
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
        $this->validate($request, [
            'nama_barang' => 'required',
            'jumlah' => 'required ',
            'keterangan' => 'required|boolean',
        ]);

        $barangs = Barang::findOrFail($id); 
        $barangs->nama_barang = $request->nama_barang;
        $barangs->jumlah = $request->jumlah;
        $barangs->keterangan = $request->keterangan;
        $barangs->save();
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('barang.index');

    // pengurangan stok
        $barangs = Barang::findOrFail($id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangs = Barang::findOrFail($id);
        $barangs->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('barang.index');
    }
}