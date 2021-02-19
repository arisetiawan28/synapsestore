<div class="row clearfix">
    <div class="col-md-12">
        <div class="form-group">
            <label>{{ $model->attributes()['barang_id'] }}:</label>    

            <select class="form-control {{($errors->first('barang_id') ? ' parsley-error' : '')}}" name="barang_id">
                <option value="">- Pilih Barang -</option>
                @foreach($list_barang as $key=>$value)
                    <option value="{{ $value->id }}"
                    @if($model->barang_id==$value->id)
                        selected="selected"
                    @endif
                    >
                    {{ $value->kode_barang }} - {{ $value->nama_barang }}</option>
                @endforeach
            </select>
            @foreach ($errors->get('barang_id') as $msg)
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
            <label>{{ $model->attributes()['customer_id'] }}:</label> 
            <input type="text" class="form-control {{($errors->first('customer_id') ? ' parsley-error' : '')}}" name="customer_id" value="{{ old('customer_id', $model->customer_id) }}">

            @foreach ($errors->get('customer_id') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div>
    </div>
</div>

<br>
<button type="submit" class="btn btn-primary">Simpan</button>