
@extends('templates.v_template')
@section('title','Master Dil')
@section('content')
{{-- @if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
  {{ $message }},
</div>
@endif

 --}}

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title"> <span class="btn-xs">Tabel Water Meter</span></h6>
             
              <div class="card-tools">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal">
                    <span class = "btn-xs">Edir Golongan (+)</span>
                  </button>
              </div>
            </div>
             
            <div class="modal-body">
                <form action="/golongan/update/{{ $data->id }}" method="post">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label class="btn-xs">No Merek Teregistrasi</label>
                        <input type="text" name="kode" class="form-control" value="{{ $data->kode }}" required>
                      </div>
                      <div class="form-group">
                        <label class="btn-xs">Merek Water Meter</label>
                        <input type="text" name="nama_golongan" value="{{ $data->nama_golongan }}" class="form-control" placeholder="ketikan disini" required">
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>

  
 
 
 {{-- @endforeach --}}
@endsection
{{-- @section('script')
<script>
$(document).ready(function () {
  $('#table').DataTable({
    "responsive": true,"autoWidth": false,
      lengthMenu: [
          [15, 25, 50,100, -1],
          [15, 25, 50,100, 'All'],
      ],
  });
});
</script>
@endsection --}}
