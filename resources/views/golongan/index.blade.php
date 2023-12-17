
@extends('templates.v_template')
@section('title','Master Golongan')
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
              <h6 class="card-title"> <span class="btn-xs">Tabel Jenis Golongan</span></h6>
             
              <div class="card-tools">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal">
                    <span class = "btn-xs">Tambah Golongan (+)</span>
                  </button>
              </div>
            </div>
             
                            <!-- Button trigger modal -->

  
  <!-- Modal -->
            
            <!-- /.card-header -->
      
    
           
            <div class="card-body">
                <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th>Kode WM</th>
                    <th>Merek</th>
                    <th width="25%">Aksi</th>
                    
                  
                  </tr>
                </thead>
                <tbody>
          
                  @foreach ($data as $index => $k)
                  <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td hidden="hidden">{{ $k->id }}</td> 
                    <td>{{ $k->kode }}</td> 
                    <td>{{ $k->nama_golongan }}</td>
                      <td>
                        <a href="golongan/edit/{{ $k->id }}" class="btn btn-warning btn-xs"><i class="fa fa-edit" aria-hidden="true"></i>
                        </a>
                        {{-- <a href="" class="btn btn-warning btn-xs"><i class="fa fa-trush" aria-hidden="true"></i>
                        </a> --}}
                        <a href="golongan/hapus/{{ $k->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i>
                        
                    </td>
                  </tr>
                      
              @endforeach
                
              </tbody>
            
              </table>
              @if ($data->links()->paginator->hasPages())
              <div class="mt-4 p-4 box has-text-centered">
                  {{ $data->links() }}
              </div>
          @endif
              
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="card-outline card-warning">
        <div class="modal-header ">
          {{-- <div class="card"> --}}
       
            
      
          <h5 class="modal-title">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
     
        <div class="modal-body">
            <form action="/golongan/insert" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label class="btn-xs">Id</label>
                    <input type="nuber" name="id" class="form-control" value="{{ $k->id }}">
                    {{-- <input type="text" name="kode" class="form-control" readonly> --}}
                   
                  </div>
                  <div class="form-group">
                    <label class="btn-xs">Kode</label>
                    {{-- <input type="text" name="kode" class="form-control" value="{{ $kode }}" readonly> --}}
                    {{-- <input type="text" name="kode" class="form-control" readonly> --}}
                    <input type="text" name="kode" class="form-control" placeholder="Kode" required">
                  </div>
                  <div class="form-group">
                    <label class="btn-xs">Jenis Golongan</label>
                    <input type="text" name="nama_golongan" class="form-control" placeholder="golongan" required">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
 {{-- *// ini adalah modal denger --}}
 {{-- @foreach ($data as $index => $k)
 <div class="modal fade" id="delete{{ $k->id }}">
    <div class="modal fade" id="#">
   <div class="modal-dialog">
     <div class="modal-content bg-info">
       <div class="modal-header">
         <h4 class="modal-title">nama_golongan_{{ $k->id}}</h4>
         {{-- <h4 class="modal-title">#</h4> --}}

 

@endsection
@section('script')
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
@endsection
