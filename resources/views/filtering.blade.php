
@extends('templates.v_template')
@section('title','(CARI RINCI DATA DARI PELANGGAN)')
@section('content')


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
    <br>`
    <div class="card-body">
      <div class="mx-auto pull-right">
          <div class="">
           <form action="" method="get">
             <div>
               <label for="">Cabang</label>
               <select name="cabang" id="">
                <option value="">--- Pilih Cabang ---</option>
                <option value="01" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] == '01' }}">Sumedang Utara</option>
                <option value="14" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] == '14' }}">Cianggung</option>
                <option value="02" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] == '02' }}">SS</option>
                <option value="12" selected="{{ isset($_GET['cabang']) && $_GET['cabang'] == '12' }}">SCT</option>
               
               </select>
             
            {{-- //  <input type="text" name="cabang" value="{{ isset($_GET['cabang']) ? $_GET['cabang'] : '' }}"> --}}
             <input type="text" name="segel" value="{{ isset($_GET['segel']) ? $_GET['segel'] : '' }}">
             {{-- <input type="text" name="segel" value="{{ isset($_GET['segel']) ? $_GET['segel'] : '' }}"> --}}
             {{-- <select name="keyword" id="segel">
             
               
                  <option value="">--- Pilih Segel ---</option>
                
             </select> --}}
            </div>  
             <button type="submit">Cari</button>
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
                <table id="table" class="table table-striped">
                    {{-- <table id="table"> --}}
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Status Sekarang</th>
                    <th>Cabang</th>
                    <th>No Sambungan</th>
                    <th>Segel</th>
                    <th>Nama Sekarang</th>
                    <th>Nama Pemilik</th>
                    <th>Nama Setelah BBN</th>
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
                    <th>Jenis Usaha</th>
                    {{-- <th>Aktip/Non Aktipkan</th> --}}
                    <th width="15%">Aksi</th>
                    
                  
                  </tr>
                </thead>
                
                <tbody>
                  
                  @foreach ($dil as $index => $k)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    </td>
                    <td><label class=" btn {{ ($k->status == 1 ) ? 'btn-success btn-xs' : 'btn-danger btn-xs'}}">{{ ($k->status == 1 ) ? 'Aktip' : 'Non Aktip' }}</label></td>
                    <td>{{ duka($k->cabang) }}</td>  
                    <td>{{ $k->id }}</td>  
                    <td>{{ $k->segel }}</td>
                    <td class="text-warning">{{ $k->nama_sekarang }}</td>
                    <td>
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
                    </td>
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
                    <td>{{ $k->kondisi_wm }}</td>
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
                     
                  </tr>
                      
            
              @endforeach
              </tbody>
            
              </table>
            
              {{-- {{$data->links("pagination::bootstrap-4")}}

<p>
    Menampilkan {{$data->count()}} of {{ $data->total() }} Dil.
</p>  --}}
  
    </table>
   
  </div>
  @if ($dil->links()->paginator->hasPages())
<div class="mt-4 p-4 box has-text-centered">
    {{ $dil->links() }}
</div>
@endif
</div>

</div>

@endsection