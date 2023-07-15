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
@slot('title') Hasil Data Telah Di Cluster @endslot
@endcomponent

<div class="container">
  <h1></h1>
  <br>
  <div class="card">
    <div class="card-header">
      <h3>Notes</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <thead>
            <tr>
              <th>Cluster</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>C1</td>
              <td>Banyak Terjual</td>
            </tr>
            <tr>
              <td>C2</td>
              <td>Terjual</td>
            </tr>
            <tr>
              <td>C3</td>
              <td>Jarang Terjual</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>

  <div class="card">
    <div class="card-header">
      <h2>Tabel Data Barang</h2>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Tanggal Dijual</th>
              <th>Barang</th>
              <th>QTY</th>
              <th>Stock</th>
              <th>Cluster</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($res_hc as $item)
            <tr>
              <td>{{ $loop->index + 1}}</td>
              <td>{{ $item->tanggal}}</td>
              <td>{{ $item->kode_alternatif}}</td>
              <td>{{ $item->qty}}</td>
              <td>{{ $item->stock}}</td>
              <td>{{ $item->cluster}}</td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>
</div>

@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection