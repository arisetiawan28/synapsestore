@extends('layout.index')


@section('title')
Update Invoice Barang
@endsection

@section('content')
    <div class="col-sm-12">
        <form method="post" action="{{ url('invoice_barang/'.$model->id) }}" enctype="multipart/form-data">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        @include('invoice_barang._form')
        </form>
    </div>
@endsection