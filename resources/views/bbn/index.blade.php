
@extends('templates.v_template')
@section('title','BBN Dil')
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
      <a href="/exportbbn" class="btn btn-info">Export Bbn</a>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#import">
        Import Bbn
    </button>
    </div>
  </div>
</div>
<!-- modal -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
         
        <form action="/importbbn" method="POST" enctype="multipart/form-data">
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
        <h3 class="card-title">Tabel BBN</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            {{-- <input type="search" name="search" class="form-control float-right" placeholder="search"> --}}
            {{-- <form action="/penggantian" method="GET">
              <input type="search" class="form-control" name="search" placeholder="Cari ">
            </form> --}}
            {{-- <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div> --}}
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="table" class="table table-head-fixed text-nowrap btn-xs">
          <thead>
            <tr>
              <th width="5%">No.</th>
              <th>No Sambungan</th>
              <th>tanggal_bbn</th>
              <th>Nama Lama</th>
              <th>Nama Pemilik</th>
              <th>No Baru</th>
             

              <th width="20%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $index => $k)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $k->id_dil }}</td>
                <td>{{ $k->tanggal_bbn }}</td>
                <td>{{ $k->nama_sekarang }}</td>
                <td>{{ $k->nama_pemilik}}</td>
                <td>{{ $k->nama_baru}}</td>
             

               
                <td>
                  {{-- <a href="penutupan/hapus/{{ $k->id }}" class="btn btn-primary btn-xs">Delete</a> --}}
                  
                  <a href="bbn/edit/{{ $k->id }}" class="btn btn-success btn-xs">Edit</a>
                  <a href="bbn/hapus/{{ $k->id }}" 
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
                <h4 class="modal-title">{{ $k->nama_sekarang }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin ingin hapus data ini?&hellip;{{ $k->nama_sekarang }}</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                <a href="bbn/hapus/{{ $k->id }}" class="btn btn-outline-light">Hapus</a>
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
            <h6 class="card-title"><span class="btn btn-small">Form Balik Nama</span></h6>
            
          </div>
          <div class="card-body">
            <form action="/bbn/store" method="post" enctype="multipart/form-data">
              @csrf
                <!-- /.card-header -->
                  <div class="form-group">
                      <h6 for="id_dil" class="col-sm-8 col-form-label">No Sambungan Terdaftar</h6>
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
                      <h6 for="tanggal_bbn" class="col-sm-8 col-form-label">Tanggal BBN</h6>
                      <div class="col-sm-12">
                        <input
                        type="date" 
                        name="tanggal_bbn" 
                        class="form-control">
                      </div>
                    </div> 
                    <div class="form-group">
                      <h6 for="nama_baru" class="col-sm-8 col-form-label">Nama Baru</h6>
                      <div class="col-sm-12">
                        <input 
                        type="text" 
                        name="nama_baru" 
                        class="form-control">
                      </div>
                    </div> 
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