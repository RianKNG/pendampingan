
@extends('templates.v_template')
@section('title','Penutupan Dil')
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
      <a href="/exportsambung" class="btn btn-info">Export Penyambungann</a>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#import">
        Import Penyambungan
    </button>
    </div>
  </div>
</div>
<!-- modal -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
         
        <form action="/importsambung" method="POST" enctype="multipart/form-data">
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
@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
 {{ $message }}
</div>
@endif
<div class="container-fluid">
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tabel Penyambungan</h3>

        <div class="card-tools">
        </div>
      </div>
      <!-- /.card-header -->
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table" class="table table-head-fixed text-nowrap btn-xs">
            <thead>
              <tr>
                  <th width="5%">No.</th>
                  <th>Id Dil</th>
                  <th>nama</th>
                  <th>alasan</th>
                  <th>tanggal_sambung</th>
                  <th>alasan</th>
                  <th width="25%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $index => $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->id_dil }}</td>
                    <td>{{ $k->nama_sekarang }}</td>
                    <td>{{ $k->alasan }}</td>
                    <td>{{ $k->tanggal_sambung }}</td>

                    <td>
                      @if ($k->status == 2)
                    <a href="/dil/statussambung/{{ $k->id_dil }}" class="fa fa-window-close"></a>
                  @else
                    <a href="/dil/statussambung/{{ $k->id_dil }}" class="fa fa-check"></a>
                  @endif
                    </td>
                    <td>
                      {{-- <a href="penutupan/hapus/{{ $k->id }}" class="btn btn-primary btn-xs">Delete</a> --}}
                      
                      <a href="/penyambungan/edit/{{ $k->id }}" class="btn btn-success btn-xs">Edit</a>
                      <a href="penyambungan/hapus/{{ $k->id }}" 
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
                <a href="penyambungan/hapus/{{ $k->id }}" class="btn btn-outline-light">Hapus</a>
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
    <!-- right column -->
    <div class="col-md-4">
      <!-- Form Element sizes -->
      <div class="card card-warning">
        <div class="card-header btn-xs">
          <h6 class="card-title"><span class="btn btn-small">Form Penyambungan</span></h6> 
        </div>
        <div class="card-body">
          <form action="penyambungan/insert" method="post" enctype="multipart/form-data">
            @csrf
              <!-- /.card-header -->
                <div class="form-group">
                    {{-- <label for="id" class="col-sm-8 col-form-label">id_dil</label> --}}
                    <h6 for="id" class="col-sm-8 col-form-label">no sambungan</h6>
                    <div class="col-sm-12">
                      <input 
                      type="integer" 
                      name="id_dil" 
                      class="form-control">
                    </div>
                  </div> 
                  <div>
                  </div>
                  <div class="form-group">
                    <h6 for="tanggal_sambung" class="col-sm-8 col-form-label">tanggal disambung</h6>
                    <div class="col-sm-12">
                      <input
                      type="date" 
                      name="tanggal_sambung" 
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
                  <div class="form-group">
                    <button class="btn btn-primary btn-small">simpan</button>
                   </div> 
                </div>
           <form>
          </div>  
        </div>
      </div>
    </div>
  </div>
</section>
@endsection