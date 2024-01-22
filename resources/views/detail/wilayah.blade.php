
@extends('templates.v_template')
@section('title','(CARI RINCI DATA DARI PELANGGAN PER JALAN)')
@section('content')
<section class="content table-striped">
  <div class="container-fluid table-striped">
    <div class="card card-warning card-outline">
      <div class="card-header text-center btn btn-info">
        <button type="button" class="btn btn-warning" onclick="window.location.reload()"><span class="col-mt-2 mt-2">Segarkan Halaman</button>
          <a href="/test" class="btn btn-warning"><span class="col-mt-2 mt-2">Kembali KE Halaman Dashboard</a>
         
      </div> 
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12">
            
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"></h5>
               
                <table id="table" class="table table-bordered table-striped">
                  <thead class="thead-danger text-white">
                    <tr>
                    <th>No</th>
                     <th>Cabang</th>
                     <th>Nama Wilayah</th>
                     <th>Jumlah</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                   
                     <tr>
                    {{-- @foreach ($groupCount as $key => $value) --}}
                    @foreach ($groupCountWil as $ping)
                    <td>{{ $loop->iteration }}</td>
                   
                    <td>{{ $ping->cabang }}</td>
                    <td>{{ $ping->nama_wilayah }}</td>
                    <td>{{ $ping->jumlah }} - Pelanggan</td>


                    <tr>
                @endforeach

                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
            </div>
          </div>
            </div>
@endsection


