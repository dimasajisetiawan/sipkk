@extends('layouts.main')
@section('section')
<div class="section-header">
    <h1>Ubah Buka Sumbangan</h1>
  </div>
<div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
          <h4>Form Ubah Buka Sumbangan</h4>
        </div>
        <div class="card-body">
            <form action="/ubahsumbangan/{{ $sumbangan->kode_kegiatan }}" method="post">
                @csrf
            <div class="form-group">
                <label>Tanggal Buka</label>
                <input type="text" class="form-control datepicker @error('tgl_buka') is-invalid
                @enderror" id="tgl_buka" name="tgl_buka"
                required autofocus value="{{ old('tgl_buka',$sumbangan->tgl_buka) }}">
                @error('tgl_buka')
                    <div class="invalid-message">
                        {{ $message }}
                    </div>
                @enderror
              </div>
            <div class="form-group">
                <label>Tanggal Tutup</label>
                <input type="text" class="form-control datepicker @error('tgl_tutup') is-invalid
                @enderror" id="tgl_tutup" name="tgl_tutup"
                required autofocus value="{{ old('tgl_tutup',$sumbangan->tgl_tutup) }}">
                @error('tgl_tutup')
                    <div class="invalid-message">
                        {{ $message }}
                    </div>
                @enderror
              </div>
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
            <div class="form-group">
                <label>Nama Kegiatan</label>
                <input type="text" class="form-control @error('nama_kegiatan') is-invalid
                @enderror" id="nama_kegiatan" name="nama_kegiatan"
                required autofocus value="{{ old('nama_kegiatan',$sumbangan->nama_kegiatan) }}">
                @error('nama_kegiatan')
                    <div class="invalid-message">
                        {{ $message }}
                    </div>
                @enderror
              </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan">{{ old('keterangan',$sumbangan->keterangan) }}</textarea>
              </div>
              <div>
                  <button type="submit" class="btn btn-primary">
                      Catat
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
