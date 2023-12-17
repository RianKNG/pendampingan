
@extends('templates.v_template')
@section('title',)

{{-- {{ bulankita('2021-02-02') }} --}}
 <h6><span> <i><b>Dashboard</b></i></span></h6>

@endsection
    @php
      $tanggal = date('Y m d');
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

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                Sewa {{ $tahun }}
                <div class="card-tools">
                  <div class="card-tools">
                    <a href="/test"><span class ="fa fa-arrow-left">Kembali</span></a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
          
                    <div class="row">
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title"></h5>
                          <table class="table table-bordered">
                            <thead class = "btn btn-danger">
                              <tr>
                                <th width="500px">Cabang</th>
                              
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($segel as $index => $k)
                                <tr>
                                <td>{{ duka($k) }}</td> 
                            </tr>
                                @endforeach
                              
                            </tbody>
                          </table>
                      
                        </div>
                      </div>
                    </div>
                 
                    
                        <div class="col-md-6">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title"></h5>
                            <table class="table table-bordered">
                              <thead class = "btn btn-danger">
                                <tr>
                                  <th style="width: 500px">Jumlah</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($segel1 as $index => $k)
                                  <tr>
                                  <td>{{ $k }}</td> 
                              </tr>
                                  @endforeach
                                
                              </tbody>
                            </table>
                        
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          
@endsection


