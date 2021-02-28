@extends('layout.index')


@section('title')
Update Barang
@endsection

@section('content')
    <div class="col-sm-12"> 
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="form-group">
                    <label>{{ $model->attributes()['kode_barang'] }}:</label>    
                    <input type="text" class="form-control {{($errors->first('kode_barang') ? ' parsley-error' : '')}}" name="kode_barang" value="{{ old('kode_barang', $model->kode_barang) }}">
                    @foreach ($errors->get('kode_barang') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                    @endforeach
                </div>

                <div class="form-group">
                    <label>{{ $model->attributes()['nama_barang'] }}:</label> 
                    <input type="text" class="form-control {{($errors->first('nama_barang') ? ' parsley-error' : '')}}" name="nama_barang" value="{{ old('nama_barang', $model->nama_barang) }}">
                    @foreach ($errors->get('nama_barang') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                    @endforeach
                </div>

                <div class="form-group">
                    <label>{{ $model->attributes()['harga_barang'] }}:</label> 
                    <input type="text" class="form-control {{($errors->first('harga_barang') ? ' parsley-error' : '')}}" name="harga_barang" value="{{ old('harga_barang', $model->harga_barang) }}">

                    @foreach ($errors->get('harga_barang') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                    @endforeach</div>

                <div class="form-group">
                    <label>{{ $model->attributes()['deskripsi_barang'] }}:</label> 
                    <input type="text" class="form-control {{($errors->first('deskripsi_barang') ? ' parsley-error' : '')}}" name="deskripsi_barang" value="{{ old('deskripsi_barang', $model->deskripsi_barang) }}">
                    @foreach ($errors->get('deskripsi_barang') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                    @endforeach
                </div>

                <div class="form-group">
                    <label>{{ $model->attributes()['jumlah_barang'] }}:</label> 
                    <input type="text" class="form-control {{($errors->first('jumlah_barang') ? ' parsley-error' : '')}}" name="jumlah_barang" value="{{ old('jumlah_barang', $model->jumlah_barang) }}">
                    @foreach ($errors->get('jumlah_barang') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                    @endforeach
                </div> 

                <div class="form-group">
                    <label>Foto:</label>
                    @foreach($list_foto as $key=>$value)
                        <img src="{{ asset('foto/'.$value->url) }}">
                    @endforeach
                </div> 

            </div>
        </div>


    </div>
@endsection