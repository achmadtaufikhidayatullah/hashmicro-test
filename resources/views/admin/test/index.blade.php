@extends('layouts.template')

@section('header')
<div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Test Hasmicro</h2>
            <ul class="breadcrumbs text-white ml-0">
                <li class="nav-home">
                    <a href="#!" class="text-white">
                        <i class="flaticon-file"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#!" class="text-white">TEST HASHMICRO</a>
                </li>
            </ul>
        </div>
        <div class="ml-md-auto py-2 py-md-0">
            {{-- <a href="#" data-toggle="modal" data-target="#tambahdata" class="btn btn-secondary btn-round">Tambah
                User</a> --}}
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12 mt-3">
                    <p>Sistem ini akan mengcompare antara 2 inputan yang identik</p>
                    <form action="{{ route('test.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="input1">Input 1</label>
                            <input type="text" class="form-control" id="input1"
                                placeholder="input isian pertama" name="input1" value="{{ old('input1') }}">
                        </div>

                        <div class="form-group">
                            <label for="input2">Input 2</label>
                            <input type="text" class="form-control" id="input2"
                                placeholder="input isian kedua" name="input2" value="{{ old('input2') }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Bandingkan</button>
                        </div>
                    </form>

                    @if (old('input1')!=null)
                    <hr class="mt-5 mb-5"> 
                    <h3 class="mb-5">RESULT</h3>

                    <p>Karakter yang sama : {{ implode(" , " , $result) }}</p>
                    <p>Jumlah Karakter yang muncul : {{ $jumlahCompare }} / {{ $jumlahInput1 }}</p>
                    <p>Persentase : {{ (int)$persentase }}%</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection