<!-- start page title -->
@extends('layouts.master')
@section('title')
@lang('translation.Datatables')
@endsection
@section('css')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><strong>{{ __('ANUGRAH GROUP') }}</strong></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <ul class="list-unstyled timeline">
                        <li>
                            <div class="block">
                                <div class="tags">
                                    <a href="" class="tag">
                                        <span></span>
                                    </a>
                                </div>
                                <div class="block_content">
                                    <a style="font-size: 20;">ANUGRAH GROUP Berawal Dari Perusahaan Spunbond Jaya Yang Didirikan Sejak Tahun 2000, Dengan Berkonsentrasi Dibidang Kebutuhan Semua Spunbond Dari Tas, Sepatu, Springbed. Seiring Dengan Perkembangan Waktu, Kemudian Perusahaan Kami Berekspansi Dibidang Food Packaging Yang Sangat Lengkap Memenuhi Kebutuhan Pasar Seperti Perhotelan, Restoran, Kafe.</a>
                                    <div class="byline">
                                        <span></span> <a></a>
                                    </div>
                                    <p class="excerpt"></a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="block">
                                <div class="tags">
                                    <a href="" class="tag">
                                        <span></span>
                                    </a>
                                </div>
                                <div class="block_content">
                                    <a style="font-size: 20;">Anugrah Group Bergerak Di Bidang Food Packaging Untuk Memberi Anda Solusi Pengemasan Mulai Dari Makanan, Minuman Serta Alat Makan Dan Perlengkapannya. Kami Melakukan Kerja Sama Dengan Customer Untuk Menyuplai Kemasan Yang Hemat Biaya Namun Menarik Dan Fungsional.</a>
                                    <div class="byline">
                                        <span></span> <a></a>
                                    </div>
                                    <p class="excerpt"></a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->
@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection