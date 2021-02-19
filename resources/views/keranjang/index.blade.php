@extends('layout.index')

@section('title')
Keranjang
@endsection

@section('content')
    <div class="col-sm-12">  
        <a href="{{ url('keranjang/create') }}"><button class="btn btn-success">Tambah</button></a>
    </div>
    <br/>

    <div class="col-sm-12">
        <table class="table table-bordered">
            <tr>
                <th>{{ $model->attributes()['barang_id'] }}</th>
                <th>{{ $model->attributes()['customer_id'] }}</th>
                <th>{{ $model->attributes()['jumlah_pesanan'] }}</th>
                <th>{{ $model->attributes()['jumlah_harga'] }}</th>
                <th class="text-center" colspan="2">Aksi</th>
            </tr>
            @foreach($datas as $value)
                <tr>
                    <td>{{ $value->barang->nama_barang }}</td>
                    <td>{{ $value->customer_id }}</td>
                    <td>{{ $value->jumlah_pesanan }}</td>
                    <td>{{ $value->jumlah_harga }}</td>
                    <td class="text-center"><a class="btn btn-primary" href="{{ url('keranjang/'.$value->id.'/edit/') }}">Update</a></td>
                    <td class="text-center">
                        <form action="{{ url('keranjang/'.$value['id']) }}" method="post">
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