
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
                      <select data-column="1" class="form-control filter-select"">
                      <option value="">--- Pilih Cabang ---</option>
                      {{-- @foreach($first_names as $name)
                      <option value="{{ $name }}">{{ $name }}</option> --}}
                      {{-- <td>{{ duka($k->cabang) }}</td>  --}}
                      
                      {{-- @endforeach --}}
                      <option value="5">Jatinangor</option>
                      <option value="6">Tanjungsari</option>
                      <option value="13">Pamulihan</option>
                     
                    </td>
                    <td>
                      <select data-column="2" class="form-control filter-select">
                      <option value="">--- Pilih Segel ---</option>
                      @foreach($last_names as $segel)
                      <option value="{{ $segel }}">{{ $segel }}</option>
                      @endforeach
                    </td>
                    {{-- <td>
                      <select data-column="3" class="form-control filter-select">
                      <option value="">Select segel</option>
                      @foreach($mer as $segel)
                      <option value="{{ $segel->id }}">{{ $segel->merek }}</option>
                      @endforeach
                    </td> --}}
                    <td>
                      <select data-column="6" class="form-control filter-select">
                      <option value="">-- Pilih Golongan --</option>
                      <option value= 11 >Sosial Umum</option>
                      <option value= 12 >Sosial Khusus</option>
                      <option value= 21 >RMH.TANGGA A</option>
                      <option value= 22 >RMH.TANGGA B</option>
                      <option value= 23 >PEMERINTAH</option>
                      <option value= 28 >RT.C</option>
                      <option value= 29 >RT.D</option>
                      <option value= 31 >NK KECIL</option>
                      <option value= 32 >NK SEDANG</option>
                      <option value= 33 >NK BESAR</option>
                      <option value= 41 >IND KECIL</option>
                      <option value= 42 >IND BESAR</option>
                      <option value= 80 >KESEPAKATAN</option>
                    </td>
                    <td>
                      <select data-column="7" class="form-control filter-select">
                      <option value="">-- Pilih Merek --</option>
                      <option value= 1 >LIN</option>
                      <option value= 13 >BAR</option>
                      <option value= 14 >BEST</option>
                      <option value= 12 >ITR</option>
                      <option value= 18 >ONDA</option>
                      <option value= 17 >AMICO</option>
                      

                      

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
                <th>Sumber Lain</th>
                <th>Jenis Usaha</th>
                {{-- <th>Sumber Lain</th>
                <th>Jenis Usaha</th>
                <th>Merek</th> --}}
                <th>Usaha</th>
                <th>Golongan</th>
                <th>Merek</th>
               
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
  $(document).ready(function(){
  var table = $('.data-table').DataTable({
    'processing':true,
    'serverSide':true,
    // "orderable": false,
    'ajax': "{{ url('test/datatable') }}",
    'columns':[
      // {'data': 'DT_RowIndex'},
      {'data': 'id'},
      {'data': 'cabang'},
      {'data': 'segel'},
      {'data': 'usaha'},
      {'data': 'sumber_lain'},
      {'data': 'jenis_usaha'},
      {'data': 'id_golongan'},
      {'data': 'id_merek'},
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

  $('.filter-select').change(function(){
    table.column($(this).data('column'))
    .search( $(this).val())
    .draw();
  });

  
 
})
</script>
  </script>
@endpush

