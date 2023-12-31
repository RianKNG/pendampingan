
@extends('templates.v_template')
@section('title','(CARI RINCI DATA DARI PELANGGAN)')
@section('content')
<section class="content table-striped">
  <div class="container-fluid table-striped">
    <div class="card card-warning card-outline">
      <div class="card-header text-center btn btn-info">
        <button type="button" class="btn btn-warning" onclick="window.location.reload()"><span class="col-mt-2 mt-2">Segarkan Halaman</button>
          <a href="/test" class="btn btn-warning"><span class="col-mt-2 mt-2">Kembali KE Halaman Dashboard</a>
         
      </div> 
      <table class="table" class="table table-striped">
          
          {{-- <table class="table" class="table table-striped"> --}}
          
           
                    {{-- <td>
                      <input type="text" class="form-control filter-input"
                          placeholder="Search for firstname....." data-column="0" />
                    </td>
                    <td>
                      <input type="text" class="form-control filter-input"
                          placeholder="Search for lastname....." data-column="1" />
                    </td> --}}
                    {{-- <td>
                      <input type="text" class="form-control filter-input"
                          placeholder="Search for segel....." data-column="2" />
                    </td> --}}
                
                  
                    <td>
                      {{-- <select data-column="1" class="form-control filter-select""> --}}
                          <select id="filter-cabang" class="form-control filter">
                      <option value="">--- Pilih Cabang ---</option>
                      {{-- @foreach($first_names as $name)
                      <option value="{{ $name }}">{{ $name }}</option> --}}
                      {{-- <td>{{ duka($k->cabang) }}</td>  --}}
                      
                      {{-- @endforeach --}}
                      <option value="5">Jatinangor</option>
                      <option value="6">Tanjungsari</option>
                      <option value="13">Pamulihan</option>
                      <option value="9">Tomo</option>
                      <option value="10"> Ujungjaya</option>
                      <option value="3"> Darmaraja</option>
                      <option value="12">Cisitu</option>
                      <option value="14"> Cimanggung</option>
                      <option value="6">Tanjungsari</option>
                      <option value="13"> Pamulihan</option>
                      <option value="1"> Sumedang Utara</option>
                      <option value="7">Paseh</option>
                      <option value="8">Cimalaka</option>
                      <option value="2">Tanjungkerta</option>
                      <option value="4">Situraja</option>
                      <option value="11"> Wado</option>
                      <option value="31"> Sumedang Selatan</option>
                      <option value="5">Jatinangor</option>
                      <option value="40"> Mol Pelayan Publik</option>
                     
                    </td>
                    <td>
                      <select data-column="2" class="form-control filter-select">
                      <option value="">--- Pilih Segel ---</option>
                      <option value= 1 >BAIK</option>
                      <option value= 2 >TIDAK ADA</option>
                      <option value= 3 >RUSAK</option>
           
                    </td>
                    {{-- <td>
                      <select data-column="8" class="form-control filter-select">
                      <option value="">Select ddddsegel</option>
                      @foreach($gol as $segel)
                      <option value="{{ $segel->id }}">{{ $segel->nama_golongan }}</option>
                      @endforeach
                    </td> --}}
                    <td>
                      <select data-column="7" class="form-control filter-select">
                      <option value="">-- Pilih Merek --</option>
                      <option value= 1 >LINFLOW</option>
                      <option value= 2 >KENT</option>
                      <option value= 3 >AQUA</option>
                      <option value= 4 >SAE SEOUL</option>
                      <option value= 5 >B & R</option>
                      <option value= 6 >ASAHI</option>
                      <option value= 7 >BOSCO</option>
                      <option value= 8 >KIMON</option>
                      <option value= 9 >N.B</option>
                      <option value= 10 >I.V.Z</option>
                      <option value= 11 >MAGDALENA</option>
                      <option value= 12 >ITRON</option>
                      <option value= 13 >BARINDO</option>
                      <option value= 14 >BESTINI</option>
                      <option value= 15 >AG</option>
                      <option value= 16 >MR</option>
                      <option value= 17 >AMICO</option>
                      <option value= 18 >ONDA</option>
                      <option value= 19 >HILANG</option>
                      <option value= 20 >MULTIMAH</option>
                      <option value= 21 >S H</option>
                      <option value= 22 >SHINHAN</option>
                      <option value= 23 >CS</option>
                      <option value= 24 >AICHI TOKAI</option>
                      <option value= 25 >AKURAT</option>
                      <option value= 26 >PKM</option>
                      <option value= 27 >AKARIS</option>
                      <option value= 28 >AIR MAS</option>
                      <option value= 29 >LOUIS VIKTOR</option>
                      <option value= 30 >NINGBO</option>
                      <option value= 31 >SCHLUMBERGER</option>
                      <option value= 32 >NULL</option>
                      <option value= 33 >TIDAK TERVERIFIKASI</option>
                      <option value= 222 >KOFONG</option>
                      <option value= 266 >TEST</option>
                     
                    </td>
                    <td>
                      <select data-column="8" class="form-control filter-select">
                      <option value="">-- Pilih Golongan --</option>
                      <option value= 11>Sosial Umum</option>
                      <option value= 12>Sosial Khusus</option>
                      <option value= 21>RMH.TANGGA A</option>
                      <option value= 22>RMH.TANGGA B</option>
                      <option value= 23>PEMERINTAH</option>
                      <option value= 28>RT.C</option>
                      <option value= 29>RT.D</option>
                      <option value= 31>NK KECIL</option>
                      <option value= 32>NK SEDANG</option>
                      <option value= 33>NK BESAR</option>
                      <option value= 41>IND KECIL</option>
                      <option value= 42>IND BESAR</option>
                      <option value= 80>KESEPAKATAN</option>
                    </td>
                   
                  
            </table>
          

     
      <div class="card-body">

            <div class="card-body table-responsive p-0" style="height: 500px;">
          <br>
          
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>No Sambungan</th>
                <th>Cabang</th>
                {{-- <th>No Sambungan</th> --}}
                {{-- <th>Cabang</th> --}}
                <th>Segel</th>
                <th>Usaha</th>
                <th>Sumber Lain</th>
                {{-- <th>Sumber Lain</th>
                <th>Jenis Usaha</th>
                <th>Merek</th> --}}
                <th>KEGIATAN USAHA</th>
                
                <th>Merek</th>
                <th>Golongan</th>
             
               
                {{-- <th width="20%">Aksi</th> --}}
              </tr>
            </thead>
            <tbody>
             
            </tbody>
          </table>
      </div>
  </div>
</div>
</div>
</div>
@endsection
@push('scripts')
<script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
    let cabang =("#filter-cabang").val()
  $(document).ready(function(){
  var table = $('.data-table').DataTable({
    'processing':true,
    'serverSide':true,
    // "orderable": false,
    'ajax': "{{ url('test/datatable') }}",
    'type':"GET",

    'columns':[
      // {'data': 'DT_RowIndex'},
      {'data': 'id'},
      {'data': 'cabang'},
      {'data': 'segel'},
      {'data': 'usaha'},
      {'data': 'sumber_lain'},
      {'data': 'jenis_usaha'},
      {'data': 'id_merek'},
      {'data': 'id_golongan'},
      
      // { 'render': function(data, type, row) { 
      //      var html = ""             
      //       if (row.id_golongan == 29) { 
      //       html = 'Laki-laki' 
      //        } else { 
      //           html = 'Perempuan' 
      //             }              
      //             return html; 
      //                }        
      //                  },
      // {'data': 'usaha'}
    ],
   
   
  });
  $('.filter-input').keyup(function(){
    table.column($(this).data('column'))
    .search($(this).val())
    .draw();
  });

  $('.filter').change(function(){
   cabang = $("#filter-cabang").val()

    console.log([cabang]);
  });

  
 
})
</script>
  </script>
@endpush

{{-- @push('scripts')
<script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
    const table = $('.data-table').DataTable({
      "pageLength": 100,
      "lengthMenu":[[10,25,50,100,-1],[10,25,50,100,'semua']],
      "LengthChange":true,
      "Filter":true,
      "bInfo":true,
      "bProcessing":true,
      "bServerside":true,
      "cache": false,
      ajax:{
        url:"{{ url('test/datatable') }}",
        type:"GET",
      },
      'columns':[
      // {'data': 'DT_RowIndex'},
      {'data': 'id'},
      {'data': 'cabang'},
      {'data': 'segel'},
      {'data': 'usaha'},
      {'data': 'sumber_lain'},
      {'data': 'jenis_usaha'},
      {'data': 'id_merek'},
      {'data': 'id_golongan'},
      
    ],
  });

  $('.filter-input').keyup(function(){
    table.column($(this).data('column'))
    .search($(this).val())
    .draw();
  });

  $('.filter-select').change(function(){
    table.column($(this).data('column'))
    .search( $(this).val())
    .draw();
    console.log('oke');
  });

  
 

    
  </script>
</script>
@endpush --}}

