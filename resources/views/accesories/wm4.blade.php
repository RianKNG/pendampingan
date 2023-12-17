
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
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
    <div class="card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">(Data Dil)</h3>
        <div class="card-header">
         
          <div class="card-tools">
            <a href="/test"><span class ="fa fa-arrow-left">Kembali</span></a>
          </div>
        </div>
      <!-- /.card-header -->
      <div class="card-body">
              {{-- <div class="card-body"> --}}
                {{-- {{ $data->links() }} --}}
                  <div class="card-body table-responsive p-0">
                    {{-- @include('pagination_child') --}}
                    <table id="table" class="table table-striped">
                        {{-- <table id="table"> --}}
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Status Sekarang</th>
                        <th>Cabang</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                  
                    
                        @foreach ($querywm as $key)
                        <tr>
                          <td>{{ $loop->iteration }}</td> 
                        <td>{{ duka($key->cabang) }}</td> 
                        <td>{{ $key->kondisi_wm }}</td> 
                    </tr>
                        @endforeach
                     
                  </tbody>
                    
@endsection
  
  
  

