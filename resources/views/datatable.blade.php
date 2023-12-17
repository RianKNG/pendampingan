<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->

                </div>
            </div>
        </nav>

        <main class="py-4">
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Daftar User</div>
                        
                        <div class="card-body">
                            <a href="#" class="btn btn-sm btn-success mb-2">Tambah Data</a>
                            <div class="col-md-12">
                              <tr>
                                <td col-md-3>
                                  <select class="form-control" id="filter-a">
                                  <option value="">Select First Name</option>
                                 
                                  <option value="14">Situraja</option>
                                
                                  </select>
                                  <select class="form-control" id="filter-b">
                                    <option value="">Select segel</option>
                                    {{-- @foreach($lain as $seg)
                                    <option value="{{ $seg }}">{{ $seg }}</option>
                                    @endforeach --}}
                                    </select>
                                </td>
                              </tr> 
                            </div>
                            <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
        
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
        </main>
    </div>
  
    <script type="text/javascript">
      $(function () {
        
        const table = $('.data-table').DataTable({
           "pageLength": 100,
      "lengthMenu":[[10,26,60,200,11,-1],[10,25,50,100,'semua']],
      "bLengthChange": true,
      "bFilter": true,
      "bInfo": true,
      "processing": true,
      "bLengthChange": true,
      "bServerSide": true,
            'ajax': "{{ url('test/datatable') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'segel', name: 'segel'},
                {data: 'nama_sekarang', name: 'nama_sekarang'},         
            ]
        });
        
      });
    </script>
      
  </body>
</html>