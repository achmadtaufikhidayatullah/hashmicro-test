@extends('layouts.template')

@section('header')
<div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Data User</h2>
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
                    <a href="#!" class="text-white">USER SISTEM TEST HASHMICRO</a>
                </li>
            </ul>
        </div>
        <div class="ml-md-auto py-2 py-md-0">
            <a href="#" data-toggle="modal" data-target="#tambahdata" class="btn btn-secondary btn-round">Tambah
                User</a>
        </div>
    </div>
</div>
@endsection

@section('content')
@php
// echo rand(100000000,999999999);
@endphp
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12 mt-3">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="basic-datatables display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($user as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#!" class="btn btn-success btn-sm ubah-data float-left"
                                                data-toggle="modal" data-target="#editdata" data-nim="{{ $user->nim }}"
                                                data-id="{{ $user->id }}" data-nama="{{ $user->name }}"
                                                data-email="{{ $user->email }}"><i class="far fa-edit"></i>
                                            </a>
                                            <a href="#!" class="btn btn-danger btn-sm ml-2 delete"
                                                style="margin-right: 5px;" id-user="{{ $user->id }}"><i
                                                    class="far fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah-->
<div class="modal fade bd-example-modal-lg" id="tambahdata" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tabahdatalabel">Tambah user Ormawa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- FORM -->
                <form action="{{ route('user.store') }}" method="post">
                    @csrf

                    <!-- Nama -->
                    <div class="form-group">
                        <label for="nama">Nama User</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama"
                            required>
                    </div>

                    <!-- email -->
                    <div class="form-group">
                        <label for="email">Email User</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password"
                            required>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Re-password <span style="font-size: 10px; color: #aeaeae;">(Ulangi
                                password)</span></label>
                        <input type="password" class="form-control" id="repassword" placeholder="Password"
                            name="repassword">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            <!-- /FORM -->
        </div>
    </div>
</div>
<!-- End Modal Tambah-->


<!-- Modal Edit -->
<div class="modal fade bd-example-modal-lg" id="editdata" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tabahdatalabel">Ubah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- FORM -->
            <form id="edit-form" action="{{ route('user.update', '') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @method('PUT')
                    @csrf

                    <!-- Nama -->
                    <div class="form-group">
                        <label for="nama">Nama User</label>
                        <input type="text" class="form-control" id="edit_nama" placeholder="Nama Lengkap" name="nama"
                            required>
                    </div>

                    <!-- email -->
                    <div class="form-group">
                        <label for="email">Email User</label>
                        <input type="email" class="form-control" id="edit_email" placeholder="Email" name="email"
                            required>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="edit_password">Password Baru<span
                                style="font-size: 10px; color: #aeaeae;">(Kosongkan
                                bila tidak mengubah password)</span></label>
                        <input type="password" class="form-control" id="edit_password" placeholder="Password"
                            name="password">
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="edit_repassword">Re-password <span
                                style="font-size: 10px; color: #aeaeae;">(Kosongkan bila
                                tidak mengubah password)</span></label>
                        <input type="password" class="form-control" id="edit_repassword" placeholder="Password"
                            name="repassword">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            <!-- /FORM -->
        </div>
    </div>
</div>
<!-- End Modal Edit -->

<!-- Form Delete -->
<form id="delete-form" action="/admin/user" method="POST">
    @method('DELETE')
    @csrf
</form>


@endsection

@push('bottom')
<script>
    $('#basic-datatables').DataTable();
    $('#basic-datatables2').DataTable();

    // jquery ajax edit data
    $('.ubah-data').on('click', function () {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var email = $(this).data('email');
        var action = $('#editdata #edit-form').attr('action');
        action += '/' + id;
        // console.log(id);
        $('#editdata #edit-form').attr('action', action);
        $('#editdata #edit_nama').val(nama);
        $('#editdata #edit_email').val(email);
        $('#editdata #edit_id_jabatan').val(id_jabatan);
    });

    $('.delete').on('click', function () {
        var id = $(this).attr("id-user");
        var action = $('#delete-form').attr('action');
        action += '/' + id;
        console.log(action);

        Swal.fire({
            title: "Apa anda yakin ?",
            text: "Ingin menghapus data barang ini!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Hapus",
            cancelButtonText: "Batal"
        }).then((result) => {
            console.log(result.value)
            if (result.value) {
                // window.location = "/admin/barang/" + id_barang;
                $('#delete-form').attr('action', action);
                $('#delete-form').submit();
            } else {
                Swal.fire("Dibatalkan!", "Data barang batal di hapus :)", "error");
            }
        });
    });

</script>
@endpush
