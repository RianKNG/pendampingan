
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
                     <th>Jumlah</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                   
                     <tr>
                    @foreach ($groupCount as $key => $value)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $key }}</td>
                    <td>{{ $value }}</td>
                    {{-- @if ($value == '1204967') 
                        'RMH.TANGGA D';
                    @else 
                    return 'RT. C';

                    @endif --}}

                    <tr>
                @endforeach
               
                        {{-- <tr> --}}
                          {{-- <tfoot>
                            <tr>
                                <th colspan="2">Total</th>
                                <td colspan="2" class="text-center">
                                    {{$tdatabill->sum('jumlah')}} (Konsumen)
                                </td>
                                <td>{{ $sum }}</td>
                              
                            </tr>
                        </tfoot> --}}
                      {{-- </tr> --}}
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
            </div>
          </div>
            </div>
@endsection

{{-- @push('scripts')
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
@endpush --}}

