
@extends('templates.v_template')
@section('title','Master Dil')
@section('content')
<section class="content btn-xs">
  <div class="container-fluid">
  <div class="card ">
      <div class="card-header text-center btn btn-success">
          <h4>**Cari Pelanggan Detail**</h4>
          
          
           
       
          
          

          <table class="table" class="table table-striped">
            <button type="button" class="btn btn-primary" onclick="window.location.reload()"><span class="col-mt-2 mt-2">Refresh MeSegarkan Halaman</button>
           
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
                      <select data-column="" class="form-control filter-select" onchange="hide_total_value_end()">
                      <option value="">Select First Name</option>
                      {{-- @foreach($first_names as $name)
                      <option value="{{ $name }}">{{ $name }}</option> --}}
                      {{-- <td>{{ duka($k->cabang) }}</td>  --}}
                      
                      {{-- @endforeach --}}
                      <option value="14">Situraja</option>
                      <option value="7">Paseh</option>
                    </td>
                    <td>
                      <select data-column="1" class="form-control filter-select">
                      <option value="">Select segel</option>
                      @foreach($last_names as $segel)
                      <option value="{{ $segel }}">{{ $segel }}</option>
                      @endforeach
                    </td>
                    {{-- <td>
                      <select data-column="3" class="form-control filter-select">
                      <option value="">Select segel</option>
                      @foreach($mer as $segel)
                      <option value="{{ $segel }}">{{ $segel }}</option>
                      @endforeach
                    </td> --}}
                    <td>
                      <select data-column="3" class="form-control filter-select">
                      <option value="">Select segel</option>
                      @foreach($gol as $segel)
                      <option value="{{ $segel }}">{{ $segel }}</option>
                      @endforeach
                    </td>
                  
            </table>

      </div>
     
      <div class="card-body">

            <div class="card-body table-responsive p-0" style="height: 500px;">
          <br>
          
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                  {{-- <th>No</th> --}}
                <th>Cabang</th>
                {{-- <th>No Sambungan</th> --}}
                {{-- <th>Cabang</th> --}}
                <th>Segel</th>
                {{-- <th>Sumber Lain</th>
                <th>Jenis Usaha</th>
                <th>Merek</th> --}}
                <th>Usaha</th>
               
                {{-- <th width="20%">Aksi</th> --}}
              </tr>
            </thead>
            <tbody>
              {{-- @foreach ($customers as $index => $k)
               
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $k->id }}</td>
                  <td>{{ $k->nama_sekarang }}</td>
                  <td>{{ $k->alamat }}</td>
                  <td>{{ $k->sumber_lain }}</td>
                  <td>{{ $k->jenis_usaha }}</td>
                  <td>{{ $k->no_rekening }}</td>
                 
              </tr>
              </tr>  
           @endforeach --}}
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
      {'data': 'cabang'},
      {'data': 'segel'},
      {'data': 'usaha'},
      // { "render": function(data, type, row) { 
      //      var html = ""             
      //       if (row.usaha == 'ada') { 
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


{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script> --}}
{{-- <script type="text/javascript">
  $(document).ready(function(){
  var table = $('.data-table').DataTable({
    'processing':true,
    'serverSide':true,
    'ajax': "{{ url('test/datatable') }}",
    'columns':[
      {'data': 'cabang'},
      {'data': 'segel'},
      // {'data': 'nama_sekarang'},
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
</script> --}}
{{-- @push('scripts')
<script>
  $(document).ready(function () {
    $('#table').DataTable({ info: false, ordering: false, paging: false });
  });
  </script>
@endpush --}}

