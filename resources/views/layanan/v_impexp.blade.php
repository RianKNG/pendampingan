@extends('templates.v_template')
@section('title','layanan')
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
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
        <div class="col-md-4">
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
        <div class="col-md-4">
            <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title">Download Laporan Dil Per Cabang dan Merek</h3>
            </div>
            <div class="my-0">
                <form action="/dil/cetakperiode" method="GET">
                    <div class="input-group">
                        <input type="date" class="form-control" name="start_date">
                        <input type="date" class="form-control" name="end_date">
                        <button class="btn btn-primary" type="submit">Ambil Data</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title">Download Laporan Dil Per Cabang dan Golongan</h3>
            </div>
            <div class="my-0">
                <form action="/dil/cetakrt" method="GET">
                    <div class="input-group">
                        <input type="date" class="form-control" name="start_date">
                        <input type="date" class="form-control" name="end_date">
                        <button class="btn btn-primary" type="submit">Ambil Data</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        
        {{-- <div class="col-md-4">
            <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Expor Data Pdf Non Aktip</h3>
            </div>
            <div class="card-body">
                <a href="/exportpdfn" class="btn btn-primary">Download Pdf Non Aktip</a>     
            </div>
            </div>
        </div> --}}
        <div class="col-md-12">
            <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Cetak Laporan PenutupanSL</h3>
            </div>
            
            <div class="my-0">
                <form action="/dil/cetaklaporan" method="GET">
                    <div class="input-group">
                        <input type="date" class="form-control" name="start_date">
                        <input type="date" class="form-control" name="end_date">
                        <button class="btn btn-primary" type="submit">Ambil Data</button>
                    </div>
                </form>
            </div>
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Cetak SL Baru</h3>
                </div>
                
                <div class="my-0">
                    <form action="/dil/cetaklaporansl" method="GET">
                        <div class="input-group">
                            <input type="date" class="form-control" name="start_date">
                            <input type="date" class="form-control" name="end_date">
                            <button class="btn btn-primary" type="submit">Ambil Data</button>
                        </div>
                    </form>
                </div>
            <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Cetak Laporan PenyambunganSL</h3>
            </div>
            
            <div class="my-0">
                <form action="/dil/cetaklaporanpenyambungan" method="GET">
                    <div class="input-group">
                        <input type="date" class="form-control" name="start_date">
                        <input type="date" class="form-control" name="end_date">
                        <button class="btn btn-primary" type="submit">Ambil Data</button>
                    </div>
                </form>
            </div>
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Cetak Laporan Ganti SL</h3>
                </div>
                
                <div class="my-0">
                    <form action="/dil/cetaklaporanpenggantian" method="GET">
                        <div class="input-group">
                            <input type="date" class="form-control" name="start_date">
                            <input type="date" class="form-control" name="end_date">
                            <button class="btn btn-primary" type="submit">Ambil Data</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
<!-- modal -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
           
            <form action="/importexcel" method="POST" enctype="multipart/form-data">
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
            <form action="/exportexcel/{cabang}" method="GET">
                <div class="input-group">
                    {{-- <label for="" class="form-label">cari cabang</label> --}}
                    <select name="cabang" id="" class="form-select">
                        <option value="">-</option>
                        <option value="1" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] =='1'}}">Sumedang Utara</option>
                        <option value="2" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] =='2'}}">Tanjungkerta</option>
                        <option value="3" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] =='3'}}">Datmaraja</option>
                        <option value="4" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] =='4'}}">Situraja</option>
                        <option value="5" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] =='5'}}">Jatinangor</option>
                        <option value="6" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] =='6'}}">Tanjungsari</option>
                        <option value="7" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] =='7'}}">Paseh</option>
                        <option value="8" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] =='8'}}">Cimalaka</option>
                        <option value="10" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] =='10'}}">Ujungjaya</option>
                        <option value="11" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] =='11'}}">Wado</option>
                        <option value="12" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] =='12'}}">Cisitu</option>
                        <option value="13" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] =='13'}}">Pamulihan</option>
                        <option value="14" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] =='14'}}">Cimanggung</option>
                        <option value="31" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] =='31'}}">Sumeadang Selatan</option>
                        <option value="42" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] =='42'}}">Sumedang Utara</option>
                        <option value="40" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] =='40'}}">Mol Pelayanan Publik</option>
    
    
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
