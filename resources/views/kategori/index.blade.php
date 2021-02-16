@extends('layout.index')

@section('title')
Kategori
@endsection

@section('content')
    <div class="col-sm-12">  
        <a href="{{ url('kategori/create') }}"><button class="btn btn-success">Tambah</button></a>
    </div>
    <br/>

    <div class="col-sm-12">
        <table class="table table-bordered">
            <tr>
                <th>{{ $model->attributes()['nama'] }}</th>
                <th>{{ $model->attributes()['deskripsi'] }}</th>
                <th>{{ $model->attributes()['induk_kategori'] }}</th>
                <th class="text-center" colspan="2">Aksi</th>
            </tr>
            @foreach($datas as $value)
                <tr>
                    <td>{{ $value->nama }}</td>
                    <td>{{ $value->deskripsi }}</td>
                    <td>{{ $value->induk_kategori }}</td>
                    <td class="text-center"><a class="btn btn-primary" href="{{ url('kategori/'.$value->id.'/edit/') }}">Update</a></td>
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
    </div>
@endsection