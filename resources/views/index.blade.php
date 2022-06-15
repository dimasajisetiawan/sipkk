@extends('layouts.main')
@section('section')
<div class="section-header">
    <h1>Dashboard</h1>
  </div>
<div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
          <h4>Data Pengguna</h4>
          <div class="card-header-action">
            @can('admin')
            <a href="tambahpengguna" class="btn btn-icon icon-left btn-light"><i class="fas fa-plus"></i>Tambah Pengguna</a>
            @endcan

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
                  {{-- <th scope="col">Action</th> --}}
                </tr>
              </thead>
              <tbody>
                <tr>
                    @foreach ($usr as $pengguna)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pengguna->nama }}</td>
                    <td>{{ $pengguna->role_users }}</td>
                  {{-- <td>
                    <button href="#" class="btn btn-icon icon-left btn-primary btn-sm"><i class="far fa-edit"></i>Edit</button>
                    <button href="#" class="btn btn-icon icon-left btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</button>
                  </td> --}}
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        {{-- <div class="d-flex justify-content-end card-footer">
            {{ $usr->onEachSide(1)->links() }}
          </div> --}}
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Daftar Akun</h4>
            <div class="card-header-action">
                @can('admin')
                <a href="/tambahlevelsatu" class="btn btn-icon btn-sm icon-left btn-light"><i class="fas fa-plus"></i>Level 1</a>
                <a href="/tambahleveldua" class="btn btn-icon btn-sm icon-left btn-light"><i class="fas fa-plus"></i>Level 2</a>
                <a href="/tambahleveltiga" class="btn btn-icon btn-sm icon-left btn-light"><i class="fas fa-plus"></i>Level 3</a>
                @endcan
                @can('bendahara')
                <a href="/tambahleveldua" class="btn btn-icon btn-sm icon-left btn-light"><i class="fas fa-plus"></i>Level 2</a>
                <a href="/tambahleveltiga" class="btn btn-icon btn-sm icon-left btn-light"><i class="fas fa-plus"></i>Level 3</a>
                @endcan
            </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Kode Akun</th>
                  <th scope="col">Nama Akun</th>
                  {{-- <th scope="col">Action</th> --}}
                </tr>
              </thead>
              <tbody>
                <tr>
                    @foreach ($akn as $akun)
                    <td>{{ $akun->kode_akun }}</td>
                    <td>{{ $akun->nama_akun }}</td>
                  {{-- <td>
                    <a href="ubahlevelsatu/{{ $akun->id_level_satu }}" class="btn btn-icon icon-left btn-primary btn-sm"><i class="far fa-edit"></i>Edit</a>
                    <a href="hapuslevelsatu/{{ $akun->id_level_satu }}" class="btn btn-icon icon-left btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</a>
                  </td> --}}
                </tr>
                <tr>
                    @foreach ($akun->level_dua as $lvdua)
                    <td>{{ $akun->kode_akun.".".$lvdua->kode_akun }}</td>
                    <td>{{ $lvdua->nama_akun }}</td>
                  {{-- <td>
                    <a href="ubahleveldua/{{ $lvdua->id_level_dua }}" class="btn btn-icon icon-left btn-primary btn-sm"><i class="far fa-edit"></i>Edit</a>
                    <a href="hapusleveldua/{{ $lvdua->id_level_dua }} " class="btn btn-icon icon-left btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</a>
                  </td> --}}
                </tr>

                <tr>
                    @foreach ($lvdua->level_tiga as $lvtiga)
                    <td>{{ $akun->kode_akun.".".$lvdua->kode_akun.".".$lvtiga->kode_akun }}</td>
                    <td>{{ $lvtiga->nama_akun }}</td>
                  {{-- <td>
                    <a href="ubahleveltiga/{{ $lvtiga->id_level_tiga }}" class="btn btn-icon icon-left btn-primary btn-sm"><i class="far fa-edit"></i>Edit</a>
                    <a href="hapusleveltiga/{{ $lvtiga->id_level_tiga }}" class="btn btn-icon icon-left btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</a>
                  </td> --}}
                </tr>
                @endforeach
                @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        {{-- <div class="d-flex justify-content-end card-footer">
            {{ $akn->onEachSide(1)->links() }}
          </div> --}}
      </div>
    <div class="card">
        <div class="card-header">
          <h4>Laporan</h4>
          <div class="card-header-action">
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Bulan dan Tahun</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    @foreach ($transaksi as $tr)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tr->bulan_tahun }}</td>
                  {{-- <td>
                    <button href="#" class="btn btn-icon icon-left btn-info btn-sm"><i class="far fa-eye"></i>Lihat</button>
                  </td> --}}
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
