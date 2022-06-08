@extends('layouts.main')
@section('section')
<div class="section-header">
    <h1>Ubah Transaksi</h1>
  </div>
<div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
          <h4>Form Ubah Transaksi</h4>
        </div>
        <div class="card-body">
            <form action="/ubahtransaksi/{{ $transaksi->id_transaksi }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Tanggal Transaksi</label>
                    <input type="text" class="form-control datepicker @error('tgl_transaksi') is-invalid
                    @enderror" id="tgl_transaksi" name="tgl_transaksi"
                    required autofocus value="{{ old('tgl_transaksi',$transaksi->tgl_transaksi) }}">
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
                    @if ($transaksi->level_satu->id_level_satu == $satu->id_level_satu)
                    <option value="{{ $satu->id_level_satu }}" selected>{{ $satu->kode_akun }}
                        {{ $satu->nama_akun }}
                    </option>
                    @else
                    <option value="{{ $satu->id_level_satu }}">{{ $satu->kode_akun }}
                        {{ $satu->nama_akun }}
                    </option>
                    @endif
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
                    @if ($transaksi->jenis_saldo=='debit')
                    <option value="debit" selected>Debit</option>
                    <option value="kredit">Kredit</option>
                    @else
                    <option value="debit">Debit</option>
                    <option value="kredit" selected>Kredit</option>
                    @endif
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
                  <input type="text" class="form-control currency" name="saldo" value="{{ old('saldo',$transaksi->saldo) }}">
                </div>
              </div>
        <div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan">{{ old('keterangan',$transaksi->keterangan) }}</textarea>
              </div>
              <div>
                  <button type="submit" class="btn btn-primary">
                      Ubah Transaksi
                  </button>
              </div>
            </form>
            </div>
          </div>
        </div>
    </div>
    </div>
</div>
@push('custom-script')
        <script>
            var id_level_satu = JSON.parse("{{ json_encode($transaksi->id_level_satu) }}");
            var s = document.getElementsByName('id_level_satu')[0];
            var value;
            s.addEventListener("change", changeOrg);

            function changeOrg() {
                value = s.options[s.selectedIndex].value;
                console.log(value);
                console.log(id_level_satu);
            }
            //on page load
            changeOrg();



            var id_level_dua = JSON.parse("{{ json_encode($transaksi->id_level_dua) }}");
            var idleveltelu = JSON.parse("{{ json_encode($transaksi->id_level_tiga) }}");


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
                                    if(id_level_dua == response.id_level_dua){
                                    $('select[name="id_level_dua"]').append(
                                        '<option value="' + response.id_level_dua +
                                        '"selected>' +
                                        response.kode_akun + " " + response.nama_akun +
                                        '</option>');
                                    }else{
                                        $('select[name="id_level_dua"]').append(
                                        '<option value="' + response.id_level_dua +
                                        '">' +
                                        response.kode_akun + " " + response.nama_akun +
                                        '</option>');
                                    }
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



            $(document).ready(function() {
                $('#id_level_tiga').empty();
                $('#id_level_tiga').append('<option value="">Pilih Level Dua</option>');
                if(idleveltelu===null){
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
                }else{
                    var id= id_level_dua;
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
                                    if(idleveltelu == response.id_level_tiga){
                                    $('select[name="id_level_tiga"]').append(
                                        '<option value="' + response.id_level_tiga +
                                        '" selected>' +
                                        response.kode_akun + " " + response.nama_akun +
                                        '</option>');
                                    }else{
                                        $('select[name="id_level_tiga"]').append(
                                        '<option value="' + response.id_level_tiga +
                                        '">' +
                                        response.kode_akun + " " + response.nama_akun +
                                        '</option>');
                                    }
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
                }

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
