<div class="row clearfix">
    <div class="col-md-12">
        <div class="form-group">
            <label>{{ $model->attributes()['barang_id'] }}:</label> 
            <select class="form-control {{($errors->first('barang_id') ? ' parsley-error' : '')}}" name="barang_id">
                @foreach($list_barang as $value)
                    <option value="{{ $value->id }}" 
                    @if($model->barang_id==$value->id)
                        selected="selected"
                    @endif
                    >{{ $value->nama_barang }}</option>
                @endforeach
            </select>
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
            <label>{{ $model->attributes()['jumlah_pesanan'] }}:</label>    
            <input type="text" class="form-control {{($errors->first('jumlah_pesanan') ? ' parsley-error' : '')}}" name="jumlah_pesanan" value="{{ old('jumlah_pesanan', $model->jumlah_pesanan) }}">
            @foreach ($errors->get('jumlah_pesanan') as $msg)
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