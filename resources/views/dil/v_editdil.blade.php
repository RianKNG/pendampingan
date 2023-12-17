@extends('templates.v_template')
@section('title','Tambah Data')
@section('content')
<section class="content btn-xs">
<div class="container-fluid">
  <form action="/dil/update/{{ $data->id }}" method="post" enctype="multipart/form-data">
    @csrf
  </div>
  <!-- general form elements disabled -->
  <div class="card card-warning">
    <div class="card-header">
      <h3 class="card-title">Form Pengisian Data DIL</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form>
        <div class="row">
          <div class="col-sm-4">
            <!-- text input -->
            <div class="form-group">
              <label>No Sambungan</label>
              <input type="integer" class="form-control" name="id" value="{{ $data->id }}">
            </div>
          </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>cabang</label>
                          <input type="text" class="form-control" name="cabang" value="{{ $data->cabang }}">
                          @error('cabang')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
            </div>
        
          <div class="col-sm-4">
            <div class="form-group">
              <label>status</label>
              <option  class="form-control" name="status"  value="{{ $data->status }}" disabled>Aktip</option>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <!-- textarea -->
            <div class="form-group">
              <label>No Rekening</label>
              <input type="integer" name="no_rekening" class="form-control" value="{{ $data->no_rekening }}" >
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Nama Sekarang</label>
              <input type="text" class="form-control" name="nama_sekarang"value="{{ $data->nama_sekarang }}">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Nama Pemilik</label>
              <input type="text" class="form-control" name="nama_pemilik" value="{{ $data->nama_pemilik }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8">
            <!-- textarea -->
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat" value="{{ $data->alamat }}">
              @error('alamat')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-sm-4">
            <!-- textarea -->
            <div class="form-group">
              <label>Angka</label>
              <input type="text" class="form-control" name="angka" value="{{ $data->angka }}">
              @error('angka')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <div>Status Milik</div>
              <div class="form-group">
                <div class="form-check">
                <label class="form-check-label"><input class="form-check-input" type="checkbox" name="status_milik" id="status_milik" value="sewa" {{  ($data->status_milik == 'sewa' ? ' checked' : '') }}>Sewa</label>
                <div></div>
                <label class="form-check-label"><input class="form-check-input" type="checkbox" name="status_milik" id="status_milik" value="Hak Milik" {{  ($data->status_milik == 'Hak Milik' ? ' checked' : '') }}>Hak Milik</label>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div>Usaha</div>
            <div class="form-group">
              <div class="form-check">
              <label class="form-check-label"><input class="form-check-input" type="checkbox" name="usaha" id="usaha" value="1" {{  ($data->usaha == '1' ? ' checked' : '') }}>ada</label>
              <div></div>
              <label class="form-check-label"><input class="form-check-input" type="checkbox" name="usaha" id="usaha" value="2" {{  ($data->usaha == '2' ? ' checked' : '') }}>Tidak Ada</label>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div>Konsisi WM</div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label"><input class="form-check-input" type="checkbox" name="kondidi_wm" id="kondidi_wm" value="1" {{  ($data->kondidi_wm == '1' ? ' checked' : '') }}>Baik</label>
              <div></div>
             <label class="form-check-label"><input class="form-check-input" type="checkbox" name="kondidi_wm" id="kondidi_wm" value="2" {{  ($data->kondidi_wm == '2' ? ' checked' : '') }}>Rusak</label>
             <div></div>
             <label class="form-check-label"><input class="form-check-input" type="checkbox" name="kondidi_wm" id="kondidi_wm" value="3" {{  ($data->kondidi_wm == '3' ? ' checked' : '') }}>Buram</label>
             <div></div>
             <label class="form-check-label"><input class="form-check-input" type="checkbox" name="kondidi_wm" id="kondidi_wm" value="4" {{  ($data->kondidi_wm == '4' ? ' checked' : '') }}>Hilang</label>
            </div>
          </div>
        </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Jml Jiwa Tetap</label>
              <input type="integer" class="form-control" name="jml_jiwa_tetap" value="{{ $data->jml_jiwa_tetap }}">
            </div>
          </div>

          <div class="col-sm-2">
            <div class="form-group">
              <label>Jml Jiwa Tidak teteap</label>
              <input type="integer" class="form-control" name="jml_jiwa_tidak_tetap" value="{{ $data->jml_jiwa_tidak_tetap }}">
            </div>
          </div>
        </div>
      <div class="row">
        <div class="col-md-2">
          <div>segel</div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label"><input class="form-check-input" type="checkbox" name="segel" id="segel" value="ada" {{  ($data->segel == 'ada' ? ' checked' : '') }}>ada</label>
              <div></div>
             <label class="form-check-label"><input class="form-check-input" type="checkbox" name="segel" id="segel" value="tidak ada" {{  ($data->segel == 'tidak ada' ? ' checked' : '') }}>tidak ada</label>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div>stop kran</div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label"><input class="form-check-input" type="checkbox" name="stop_kran" id="stop_kran" value="ada" {{  ($data->stop_kran == 'ada' ? ' checked' : '') }}>ada</label>
              <div></div>
             <label class="form-check-label"><input class="form-check-input" type="checkbox" name="stop_kran" id="stop_kran" value="tidak ada" {{  ($data->stop_kran == 'tidak ada' ? ' checked' : '') }}>tidak ada</label>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div>ceck valve</div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label"><input class="form-check-input" type="checkbox" name="ceck_valve" id="ceck_valve" value="ada" {{  ($data->ceck_valve == 'ada' ? ' checked' : '') }}>ada</label>
              <div></div>
             <label class="form-check-label"><input class="form-check-input" type="checkbox" name="ceck_valve" id="ceck_valve" value="tidak ada" {{  ($data->ceck_valve == 'tidak ada' ? ' checked' : '') }}>tidak ada</label>
            </div>
          </div>
        </div>
        
        <div class="col-md-2">
          <div>kopling</div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label"><input class="form-check-input" type="checkbox" name="kopling" id="kopling" value="ada" {{  ($data->kopling == 'ada' ? ' checked' : '') }}>ada</label>
              <div></div>
             <label class="form-check-label"><input class="form-check-input" type="checkbox" name="kopling" id="kopling" value="tidak ada" {{  ($data->kopling == 'tidak ada' ? ' checked' : '') }}>tidak ada</label>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div>plug</div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label"> <input class="form-check-input" name="plugran" value="ada" type="checkbox" {{  ($data->plugran == 'ada' ? ' checked' : '') }}>ada</label>
              <div></div>
              <label class="form-check-label"> <input class="form-check-input" name="plugran" value="tidak ada" type="checkbox" {{  ($data->plugran == 'tidak ada' ? ' checked' : '') }}>tidak ada</label>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div>box</div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label"><input class="form-check-input" type="checkbox" name="box" id="box" value="ada" {{  ($data->box == 'ada' ? ' checked' : '') }}>ada</label>
               <div></div>
              <label class="form-check-label"><input class="form-check-input" type="checkbox" name="box" id="box" value="tidak ada" {{  ($data->box == 'tidak ada' ? ' checked' : '') }}>tidak ada</label>
            </div>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Sumber Lain</label>
              <input type="text" name="sumber_lain" class="form-control" value="{{ $data->sumber_lain}}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Jenis Usaha</label>
                <input type="text" name="jenis_usaha" class="form-control" value="{{ $data->jenis_usaha }}">
              </div>
          </div>
        </div>
      
        <div class="row">
          <div class="col-sm-4">
            <!-- Select multiple-->
            <div class="form-group">
              <label>Merek Warter Meter</label>
              <select name="id_merek" class="form-control">
                <option value="">--- Merek ---</option>
                @foreach($mer as $item)
                    <option value="{{ $item->id }}" @if (old('id_merek') == "{{ $item->id }}") {{ 'selected' }} @endif>{{ $item->merek }}</option>
                @endforeach  
                @error('id_merek')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror  
              </select>
              </div>
            </div>
          <div class="col-sm-4">
            <!-- Select multiple-->
            <div class="form-group">
            <label>Golongan Tarip</label>
            <select name="id_golongan" class="form-control">
              <option value="">--- Golongan ---</option>
              @foreach($gol as $item)
                  <option value="{{ $item->id }}" @if (old('id_golongan') == "{{ $item->id }}") {{ 'selected' }} @endif>{{ $item->nama_golongan }}</option>
              @endforeach  
              @error('id_golongan')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror  
            </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>No Seri</label>
              <input type="no_seri" class="form-control" name="no_seri" value="{{ $data->no_seri }}">
                @error('no_seri')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <!-- checkbox -->
            <div class="form-group">
              <div class="form-input">
                <label>Tanggal Pasang</label>
                <input type="date" class="form-control" name="tanggal_pasang" value="{{ $data->tanggal_pasang }}">
              </div>
            </div>
          </div>
    
          <div class="col-md-6">
            <!-- checkbox -->
            <div class="form-group">
              <div class="form-input">
               <label>Tanggal Pasang</label>
               <label>Tanggal File</label>
               <input type="date" class="form-control" name="tanggal_file" value="{{ $data->tanggal_file }}">
             </div>
            </div>
          </div>
     
        <div class="form-group">
          <button class="btn btn-primary">simpan</button>
         </div> 
      </div>
    </div>
  </div>
<form>
@endsection