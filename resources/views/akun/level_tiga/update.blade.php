@extends('layouts.main')
@section('section')
    <div class="section-header">
        <h1>Edit Ubah Tiga</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Ubah Level Tiga</h4>
                </div>
                <div class="card-body">
                    <form action="/ubahleveltiga/{{ $level_tiga->id_level_tiga }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Kode Akun Level Satu</label>
                            <select name="id_level_satu" class="form-control" id="id_level_satu">
                                <option value="0">Pilih Level Satu </option>
                                @foreach ($st as $satu)
                                @foreach ($satu->level_dua as $lvdua )
                                @if ($level_tiga->id_level_dua==$lvdua->id_level_dua)
                                <option value="{{ $satu->id_level_satu }}" selected>{{ $satu->kode_akun }}
                                    {{ $satu->nama_akun }}
                                </option>
                                @else
                                <option value="{{ $satu->id_level_satu }}">{{ $satu->kode_akun }}
                                    {{ $satu->nama_akun }}
                                </option>
                                @endif
                                @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kode Akun Level Dua</label>
                            <select name="id_level_dua" class="form-control" id="id_level_dua" name="id_level_dua">
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kode Akun</label>
                            <input type="text" class="form-control @error('kode_akun') is-invalid @enderror" id="kode_akun"
                                name="kode_akun" required autofocus value="{{ old('kode_akun',$level_tiga->kode_akun) }}" readonly>
                            @error('kode_akun')
                                <div class="invalid-message">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Akun</label>
                            <input type="text" class="form-control @error('nama_akun') is-invalid @enderror" id="nama_akun"
                                name="nama_akun" required autofocus value="{{ old('nama_akun', $level_tiga->nama_akun) }}">
                            @error('nama_akun')
                                <div class="invalid-message">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                Ubah Level Tiga
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
            var s = document.getElementsByName('id_level_satu')[0];
            var value;
            s.addEventListener("change", changeOrg);


            function changeOrg() {
                value = s.options[s.selectedIndex].value;
                // console.log(value);
            }
            //on page load
            changeOrg();
            var id_level_dua = JSON.parse("{{ json_encode($level_tiga->id_level_dua) }}");


                    var id = value;
                    var url = '{{ route('sel_level_dua_on_level_tiga', ':id') }}';
                    url = url.replace(':id', id);

                    $.ajax({
                        url: url,
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            if (!response.length == 0) {
                                // console.log(url);

                                $('#id_level_dua').empty();
                                $.each(response, function(key, response) {
                                    if(id_level_dua === response.id_level_dua){
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
                                $('#id_level_dua').empty();
                                $('#id_level_dua').append(
                                    '<option hidden>Pilih Level Satu</option>');
                                $('#kode_akun').val('');
                            } else {
                                $('#id_level_dua').empty();
                                $('#id_level_dua').append(
                                    '<option hidden>Nomor Akun Level 2 Belum Tersedia</option>');
                                $('#kode_akun').val('');
                            }
                        }
                    });
                    $(document).ready(function() {
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
                    })
                })
                });
            $('document').ready(function() {
                $('#id_level_satu').change(function () {
                    $('#kode_akun').val('');
                })
                $("#id_level_dua").change(function() {
                    var value = $(this).children("option:selected").val();
                    var url = '{{ route('gen_level_tiga', ':id') }}';
                    url = url.replace(':id', value);
                    if ({!! $level_tiga->id_level_dua !!} == value) {
                        $('#kode_akun').val("{{ $level_tiga->kode_akun }}");
                    }else{
                    $.ajax({
                        url: url,
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            if (response != null) {
                                if(response.kode)
                                $('#kode_akun').val(response.kode);
                            }
                        }
                    });
                }
                });
            });
        </script>
    @endpush
@endsection
