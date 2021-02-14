<div class="row clearfix">
    <div class="col-md-12">
        <div class="form-group">
            <label>Kode Barang:</label>    
            <input type="text" class="form-control {{($errors->first('kode_barang') ? ' parsley-error' : '')}}" name="kode_barang" value="{{ old('kode_barang', $model->kode_barang) }}">

        </div>

        <div class="form-group">
            <label>Nama:</label>
            <input type="text" class="form-control {{($errors->first('nama_barang') ? ' parsley-error' : '')}}" name="nama_barang" value="{{ old('nama_barang', $model->nama_barang) }}">
        </div>

        <div class="form-group">
            <label>Harga:</label>
            <input type="text" class="form-control {{($errors->first('harga_barang') ? ' parsley-error' : '')}}" name="harga_barang" value="{{ old('harga_barang', $model->harga_barang) }}">
        </div>

        <div class="form-group">
            <label>Deskripsi:</label>
            <input type="text" class="form-control {{($errors->first('deskripsi_barang') ? ' parsley-error' : '')}}" name="deskripsi_barang" value="{{ old('deskripsi_barang', $model->deskripsi_barang) }}">
        </div>

        <div class="form-group">
            <label>Jumlah:</label>
            <input type="text" class="form-control {{($errors->first('jumlah_barang') ? ' parsley-error' : '')}}" name="jumlah_barang" value="{{ old('jumlah_barang', $model->jumlah_barang) }}">
        </div>



    </div>
</div>

<br>
<button type="submit" class="btn btn-primary">Simpan</button>