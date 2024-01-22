
@extends('templates.v_template')
@section('title',)
@push('style')
<style>
  .table .thead-danger th {
      background-color: hsl(248, 81%, 12%) !important;
  }

  tbody {
      background: rgba(32, 34, 32, 0.15);
  }

  .container {
      padding: 0 !important;
  }
</style>
@endpush

{{-- {{ bulankita('2021-02-02') }} --}}
 <h6><span> <i><b>Dashboard</b></i></span></h6>

@endsection
    @php
      $tanggal = date('Y-m-d');
      $newDateFormat = \Carbon\Carbon::createFromFormat('Y-m-d', $tanggal)->format('d F Y');
      $tahun = date('Y');
      $jam = date("h:i:sa");
    @endphp
    
@section('tabel')

     @php
    if (isset($_server['HTTPS']) && $_SERVER['HTTPS'] ==='on') {
      $url="https://";
    } else {
      $url="http://";
      $url.=$_SERVER['HTTP_HOST'];
      $url.=$_SERVER['REQUEST_URI'];
      $url;
    }
    $page=$url;
    $sec="5";
    @endphp
@endsection
    @section('content')
    {{-- <div class="container"> --}}
        <!-- Info boxes -->
       
        <h6><span> <i><b>Update Konsolidasi D I L Bulan : {{ $newDateFormat }}</b></i></span></h6>
        <div class="row">
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box btn-xs">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-restroom"></i></span>
              
              <div class="info-box-content">
                <span class="info-box-text">Dil Baru</span>
                <span class="info-box-number">
                  {{ $databilling }}
                  <small></small>
                </span>
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-a">
                  Sync Data
                </button>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 btn-xs">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-nurse"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Penutupan</span>
                <span class="info-box-number">{{ $datatutupjumlah }}</span>
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-b">
                  Sync Data
                </button>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 btn-xs">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-plus-square"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Penyambungan</span>
                <span class="info-box-number">{{ $dataz }}</span>
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-c">
                  Sync Data
                </button>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
           <!-- fix for small devices only -->
        
           <div class="clearfix hidden-md-up"></div>
    
           <div class="col-12 col-sm-6 col-md-3">
             <div class="info-box mb-3 btn-xs">
               <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>
     
               <div class="info-box-content">
                 <span class="info-box-text">Penggantian</span>
                 <span class="info-box-number">{{ $datatest }}</span>
                 <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-d">
                  Sync Data
                </button>
               </div>
               <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
           </div>
             <!-- /.col -->
             <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3 btn-xs">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-edit"></i></span>
     
                <div class="info-box-content">
                  <span class="info-box-text">Bbn</span>
                  <span class="info-box-number">{{ $datat }}</span>
                  <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-ecz">
                    Sync Data
                  </button>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            {{-- <div class="clearfix hidden-md-up"></div> --}}
         
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box btn-xs">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-copy"></i></span>
              
              <div class="info-box-content">
                <span class="info-box-text"> Total Pelanggan Aktip</span>
                <span class="info-box-number"></span>
                  <h3 class="btn btn-info"><span>({{ number_format($jumlahdil ,0,",",".") }})</span></h3>
                  {{-- <h3>({{ number_format($rtidakada ,0,",",".") }})<sup style="font-size: 20px"></sup></h3> --}}

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        
         
         
       

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 btn-xs">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-briefcase"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pelanggan Non aktip</span>
                <span class="info-box-number"></span>
                <h3 class="btn btn-info"><span>({{ number_format($jumlahnonaktip ,0,",",".") }})</span></h3>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 btn-xs">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Total DIL</span>
                <span class="info-box-number"></span>
                <h3 class="btn btn-info"><span>({{ number_format($totdilcount ,0,",",".") }})</span></span></h3>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 btn-xs">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Total Jumlah Jiwa Tetap</span>
                <span class="info-box-number"></span>
                <h3 class="btn btn-info"><span><span>({{ number_format($jmlt ,0,",",".") }})</span></span></h3>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 btn-xs">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Total Jumlah Jiwa Tidak Tetap</span>
                <span class="info-box-number"></span>
                <h3 class="btn btn-info"><span><span>({{ number_format($jmltt ,0,",",".") }})</span></span></h3>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3 btn-xs">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Total Sudah Diperbaiki</span>
                <span class="info-box-number"></span>
                <h3 class="btn btn-info"><span><span>({{ number_format($x ,0,",",".") }})</span></span></h3>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                Grafik Update SL Baru||Penutupan||Penyambungan||Penggantian {{ $tahun }}
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                 
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      {{-- <strong>{{ $tanggal }}</strong> --}}
                    </p>

                    <div class="chart">
                      <!-- Sales Chart div -->
                      <div id="container" height="180" style="height: 300px;"></div>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      {{-- <strong>Goal Completion</strong> --}}
                    </p>

                    <div class="chart">
                      <div id="x" height="180" style="height: 300px;"></div>
                    </div>


                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
                 <!-- /.card-header -->

    
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            <!-- /.card -->
    
            <!-- /.row -->
    
            <!-- TABLE: LATEST ORDERS -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
    
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
      {{-- //grafik dil --}}
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              Grafik DIL {{ $tahun }}
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
               
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    {{-- <strong>{{ $tanggal }}</strong> --}}
                  </p>

                  <div class="chart">
                    <!-- Sales Chart div -->
                    <div id="dil" height="400px" style="height: 500px;"></div>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./card-body -->
               <!-- /.card-header -->

  
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <!-- /.card -->
  
          <!-- /.row -->
  
          <!-- TABLE: LATEST ORDERS -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
  
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
    {{-- //grafik dil --}}
 <!-- Main content -->
 <div class="modal fade" id="modal-a">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data Dil Baru {{ $tahun }}</h4>
      </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                    <tr>
                      <th width="5%">No.</th>
                      <th>No Sambungan</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Sumber Lain</th>
                      <th>Jenis Usaha</th>
                      <th>Merek</th>
                      <th>Tanggal File</th>
                      {{-- <th width="20%">Aksi</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($databill as $index => $k)
                   
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->id }}</td>
                        <td>{{ $k->nama_sekarang }}</td>
                        <td>{{ $k->alamat }}</td>
                        <td>{{ $k->sumber_lain }}</td>
                        <td>{{ $k->jenis_usaha }}</td>
                        <td>{{ $k->no_rekening }}</td>
                        <td>{{ $k->tanggal_file }}</td>
                        {{-- <td>{{ $k->merek }}</td> --}}
                    </tr> 
                 @endforeach

                  </tbody>
                </table>
                </tr>
              </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success col sm-12" data-dismiss="modal">kembali</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      
      {{-- Modal-t --}}
      <div class="modal fade" id="modal-b">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Dil Ditutup {{ $tahun }}</h4>
            </div>
            
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover"> 
                  <thead>
                    <tr>
                      <th width="5%">No.</th>
                      <th>No Sambungan</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Sumber Lain</th>
                      <th>Jenis Usaha</th>
                      <th>Merek</th>
                      <th>Tanggal File</th>
                      {{-- <th width="20%">Aksi</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($jumlahtutupmodal as $index => $k)
                   
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->id }}</td>
                        <td>{{ $k->nama_sekarang }}</td>
                        <td>{{ $k->alamat }}</td>
                        <td>{{ $k->sumber_lain }}</td>
                        <td>{{ $k->jenis_usaha }}</td>
                        <td>{{ $k->no_rekening }}</td>
                        <td>{{ $k->tanggal_tutup }}</td>
                        {{-- <td>{{ $k->merek }}</td> --}}
                    </tr> 
                 @endforeach

                  </tbody>
                </table>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success col sm-12" data-dismiss="modal">kembali</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <div class="modal fade" id="modal-c">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Dil Disambung {{ $tahun }}</h4>
            </div>
            
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover"> 
                  <thead>
                    <tr>
                      <th width="5%">No.</th>
                      <th>No Sambungan</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Sumber Lain</th>
                      <th>Jenis Usaha</th>
                      <th>Merek</th>
                      <th>Tanggal File</th>
                      {{-- <th width="20%">Aksi</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($datahitungp as $index => $k)
                   
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->id }}</td>
                        <td>{{ $k->nama_sekarang }}</td>
                        <td>{{ $k->alamat }}</td>
                        <td>{{ $k->sumber_lain }}</td>
                        <td>{{ $k->jenis_usaha }}</td>
                        <td>{{ $k->no_rekening }}</td>
                        <td>{{$k->tanggal_sambung }}</td>
                        {{-- <td>{{ $k->merek }}</td> --}}
                    </tr> 
                 @endforeach

                  </tbody>
                </table>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success col sm-12" data-dismiss="modal">kembali</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <div class="modal fade" id="modal-d">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Dil Ganti {{ $tahun }}</h4>
            </div>
            
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover"> 
                  <thead>
                    <tr>
                      <th width="5%">No.</th>
                      <th>No Sambungan</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Sumber Lain</th>
                      <th>Jenis Usaha</th>
                      <th>Merek</th>
                      <th>Tanggal File</th>
                      {{-- <th width="20%">Aksi</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($datahitunganganti as $index => $k)
                   
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->id_dil }}</td>
                        <td>{{ $k->nama_sekarang }}</td>
                        <td>{{ $k->alamat }}</td>
                        <td>{{ $k->sumber_lain }}</td>
                        <td>{{ $k->jenis_usaha }}</td>
                        <td>{{ $k->no_rekening }}</td>
                        <td>{{ $k->tanggal_ganti }}</td>
                        {{-- <td>{{ $k->merek }}</td> --}}
                    </tr> 
                 @endforeach

                  </tbody>
                </table>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success col sm-12" data-dismiss="modal">kembali</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="modal-ecz">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Dil BBN {{ $tahun }}</h4>
            </div>

            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover"> 
                  <thead>
                    <tr>
                      <th width="5%">No.</th>
                      <th>No Sambungan</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Sumber Lain</th>
                      <th>Jenis Usaha</th>
                      <th>Merek</th>
                      <th>Tanggal File</th>
                      {{-- <th width="20%">Aksi</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($datahitungan as $index => $k)
                   
                    <tr>
                        <td>{{ $k->id }}</td>
                        <td>{{ $k->id_dil }}</td> 
                        <td>{{ $k->nama_sekarang }}</td>
                        <td>{{ sts($k->status) }}</td>
                        <td>{{ $k->sumber_lain }}</td>
                        <td>{{ $k->jenis_usaha }}</td>
                        <td>{{ $k->no_rekening }}</td>
                        <td>{{ $k->tanggal_bbn }}</td>
                     
                    </tr> 
                 @endforeach

                  </tbody>
                </table>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success col sm-12" data-dismiss="modal">kembali</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      
      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/highcharts-3d.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
      <script src="https://code.highcharts.com/modules/export-data.js"></script>
      <script src="https://code.highcharts.com/modules/accessibility.js"></script>
      <script type="text/javascript">
       
       let a =  {!! json_encode($grafik1) !!};
       let b =  {!! json_encode($grafik2) !!};
       let c =  {!! json_encode($grafik3) !!};
       let d =  {!! json_encode($grafik4) !!};
       let e =  {!! json_encode($grafik5) !!};
       let f =  {!! json_encode($grafik6) !!};
       let g =  {!! json_encode($grafik7) !!};
       let h =  {!! json_encode($grafik8) !!};
       let i =  {!! json_encode($grafik9) !!};
       let j =  {!! json_encode($grafik10) !!};
       let k =  {!! json_encode($grafik11) !!};
       let l =  {!! json_encode($grafik12) !!};

       let aa =  {!! json_encode($tutup1) !!};
       let bb =  {!! json_encode($tutup2) !!};
       let cc =  {!! json_encode($tutup3) !!};
       let dd =  {!! json_encode($tutup4) !!};
       let ee =  {!! json_encode($tutup5) !!};
       let ff =  {!! json_encode($tutup6) !!};
       let gg =  {!! json_encode($tutup7) !!};
       let hh =  {!! json_encode($tutup8) !!};
       let ii =  {!! json_encode($tutup9) !!};
       let jj =  {!! json_encode($tutup10) !!};
       let kk =  {!! json_encode($tutup11) !!};
       let ll =  {!! json_encode($tutup12) !!};

       let aaa =  {!! json_encode($sambung1) !!};
       let bbb =  {!! json_encode($sambung2) !!};
       let ccc =  {!! json_encode($sambung3) !!};
       let ddd =  {!! json_encode($sambung4) !!};
       let eee =  {!! json_encode($sambung5) !!};
       let fff =  {!! json_encode($sambung6) !!};
       let ggg =  {!! json_encode($sambung7) !!};
       let hhh =  {!! json_encode($sambung8) !!};
       let iii =  {!! json_encode($sambung9) !!};
       let jjj =  {!! json_encode($sambung10) !!};
       let kkk =  {!! json_encode($sambung11) !!};
       let lll =  {!! json_encode($sambung12) !!};

       let aaaa =  {!! json_encode($ganti1) !!};
       let bbbb =  {!! json_encode($ganti2) !!};
       let cccc =  {!! json_encode($ganti3) !!};
       let dddd =  {!! json_encode($ganti4) !!};
       let eeee =  {!! json_encode($ganti5) !!};
       let ffff =  {!! json_encode($ganti6) !!};
       let gggg =  {!! json_encode($ganti7) !!};
       let hhhh =  {!! json_encode($ganti8) !!};
       let iiii =  {!! json_encode($ganti9) !!};
       let jjjj =  {!! json_encode($ganti10) !!};
       let kkkk =  {!! json_encode($ganti11) !!};
       let llll =  {!! json_encode($ganti12) !!};

       Highcharts.chart('container', {
  chart: {
      type: 'line',
      // options3d: {
      //     enabled: true,
      //     alpha: 45,
      //     beta: 0
      // }
  },
  title: {
      text: 'Pergerakan DIL',
      align: 'center'
  },
      
  
                  subtitle: {
                      text: 'Status Pelanggan',
                      align: 'center'
                  },

                  yAxis: {
                    title: {
                        text: 'Interval'
                    },
                    labels: {
                        formatter: function () {
                            return this.value + '';
                        }
                    }
                },

                    xAxis: {
                      categories: ['Jan', 'Peb', 'Mar', 'Apr', 'Mei', 'Jun',
                          'Jul', 'Agust', 'Sep', 'Okt', 'Nov', 'Des'],
                      accessibility: {
                          description: 'Months of the year'
                      }
                  },

                  legend: {
                      layout: 'vertical',
                      align: 'right',
                      verticalAlign: 'middle'
                  },


                  series: [{
                      name: 'Dil Baru',
                      data: [a,b,c,d,e,f,g,h,i,j,k,l]
                  },{
                    name: 'Penutupan',
                      data: [aa,bb,cc,dd,ee,ff,gg,hh,ii,jj,kk,ll]
                  },{
                    name: 'Penyambungan',
                      data: [aaa,bbb,ccc,ddd,eee,fff,ggg,hhh,iii,jjj,kkk,lll]
                  },{
                    name: 'Penggantian',
                      data: [aaaa,bbbb,cccc,dddd,eeee,ffff,gggg,hhhh,iiii,jjjj,kkkk,llll]
                  }],

                  responsive: {
                      rules: [{
                          condition: {
                              maxWidth: 500
                          },
                          chartOptions: {
                              legend: {
                                  layout: 'horizontal',
                                  align: 'center',
                                  verticalAlign: 'bottom'
                              }
                          }
                      }]
                  }

                  });

                  
             




function showValues() {
    document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
    document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
    document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
}

// Activate the sliders
document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
    chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
    showValues();
    chart.redraw(false);
}));

showValues();

<!-- #END# Bar Chart -->

</script>
<script type="text/javascript">
                let sas = {{ number_format($jumlahdil ,0,",",".") }};//dil aktip
                let xax = {{ number_format($jumlahnonaktip ,0,",",".") }};//Dil non
                // var u = {{ $databilling }};//dilbaru
            
                // var w = {{ $dataz }};//penyambungan
                // var x = {{ $datatest }};//penggantian
                // var y = {{ $datat }};//bbn


                Highcharts.chart('x', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'Status<br>Pelanggan',
        align: 'center',
        verticalAlign: 'middle',
        y: 60
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: 'bold',
                    color: 'white'
                }
            },
            startAngle: -90,
            endAngle: 90,
            center: ['50%', '75%'],
            size: '110%'
        }
    },
    series: [{
        type: 'pie',
        name: 'Status Pelanggan',
        innerSize: '50%',
        data: [
            ['Aktip', sas],
            ['Tidak Aktip', xax],
        ]
    }]
});
</script> 
 

{{-- //untuk Dil Baru --}}
{{-- <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header btn-danger">
              <h5 class="card-title">Rekap DIL {{ $tahun }}</h5>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div> --}}
            <!-- /.card-header -->
 {{-- //untuk Penyambungan --}}
 {{-- <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">RekapDil Baru {{ $tahun }}</h5>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
     
      <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"></h5>
                 
                  <table id="table" class="table table-bordered table-striped">
                    <thead class="thead-danger text-white">
                      <th>No</th>
                       <th>CabangTset</th>
                       <th>Jumlah</th>
                       <th>Tanggal</th>
                    </thead>
                    <tbody>
                      @foreach ($tdatabill as $index => $k)
                          <tr>
                              <td>{{  $loop->iteration }}</td>
                              <td>{{  duka($k->cabang) }}</td>
                              <td>{{ $k->jumlah }}( Konsumen )</td>
                              <td>{{ $k->tanggal_file }}</td>
                          </tr>
                          @endforeach
                          <tr>
                            <tfoot>
                              <tr>
                                  <th colspan="2">Total</th>
                                  <td colspan="2" class="text-center">
                                      {{$tdatabill->sum('jumlah')}} (Konsumen)
                                  </td>
                                  {{-- <td>{{ $sum }}</td> --}}
                                
                              {{-- </tr>
                          </tfoot>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
              </div>
            </div>
              </div> --}} 
                      {{-- <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">SL Baru {{ $tahun }}</h5>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div> --}}
                
                <!-- /.card-header -->
                
                
                {{-- <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title"></h5>
                          <table class="table table-head-fixed text-nowrap btn-xs">
                          <table id="table" class="table table-bordered table-striped">
                            <thead class="thead-danger text-white">
                              <th>No</th>
                               <th>Cabang</th>
                               <th>Jumlah</th>
                               <th>Tanggal</th>
                            </thead>
                            <tbody>
                              @foreach ($tdatabill as $index => $k)

                            <tr>
                                <td>{{  $loop->iteration }}</td>
                                <td>{{  duka($k->cabang) }}</td>
                                <td>{{ $k->jumlah }}( Konsumen )</td>
                                <td>{{ $k->tanggal_file }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div> --}}
                
                  </div>
                </div>
              </div>
            </div>
     
          {{-- //untuk Penutupan --}}
        
          {{-- <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">SL Tutup {{ $tahun }}</h5>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div> --}}
                
                <!-- /.card-header -->
                
                
                {{-- <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title"></h5>
                          <table class="table table-head-fixed text-nowrap btn-xs">
                          <table id="table" class="table table-bordered table-striped">
                            <thead class="thead-danger text-white">
                              <th>No</th>
                               <th>Cabang</th>
                               <th>Jumlah</th>
                               <th>Tanggal</th>
                            </thead>
                            <tbody>
                              @foreach ($jumlahtutup as $index => $k)
                            <tr>
                                <td>{{  $loop->iteration }}</td>
                                <td>{{  duka($k->cabang) }}</td>
                                <td>{{ $k->jumlah }}( Konsumen )</td>
                                <td>{{ $k->tanggal_tutup }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div> --}}
      
        
     
            
                                  {{-- //untuk Penyambungan --}}
                                  {{-- <div class="row">
                                    <div class="col-md-12">
                                      <div class="card">
                                        <div class="card-header">
                                          <h5 class="card-title">Sl Sambung {{ $tahun }}</h5>
                                          <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                              <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                              <i class="fas fa-times"></i>
                                            </button>
                                          </div>
                                        </div> --}}
                                        <!-- /.card-header -->
                                       
                                        {{-- <div class="card-body">
                                            <div class="row">
                                              <div class="col-sm-12">
                                                
                                                <div class="card">
                                                  <div class="card-body">
                                                    <h5 class="card-title"></h5>
                                                   
                                                    <table id="table" class="table table-bordered table-striped">
                                                      <thead class="thead-danger text-white">
                                                        <th>No</th>
                                                         <th>Cabang</th>
                                                         <th>Jumlah</th>
                                                         <th>Tanggal</th>
                                                      </thead>
                                                      <tbody>
                                                        @foreach ($jumlahsambung as $index => $k)
                                                      <tr>
                                                          <td>{{  $loop->iteration }}</td>
                                                          <td>{{  duka($k->cabang) }}</td>
                                                          <td>{{ $k->jumlah }}( Konsumen )</td>
                                                          <td>{{ $k->tanggal_sambung }}</td>
                                                      </tr>
                                                      @endforeach
                                                      </tbody>
                                                    </table>
                                                  </div>
                                                </div>
                                              </div>
                                                </div>
                                              </div>
                                                </div> --}}
                                              
                                        
                            
                                    
                                                  {{-- //untuk Penggantian --}}
                                                  {{-- <div class="row">
                                                    <div class="col-md-12">
                                                      <div class="card">
                                                        <div class="card-header">
                                                          <h5 class="card-title">SL Ganti {{ $tahun }}</h5>
                                                          <div class="card-tools">
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                              <i class="fas fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                              <i class="fas fa-times"></i>
                                                            </button>
                                                          </div>
                                                        </div> --}}
                                                        <!-- /.card-header -->
                                                       
                                                        {{-- <div class="card-body">
                                                            <div class="row">
                                                              <div class="col-sm-12">
                                                                
                                                                <div class="card">
                                                                  <div class="card-body">
                                                                    <h5 class="card-title"></h5>
                                                                   
                                                                    <table id="table" class="table table-bordered table-striped">
                                                                      <thead class="thead-danger text-white">
                                                                        <th>No</th>
                                                                         <th>Cabang</th>
                                                                         <th>Jumlah</th>
                                                                         <th>Tanggal</th>
                                                                      </thead>
                                                                      <tbody>
                                                                        @foreach ($jumlahganti as $index => $k)
                                                                      <tr>
                                                                          <td>{{  $loop->iteration }}</td>
                                                                          <td>{{  duka($k->cabang) }}</td>
                                                                          <td>{{ $k->jumlah }}( Konsumen )</td>
                                                                          <td>{{ $k->tanggal_ganti }}</td>
                                                                      
                                                                      </tr>
                                                                      @endforeach
                                                                      </tbody>
                                                                    </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                               --}}

        
   <script type="text/javascript">
   var dila = {{ $grafikjan }};//dil aktip
   var dilb = {{ $grafikpeb }};//dil aktip
   var dilc = {{ $grafikmar }};//dil aktip
   var dild = {{ $grafikapr }};//dil aktip
   var dile = {{ $grafikmei }};//dil aktip
   var dilf = {{ $grafikjun }};//dil aktip
   var dilg = {{ $grafikjul }};//dil aktip
   var dilh = {{ $grafikags }};//dil aktip
   var dili = {{ $grafiksep }};//dil aktip
   var dilj = {{ $grafikokt }};//dil aktip
   var dilk = {{ $grafiknov }};//dil aktip
   var dill = {{ $grafikdes }};//dil aktip
       Highcharts.chart('dil', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Pergerakan Status DIL'
    },
    subtitle: {
        text: 'Interval: ' +
            'Satu (1) Tahun Dalam Tahun Berjalan'
    },
    xAxis: {
        categories: {!! json_encode($categories) !!},
    },
    yAxis: {
        title: {
            text: 'Jarak Nilai'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Dil Perumdam Sumedang',
        data: {!! json_encode($data) !!},
    }]
});
</script>
                                                                                                           

   
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


