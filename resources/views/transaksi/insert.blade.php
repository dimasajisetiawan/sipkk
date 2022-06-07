@extends('layouts.main')
@section('section')
<div class="section-header">
    <h1>Tambah Transaksi</h1>
  </div>
<div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
          <h4>Form Tambah Transaksi</h4>
        </div>
        <div class="card-body">
            <form action="/tambahtransaksi" method="post">
                @csrf
                <div class="form-group">
                    <label>Tanggal Transaksi</label>
                    <input type="text" class="form-control datepicker @error('tgl_transaksi') is-invalid
                    @enderror" id="tgl_transaksi" name="tgl_transaksi"
                    required autofocus value="{{ old('tgl_transaksi') }}">
                    @error('tgl_transaksi')
                        <div class="invalid-message">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
              <div class="form-group">
                <label>Kode Akun Level Satu</label>
                <select name="id_level_satu" class="form-control" id="id_level_satu">
                    <option value="0">Pilih Level Satu </option>
                    @foreach ($st as $satu)
                        <option value="{{ $satu->id_level_satu }}">{{ $satu->kode_akun }}
                            {{ $satu->nama_akun }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Kode Akun Level Dua</label>
                <select name="id_level_dua" class="form-control" id="id_level_dua" name="id_level_dua">
                </select>
            </div>
            <div class="form-group">
                <label>Kode Akun Level Tiga</label>
                <select name="id_level_tiga" class="form-control" id="id_level_tiga" name="id_level_tiga">
                </select>
            </div>

              <div class="form-group">
                <label>Jenis Saldo</label>
                <select class="form-control" name="jenis_saldo">
                  <option value="debit">Debit</option>
                  <option value="kredit">Kredit</option>
                </select>
              </div>
              <div class="form-group">
                <label>Saldo</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      Rp.
                    </div>
                  </div>
                  <input type="text" class="form-control currency" name="saldo" @if (Request::is('posttransaksi*'))
                      value = "{{ $sumbangan->penyumbang->total_nominal }}"
                  @endif>
                </div>
              </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan">@if (Request::is('posttransaksi*')){{ old('keterangan',$sumbangan->keterangan) }}@endif</textarea>
              </div>
              @if (Request::is('posttransaksi*'))
              <div class="form-group">
                <label>Kode Kegiatan</label>
                <input type="text" class="form-control @error('kode_kegiatan') is-invalid
                @enderror" id="kode_kegiatan" name="kode_kegiatan"
                required autofocus value="{{ old('kode_kegiatan',$sumbangan->kode_kegiatan) }}">
                @error('kode_kegiatan')
                    <div class="invalid-message">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              @endif
              <div>
                  <button type="submit" class="btn btn-primary">
                      Tambah Transaksi
                  </button>
              </div>
            </form>
            </div>
          </div>
        </div>
</div>
@push('custom-script')
        <script>
            var s = document.getElementsByName('id_level_satu')[0];
            var value;
            s.addEventListener("change", changeOrg);

            function changeOrg() {
                value = s.options[s.selectedIndex].value;
                console.log(value);
            }
            //on page load
            changeOrg();


            $(document).ready(function() {
                $('#id_level_dua').empty();
                $('#id_level_dua').append('<option value="">Pilih Level Satu</option>');
                $('#id_level_satu').on('change', function() {
                    var id = value;
                    var url = '{{ route('sel_level_dua_on_level_tiga', ':id') }}';
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            if (!response.length == 0) {
                                console.log(url);
                                $('#id_level_dua').empty();
                                $('#id_level_dua').append(
                                '<option value="">Pilih Level Dua</option>');
                                $.each(response, function(key, response) {
                                    $('select[name="id_level_dua"]').append(
                                        '<option value="' + response.id_level_dua +
                                        '">' +
                                        response.kode_akun + " " + response.nama_akun +
                                        '</option>');
                                });

                            } else if (value == 0) {
                                console.log(url);
                                $('#id_level_dua').empty();
                                $('#id_level_dua').append(
                                    '<option value="">Pilih Level Satu</option>');
                                $('#kode_akun').val('');
                            } else {
                                console.log(url);
                                $('#id_level_dua').empty();
                                $('#id_level_dua').append(
                                    '<option value="">Nomor Akun Level 2 Belum Tersedia</option>');
                                $('#kode_akun').val('');
                            }
                        }
                    });
                });
            });


            $(document).ready(function() {
                $('#id_level_tiga').empty();
                $('#id_level_tiga').append('<option value="">Pilih Level Dua</option>');
                $("#id_level_dua").change(function() {
                    var id= $(this).children("option:selected").val();
                    var url = '{{ route('sel_level_tiga', ':id') }}';
                    url = url.replace(':id', id);

                    $.ajax({
                        url: url,
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            if (!response.length == 0) {
                                console.log(url);

                                $('#id_level_tiga').empty();
                                $('#id_level_tiga').append(
                                '<option value="">Pilih Level Tiga</option>');
                                $.each(response, function(key, response) {
                                    $('select[name="id_level_tiga"]').append(
                                        '<option value="' + response.id_level_tiga +
                                        '">' +
                                        response.kode_akun + " " + response.nama_akun +
                                        '</option>');
                                });

                            } else if (value == 0) {
                                console.log(url);
                                $('#id_level_tiga').empty();
                                $('#id_level_tiga').append(
                                    '<option value="">Pilih Level Dua</option>');
                                $('#kode_akun').val('');
                            } else {
                                console.log(url);
                                $('#id_level_tiga').empty();
                                $('#id_level_tiga').append(
                                    '<option value="">Nomor Akun Level 3 Belum Tersedia</option>');
                                $('#kode_akun').val('');
                            }
                        }
                    });
                });
                $("#id_level_satu").change(function() {
                                $('#id_level_tiga').empty();
                                $('#id_level_tiga').append(
                                    '<option value="">Pilih Level Dua</option>');
                                $('#kode_akun').val('');
                        });
                    });

        </script>
    @endpush
@endsection
