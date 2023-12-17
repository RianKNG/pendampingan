
@extends('templates.v_template')
@section('title','Informasi Report Pelanggan')
@section('content')


<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Report Pencarian Pelanggan</h3>
  
          <div class="card-tools">
          

            {{-- <div class="input-group input-group-sm" style="width: 150px;">
              <input type="search" name="search" class="form-control float-right" placeholder="search">
              <form action="/penutupan" method="GET">
                <input type="search" class="form-control" name="search" placeholder="Cari ">
              </form>
            </div> --}}
          </div>
          
        </div>
        
        <!-- /.card-header -->
        <!-- /.filtering data -->
        <div>
         
        <form action="/report/search" method="POST">
          @csrf
          <div class="row filter-row">
           
              <div class="col-sm-6 col-md-3">
                <label>Cabang</label>
                <select name="cabang" class="form-control">
                  <option value="cabang">Semua</option> 
                  <option value="10">Ujungjaya</option>
                  <option value=41>Darmaraja</option>
                  <option value="12">Cisitu</option>
                  <option value="14">Cimanggung</option>
                  <option value="6">Tanjungsari</option>
                  <option value="13">Pamulihan</option>
                  <option value=42>Sumedang Utara</option>
                  <option value="7">Paseh</option>
                  <option value="8">Cimalaka</option>
                  <option value="2">Tanjungkerta</option>
                  <option value="43">Situraja</option>
                  <option value="11">Wado</option>
                  <option value="31">Sumedang Selatan</option>
                  <option value="5">Jatinangor</option>
                  <option value=40>Mol Pelayan Publik</option>
                </select>
              </div>
              <div class="col-sm-6 col-md-3">
                <label>Status</label>
                <select name="status" class="form-control">
                  <option value="">--status--</option> 
                  <option value=1 @if (old('status') == 1) {{ 'selected' }} @endif>Aktip</option>
                  <option value=2 @if (old('status') == 2) {{ 'selected' }} @endif>Non</option>
                </select>
              </div>
              <div class="col-sm-6 col-md-3">
                <label>Status Milik</label>
                <select name="status_milik" class="form-control">
                  <option value="">--status milik--</option> 
                  <option value="sewa" @if (old('status_milik') == "sewa") {{ 'selected' }} @endif>Sewa</option>
                  <option value="Hak Milik" @if (old('status_milik') == "Hak Milik") {{ 'selected' }} @endif>Hak Milik</option>
                </select>
              </div>
              
              <div class="col-sm-6 col-md-3">
                <button type="submit" class="btn btn-outline-success">Cari Bosku</button>
                <a href="/report" class="btn btn-outline-primary">Refresh</a>
              </div>
          </div>
       </form>
      </div>
      <!-- /.end filtering data -->
          <!-- /.card-header -->
          <div class="card-body">
            <table id="table" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <td>No</td>
                <td>No Sambungan</td>
                <td>Cabang</td>
                <td>Status</td>
                <td>No Rekening</td>
                {{-- <td>Tanggal Sambung</td> --}}
                <td>Dusun</td>
                <td>Kecamatan</td>
                <td>Status Milik</td>
                <td>Jml Jiwa</td>
                <td>Check</td>
                <td>Kopling</td>
                <td>Plugran</td>
                <td>Box</td>
                <td>Jenis Usaha</td>
                <td>Test</td>
              
               
                    {{-- <th>Jiwa Tetap</th>
                    <th>Jiwa Tidak Tetap</th>
                    <th>Tanggal Pasang</th>
                    <th>Segel</th>
                    <th>Stop Kran</th> 
                    <th>Ceck Valve</th>
                    <th>Kopling</th>
                    <th>Plug Kran</th>
                    <th>Bulan Billing</th>
                    <th>Tahun Billing</th>
                    <th>Sumber Lain</th>
                    <th>Jenis Usaha</th>
                    <th width="15%">Aksi</th> --}}
                </tr>
              </thead>
          <tbody>
            @foreach ($dil as $index => $k)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $k->id }}</td>
                <td>{{ duka($k->cabang) }}</td>
                <td>{{ sts($k->status) }}</td>
                <td>{{ $k->no_rekening }}</td>
                {{-- <td>{{ $k->tanggal_file }}</td> --}}
                <td>{{ $k->dusun }}</td>
                <td>{{ $k->kecamatan }}</td>
                <td>{{ $k->status_milik }}</td>
                <td>{{ $k->jml_jiwa_tetap }}</td>
                <td>{{ ($k->segel == 'ada') ? 'ada' : 'tidak ada' }}</td>
                <td>{{ ($k->stop_kran == 'ada') ? 'ada' : 'tidak ada' }}</td>
                <td>{{ ($k->ceck_valve == 'ada') ? 'ada' : 'tidak ada' }}</td>
                <td>{{ ($k->plugran == 'ada') ? 'ada' : 'tidak ada' }}</td>
                <td>{{ ($k->box == 'ada') ? 'ada' : 'tidak ada' }}</td>
                <td>{{ $k->jenisusaha }}</td>
    
            </tr> 
         @endforeach
           
          </tbody>
        </table>
        <h3 class="btn btn-warning">Jumlah Data : {{ $count }}</h3>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>
<!-- /.row -->
</section>

@endsection

@push('scripts')
<script>
  $(document).ready(function () {
    $('#table').DataTable({
      "responsive": true,"autoWidth": false,
        lengthMenu: [
            [15, 25, 50,100, -1],
            [15, 25, 50,100,],
        ],
    });
  });
  </script>
@endpush


