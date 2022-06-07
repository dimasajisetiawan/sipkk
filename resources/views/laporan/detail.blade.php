@extends('layouts.main')
@section('section')
<div class="section-header">
    <h1>Detail Laporan</h1>
  </div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Detail Laporan</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="detaillaporan">
                  <thead>
                    <tr>
                      <th scope="col">Tanggal</th>
                      <th scope="col">No Rekening</th>
                      <th scope="col">Nama Akun</th>
                      <th scope="col">Debit</th>
                      <th scope="col">Kredit</th>
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
                      </tr>
                      @endforeach
                      <tr>
                        <td>Jumlah Total</td>
                        <td></td>
                        <td></td>
                        <td>@rupiah($debit)</td>
                        <td>@rupiah($kredit)</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
</div>
@push('custom-script')
<script>
    $(function () {
    $("#detaillaporan").DataTable({
        "bInfo" : false,
      "responsive": true, "lengthChange": false, "autoWidth": false, "searching" : false,
      "buttons": ["copy", "csv", "excel", {
        extend: 'pdf',
        title: "Laporan {!! $tr->bulan_tahun !!}",
      }, {
        extend: 'print',
        title: "Laporan {!! $tr->bulan_tahun !!}"
      }, "colvis"]
    }).buttons().container().appendTo('#detaillaporan_wrapper .col-md-6:eq(0)');
  });
</script>

@endpush
@endsection
