@extends('layouts.main')
@section('section')
<div class="section-header">
    <h1>Daftar Akun Level 1 </h1>
  </div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Akun Level 1 </h4>
                <div class="card-header-action">
                    <a href="/tambahlevelsatu" class="btn btn-icon btn-sm icon-left btn-light"><i class="fas fa-plus"></i>Level 1</a>
                  </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Kode Akun</th>
                      <th scope="col">Nama Akun</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        @foreach ($akn as $akun)
                        <td>{{ $akun->kode_akun }}</td>
                        <td>{{ $akun->nama_akun }}</td>
                      <td>
                        <a href="ubahlevelsatu/{{ $akun->id_level_satu }}" class="btn btn-icon icon-left btn-primary btn-sm"><i class="far fa-edit"></i>Edit</a>
                    <a href="hapuslevelsatu/{{ $akun->id_level_satu }}" class="btn btn-icon icon-left btn-danger btn-sm swal-6"><i class="fas fa-trash"></i>Delete</a>
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
