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
@slot('title') Show Penjualan @endslot
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
        @csrf
        <!-- @method('POST') -->

        <div class="mb-3 row">
          <label for="example-text-input" class="col-md-2 col-form-label">Tanggal : </label>
          <div class="col-md-10">
            <div class="input-group" id="datepicker1">
              <input type="text" class="form-control" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" data-date-container='#datepicker1' data-provide="datepicker" name="tanggal" value="{{ $find->tanggal }}">
              <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
            </div>
          </div>
          <br><br>
          <label for="example-text-input" class="col-md-2 col-form-label">No Faktur : </label>
          <div class="col-md-10">
            <input type="text" name="no_faktur" value="{{ $find->no_faktur }}" class="form-control" placeholder="No Faktur">
          </div>
          <br><br>
          <label for="example-text-input" class="col-md-2 col-form-label">Nama Barang : </label>
          <div class="col-md-10">
            <select name="id_alternatif" id="userSelectCategory" class="form-select" aria-label="Floating label select">
              @foreach ($res_barang as $item)
              @if ($find->id_alternatif == $item->id_alternatif)
              <option value="{{$item->id_alternatif}}" selected>{{$item->nama_alternatif}}</option>
              @else
              <option value="{{$item->id_alternatif}}">{{$item->nama_alternatif}}</option>
              @endif
              @endforeach
            </select>
          </div>
          <br><br>
          <label for="example-text-input" class="col-md-2 col-form-label">QTY : </label>
          <div class="col-md-10">
            <input type="text" name="qty" value="{{ $find->qty }}" class="form-control" placeholder="QTY">
          </div>
          <br><br>
          <label for="example-text-input" class="col-md-2 col-form-label">Satuan : </label>
          <div class="col-md-10">
            <input type="text" name="satuan" value="{{ $find->satuan }}" class="form-control" placeholder="Satuan">
          </div>
        </div>
        <div class="pull-right">
          <a class="btn btn-primary" href="{{ route('penjualan.list') }}"> Back</a>
        </div>
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