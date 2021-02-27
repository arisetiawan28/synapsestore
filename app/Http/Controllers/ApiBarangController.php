<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class ApiBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Barang::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model= new Barang;
        $model->kode_barang =$request->get('kode_barang');
        $model->nama_barang =$request->get('nama_barang');
        $model->harga_barang =$request->get('harga_barang');
        $model->deskripsi_barang =$request->get('deskripsi_barang');
        $model->jumlah_barang =$request->get('jumlah_barang');
        $model->created_by = 1;
        $model->updated_by = 1;
        $model->save();

        return "sukses";
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
        //
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
        $model= Barang::find($id);
        $model->kode_barang =$request->get('kode_barang');
        $model->nama_barang =$request->get('nama_barang');
        $model->harga_barang =$request->get('harga_barang');
        $model->deskripsi_barang =$request->get('deskripsi_barang');
        $model->jumlah_barang =$request->get('jumlah_barang');
        $model->created_by = 1;
        $model->updated_by = 1;
        $model->save();

        return "sukses";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Barang::find($id);
        $model->delete();
        return "sukses menghapus";
    }
}
