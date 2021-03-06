<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Http\Requests\InvoiceRequest;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = new Invoice;
        // $datas = Invoice::all();
        //untuk menangkap isian kata kunci pencarian
        $keyword = $request->get('search');

        $datas = Invoice::where('kode_transaksi', 'LIKE', '%' . $keyword . '%')
            ->orWhere('jumlah_transaksi', 'LIKE', '%' . $keyword . '%')
            ->paginate();

        $datas->withPath('message');
        $datas->appends($request->all());
        return view('invoice.index', compact(
            'datas', 'model', 'keyword'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Invoice;
        return view('invoice.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        $model= new Invoice;
        $model->jumlah_transaksi =$request->get('jumlah_transaksi');
        $model->kode_transaksi =$request->get('kode_transaksi');
        $model->metode_pembayaran =$request->get('metode_pembayaran');
        $model->kurir =$request->get('kurir');
        $model->ongkir =$request->get('ongkir');
        $model->no_resi =$request->get('no_resi');
        $model->id_keranjang =$request->get('id_keranjang');
        $model->waktu_sampai =$request->get('waktu_sampai');
        $model->customer_id =$request->get('customer_id');
        $model->created_by = Auth::id();
        $model->updated_by = Auth::id();
        $model->save();

        return redirect('invoice')->with('success', 'Data berhasil ditambahkan');
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
        $model = Invoice::find($id); //SELECT * FROM barang WHERE id=...
        return view('invoice.edit', compact(
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
    public function update(InvoiceRequest $request, $id)
    {
        $model= Invoice::find($id);
        $model->jumlah_transaksi =$request->get('jumlah_transaksi');
        $model->kode_transaksi =$request->get('kode_transaksi');
        $model->metode_pembayaran =$request->get('metode_pembayaran');
        $model->kurir =$request->get('kurir');
        $model->ongkir =$request->get('ongkir');
        $model->no_resi =$request->get('no_resi');
        $model->id_keranjang =$request->get('id_keranjang');
        $model->waktu_sampai =$request->get('waktu_sampai');
        $model->customer_id =$request->get('customer_id');
        $model->created_by = Auth::id();
        $model->updated_by = Auth::id();
        $model->save();

        return redirect('invoice')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Invoice::find($id);
        $model->delete();
        return redirect('invoice');
    }
}
