<div class="row clearfix">
    <div class="col-md-12">
        <div class="form-group">
            <label>{{ $model->attributes()['nama'] }}:</label>    
            <input type="text" class="form-control {{($errors->first('nama') ? ' parsley-error' : '')}}" name="nama" value="{{ old('nama', $model->nama) }}">
            @foreach ($errors->get('nama') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div>

        <div class="form-group">
            <label>{{ $model->attributes()['deskripsi'] }}:</label>
            <input type="text" class="form-control {{($errors->first('deskripsi') ? ' parsley-error' : '')}}" name="deskripsi" value="{{ old('deskripsi', $model->deskripsi) }}">
            @foreach ($errors->get('deskripsi') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div>

        <div class="form-group">
            <label>{{ $model->attributes()['induk_kategori'] }}:</label>
            <input type="text" class="form-control {{($errors->first('induk_kategori') ? ' parsley-error' : '')}}" name="induk_kategori" value="{{ old('induk_kategori', $model->induk_kategori) }}">
            @foreach ($errors->get('induk_kategori') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div>
    </div>
</div>

<br>
<button type="submit" class="btn btn-primary">Simpan</button>
<br>