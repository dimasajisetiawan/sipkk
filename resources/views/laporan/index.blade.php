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
                    <div class="form-group">
                        <label>Periode</label>
                        <div>
                        <select class="form-control select2 " style="width: 25% p-3" name="bulan" id="bulan">
                            <option value="0">Pilih Bulan....</option>
                            @foreach ($bulan as $bln)
                            <option value="{{ $bln->bulan }}">{{$bln->bulan }}</option>
                            @endforeach
                        </select>
                        <select class="form-control select2" style="width: 25% p-3" name="tahun" id="tahun">
                            <option value="">Pilih Tahun....</option>
                            @foreach ($tahun as $thn)
                            <option value="{{ $thn->tahun }}">{{$thn->tahun }}</option>
                            @endforeach
                        </select>
                        <button id="sub" class="btn btn-primary">Cari</button>
                    </div>
                    </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Bulan dan Tahun</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="isiTable">
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
@push('custom-script')
<script>
            $(document).ready(function(){
                $("#sub").on('click', function(){
                    var bulan = $('#bulan').val();
                    var tahun = $('#tahun').val();
                    var url = "{{ route('cekperiode')}}";
                    $.ajax({
                        url : url,
                        type : "GET",
                        data : {'bulan':bulan, 'tahun' : tahun},
                        dataType : "json",
                        success:function(data){
                            console.log(data);
                            var html = '';
                            var no = 1;
                            $.each(data, function(key, data) {
                            html += '<tr>\
                                        <th>  '+(no++)+' </th>\
                                        <td> '+data.bulan_tahun+'</td>\
                                        <td><a href="/detaillaporan/'+data.bulan+'/'+data.tahun+ '"class="btn btn-icon btn-primary btn-sm mr-1">Lihat</button></td>\
                                        </tr>';
                            });
                            $("#isiTable").html(html);

                    }
                    });
                });
            });
</script>
@endpush
