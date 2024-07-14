{{-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel Datatables Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">
</head>
<body> --}}
    
     {{-- @extends('templates.v_template')
@section('title','(CARI RINCI DATA DARI PELANGGAN)') --}}
{{-- @section('test')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection --}}
@extends('templates.v_template')
@section('title','(CARI RINCI DATA DARI PELANGGAN)')
@section('test')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
<section class="content table-striped">
    <div class="container-fluid table-striped">
      <div class="card card-warning card-outline">
        <div class="card-header text-center btn btn-info">
          <button type="button" class="btn btn-warning" onclick="window.location.reload()"><span class="col-mt-2 mt-2">Segarkan Halaman</button>
            <a href="/test" class="btn btn-warning"><span class="col-mt-2 mt-2">Kembali KE Halaman Dashboard</a>
            </div> 
     
    <table >
        <tr>
            <td>
                <select name="" id="filter_cabang" data-column="2" class="form-control">
                <option value="">--- Pilih Cabang ---</option>
                <option value=1>Jatinangor</option>
                <option value=6>Tanjungsari</option>
                <option value="PAMULIHAN">Pamulihan</option>
                <option value="TOMO">Tomo</option>
                <option value="UJUNGJAYA"> Ujungjaya</option>
                <option value="DARMARAJA"> Darmaraja</option>
                <option value="CISITU">Cisitu</option>
                <option value="CIMANGGUNG"> Cimanggung</option>
                <option value="TANJUNGSARI">Tanjungsari</option>
                <option value="PAMULIHAN"> Pamulihan</option>
                <option value="SUMEDANG UTARA"> Sumedang Utara</option>
                <option value="PASEH">Paseh</option>
                <option value="CIMALAKA">Cimalaka</option>
                <option value="TANJUNGKERTA">Tanjungkerta</option>
                <option value="SITURAJA">Situraja</option>
                <option value="WADO"> Wado</option>
                <option value="SUMEDANG SELATAN"> Sumedang Selatan</option>
                <option value="JATINANGOR">Jatinangor</option>
                <option value="MOL PELAYANAN PUBLIK"> Mol Pelayan Publik</option>
              </td>
              <td>
                <select name="" id="filter_segel" data-column="4" class="form-control">
                <option value="">--- Kondisi SEGEL ---</option>
                <option value="BAIK">BAIK</option>
                <option value="RUSAK">RUSAK</option>
                <option value="BURAM">BURAM</option>
                <option value="HILANG">HILANG</option>
                <option value="NULL">NULL</option>
                {{-- <option value="5">RUMAH TERKUNCI</option> --}}
              </td>
              <td>
                <select name="" id="filter_kondisi_wm" data-column="5" class="form-control">
                <option value="">--- Kondisi WM ---</option>
                <option value= "BAIK">BAIK</option>
                <option value= "RUSAK">RUSAK</option>
                <option value="BURAM">BURAM</option>
                <option value="HILANG">HILANG</option>
              </td>
              <td>
                <select name="" id="filter_usaha" data-column="6" class="form-control">
                <option value="">--- USAHA ---</option>
                <option value= "ADA"> ADA</option>
                <option value= "TIDAK">TIDAK</option>
              </td>
        </tr>
    </table>
    <div class="card-body">
        
     
    <table id="table" class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Cabang</th>
                <th>No Rekening</th>
                <th>Nama Sekarang</th>
                <th>Kondisi Segel</th>
                <th>Kondisi_WM</th>
                <th>Usaha</th>
                {{-- <th>Nama Cabang</th>
                <th>Kondisi Segel</th>
                <th>Kondisi_WM</th>
                <th>Usaha</th>
                <th>Nama</th>
                <th>Alamat</th> --}}
            </tr>
        </thead>
       <tbody>
        
       </tbody>
    </table>
</div>
</body>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
{{-- <script src="https:///cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script> --}}
<script>
    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    xhrFields:{
                        withCredentials:'true',
                    },
                    language: {
                      url: "{{ asset('adminLTE/dist/js/bahasa.json') }}",
                  }, 
                })
               
    $(document).ready(function(){
        var table = $('#table').DataTable({
               ajax:{
                   url: "{{ route('aku') }}",
                   type:'GET',
                   dataType:'json',
                   processing: false,
                   paging: false,
                   searchable: false,
                   serverSide: true,
                   orderable: false,
               },
                    
               columns:[
                // { data: 'DT_Ro
                {data: 'DT_RowIndex',
                        render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                        }
                },
                {
                    data:'z',
                },
               {
                    data:'a',
                },
                {
                    data:'b',
                },
                {
                    data:'c',
                },
                {
                    data:'d',
                },
                {
                    data:'e',
                }
              ]

        })
            $('#filter_cabang').change(function(){
                table.column($(this).data('column'))
                .search( $(this).val())
                .draw();
            }); 

            $('#filter_segel').change(function(){
                table.column($(this).data('column'))
                .search( $(this).val())
                .draw();
            });
            $('#filter_kondisi_wm').change(function(){
                table.column($(this).data('column'))
                .search( $(this).val())
                .draw();
            });
            $('#filter_usaha').change(function(){
                table.column($(this).data('column'))
                .search( $(this).val())
                .draw();
            });      
    })
    // function statusjs(){
       
    //     $.ajax({
    //         url: "{{ route('aku') }}",
    //         type:'GET',
    //         dataType:'json',
           

    //     })
    // }

// $(document).ready(function() {
//     var table = $('#table').DataTable({
//         "processing": true,
//         "serverSide": true,
        
//         "ajax": {
//             "url": "{{ route('aku') }}",
//              "dataSrc" : "",
//             // "type": "GET",
//             // "dataType": "json",
//             // "data": function (d) {
//             //     d.start = d.start || 0;
//             // },
//             // "headers": {
//             //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//             //     // 'Authorization': 'Bearer {{ auth()->user()->api_token }}',
//             // },
//         },
//         "columns": [
        
//             //  { data: 'id', name:'id', render: function (data, type, row, meta) {
//             //     return meta.row + meta.settings._iDisplayStart + 1;
//             //  }},
//             //  {data:'id'},
//             {data: 'id'},
//             // {data: 'nama_sekarang', name: 'd.nama_sekarang'},
//             // { "data": "dbcolumn2" },
//             // { "data": "dbcolumn3" }
//         ]
//     });
// });
    // $('#myTable').dataTable( {
    // paging: false,
    // searching: false,
    //           processing: true,
    //         //   serverSide: true,
    //           dataType: 'jsonp',
              
              
      
    //           language: {
    //                   url: "{{ asset('adminLTE/dist/js/bahasa.json') }}",
    //               }, 
    //           ajax: "{{ route('aku') }}",
    //         //   dataType: 'json',
    //           columns: [
    //             { data: 'id', name:'id', render: function (data, type, row, meta) {
    //               return meta.row + meta.settings._iDisplayStart + 1;
    //           }},
    //             //   { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false },
    //             //  { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false },
    //             // {data: 'id_cabang', name: 'd.id_cabang'},
    //             // {data: 'nama_cabang', name: 'u.nama_cabang'},
    //             //   {data: 'segel', name: 'd.segel'},
    //             //   {data: 'kondisi_wm', name: 'd.kondisi_wm'},
    //             //   {data: 'usaha', name: 'd.usaha'},
    //             //   {data: 'nama_sekarang', name: 'd.nama_sekarang'},
    //             //   {data: 'alamat', name: 'd.alamat'},
    //           ]
    //       }); 
        //   $('#filter_cabang').change(function(){
        //         table.column($(this).data('column'))
        //         .search( $(this).val())
        //         .draw();
        //     }); 
        //     $('#filter_segel').change(function(){
        //         table.column($(this).data('column'))
        //         .search( $(this).val())
        //         .draw();
        //     });
        //     $('#filter_kondisi_wm').change(function(){
        //         table.column($(this).data('column'))
        //         .search( $(this).val())
        //         .draw();
        //     });
        //     $('#filter_usaha').change(function(){
        //         table.column($(this).data('column'))
        //         .search( $(this).val())
        //         .draw();
        //     });                  
          
        // });
</script>
@endpush
