@extends('layout.index')

@section('title')
Daftar Barang
@endsection

@section('content')
    <div class="col-sm-12">  
        <a href="{{ url('barang/create') }}"><button class="btn btn-success">Tambah</button></a>
    </div>
    <br/>

    <div class="col-sm-12">
        <table class="table">
            <tr>
                <th>Kode Barang</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah</th>
            </tr>
            @foreach($datas as $value)
                <tr>
                    <td>{{ $value->kode_barang }}</td>
                    <td>{{ $value->nama_barang }}</td>
                    <td>{{ $value->harga_barang }}</td>
                    <td>{{ $value->jumlah_barang }}</td>
                </tr>
            @endforeach()
        </table>
    </div>
@endsection