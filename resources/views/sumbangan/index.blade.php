@extends('layouts.main')
@section('section')
<div class="section-header">
    <h1>Daftar Sumbangan</h1>
  </div>
<div class="row">
    <div class="col-lg-12 p-1">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Sumbangan</h4>
                <div class="card-header-action">
                    <a href="bukasumbangan" class="btn btn-icon btn-sm icon-left btn-light"><i class="fas fa-plus"></i>Buka</a>
                  </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive" id="isiTable">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Kode Kegiatan</th>
                      <th scope="col">Nama Kegiatan</th>
                      <th scope="col">Total Sumbangan</th>
                      <th scope="col">Tanggal Buka</th>
                      <th scope="col">Tanggal Tutup</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        @foreach ($sbn as $sumbangan)
                        @if ($sumbangan->status==0)
                        <td>{{ $sumbangan->kode_kegiatan }}</td>
                        <td >{{ $sumbangan->nama_kegiatan }}</td>
                        <td>@rupiah($sumbangan->penyumbang->total_nominal)</td>
                        <td style="width:13%">{{ $sumbangan->tgl_buka }}</td>
                        <td >{{ $sumbangan->tgl_tutup }}</td>
                      <td style="width:15%">
                        @if (strtotime("today")>strtotime($sumbangan->tgl_tutup))
                        <a href="/posttransaksi/{{ $sumbangan->kode_kegiatan }}" class="btn btn-icon btn-warning btn-sm mr-1"><i class="fas fa-folder-plus"></i></a>
                        <a href="/hapussumbangan/{{ $sumbangan->kode_kegiatan }}" class="btn btn-icon btn-danger btn-sm swal-6"><i class="fas fa-trash"></i></a>
                        @else
                        <a href="/ubahsumbangan/{{ $sumbangan->kode_kegiatan }}" class="btn btn-icon btn-primary btn-sm mr-1"><i class="far fa-edit"></i></a>
                        <a href="/hapussumbangan/{{ $sumbangan->kode_kegiatan }}" class="btn btn-icon btn-danger btn-sm swal-6"><i class="fas fa-trash"></i></a>
                        <a href="#" class="btn btn-icon btn-info btn-sm ml-1" data-toggle="modal" data-target="#exampleModal{{ $loop->iteration }}"><i class="fas fa-info-circle"></i></a>
                        @endif

                        @push('modal')
                            <!-- Modal -->
                        <div id="exampleModal{{ $loop->iteration }}"  class="modal fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail {{ $sumbangan->nama_kegiatan }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Tanggal Buka</label>
                                        <input type="text" class="form-control datepicker @error('tgl_buka') is-invalid
                                        @enderror" id="tgl_buka" name="tgl_buka"
                                        required autofocus value="{{ old('tgl_buka',$sumbangan->tgl_buka) }}" disabled>
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
                                        required autofocus value="{{ old('tgl_tutup',$sumbangan->tgl_tutup) }}" disabled>
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
                                        required autofocus value="{{ old('kode_kegiatan',$sumbangan->kode_kegiatan) }}" disabled>
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
                                        required autofocus value="{{ old('nama_kegiatan',$sumbangan->nama_kegiatan) }}" disabled>
                                        @error('nama_kegiatan')
                                            <div class="invalid-message">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                      </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="keterangan" disabled>{{ old('keterangan',$sumbangan->keterangan) }}</textarea>
                                      </div>
                                      <div class="form-group">
                                        <label>Penyumbang</label>
                                      <div class="input-group mb-3 w-50">
                                        <input type="text" class="form-control" disabled placeholder="" aria-label="" value=
                                        {{ count($sumbangan->penyumbang->daftar_penyumbang->unique('id_user')) }}>
                                        <div class="input-group-append">
                                          <a href="daftarpenyumbang/{{$sumbangan->penyumbang->id_penyumbang}}" class="btn btn-primary">Daftar Penyumbang</a>
                                        </div>
                                      </div>
                                      </div>
                                    </div>
                            </div>
                            </div>
                        </div>
                        @endpush
                      </td>
                    </tr>
                        @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
