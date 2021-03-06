@extends('layout.index')

@section('title')
Daftar Barang
@endsection

@section('content')
<div id="app_vue">
    <div class="col-sm-12">  
        <a href="{{ url('barang/create') }}"><button class="btn btn-success">Tambah</button></a>
    </div>
    <br/>
    <form action="{{url('barang')}}" method="get">
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
                <th>{{ $model->attributes()['kode_barang'] }}</th>
                <th>{{ $model->attributes()['nama_barang'] }}</th>
                <th>{{ $model->attributes()['harga_barang'] }}</th>
                <th>{{ $model->attributes()['jumlah_barang'] }}</th>
                <th>{{ $model->attributes()['created_by'] }}</th>
                <th class="text-center" colspan="3">Aksi</th>
            </tr>
            @foreach($datas as $value)
                <tr>
                    <td>{{ $value->kode_barang }}</td>
                    <!-- <td>{{ $value->nama_barang }}</td> -->
                    <td>
                        <a href="{{ url('barang/'.$value->id) }}">{{ $value->nama_barang }}</a>
                    </td>
                    <td>{{ $value->harga_barang }}</td>
                    <td>{{ $value->jumlah_barang }}</td>
                    <td>{{ $value->createdBy->name }}</td>
                    <td class="text-center"><a class="btn btn-primary" href="{{ url('barang/'.$value->id.'/add_review/') }}">Review</a></td>
                    <td class="text-center"><a class="btn btn-primary" href="{{ url('barang/'.$value->id.'/edit/') }}">Update</a></td>
                    <td class="text-center">
                        <form action="{{ url('barang/'.$value['id']) }}" method="post">
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
</div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script>
       var vm = new Vue({  
           el: "#app_vue",
           data:{
                //digunakan untuk menyimpan id_barang yang dipilih oleh pengguna
                id_barang_saat_ini : 0,
            }, 
            methods: {
                setIdBarang: function(event){
                    var self = this;
                    if(event){
                        let id_barang = event.currentTarget.getAttribute('data-id');
                        // alert(id_barang);
                        self.id_barang_saat_ini = id_barang;
                        $('#form_keranjang').modal('show');
                    }
                },
            }
        });
    </script>
@endsection