<div class="row clearfix">
    <div class="col-md-12">
        <div class="form-group">
            <label>{{ $model->attributes()['transaksi_id'] }}:</label>    
            <input type="text" class="form-control {{($errors->first('transaksi_id') ? ' parsley-error' : '')}}" name="transaksi_id" value="{{ old('transaksi_id', $model->transaksi_id) }}">
            @foreach ($errors->get('transaksi_id') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div>

        <div class="form-group">
            <label>{{ $model->attributes()['barang_id'] }}:</label>
            <input type="text" class="form-control {{($errors->first('barang_id') ? ' parsley-error' : '')}}" name="barang_id" value="{{ old('barang_id', $model->barang_id) }}">
            @foreach ($errors->get('barang_id') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div>

        <div class="form-group">
            <label>{{ $model->attributes()['customer_id'] }}:</label>
            <input type="text" class="form-control {{($errors->first('customer_id') ? ' parsley-error' : '')}}" name="customer_id" value="{{ old('customer_id', $model->customer_id) }}">
            @foreach ($errors->get('customer_id') as $msg)
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
            <label>{{ $model->attributes()['jumlah_harga'] }}:</label>
            <input type="text" class="form-control {{($errors->first('jumlah_harga') ? ' parsley-error' : '')}}" name="jumlah_harga" value="{{ old('jumlah_harga', $model->jumlah_harga) }}">
            @foreach ($errors->get('jumlah_harga') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div>
    </div>
</div>

<br>
<button type="submit" class="btn btn-primary">Simpan</button>
<br>