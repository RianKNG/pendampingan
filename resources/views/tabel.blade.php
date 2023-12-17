
@extends('templates.v_template')
@section('title',)

{{-- {{ bulankita('2021-02-02') }} --}}
 <h6><span> <i><b>Dashboard</b></i></span></h6>

@endsection
    @php
      $tanggal = date('Y m d');
      $tahun = date('M Y');
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
    <div class="container">
        <!-- Info boxes -->
       
        <h6><span> <i><b>Update Konsolidasi D I L Bulan : {{ bulankita($tanggal) }}</b></i></span></h6>
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
                  <h3 class="btn btn-info"><span>{{ $jumlahdil }}</span></h3>

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
                <h3 class="btn btn-info"><span>{{ $jumlahnon }}</span></h3>
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
                <h3 class="btn btn-info"><span>{{ $totdilcount }}</span></h3>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Sekarang : {{ bulankita($tanggal) }}|</h5>
                <a href="#">layanan data pecabang</a>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
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
                  <div class="col-md-6">
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
                        <td>{{ $k->kecamatan }}</td>
                        <td>{{ $k->sumber_lain }}</td>
                        <td>{{ $k->jenisusaha }}</td>
                        <td>{{ $k->no_rekening }}</td>
                        <td>{{ bulankita($k->tanggal_file) }}</td>
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
                    
                    @foreach ($jumlahtutup as $index => $k)
                   
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->id }}</td>
                        <td>{{ $k->nama_sekarang }}</td>
                        <td>{{ $k->kecamatan }}</td>
                        <td>{{ $k->sumber_lain }}</td>
                        <td>{{ $k->jenisusaha }}</td>
                        <td>{{ $k->no_rekening }}</td>
                        <td>{{ bulankita($k->tanggal_tutup) }}</td>
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
                        <td>{{ $k->kecamatan }}</td>
                        <td>{{ $k->sumber_lain }}</td>
                        <td>{{ $k->jenisusaha }}</td>
                        <td>{{ $k->no_rekening }}</td>
                        <td>{{ bulankita($k->tanggal_sambung) }}</td>
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
                        <td>{{ $k->kecamatan }}</td>
                        <td>{{ $k->sumber_lain }}</td>
                        <td>{{ $k->jenisusaha }}</td>
                        <td>{{ $k->no_rekening }}</td>
                        <td>{{ bulankita($k->tanggal_ganti) }}</td>
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
                        <td>{{ $k->status }}</td>
                     
                        <td>{{ bulankita($k->tanggal_bbn) }}</td>
                     
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
       let f =  {!! json_encode($grafik5) !!};
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
       let ff =  {!! json_encode($tutup5) !!};
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
       let fff =  {!! json_encode($sambung5) !!};
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
       let ffff =  {!! json_encode($ganti5) !!};
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
      text: 'Grafk Lingkaran',
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
                      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                          'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
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
        
// const chart = new Highcharts.Chart({
//     chart: {
//         renderTo: 'container',
//         type: 'line',
//         options3d: {
//             enabled: true,
//             alpha: 25,
//             beta: 5,
//             depth: 50,
//             viewDistance: 25
//         }
//     },
//     xAxis: {
//         categories:['Januari','februari','Maret','April','mei','juni','juli','agustus','sep','okt','nov','des'],
//     },
//     yAxis: {
//         title: {
//             enabled: true
//         }
//     },
//     tooltip: {
//         headerFormat: '<b>{point.key}</b><br>',
//         pointFormat: 'Jumlah: {point.y}'
//     },
//     title: {
//         text: 'Grafik 3D DIL',
//         align: 'center'
//     },
//     subtitle: {
//         text: 'Sejatinya ' +
//             'Tukang Ledeng' +
//             'Sejati',
//         align: 'center'
//     },
//     legend: {
//         enabled: false
//     },
//     plotOptions: {
//         column: {
//             depth: 50
//         }
//     },
//     series: [{
//         name: 'Pemasangan Baru',
//         data: [a,b,c,d,e,f,g,h,i,j,k,l],
//         colorByPoint: true
//     },{
//       name: 'Test',
//         data: [a,b,c,d,e,f,g,h,i,j,k,l],
//         colorByPoint: true
//     }],
//     responsive: {
//         rules: [{
//             condition: {
//                 maxWidth: 500
//             },
//             chartOptions: {
//                 legend: {
//                     layout: 'horizontal',
//                     align: 'center',
//                     verticalAlign: 'bottom'
//                 }
//             }
//         }]
//     }

// });


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
                var s = {{ $jumlahdil }};//dil aktip
                var t = {{ $jumlahnon }};//Dil non
                var u = {{ $databilling }};//dilbaru
                var v = {{ $datatutupjumlah }};//penutupan
                var w = {{ $dataz }};//penyambungan
                var x = {{ $datatest }};//penggantian
                var y = {{ $datat }};//bbn


Highcharts.chart('x', {
  chart: {
      type: 'pie',
      options3d: {
          enabled: true,
          alpha: 45,
          beta: 0
      }
  },
  title: {
      text: 'Grafk Lingkaran',
      align: 'center'
  },
  subtitle: {
      text: '{{ $tanggal }}'  +
          '' +
          '',
      align: 'center'
  },
  accessibility: {
      point: {
          valueSuffix: '%'
      }
  },
  tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
      pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          depth: 35,
          dataLabels: {
              enabled: true,
              format: '{point.name}'
          }
      }
  },

  series: [{
      type: 'pie',
      name: 'DIL',
      data: [
          ['Bbn', y],
          // ['Jumlah Dil Non Aktip', t],
          {
              name: 'Dil Baru',
              y: u,
              sliced: true,
              selected: true
          },
          ['Penutupan', v],
          ['Penyambungan', w],
          ['Penggantian', x],
      ]
  }]
});
</script>  


      {{-- <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/modules/series-label.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
      <script src="https://code.highcharts.com/modules/export-data.js"></script>
      <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    
    <script type="text/javascript">
    let a =  {!! json_encode($datas) !!};
    let b =  {!! json_encode($cobacabang) !!};
    let c =  {!! json_encode($coba) !!};
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Batang'
    },
    subtitle: {
        text: 'Sejatinya Tukang Ledeng Sejatirrrr'
    },
    xAxis: {
        // categories: c,
        categories: c,
        crosshair: false
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Penyambungan',
        data: a
    }]
});
</script>
</script> --}}
      {{-- <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/modules/series-label.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
      <script src="https://code.highcharts.com/modules/export-data.js"></script>
      <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    
    <script type="text/javascript">
    let a =  {!! json_encode($datas) !!};
    let b =  {!! json_encode($cobacabang) !!};
    let c =  {!! json_encode($coba) !!};
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Batang'
    },
    subtitle: {
        text: 'Sejatinya Tukang Ledeng Sejatirrrr'
    },
    xAxis: {
        // categories: c,
        categories: c,
        crosshair: false
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Penyambungan',
        data: a
    }]
});
</script> --}}
    {{-- <script type="text/javascript">
    let a =  {!! json_encode($datas) !!};
    let b =  {!! json_encode($datac) !!};
    let c =  {!! json_encode($coba) !!};
    // let d =  {!! json_encode($datad) !!};
    Highcharts.chart('x', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Tahun {{ $tahun }}'
    },
    subtitle: {
        text:
            'Sejatinya tukang ledeng sejati'
    },
    xAxis: {
        categories: c,
        crosshair: true
      
    },
    yAxis: {
        title: {
            text: 'Interval(0.25)'
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
        name: 'Penyambungan',
        data: a
    },{
        name: 'Penggantuann',
        data: b
    }]
});
</script> --}}
   
   
@endsection
