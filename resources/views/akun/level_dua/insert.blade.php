@extends('layouts.main')
@section('section')
<div class="section-header">
    <h1>Tambah Level Dua</h1>
  </div>
<div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
          <h4>Form Tambah Level Dua</h4>
        </div>
        <div class="card-body">
            <form action="/tambahleveldua" method="POST">
                @csrf
            <div class="form-group">
                <label>Kode Akun Level Satu</label>
                    <select name="id_level_satu" class="form-control" id="sellevelsatu">
                        @foreach ($st as $satu)
                          <option value="{{ $satu->id_level_satu }}">{{ $satu->kode_akun }} {{ $satu->nama_reff }}</option>
                          @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label>Kode Akun</label>
                <input type="text" class="form-control @error('kode_akun') is-invalid
                @enderror" id="kode_akun" name="kode_akun" readonly="readonly"
                required autofocus value="{{ old('kode_akun') }}">
                @error('kode_akun')
                    <div class="invalid-message">
                        {{ $message }}
                    </div>
                @enderror
              </div>
            <div class="form-group">
                <label>Nama Akun</label>
                <input type="text" class="form-control @error('nama_akun') is-invalid
                @enderror" id="nama_akun" name="nama_akun"
                required autofocus value="{{ old('nama_akun') }}">
                @error('nama_akun')
                    <div class="invalid-message">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div>
                  <button type="submit" class="btn btn-primary">
                      Tambah Level Dua
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
    function changeOrg(){
        value = s.options[s.selectedIndex].value;
  console.log(value);
}
//on page load
changeOrg();


$('document').ready(function(){
    var id = value;
    var url = '{{ route("gen_level_dua", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                console.log(url);
                $('#kode_akun').val(response.kode);
            }
        }
    });
});

$('#sellevelsatu').change(function(){
    var id = value;
    var url = '{{ route("gen_level_dua", ":id") }}';
    url = url.replace(':id', id);
    console.log(id)

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#kode_akun').val(response.kode);
                console.log(response);
            }
        }
    });
});
</script>

@endpush
@endsection
