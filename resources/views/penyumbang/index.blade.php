@extends('layouts.main')
@section('section')
<div class="section-header">
    <h1>Daftar Penyumbang</h1>
  </div>
<div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
          <h4>Sumbangan</h4>
          <div class="card-header-action">
            <a href="/tambahpenyumbang/{{ $id }}" class="btn btn-icon btn-sm icon-left btn-light"><i class="fas fa-plus"></i>Tambah Penyumbang</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Pemberi</th>
                  <th scope="col">Nominal</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  {{-- <th scope="row">1</th>
                  <td>1 Januari 2021</td>
                  <td>Leoni Yacinta Brilianti</td>
                  <td>Rp. 100.000</td>
                  <td>
                    <button href="#" class="btn btn-icon icon-left btn-primary btn-sm"><i class="far fa-edit"></i>Edit</button>
                    <button href="#" class="btn btn-icon icon-left btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</button>
                  </td> --}}
                  @foreach ($penyumbang as $pny)
                  @foreach ($pny->daftar_penyumbang as $dp)
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ \Carbon\Carbon::parse($dp->tgl_sumbangan)->isoFormat('D MMMM Y') }}</td>
                  <td>{{ $dp->user->nama }}</td>
                  <td>@rupiah($dp->nominal)</td>
                  <td>
                    <a href="/ubahpenyumbang/{{ $dp->id_daftar_penyumbang }}/{{ $id }}" class="btn btn-icon icon-left btn-primary btn-sm"><i class="far fa-edit"></i>Edit</a>
                    <a href="/hapuspenyumbang/{{ $dp->id_daftar_penyumbang }}/{{ $id }}" class="btn btn-icon icon-left btn-danger btn-sm swal-6"><i class="fas fa-trash"></i>Delete</a>
                  </td>

                </tr>
                  @endforeach
              </tbody>
              <tr>
                <td colspan="3">Total</td>
                <td>@rupiah($pny->total_nominal)</td>
            </tr>
            @endforeach
            </table>
          </div>
        </div>
    </div>
    </div>
</div>

@endsection
