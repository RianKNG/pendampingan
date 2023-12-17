
@extends('templates.v_template')
@section('title','Penggantian Dil')
@section('content')
<div class="col-md-6">
  <div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">Kebutuhan Data</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <a href="/exportganti" class="btn btn-info">Export Penggantian</a>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#import">
        Import Penggantian
    </button>
    </div>
  </div>
</div>
<!-- modal -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
         
        <form action="/importganti" method="POST" enctype="multipart/form-data">
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
<div class="container-fluid">
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tabel Penggantian</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            {{-- <input type="search" name="search" class="form-control float-right" placeholder="search"> --}}
            <form action="/penggantian" method="GET">
              <input type="search" class="form-control" name="search" placeholder="Cari ">
            </form>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px;">
        <table id="table" class="table table-head-fixed text-nowrap btn-xs">
          <thead>
            <tr>
              <th width="5%">No.</th>
              <th>No Sambungan</th>
              <th>cabang</th>
              <th>Tanggal_ganti</th>
              <th>merek Baru</th>
              <th>no WM Baru</th>
              
              <th width="20%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $index => $k)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $k->id_dil }}</td>
                <td>{{ duka($k->cabang) }}</td>
                <td>{{ $k->tanggal_ganti }}</td>
                <td>{{ mrk($k->id_merek) }}</td>
                <td>{{ $k->no_wmbaru }}</td>

                <td>
                  {{-- <a href="penutupan/hapus/{{ $k->id }}" class="btn btn-primary btn-xs">Delete</a> --}}
                  
                  <a href="penggantian/edit/{{ $k->id }}" class="btn btn-success btn-xs">Edit</a>
                  <a href="penggantian/hapus/{{ $k->id }}" 
                    class="btn btn-danger btn-xs" 
                    data-toggle="modal" 
                    data-target="#delete{{ $k->id }}">
                    Delete
                  </a>
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
        
        @foreach ($data as $index => $k)
        <div class="modal fade" id="delete{{ $k->id }}">
          <div class="modal-dialog">
            <div class="modal-content bg-danger">
              <div class="modal-header">
                <h4 class="modal-title">{{ $k->no_wmbaru }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin ingin hapus data ini?&hellip;{{ $k->no_wmbaru }}</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                <a href="penggantian/hapus/{{ $k->id }}" class="btn btn-outline-light">Hapus</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        @endforeach
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
     <div class="col-md-4">
        <!-- Form Element sizes -->
        <div class="card card-warning">
          <div class="card-header btn-xs">
            <h6 class="card-title"><span class="btn btn-small">Form Penggantian</span></h6>
            
          </div>
          <div class="card-body">
            <form action="/penggantian/insert" method="post" enctype="multipart/form-data">
              @csrf
                <!-- /.card-header -->
                  <div class="form-group">
                      <h6 for="id_dil" class="col-sm-8 col-form-label">No Sambungan terdaftar</h6>
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
                      <h6 for="tanggal_ganti" class="col-sm-8 col-form-label">tanggal ganti</h6>
                      <div class="col-sm-12">
                        <input
                        type="date" 
                        name="tanggal_ganti" 
                        class="form-control">
                      </div>
                    </div> 

                      <div class="form-group">
                        <div class="col-sm-12">
                        <label>Merek Warter Meter</label>
                        <select name="id_merek" class="form-control">
                          <option value="">--- Merek ---</option>
                          @foreach($mer as $item)
                              <option value="{{ $item->id }}">{{ $item->merek }}</option>
                          @endforeach    
                        </select>
                      </div>
                    
                    </div> 
                    <div class="form-group">
                      <h6 for="no_wmbaru" class="col-sm-8 col-form-label">Nomor seri Baru</h6>
                      <div class="col-sm-12">
                        <input 
                        type="text" 
                        name="no_wmbaru" 
                        class="form-control">
                      </div>
                    </div> 
                    <div>
                  <div>
                    <div class="form-group">
                      <button class="btn btn-primary btn btn-sm">simpan</button>
                     </div> 
                  </div>
            <form>
  </div>
</div>
<!-- /.row -->
</section>
@endsection