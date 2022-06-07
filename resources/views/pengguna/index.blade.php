@extends('layouts.main')
@section('section')
<div class="section-header">
    <h1>Daftar Pengguna</h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Pengguna</h4>
                <div class="card-header-action">
                    <a href="/tambahpengguna" class="btn btn-icon btn-sm icon-left btn-light"><i
                            class="fas fa-plus"></i>Tambah Pengguna</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($user as $users)
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $users->nama }}</td>
                                <td>{{ $users->role_users }}</td>
                                <td>
                                    <a href="/ubahpengguna/{{ $users->id_user }}"
                                        class="btn btn-icon icon-left btn-primary btn-sm"><i
                                            class="far fa-edit"></i>Edit</a>
                                    <a href="/hapuspengguna/{{ $users->id_user }}"
                                        class="btn btn-icon icon-left btn-danger btn-sm swal-6"><i
                                            class="fas fa-trash"></i>Delete</a>
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
@endsection
