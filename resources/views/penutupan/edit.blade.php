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
  <form action="/penutupan/update/{{ $data->id }}" method="post" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label for="id" class="col-sm-2 col-form-label">ID</label>
        <div class="col-sm-10">
            <input 
            type="text" 
            value="{{ $data->id }}"
            name="id" 
            class="form-control">
          </div>
      </div>
      <div class="form-group row">
        <label for="tanggal_tutup" class="col-sm-2 col-form-label">Tanggal</label>
        <div class="col-sm-10">
            <input 
            type="date" 
            value="{{ $data->tanggal_tutup }}"
            name="tanggal_tutup" 
            class="form-control">
          </div>
      </div>
      <div class="form-group row">
        <label for="alasan" class="col-sm-2 col-form-label">Alasan</label>
        <div class="col-sm-10">
          <input 
          type="text" 
          value="{{ $data->alasan }}"
          name="alasan" 
          class="form-control">
        </div>
      </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-info">Simpan</button>
      <button type="submit" class="btn btn-default float-right">Batal</button>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
<!-- /.card -->

</div>

@endsection
