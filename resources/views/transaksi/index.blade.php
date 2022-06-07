@extends('layouts.main')
@section('section')
<div class="section-header">
    <h1>Daftar Transaksi</h1>
  </div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Transaksi</h4>
                <div class="card-header-action">
                    <a href="/tambahtransaksi" class="btn btn-icon btn-sm icon-left btn-light"><i class="fas fa-plus"></i>Tambah</a>
                  </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Tanggal</th>
                      <th scope="col">No Rekening</th>
                      <th scope="col">Nama Akun</th>
                      <th scope="col">Debit</th>
                      <th scope="col">Kredit</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                          @foreach ($transaksi as $tr)
                          <td>{{ $tr->tgl_transaksi }}</td>
                          @if (empty($tr->id_level_dua) && empty($tr->id_level_tiga))
                            <td>{{ $tr->level_satu->kode_akun }}</td>
                          @elseif (empty($tr->id_level_tiga))
                          <td>{{ $tr->level_satu->kode_akun.".".$tr->level_dua->kode_akun }}</td>
                          @else
                          <td>{{ $tr->level_satu->kode_akun.".".$tr->level_dua->kode_akun.".".$tr->level_tiga->kode_akun }}</td>
                          @endif
                          @if (empty($tr->id_level_dua) && empty($tr->id_level_tiga))
                            <td>{{ $tr->level_satu->nama_akun }}</td>
                            @elseif (empty($tr->id_level_tiga))
                          <td>{{ $tr->level_dua->nama_akun }}</td>
                          @else
                          <td>{{ $tr->level_tiga->nama_akun }}</td>
                          @endif
                          @if ($tr->jenis_saldo=='debit')
                              <td>@rupiah($tr->saldo)</td>
                              <td></td>
                          @else
                              <td></td>
                              <td>@rupiah($tr->saldo)</td>
                          @endif
                          <td>
                            <a href="/ubahtransaksi/{{ $tr->id_transaksi }}" class="btn btn-icon btn-primary btn-sm mr-1"><i class="far fa-edit"></i></button>
                            <a href="/hapustransaksi/{{ $tr->id_transaksi }}" class="btn btn-icon btn-danger btn-sm swal-6"><i class="fas fa-trash"></i></button>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                  <tr>
                    <td colspan="3">Jumlah Total</td>
                    <td>@rupiah($debit)</td>
                    <td>@rupiah($kredit)</td>
                </tr>
                </table>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
