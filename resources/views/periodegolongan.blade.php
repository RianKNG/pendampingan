<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
     {{-- <img src="{{ asset('adminLTE/logo.png') }}" alt="" width="200" /> --}}
    {{-- <img src="{{ public_path('dummy.jpg') }}" style="width: 200px; height: 200px"> --}}
    <title>Dil Laporan</title>
    <style>
        body{
            padding: 0;
            margin: 0;
        }
        .page{
            max-width: 80em;
            margin: 0 auto;
        }
        table th,
        table td{
            text-align: left;
        }
        table.layout{
            width: 100%;
            border-collapse: collapse;
        }
        table.display{
            margin: 1em 0;
        }
        table.display th,
        table.display td{
            border: 1px solid #B3BFAA;
            /* padding: .5em 1em; */
            padding: .0em 0em;
        }

        table.display th{ background: #D5E0CC; }
        table.display td{ background: #fff; }
​
        table.responsive-table{
            box-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
        }
        .listcust {
            margin: 0;
            padding: 0;
            list-style: none;
            display:table;
            border-spacing: 10px;
            border-collapse: separate;
            list-style-type: none;
        }

        .customer {
            padding-left: 600px;
        }
        
    </style>
</head>

<body>
    <table class="w-full">
        <tr>
            {{ $title }}
            <td class="w-half">
                <img src="{{ public_path('logo.png')}}" alt="BTDS" width="75" /> 
            </td>
            <td class="w-half">
                <br>
    
                <h2><h6 style="line-height: 0px;">Laporan DIL Tanggal: 
                    @php
                    echo date('d F Y'); 
                    @endphp
                     
                </h6>
                <h4><small style="opacity: 0.5;"> Bagian: V.D.P.R</small></h4>
                </h2>
            </td>
        </tr>
    </table>
    {{-- <div class="header">
        <h3>
            <img src="{{ public_path('logo.png')}}" alt="BTDS" width="100" /> {{ $title }}
            <br>
        
       
        </h3>
        
        
    </div> --}}
    {{-- <div class="customer"> --}}
        {{-- <table>
            
            <tr>
                <th>Jumlah Pelanggan Non Akip</th>
                <td>:</td>
            </tr>
        </table> --}}
      
    {{-- </div> --}}
    <div class="page">
        <p>Jumlah DIL <ins>Berdasarkan Cabang</ins></p>
        <table class="layout display responsive-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Cabang</th>
                    <th>Jumlah</th>
                    {{-- <th>Tanggal</th> --}}
                </tr>
            </thead>
             <tbody>
                @foreach ($data as $index => $k)
                <tr>
                    <td>{{  $loop->iteration }}</td>
                   
                    <td>{{  duka($k->id_cabang) }}</td>
                    <td>{{ $k->jumlah }}(Dil)</td>
                    {{-- <td>{{ $k->tanggal_tutup }}</td> --}}
                </tr>
                @endforeach
            </tbody>
            {{-- @php
            $item=0;
            @endphp --}}
            <tfoot>
                <tr>
                    <th colspan="2">Total</th>
                    <td>
                        {{$data->sum('jumlah')}} Konsumen
                    </td>
                    {{-- <td>{{ $sum }}</td> --}}
                  
                </tr>
            </tfoot>
        </table>
        <p>Jumlah DIL <ins>Berdasarkan Golongan dan Cabang</ins></p>
        <table class="layout display responsive-table">
            <thead>
                <tr>
                    <th>No</th>
                   
                    <th>Kode</th>
                    <th>Golongan</th>
                    <th>Cabang</th>
                    <th>Jumlah</th>
                    {{-- <th>Tanggal</th> --}}
                </tr>
            </thead>

             <tbody>
                @foreach ($datagolongan as $index => $k)
                <tr>
                    <td>{{  $loop->iteration }}</td>
                    <td>{{  $k->kode }}</td>
                  
                    <td>
                        @if ( $k->nama_golongan == 'MASIH PROSES' )
                        <label class="btn btn-danger">{{  $k->nama_golongan }}</label>
                        @else
                        <label>{{  $k->nama_golongan }}</label>  
                        @endif
                    </td>
                    <td>{{  duka($k->id_cabang) }}</td>
                    <td>{{ $k->jumlah }}(Dil)</td>
                </tr>
                @endforeach
            </tbody>
            {{-- @php
            $item=0;
            @endphp --}}
            <tfoot>
                <tr>
                    <th colspan="4">Total</th>
                    <td>
                        {{$datagolongan->sum('jumlah')}} (Dil)
                    </td>
                    {{-- <td>{{ $sum }}</td> --}}
                  
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>