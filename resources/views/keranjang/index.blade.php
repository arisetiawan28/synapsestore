@extends('layout.index')

@section('title')
Keranjang
@endsection

@section('content')
    <div class="col-sm-12">  
        <a href="{{ url('keranjang/create') }}"><button class="btn btn-success">Tambah</button></a>
    </div>
    <br/>
    <form action="{{url('keranjang')}}" method="get">
        <div class="input-group mb-3">
            @csrf
            <input type="text" class="form-control" name="search" id="search" value="{{ $keyword }}" placeholder="Search..">

            <div class="input-group-append">
                <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
    <div class="col-sm-12">
        <table class="table table-bordered">
            <tr>
                <th>{{ $model->attributes()['barang_id'] }}</th>
                <th>{{ $model->attributes()['customer_id'] }}</th>
                <th>{{ $model->attributes()['jumlah_pesanan'] }}</th>
                <th>{{ $model->attributes()['jumlah_harga'] }}</th>
                <th>{{ $model->attributes()['created_by'] }}</th>
                <th class="text-center" colspan="2">Aksi</th>
            </tr>
            @foreach($datas as $value)
                <tr>
                    <td>{{ $value->barang->nama_barang }}</td>
                    <td>{{ $value->customer_id }}</td>
                    <td>{{ $value->jumlah_pesanan }}</td>
                    <td>{{ $value->jumlah_harga }}</td>
                    <td>{{ $value->createdBy->name }}</td>
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
        <br/>
        <!-- 
            fungsi yang disediakan laravel, untuk menampilkan halaman
            fungsi ini dapat digunakan jika menggunakan 'paginate' pada pemanggilan data
            -->
        {{ $datas->links() }}
    </div>
@endsection