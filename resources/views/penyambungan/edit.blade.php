
@extends('templates.v_template')
@section('title','Penyambungan Dil')
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-primary" role="alert">
  {{ $message }}
</div>
@endif
 <!-- Horizontal Form -->
 <div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Edit Penyambungan</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="/penyambungan/update/{{ $data->id }}" method="post" enctype="multipart/form-data" class="form-horizontal">
    @csrf
              <!-- /.card-header -->
                <div class="form-group">
                    {{-- <label for="id" class="col-sm-8 col-form-label">id_dil</label> --}}
                    <h6 for="id_dil" class="col-sm-8 col-form-label">no sambungan</h6>
                    <div class="col-sm-12">
                      <input 
                      type="integer" 
                      name="id_dil" 
                      value={{ $data->id_dil }}
                      class="form-control">
                    </div>
                  </div> 
                  <div>
                  </div>
                  <div class="form-group">
                    <h6 for="tanggal_sambung" class="col-sm-8 col-form-label">tanggal_sambung</h6>
                    <div class="col-sm-12">
                      <input
                      type="date" 
                      name="tanggal_sambung" 
                      value={{ $data->tanggal_sambung }}
                      class="form-control">
                    </div>
                  </div> 
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>alasan</label>
                      <select name="alasan" type="text" class="form-control btn-xs">
                        <option selected>alasan ditutup</option>
                        <option value="butuh" @if($data->alasan == "butuh") selected @endif>Butuh</option>
                        <option value="sudah ada uang" @if($data->alasan == "sudah ada uang") selected @endif>sudah ada uang</option>
                      </select>
                        @error('alasan')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                 
                  <div class="form-group">
                    <button class="btn btn-primary btn-small">simpan</button>
                   </div> 
                </div>
          <form>
  </form>
</div>
<!-- /.card -->

</div>

@endsection