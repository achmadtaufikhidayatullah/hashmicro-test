@extends('layouts.template')

@section('header')
<div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
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
                    <a href="#!" class="text-white">Dashboard</a>
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
                    <h3>Hallo, {{ auth()->user()->name }} <br>Selamat datang di hasil test ACHMAD TAUFIK HIDAYATULLAH 😍</h3>
                    <hr>

                    <p>Untuk mendownload file sistem ini anda bisa melakukan clone melalui github, anda bisa mengakses <a href="https://github.com/achmadtaufikhidayatullah/hashmicro-test" target="_blank">link ini</a></p>
                    <p>Atau bisa anda download pada <a href="https://drive.google.com/file/d/1c7XW58_RGENKuJge6tImkP190lmBxP2_/view?usp=sharing" target="_blank">Gdrive</a></p>

                    <br>
                    <p class="text-muted">*disarankan mengclone dengan github untuk mempermudah 😁</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection