@extends('templates.v_template')
@section('title','edit_Dil')
@section('content')
 <!-- Horizontal Form -->
 <div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Horizontal Form</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="/penutupan/insert" method="post" enctype="multipart/form-data">
    @csrf
      <!-- /.card-header -->
        <div class="form-group">
            <h6 for="id_dil" class="col-sm-8 col-form-label">masukkan No Sambungan</h6>
            <div class="col-sm-12">
              <input 
              type="integer" 
              name="id_dil" 
              class="form-control">
            </div>
          </div> 
          <div>
          {{-- </div> --}}
          <div class="form-group">
            <h6 for="tanggal_tutup" class="col-sm-8 col-form-label">tanggal ditutup</h6>
            <div class="col-sm-12">
              <input
              type="date" 
               required name="tanggal_tutup" 
              class="form-control">
            </div>
          </div> 
          <div class="form-group">
            <h6 for="alasan" class="col-sm-8 col-form-label">Keterangan</h6>
            <div class="col-sm-12">
              <p><textarea name="alasan"></textarea>
            </div>
          </div> 
              </select>
                @error('alasan')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
          <div class="form-group">
            <button class="btn btn-primary btn btn-sm">simpan</button>
           </div> 
        </div>
  <form>
</div>
<!-- /.card -->

</div>

@endsection
