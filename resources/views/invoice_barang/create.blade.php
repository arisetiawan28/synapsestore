@extends('layout.index')


@section('title')
Tambah Invoice Barang
@endsection

@section('content')
    <div class="col-sm-12">
        <form method="post" action="{{ url('invoice_barang') }}" enctype="multipart/form-data">
        @csrf
        @include('invoice_barang._form')
        </form>
    </div>
@endsection