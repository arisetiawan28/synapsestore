<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceBarang;

class InvoiceBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new InvoiceBarang;
        $datas = InvoiceBarang::all();
        return view('invoice_barang.index', compact(
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
        $datas = InvoiceBarang::all();
        return view('invoice_barang.create', compact(
            'datas'
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
        $model= new InvoiceBarang;
        $model->transaksi_id =$request->get('transaksi_id');
        $model->barang_id =$request->get('barang_id');
        $model->customer_id =$request->get('customer_id');
        $model->jumlah_barang =$request->get('jumlah_barang');
        $model->jumlah_harga =$request->get('jumlah_harga');
        $model->created_by = 1;
        $model->updated_by = 1;
        $model->save();

        return redirect('invoice_barang')->with('success', 'Data berhasil ditambahkan');
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
        $model = InvoiceBarang::find($id); //SELECT * FROM barang WHERE id=...
        return view('invoice_barang.edit', compact(
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
        $model= InvoiceBarang::find($id);
        $model->transaksi_id =$request->get('transaksi_id');
        $model->barang_id =$request->get('barang_id');
        $model->customer_id =$request->get('customer_id');
        $model->jumlah_barang =$request->get('jumlah_barang');
        $model->jumlah_harga =$request->get('jumlah_harga');
        $model->created_by = 1;
        $model->updated_by = 1;
        $model->save();

        return redirect('invoice_barang')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = InvoiceBarang::find($id);
            $model->delete();
            return redirect('invoice_barang');
    }
}
