@extends('templates.v_template')
@section('title','(KONSOLIDASI)')
@section('content')
{{-- <h6><span> <i><b>Konsolidali</b></i></span></h6> --}}
<style>
  /* .blinkblink {
    animation: blinker 1s linear infinite;
  } */
  #blink {
    animation: blinker 1s linear infinite;
  }
  .bling {
    animation: blinker 2s linear infinite;
  }
  @keyframes blinker {
    100% {
      opacity: 0;
    }
  }
</style>
    

      
    <div class="row">
      <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <h4 class="bling"><a href="/test/jalan" class="small-box-footer"> <i id="blink" class="fas fa-arrow-circle-left btn-danger"></i><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rekap Data Pelanggan Berdasarkan Jalan</strong> </a></h4>
        
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="/test/wmbaik" class="small-box-footer"><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <h4 class="blinkblink"><a href="/test/datatable" class="small-box-footer"> <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pencarian Data Status Pelanggan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> <i id="blink" class="fas fa-arrow-circle-right btn-warning"></i></a></h4>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="/test/wmrusak" class="small-box-footer"><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->


    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h4>({{ number_format($wmbaik ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
            {{-- <h4>{{ $tidakada }}</h4> --}}
    
            <p><i>Pelanggan WM Baik</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="/test/wmbaik" class="small-box-footer"><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h4>({{ number_format($wmrusak ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
            {{-- <h4>{{ $ada }}<sup style="font-size: 20px"></sup></h4> --}}
    
            <p><i>Pelanggan WM Rusak</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="/test/wmrusak" class="small-box-footer"><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h4>({{ number_format($wmburam ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
            {{-- <h4>{{ $stidakada }}</h4> --}}

            <p><i>Pelanggan WM Buram</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="/test/wmburam" class="small-box-footer"><span class="btn-sm"></span><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
          
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h4>({{ number_format($wmhilang ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
            {{-- <h4>{{ $sada }}</h4> --}}

            <p><i>Pelanggan WM Hilang</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="/test/wmhilang" class="small-box-footer"><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->

  <!-- ./col -->

  <!-- ./col -->

  {{-- <div class="container"> --}}
    <!-- Small boxes (Stat box) -->
    
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h4>({{ number_format($wmterkubur ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
            {{-- <h4>{{ $tidakada }}</h4> --}}
    
            <p><i>Pelanggan WM Terkubur</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="/test/wmterkubur" class="small-box-footer"><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h4>({{ number_format($wmterkunci ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
            {{-- <h4>{{ $ada }}<sup style="font-size: 20px"></sup></h4> --}}
    
            <p><i>Pelanggan WM Terkunci</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="/test/wmterkunci" class="small-box-footer"><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h4>({{ number_format($stidakada ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
            {{-- <h4>{{ $stidakada }}</h4> --}}

            <p><i>Pelanggan Tidak ada Stop Kran</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="/test/stidakada" class="small-box-footer"><span class="btn-sm"></span><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
          
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h4>({{ number_format($sada ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
            {{-- <h4>{{ $sada }}</h4> --}}

            <p><i>Pelanggan ada Stop Kran</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="/test/sada" class="small-box-footer"><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->

  <!-- ./col -->

  <!-- ./col -->

    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h4>({{ number_format($ctidakada ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
            {{-- <h4>{{ $ctidakada }}</h4> --}}
    
            <p><i>Pelanggan Tidak ada Ceck Valve</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="/test/cvtidakada" class="small-box-footer"><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h4>({{ number_format($cada ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
            {{-- <h4>{{ $cada }}<sup style="font-size: 20px"></sup></h4> --}}
    
            <p><i>Pelanggan ada Ceck Valve</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="/test/cvada" class="small-box-footer"><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h4>({{ number_format($kada ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
            {{-- <h4>{{ $kada }}</h4> --}}

            <p><i>Pelanggan ada Kopling</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="/test/kptada" class="small-box-footer"><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h4>({{ number_format($ktidakada ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
            {{-- <h4>{{ $ktidakada }}</h4> --}}

            <p><i>Pelanggan Tidak ada Kopling</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="/test/kpada" class="small-box-footer"><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h4>({{ number_format($ptidakada ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
            {{-- <h4>{{ $ptidakada }}</h4> --}}
    
            <p><i>Pelanggan Tidak ada Plugkran</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="/test/pktada" class="small-box-footer"><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            {{-- <h4>{{ $pada }}<sup style="font-size: 20px"></sup></h4> --}}
            <h4>({{ number_format($pada ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
    
            <p><i>Pelanggan ada Plugkran</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="/test/pkada" class="small-box-footer"><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            {{-- <h4>{{ $bada }}</h4> --}}
            <h4>({{ number_format($bada ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>

            <p><i>Pelanggan Tidak ada Box</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="/test/bxada" class="small-box-footer"><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h4>({{ number_format($btidakada ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
            {{-- <h4>{{ $btidakada }}</h4> --}}
            

            <p><i>Pelanggan ada Box</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="/test/bxtada" class="small-box-footer"><i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>

    
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-6 col-12">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            {{-- <h4>{{ $rtidakada }}</h4> --}}
            <h4>({{ number_format($rtidakada ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
    
            <p><i>Pelanggan Rumah Milik Pribadi</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          
          <a href="/test/rada" class="small-box-footer"><i>Pelanggan Rumah Hak Milik Percabang</i> <i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            
            {{-- <h4>{{ $rada }}<sup style="font-size: 20px"></sup></h4> --}}
            <h4>({{ number_format($rada ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
    
            <p><i>Pelanggan Rumah Sewa</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="/test/rtada" class="small-box-footer"><i>Pelanggan Rumah Sewa Percabang</i> <i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-12 col-12">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            
            {{-- <h4>{{ $rada }}<sup style="font-size: 20px"></sup></h4> --}}
            <h4>({{ number_format($semuapelanggan ,0,",",".") }})<sup style="font-size: 20px"></sup></h4>
    
            <p><i>DIL Semua Pelanggan</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="/test/all" class="small-box-footer"><i>DIL Semua Pelanggan Percabang</i> <i>info</i>  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    
@endsection
