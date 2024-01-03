<!DOCTYPE html>
<html>
<head>
    <title>Laravel Datatables Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container mt-5">
    <h2 class="mb-4">Laravel Yajra Datatables Example</h2>
    <table>
        <tr>
            <td>
                <select name="filter_cabang" id="filter_cabang" data-column="0" class="form-control" required>
                <option value="">--- Pilih Cabang ---</option>
                <option value="05">Jatinangor</option>
                <option value="06">Tanjungsari</option>
                <option value="13">Pamulihan</option>
                <option value="09">Tomo</option>
                <option value="10"> Ujungjaya</option>
                <option value="03"> Darmaraja</option>
                <option value="12">Cisitu</option>
                <option value="14"> Cimanggung</option>
                <option value="06">Tanjungsari</option>
                <option value="13"> Pamulihan</option>
                <option value="01"> Sumedang Utara</option>
                <option value="07">Paseh</option>
                <option value="08">Cimalaka</option>
                <option value="02">Tanjungkerta</option>
                <option value="04">Situraja</option>
                <option value="11"> Wado</option>
                <option value="31"> Sumedang Selatan</option>
                <option value="05">Jatinangor</option>
                <option value="40"> Mol Pelayan Publik</option>
              </td>
              <td>
                <select name="filter_segel" id="filter_segel" data-column="1" class="form-control" required>
                <option value="">--- Kondisi WM ---</option>
                <option value= 1 >BAIK</option>
                <option value= 2 >Rusak</option>
                <option value= 3 >BURAM</option>
                <option value= 4 >HILANG</option>
                <option value= 5 >RUMAH TERKUNCI</option>
              </td>
        </tr>
    </table>
    
    <table id="myTable" class="table table-bordered">
        <thead>
            <tr>
                {{-- <th>No</th> --}}
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Nama Status</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"></script>
<script type="text/javascript">
    $(function () {
          var table = $('#myTable').DataTable({
              processing: true,
              serverSide: true,
              language: {
                      url: "{{ asset('adminLTE/dist/js/bahasa.json') }}",
                  }, 
              ajax: "{{ url('/test/datatable') }}",
              columns: [
                //   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'cabang', name: 'cabang'},
                  {data: 'usaha', name: 'usaha'},
                  {data: 'status', name: 'status'},
              ]
          }); 
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
          
        });
</script>
</html>