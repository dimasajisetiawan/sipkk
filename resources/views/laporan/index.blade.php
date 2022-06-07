@extends('layouts.main')
@section('section')
<div class="section-header">
    <h1>Daftar Laporan</h1>
  </div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Laporan</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Bulan dan Tahun</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                          @foreach ($transaksi as $tr)
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $tr->bulan_tahun }}</td>
                          <td>
                            <a href="/detaillaporan/{{ \Carbon\Carbon::parse($tr->tgl_transaksi)->isoFormat('M') }}/{{ \Carbon\Carbon::parse($tr->tgl_transaksi)->isoFormat('Y') }}" class="btn btn-icon btn-primary btn-sm mr-1">Lihat</button>
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
