@extends('templates.v_template')
@section('title','(L A Y A N A N)')
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
            <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Impor Data DIL</h3>
            </div>
            <div class="card-body">
                
                <div>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#import">
                    Import
                </button>
            </div>
          </div>
            </div>
        
        </div>
        <div class="col-md-3">
            <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">Download DIL PerCabang XLS.</h3>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#export">
                    Download
                </button>
            </div>
            </div>
        </div>
  
        <div class="col-md-6">
            <div class="card card-outline card-danger">
            <div class="card-header">
                <h6 class="card-title col-xs"><span class="text-warning">Download Laporan Dil Cabxxxxxxxang && Golongan<span></h6>
            </div>
            <div class="my-4 mb-2">
                <form action="{{ url('/dil/cetakperiode') }}" method="GET">
                    <div class="input-group">
                        <input name="start_date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='date'">
                        <input name="end_date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='date'">
                        <button class="btn btn-primary" type="submit">Ambil Data</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <h6 class="bling"><a href="#" class="small-box-footer"> <i id="blink"></i><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Download Laporan Dil Per Cabang dan Golongan</strong> </a></h6>
        <form action="{{ url('/dil/cetakrt') }}" method="GET">
            <div class="input-group">
                <input name="start_date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='date'">
                <input name="end_date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='date'">
                <button class="btn btn-primary" type="submit">Ambil Data</button>
            </div>
        </form>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="/test/wmbaik" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-6 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
          <h6 class="blinkblink"><a href="#" class="small-box-footer"> <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cetak Laporan PenutupanSL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a></h6>
          <form action="/dil/cetaklaporan" method="GET">
            <div class="input-group">
                <input name="start_date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='date'">
                <input name="end_date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='date'">
                <button class="btn btn-primary" type="submit">Ambil Data</button>
            </div>
        </form>
          <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
</div>
  <div class="row">
    <div class="col-lg-6 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <h6 class="bling"><a href="#" class="small-box-footer"> <i id="blink"></i><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cetak Laporan SlBaru</strong> </a></h6>
        <form action="{{ url('/dil/cetaklaporansl') }}" method="GET">
            <div class="input-group">
                <input name="start_date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='date'">
                <input name="end_date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='date'">
                <button class="btn btn-primary" type="submit">Ambil Data</button>
            </div>
        </form>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-6 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
          <h6 class="blinkblink"><a href="#" class="small-box-footer"> <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cetak Laporan PenyambunganSL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a></h6>
          <form action="{{ url('/dil/cetaklaporanpenyambungan') }}" method="GET">
            <div class="input-group">
                <input name="start_date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='date'">
                <input name="end_date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='date'">
                {{-- <input type="date" class="form-control" name="start_date"> --}}
                {{-- <input type="date" class="form-control" name="end_date"> --}}
                <button class="btn btn-primary" type="submit">Ambil Data</button>
            </div>
        </form>
          <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
      </div>
  
      <div class="row">
        <div class="col-lg-12 col-12">
          <!-- small box -->
          <div class="small-box bg-success">
            <h6 class="bling"><a href="#" class="small-box-footer"> <i id="blink"></i><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cetak Laporan GantiSL</strong> </a></h6>
            <form action="#" method="GET">
                <div class="input-group">
                    <input name="start_date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='date'">
                    <input name="end_date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='date'">
                    {{-- <input type="date" class="form-control" name="start_date"> --}}
                    {{-- <input type="date" class="form-control" name="end_date"> --}}
                    <button class="btn btn-primary" type="submit">Ambil Data</button>
                </div>
            </form>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/test/wmbaik" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
    </div>


<!-- modal -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
           
            <form action="{{ url('/importexcel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>PILIH FILE</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-success">IMPORT</button>
                </div>
            </form>
        </div>
    </div>
  </div>
<!-- modal -->
<div class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ url('/exportexcel/{id_cabang}') }}" method="GET">
                <div class="input-group">
                    {{-- <label for="" class="form-label">cari cabang</label> --}}
                    <select name="id_cabang" id="" class="form-select">
                        <option value="">-</option>
                        <option value="1" selected="{{ isset($_GET['id_cabang']) && $_GET['id_cabang'] =='1'}}">Sumedang Utara</option>
                        <option value=2 selected="{{ isset($_GET['id_cabang']) && $_GET['id_cabang'] ==2}}">Tanjungkerta</option>
                        <option value="3" selected="{{ isset($_GET['id_cabang']) && $_GET['id_cabang'] =='3'}}">Datmaraja</option>
                        <option value="4" selected="{{ isset($_GET['id_cabang']) && $_GET['id_cabang'] =='4'}}">Situraja</option>
                        <option value="5" selected="{{ isset($_GET['id_cabang']) && $_GET['id_cabang'] =='5'}}">Jatinangor</option>
                        <option value="6" selected="{{ isset($_GET['id_cabang']) && $_GET['id_cabang'] =='6'}}">Tanjungsari</option>
                        <option value="7" selected="{{ isset($_GET['id_cabang']) && $_GET['id_cabang'] =='7'}}">Paseh</option>
                        <option value="8" selected="{{ isset($_GET['id_cabang']) && $_GET['id_cabang'] =='8'}}">Cimalaka</option>
                        <option value="10" selected="{{ isset($_GET['id_cabang']) && $_GET['id_cabang'] =='10'}}">Ujungjaya</option>
                        <option value="11" selected="{{ isset($_GET['id_cabang']) && $_GET['id_cabang'] =='11'}}">Wado</option>
                        <option value="12" selected="{{ isset($_GET['id_cabang']) && $_GET['id_cabang'] =='12'}}">Cisitu</option>
                        <option value="13" selected="{{ isset($_GET['id_cabang']) && $_GET['id_cabang'] =='13'}}">Pamulihan</option>
                        <option value="14" selected="{{ isset($_GET['id_cabang']) && $_GET['id_cabang'] =='14'}}">Cimanggung</option>
                        <option value="31" selected="{{ isset($_GET['id_cabang']) && $_GET['id_cabang'] =='31'}}">Sumeadang Selatan</option>
                        <option value="42" selected="{{ isset($_GET['id_cabang']) && $_GET['id_cabang'] =='42'}}">Sumedang Utara</option>
                        <option value="40" selected="{{ isset($_GET['id_cabang']) && $_GET['id_cabang'] =='40'}}">Mol Pelayanan Publik</option>
    
    
                    </select>
                    <input type="date" class="form-control" name="from">
                    <input type="date" class="form-control" name="to">
                    {{-- <input id="startDate" name="startDate"/>
                    <input id="endDate"  name="endDate"/> --}}
                    <button class="btn btn-primary" type="submit">Ambil Data</button>
                </div>
            </form>
            {{-- <form action="/importexcel" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Silahkan Donwnload seluruh Data</label>
                        <a href="/exportexcel" class="btn btn-primary btn-md">Import</a>
                    </div>
                </div>
            </form> --}}
        </div>
    </div>
  </div>

@endsection
