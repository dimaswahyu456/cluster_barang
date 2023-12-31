@extends('layouts.master')
@section('title')
@lang('translation.Datatables')
@endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Tables @endslot
@slot('title') Edit Barang @endslot
@endcomponent

@if ($errors->any())
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('barang.update',$find->id_alternatif) }}" method="POST">
          @csrf
          <!-- @method('POST') -->

          <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Kode Barang : </label>
            <div class="col-md-10">
              <input type="text" name="kode_alternatif" value="{{ $find->kode_alternatif }}" class="form-control" placeholder="Kode Barang">
            </div>
            <br><br>
            <label for="example-text-input" class="col-md-2 col-form-label">Nama Barang : </label>
            <div class="col-md-10">
              <input type="text" name="nama_alternatif" value="{{ $find->nama_alternatif }}" class="form-control" placeholder="Nama Barang">
            </div>
            <br><br>
            <label for="example-text-input" class="col-md-2 col-form-label">Stock : </label>
            <div class="col-md-10">
              <input type="text" name="stock" value="{{ $find->stock }}" class="form-control" placeholder="Stock">
            </div>
            <br><br>
            <label for="example-text-input" class="col-md-2 col-form-label">Satuan : </label>
            <div class="col-md-10">
              <input type="text" name="satuan" value="{{ $find->satuan }}" class="form-control" placeholder="Satuan">
            </div>
          </div>
          <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('barang.list') }}"> Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>


        </form>
      </div>
    </div>
  </div> <!-- end col -->
</div>

@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection