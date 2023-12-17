@extends('templates.v_template')
{{-- @section('title','Detail_pelanggan') --}}
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Detail Data Pelanggan</h5>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
        <div class="card-group">
          <div class="card">
            <div class="card-body">
@foreach ($lain as $k)
    
@endforeach
             
              <p class="card-text"><span class="text-muted">No Sambungan : {{ $k->id }}</span></p>
              <p class="card-text"><span class="text-muted">Nama : 
                @if ($k->cabang == 1)
                Sumedang Utara
                @elseif($k->cabang == 2)
                Tanjungkerta
                @elseif($k->cabang == 3)
                Darmaraja
                @elseif($k->cabang == 4)
                Situraja
                @elseif($k->cabang == 5)
                Jatinangor
                @elseif($k->cabang == 6)
                Tanjungsari
                @elseif($k->cabang == 7)
                Paseh
                @elseif($k->cabang == 8)
                Cimalaka
                @elseif($k->cabang == 9)
                Tomo
                @elseif($k->cabang == 10)
                Ujungjaya
                @elseif($k->cabang == 11)
                Wado
                @elseif($k->cabang == 12)
                Cisitu
                @elseif($k->cabang == 13)
                Pamulihan
                @elseif($k->cabang == 14)
                Cimanggung
                @elseif($k->cabang == 40)
                Mol Pelayanan Publik
                @else
                        Tidak ada 
                @endif
                
              </p>
              <p class="card-text"><span class="text-muted">Status : {{ $k->status == 1 ? 'Aktip' : 'non aktip' }}</span></p>
              <p class="card-text"><span class="text-muted">No Rekening{{ $k->no_rekening }}</span></p>
              <p class="card-text"><span class="text-muted">Nama Sekarang{{ $k->nama_sekarang }}</span></p>
              <p class="card-text"><span class="text-muted">Nama Pemilik{{ $k->nama_pemilik }}</span></p>
              {{-- <p class="card-text"><span class="text-muted">No Rumah{{ $k->no_rumah }}</span></p> --}}
              <p class="card-text"><span class="text-muted">RT{{ $k->alamat }}</span></p>
              {{-- <p class="card-text"><span class="text-muted">{{ $k->rw }}</span></p> --}}
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              {{-- <p class="card-text"><span class="text-muted">Nama : {{ $k->blok }}</span></p> --}}
              {{-- <p class="card-text"><span class="text-muted">Dusun : {{ $k->dusun }}</span></p> --}}
              <p class="card-text"><span class="text-muted">Kecamatan : {{ $k->alamat }}</span></p>
              <p class="card-text"><span class="text-muted">Status Milik : {{ $k->status_milik }}</span></p>
              <p class="card-text"><span class="text-muted">Jumlah Jiwa Tetap : {{ $k->jml_jiwa_tetap }}</span></p>
              <p class="card-text"><span class="text-muted">Jumlah Jiwa Tidak Tetap :{{ $k->jml_jiwa_tidak_tetap }}</span></p>
              <p class="card-text"><span class="text-muted">Tanggal Pasang : {{ $k->tanggal_pasang }}</span></p>
              <p class="card-text"><span class="text-muted">Segel : {{ $k->segel }}</span></p>
              <p class="card-text"><span class="text-muted">Ceck Valve : {{ $k->ceck_valve }}</span></p>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <p class="card-text"><span class="text-muted">Sumber_lain : {{ $k->sumber_lain }}</span></p>
              <p class="card-text"><span class="text-muted">Jenis_usaha : {{ $k->jenis_usaha }}</span></p>
              <p class="card-text"><span class="text-muted">Merek : {{ mrk($k->id_merek) }}</span></p>
              @foreach ($lain as $t)
              <p class="card-text"><span class="text-muted">Tanggal_tutup : {{ $t->tanggal_tutup }}</span></p>
              @endforeach
              @foreach ($lain as $g)
              <p class="card-text"><span class="text-muted">Tanggal_ganti : {{ $t->tanggal_ganti }}</span></p>
              @endforeach
            </div>
          </div>
        </div>
   
      <!-- /.card-header -->
      <div class="card-footer text-center">
        <a href="/dil" class="btn btn-sm btn-info text-center">Kembali Ke Halaman Utama</a>
      </div>
      <!-- ./card-body -->
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</div>
@endsection
{{-- @section('javascript')
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection --}}

   