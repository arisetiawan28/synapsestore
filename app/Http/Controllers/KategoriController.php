<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Kategori;
        $datas = Kategori::all();
        return view('kategori.index', compact(
            'datas', 'model'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Kategori;
        return view('kategori.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model= new Kategori;
        $model->nama =$request->get('nama');
        $model->deskripsi =$request->get('deskripsi');
        $model->induk_kategori =$request->get('induk_kategori');
        $model->created_by = 1;
        $model->updated_by = 1;
        $model->save();

        return redirect('kategori')->with('success', 'Data berhasil ditambahkan');
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
        $model = Kategori::find($id); //SELECT * FROM barang WHERE id=...
        return view('kategori.edit', compact(
            'model'
        ));
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
        $model->Kategori::find($id);
        $model->nama =$request->get('nama');
        $model->deskripsi =$request->get('deskripsi');
        $model->induk_kategori =$request->get('induk_kategori');
        $model->created_by = 1;
        $model->updated_by = 1;
        $model->save();

        return redirect('kategori')->with('success', 'Data berhasil ditambahkan');
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
            return redirect('barang');
    }
}
