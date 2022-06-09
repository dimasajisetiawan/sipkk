@extends('layouts.main')
@section('section')
<div class="section-header">
    <h1>Tambah Penyumbang</h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Form Tambah Penyumbang</h4>
            </div>
            <div class="card-body">
                <form action="/tambahpenyumbang/{{ $id }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama Pemberi</label>
                        <select class="form-control select2" name="id_user">
                            @foreach ($user as $users)
                            <option value="{{ $users->id_user }}">{{$users->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Sumbangan</label>
                        <input type="text" class="form-control datepicker @error('tgl_sumbangan') is-invalid
                @enderror" id="tgl_sumbangan" name="tgl_sumbangan" required autofocus
                            value="{{ old('tgl_sumbangan') }}">
                        @error('tgl_sumbangan')
                        <div class="invalid-message">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Rp.
                                </div>
                            </div>
                            <input type="text" class="form-control currency @error('nominal') is-invalid
                        @enderror" name="nominal">
                        </div>
                        @error('nominal')
                        <div class="invalid-message">
                            {{ $message }}
                        </div>
                        @enderror
                        @if (session('error'))
                        <div class="invalid-message">
                            {{ session('error') }}
                        </div>
                        @endif
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
