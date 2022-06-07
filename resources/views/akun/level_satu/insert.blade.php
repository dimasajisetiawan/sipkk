@extends('layouts.main')
@section('section')
<div class="section-header">
    <h1>Tambah Level Satu</h1>
  </div>
<div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
          <h4>Form Tambah Level Satu</h4>
        </div>
        <div class="card-body">
            <form action="/tambahlevelsatu" method="post">
                @csrf
            <div class="form-group">
                <label>Kode Akun</label>
                <input type="text" class="form-control @error('kode_akun') is-invalid
                @enderror" id="kode_akun" name="kode_akun"
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
                      Tambah Level Satu
                  </button>
              </div>
            </form>
            </div>
          </div>
        </div>
    </div>
    </div>
</div>
@endsection
