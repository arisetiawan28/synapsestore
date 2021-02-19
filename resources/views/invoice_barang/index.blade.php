@extends('layout.index')

@section('title')
Invoice Barang
@endsection

@section('content')
    <div class="col-sm-12">  
        <a href="{{ url('invoice_barang/create') }}"><button class="btn btn-success">Tambah</button></a>
    </div>
    <br/>

    <div class="col-sm-12">
        <table class="table table-bordered">
            <tr>
                <th>{{ $model->attributes()['transaksi_id'] }}</th>
                <th>{{ $model->attributes()['barang_id'] }}</th>
                <th>{{ $model->attributes()['customer_id'] }}</th>
                <th>{{ $model->attributes()['jumlah_barang'] }}</th>
                <th>{{ $model->attributes()['jumlah_harga'] }}</th>
                <th class="text-center" colspan="2">Aksi</th>
            </tr>
            @foreach($datas as $value)
                <tr>
                    <td>{{ $value->transaksi_id }}</td>
                    <td>{{ $value->barang_id }}</td>
                    <td>{{ $value->customer_id }}</td>
                    <td>{{ $value->jumlah_barang }}</td>
                    <td>{{ $value->jumlah_harga }}</td>
                    <td class="text-center"><a class="btn btn-primary" href="{{ url('invoice_barang/'.$value->id.'/edit/') }}">Update</a></td>
                    <td class="text-center">
                        <form action="{{ url('invoice_barang/'.$value['id']) }}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class='btn btn-danger'>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach()
        </table>
    </div>
@endsection