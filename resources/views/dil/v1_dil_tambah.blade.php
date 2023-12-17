@extends('templates.v_template')
@section('title','Tambah Data')
@section('content')
<section class="content btn-xs">
<div class="container-fluid">
  <form action="/dil/insert/" method="post" enctype="multipart/form-data">
    @csrf
    </div>
            <!-- general form elements disabled -->
            <div class="container-fluid btn-xs">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
            <div class="card-outline card-danger">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Data Dil</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>No Sambungan</label>
                        <input type="integer" class="form-control" name="id">
                        @error('id')
                        <div class="alert text-danger">harus berisi 10 karakter</div>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>cabang</label>
                        <select name="cabang" class="form-control btn-xs">
                          <option selected>cab||unit</option>
                          <option value="9">Tomo</option>
                          <option value="10">Ujungjaya</option>
                          <option value="3">Darmaraja</option>
                          <option value="12">Cisitu</option>
                          <option value="14">Cimanggung</option>
                          <option value="6">Tanjungsari</option>
                          <option value="13">Pamulihan</option>
                          <option value="1">Sumedang Utara</option>
                          <option value="7">Paseh</option>
                          <option value="8">Cimalaka</option>
                          <option value="2">Tanjungkerta</option>
                          <option value="4">Situraja</option>
                          <option value="11">Wado</option>
                          <option value="31">Sumedang Selatan</option>
                          <option value="5">Jatinangor</option>
                          <option value="40">Mol Pelayan Publik</option>
                        </select>
                          @error('cabang')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                  
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>status*(langsung aktip)</label>
                          <input type="integer" class="form-control" name="status" value="1" readonly placeholder="aktip">
                          @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>No Rekening</label>
                        <input type="integer" name="no_rekening" class="form-control" >
                        @error('no_rekening')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Nama Sekarang</label>
                        <input type="text" class="form-control" name="nama_sekarang">
                        @error('nama_sekarang')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Nama Pemilik</label>
                        <input type="text" class="form-control" name="nama_pemilik">
                        @error('nama_pemilik')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-sm-2">
                      <div class="form-group">
                        <label>No Rumah</label>
                        <input type="text" class="form-control" name="no_rumah">
                        @error('no_rumah')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>
                
                    <div class="col-sm-2">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>RT</label>
                        <input type="integer" class="form-control" name="rt">
                        @error('rt')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>RW</label>
                        <input type="integer" class="form-control" name="rw">
                        @error('rw')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Blok</label>
                        <input type="text" class="form-control" name="blok">
                        @error('blok')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>
                  
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Dusun</label>
                        <input type="text" class="form-control" name="dusun">
                        @error('dusun')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                  </div>
                    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan">
                        @error('kecamatan')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                 
                    <div class="col-md-2">
                      <div>status Milik</div>
                      <div class="form-group">
                        <div class="form-check">
                          <label class="form-check-label"> <input class="form-check-input" name="status_milik" value="sewa" type="checkbox">sewa</label>
                          <div></div>
                          <label class="form-check-label"> <input class="form-check-input" name="status_milik" value="hak_milik" type="checkbox">hak milik</label>
                          <div></div>
                          <label class="form-check-label"> <input class="form-check-input" name="status_milik" value="belum_terverifikasi" type="checkbox">belum terverifikasi</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>jml_jiwa_tetap</label>
                        <input type="integer" class="form-control" name="jml_jiwa_tetap">
                        @error('jml_jiwa_tetap')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>

                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>jml_jiwa_tidak_tetap</label>
                        <input type="integer" class="form-control" name="jml_jiwa_tidak_tetap">
                        @error('jml_jiwa_tidak_tetap')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                  </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Tanggal Pasang</label>
                        <div class="form-input">
                          <input type="date" class="form-control" name="tanggal_pasang">
                          @error('tanggal_pasang')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                      </div>
                    </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Tanggal File</label>
                        <div class="form-input">
                          <input type="date" class="form-control" name="tanggal_file">
                          @error('tanggal_file')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                      </div>

                      <div class="row">
                  <div class="col-md-2">
                    <div>segel</div>
                  
                      <div class="form-check">
                        <label class="form-check-label"> <input class="form-check-input" name="segel" value="ada" type="checkbox">ada</label>
                        <div></div>
                        <label class="form-check-label"> <input class="form-check-input" name="segel" value="tidak ada" type="checkbox">tidak ada</label>
                      </div>
                    </div>
                
                  <div class="col-md-2">
                    <div>stop kran</div>
                    
                      <div class="form-check">
                        <label class="form-check-label"> <input class="form-check-input" name="stop_kran" value="ada" type="checkbox">ada</label>
                        <div></div>
                        <label class="form-check-label"> <input class="form-check-input" name="stop_kran" value="tidak ada" type="checkbox">tidak ada</label>
                      </div>
                    </div>
                
                  <div class="col-md-2">
                    <div>ceck valve</div>
                  
                      <div class="form-check">
                        <label class="form-check-label"> <input class="form-check-input" name="ceck_valve" value="ada" type="checkbox">ada</label>
                        <div></div>
                        <label class="form-check-label"> <input class="form-check-input" name="ceck_valve" value="tidak ada" type="checkbox">tidak ada</label>
                      </div>
                    </div>
                
                  
                  <div class="col-md-2">
                    <div>kopling</div>
               
                      <div class="form-check">
                        <label class="form-check-label"> <input class="form-check-input" name="kopling" value="ada" type="checkbox">ada</label>
                        <div></div>
                        <label class="form-check-label"> <input class="form-check-input" name="kopling" value="tidak ada" type="checkbox">tidak ada</label>
                      </div>
                    </div>
          
                  <div class="col-md-2">
                    <div>plug</div>
                   
                      <div class="form-check">
                        <label class="form-check-label"> <input class="form-check-input" name="plugran" value="ada" type="checkbox">ada</label>
                        <div></div>
                        <label class="form-check-label"> <input class="form-check-input" name="plugran" value="tidak ada" type="checkbox">tidak ada</label>
                      </div>
                    </div>
            
                  <div class="col-md-2">
                    <div>box</div>
                    <div class="form-group">
                      <div class="form-check">
                        <label class="form-check-label"> <input class="form-check-input" name="box" value="ada" type="checkbox">ada</label>
                        <div></div>
                        <label class="form-check-label"> <input class="form-check-input" name="box" value="tidak ada" type="checkbox">tidak ada</label>
                        
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
             
               
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Sumber Lain</label>
                        <input type="text" name="sumber_lain" class="form-control">
                        @error('sumber_lain')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Jenis Usaha</label>
                        <input type="text" name="jenisusaha" class="form-control">
                        @error('jenisusaha')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Merek Warter Meter</label>
                        <select name="id_merek" class="form-control">
                          <option value="">--- Merek ---</option>
                          @foreach($mer as $item)
                              <option value="{{ $item->id }}">{{ $item->merek }}</option>
                          @endforeach    
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
           
              <button class="btn btn-primary">simpan</button>
            </div> 
          </div>
          </div>
          <form>
@endsection
