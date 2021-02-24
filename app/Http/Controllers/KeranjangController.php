<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Keranjang;
use App\Http\Requests\KeranjangRequest;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Keranjang;
        // $datas = Keranjang::all();
        //untuk menangkap isian kata kunci pencarian
        $keyword = $request->get('search');

        $datas = Keranjang::where('jumlah_pesanan', 'LIKE', '%' . $keyword . '%')
            ->orWhere('jumlah_harga', 'LIKE', '%' . $keyword . '%')
            ->paginate();

        $datas->withPath('keranjang');
        $datas->appends($request->all());
        return view('keranjang.index', compact(
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
        $model = new Keranjang;
        $list_barang = Barang::all(); //SELECT * FROM bandara
        return view('keranjang.create', compact(
            'model', 'list_barang'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeranjangRequest $request)
    {
        $model = new Keranjang;
        $model->barang_id = $request->get('barang_id');
        $model->customer_id = $request->get('customer_id');
        $model->jumlah_pesanan = $request->get('jumlah_pesanan');
        $barang = Barang::find($model->barang_id);
        $total_harga = $barang->harga_barang * $model->jumlah_pesanan;
        $model->jumlah_harga = $total_harga;
        $model->created_by = Auth::id();
        $model->updated_by = Auth::id();
        $model->save();

        return redirect('keranjang');
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
        $model = Keranjang::find($id);
        $list_barang = Barang::all(); //SELECT * FROM bandara
        return view('keranjang.edit', compact(
            'model', 'list_barang'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KeranjangRequest $request, $id)
    {
        $model = Keranjang::find($id);
        $model->barang_id = $request->get('barang_id');
        $model->customer_id = $request->get('customer_id');
        $model->jumlah_pesanan = $request->get('jumlah_pesanan');
        $barang = Barang::find($model->barang_id);
        $total_harga = $barang->harga_barang * $model->jumlah_pesanan;
        $model->jumlah_harga = $total_harga;
        $model->created_by = 1;
        $model->updated_by = 1;
        $model->save();

        return redirect('keranjang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Keranjang::find($id);
        $model->delete();

        return redirect('keranjang');
    }
}
