
@extends('templates.v_template')
@section('title','Master Dil')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
 {{ $message }}
</div>
@endif
{{-- @push('style')
<link rel="stylesheet"
    href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
@endpush --}}
<div class="container-fluid btn-xs">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
<div class="card-outline card-primary">
  <div class="card-header">
    <h3 class="card-title">Data Dil</h3>
    <br>
    <div class="card-body">
      <div class="mx-auto pull-right">
          <div class="">
              <form action="{{ route('dil') }}" method="GET" role="search">

                  <div class="input-group">
                    <span class="input-group-btn mr-2 mt-0">
                      <button class="btn btn-info" type="submit" title="Search projects">
                          <span class="fas fa-search"></span>
                      </button>
                  </span>
                  <input type="text" class="form-control mr-2" name="term" placeholder="Search projects" id="term">
                  <a href="{{ route('dil') }}" class=" mt-0">
                      <span class="input-group-btn">
                          <button class="btn btn-danger" type="button" title="Refresh page">
                              <span class="fas fa-sync-alt"></span>
                          </button>
                      </span>
                      </a>
                  </div>
              </form>
          </div>
      </div>
  </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
          {{-- <div class="card-body"> --}}
            {{-- {{ $data->links() }} --}}
              <div class="card-body table-responsive p-0" style="height: 500px;">
                {{-- @include('pagination_child') --}}
                <table id="table" class="table table-head-fixed text-nowrap">
                    {{-- <table id="table"> --}}
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Status Sekarang</th>
                    <th>Cabang</th>
                    <th>No Sambungan</th>
                    <th>Rek</th>
                    <th>Nama Sekarang</th>
                    {{-- <th>Nama Pemilik</th>
                    <th>Nama Setelah BBN</th> --}}
                    {{-- <th>No Rumah</th>
                    <th>Rt</th>
                    <th>Rw</th>
                    <th>Blok</th>
                    <th>Dusun</th> --}}
                    {{-- <th>Kecamatan</th>  --}}
                    <th>Status Milik</th>
                    {{-- <th>Jiwa Tetap</th> --}}
                    <th>Jiwa Tidak Tetap</th>
                    <th>Angka</th>
                    <th>Kondisi WM</th>
                    <th>Id Merek</th>
                    {{-- <th>####</th> --}}
                    
                    {{-- <th>Stop Kran</th> 
                    <th>Ceck Valve</th>
                    <th>Kopling</th>
                    <th>Plug Kran</th>
                    <th>Bulan Billing</th>
                    <th>Tahun Billing</th> --}}
                    <th>Sumber Lain</th>
                    <th>Keterangan</th>
                    {{-- <th>Aktip/Non Aktipkan</th> --}}
                    <th width="15%">Aksi</th>
                    
                  
                  </tr>
                </thead>
                
                <tbody>
                  {{-- @foreach ($cab as $index => $s)
                  {{ $s->nama_cabang }}
                  @endforeach --}}
                  @foreach ($data as $index => $k)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    </td>
                    <td><label class=" btn {{ ($k->status == 1 ) ? 'btn-success btn-xs' : 'btn-danger btn-xs'}}">{{ ($k->status == 1 ) ? 'Aktip' : 'Non Aktip' }}</label></td>
                    {{-- <td>{{ duka($k->cabang) }}</td>   --}}
                    {{-- <td>{{ $k->id_cabang }}</td>   --}}
                  
                    <td>{{ $k->nama_cabang }}</td> 
                    <td>{{ $k->id }}</td>
                    <td>{{ $k->no_rekening }}</td>
                    <td class="text-warning">{{ $k->nama_sekarang }}</td>
                    {{-- <td>
                      @if(empty($k->nama_pemilik))
                      
                          <p class="text-white">__</p>
                      @else
                          <p class="text-danger">{{ $k->nama_pemilik }}</p>
                      @endif
                    </td>
                    <td>
                      @if(empty($k->nama_baru))
                      
                          <p class="text-success">__</p>
                      @else
                          <p class="text-danger">{{ $k->nama_baru }}</p>
                      @endif
                    </td> --}}
                    {{-- <td>{{ $k->no_rumah }}</td>
                    <td>{{ $k->rt }}</td>
                    <td>{{ $k->rw }}</td>
                    <td>{{ $k->blok }}</td>
                    <td>{{ $k->dusun }}</td> --}}
                    {{-- <td>{{ $k->kecamatan}}</td> --}}
                    <td>{{ $k->status_milik }}</td>
                    {{-- <td>{{ $k->jml_jiwa_tetap }}</td> --}}
                    <td>{{ $k->jml_jiwa_tidak_tetap}}</td>
                    <td>{{ $k->angka }}</td>
                    {{-- <td>{{ $k->kondisi_wm }}</td> --}}
                    {{-- <td>
                      @if($k->kondisi_wm == 1)
                      
                      <p class="btn btn-success btn-xs">{{ kon($k->kondisi_wm) }}</p>
                  @elseif($k->kondisi_wm == 2)
                  <p class="btn btn-danger btn-xs">{{ kon($k->kondisi_wm) }}</p>
                  @elseif($k->kondisi_wm == 3)
                  <p class="btn btn-warning btn-xs">{{ kon($k->kondisi_wm) }}</p>
                  @elseif($k->kondisi_wm == 4)
                  <p class="btn btn-secondary btn-xs">{{ kon($k->kondisi_wm) }}</p>
                  @elseif($k->kondisi_wm == 5)
                  <p class="btn btn-secondary btn-xs">{{ kon($k->kondisi_wm) }}</p>
                  @elseif($k->kondisi_wm == 6)
                  <p class="btn btn-primary btn-xs">{{ kon($k->kondisi_wm) }}</p>
                  @endif
                    </td> --}}
                    
                    <td>
                      @if ($k->kondisi_wm == 1)
                        <a href="{{ url('/dil/rubah/' .$k->id) }}" class=""></a>Baik
                      @elseif($k->kondisi_wm == 2)
                        <a href="{{ url('/dil/rubah/' .$k->id) }}" class="fa fa-check"><span>Rusak</span></a>
                        @elseif($k->kondisi_wm == 3)
                        <a href="{{ url('/dil/rubah/' .$k->id) }}" class="fa fa-check">Buram</a>
                        @elseif($k->kondisi_wm == 4)
                        <a href="{{ url('/dil/rubah/' .$k->id) }}" class="fa fa-check">Hilang</a>

                        @elseif($k->kondisi_wm == 5)
                        <a href="{{ url('/dil/rubah/' .$k->id) }}" class="fa fa-check">Terkubur</a>
                        @elseif($k->kondisi_wm == 6)
                        <a href="{{ url('/dil/rubah/' .$k->id) }}" class=""></a>Terkunci
                      @endif
                    </td>
                   
                    <td> {{ $k->merek}}</td>
                    {{-- <td>{{ $k->segel }}</td> --}}
                    {{-- <td>{{ $k->stop_kran }}</td>
                    <td>{{ $k->ceck_valve }}</td>
                    <td>{{ $k->kopling}}</td>
                    <td>{{ $k->plugran }}</td> --}}
                    {{-- <td>{{ $k->box }}</td> --}}
                    {{-- <td>{{ $k->bln_billing }}</td>
                    <td>{{ $k->thn_billing }}</td> --}}
                    <td>{{ $k->sumber_lain}}</td>
                    <td>

                      @if(empty($k->jenis_usaha))
                      
                      <p class="text-success">__</p>
                  @else
                      <p class="text-danger">{{ $k->jenis_usaha }}</p>
                  @endif
                    
                    </td>
                    
                    
                    {{-- <td>{{ $k->timestamp}}</td> --}}
                  
                    
                      {{-- <td>
                        @if ($k->status == 1)
                          <a href="/dil/status/{{ $k->id }}" class="btn btn-xs btn-danger">Non Aktip.</a>
                        @else
                          <a href="/dil/status/{{ $k->id }}" class="btn btn-xs btn-success">Aktip Kan&nbsp;.</a>
                        @endif
                      </td> --}}
                      <td>
                        <a href="dil/edit/{{ $k->id }}" class="btn btn-warning btn-xs"><i class="fa fa-edit" aria-hidden="true"></i>
                        </a>
                        <a href="dil/detail/{{ $k->id }}" class="btn btn-success btn-xs"><i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                        <a href="dil/hapus/{{ $k->id }}" 
                          class="btn btn-danger btn-xs" 
                          data-toggle="modal" 
                          data-target="#delete{{ $k->id }}">
                          <i class="fa fa-trash" aria-hidden="true"></i>

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
              {{-- {{$data->links("pagination::bootstrap-4")}}

<p>
    Menampilkan {{$data->count()}} of {{ $data->total() }} Dil.
</p>  --}}
    {{-- *// ini adalah modal denger --}}
    @foreach ($data as $index => $k)
    <div class="modal fade" id="delete{{ $k->id }}">
      <div class="modal-dialog">
        <div class="modal-content bg-info">
          <div class="modal-header">
            <h4 class="modal-title">No Sambungan&hellip;{{ $k->id}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah anda yakin ingin hapus Data? {{ $k->nama_sekarang}}</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Batal</button>
            <a href="dil/hapus/{{ $k->id }}" class="btn btn-danger btn-sm">Hapus</a>
          </div>
        </div>
      </div>
    </div>
    
    @endforeach
    </table>
  </div>
</div>
</div>
@endsection
{{-- @push('scripts')
<script>
  $(document).ready(function () {
    $('#table').DataTable({ info: false, ordering: false, paging: false });
  });
  </script>
@endpush --}}

