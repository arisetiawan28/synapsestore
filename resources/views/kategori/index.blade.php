@extends('layout.index')

@section('title')
Kategori
@endsection

@section('content')
    <div class="col-sm-12">  
        <a href="{{ url('kategori/create') }}"><button class="btn btn-success">Tambah</button></a>
    </div>
    <br/>

    <form action="{{url('kategori')}}" method="get">
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
                <th>{{ $model->attributes()['nama'] }}</th>
                <th>{{ $model->attributes()['deskripsi'] }}</th>
                <th>{{ $model->attributes()['induk_kategori'] }}</th>
                <th>{{ $model->attributes()['created_by'] }}</th>
                <th class="text-center" colspan="2">Aksi</th>
            </tr>
            @foreach($datas as $value)
                <tr>
                    <td>{{ $value->nama }}</td>
                    <td>{{ $value->deskripsi }}</td>
                    <td>{{ $value->induk_kategori }}</td>
                    <td>{{ $value->createdBy->name }}</td>
                    <td class="text-center"><a class="btn btn-primary" href="{{ url('kategori/'.$value->id.'/edit/') }}">Update</a></td>
                    <td class="text-center">
                        <form action="{{ url('kategori/'.$value['id']) }}" method="post">
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