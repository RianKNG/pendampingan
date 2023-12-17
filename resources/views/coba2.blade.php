<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice #</title>
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
            padding: .5em 1em;
        }
​
        table.display th{ background: #D5E0CC; }
        table.display td{ background: #fff; }
​
        table.responsive-table{
            box-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
        }
​
        .listcust {
            margin: 0;
            padding: 0;
            list-style: none;
            display:table;
            border-spacing: 10px;
            border-collapse: separate;
            list-style-type: none;
        }
​
        .customer {
            padding-left: 600px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h3>Laporan Data Induk Pelanggan </h3>
        <h4 style="line-height: 0px;">Tanggal: 
            @php
            echo date('d F Y'); 
            @endphp
        </h4>
        <p><small style="opacity: 0.5;"> Bagian: V.D.P.R</small></p>
    </div>
    <div class="customer">
        <table>
            <tr>
                <th class="btn btn-primary">Jumlah DIL</th>
                <td>:</td>
                <td>{{ $diltotal }}</td>
            </tr>
            <tr>
                <th class="btn btn-primary"> Jumlah Pelanggal Aktip</th>
                <td>:</td>
                <td>{{ $totaldilaktip }}</td>
            </tr>
            <tr>
                <th class="btn btn-primary">Jumlah Pelanggan Non Akip</th>
                <td>:</td>
                <td>{{ $totaldilnonaktip }}</td>
            </tr>
        </table>
    </div>
    <div class="page">
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
                 <td> <label class="btn btn-warning">{{  duka($k->cabang) }}</label></td>
                 <td>{{ $k->jumlah }}( Konsumen )</td>
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
                        {{$data->sum('jumlah')}}
                    </td>
                    {{-- <td>{{ $sum }}</td> --}}
                  
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>