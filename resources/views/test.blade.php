<html>

<head>

    <title> KOP SURAT </title>

    <style type= "text/css">

    body {font-family: arial; background-color : #ccc }

    .rangkasurat {width : 980px;margin:0 auto;background-color : #fff;height: 500px;padding: 20px;}

    table {border-bottom : 5px solid # 000; padding: 2px}

    .tengah {text-align : center;line-height: 5px;}
    .table {
            border-collapse: collapse;
            width: 100%;
        }
 
        table, th {
            padding: 10px;
        }
        th {
            background-color: rgb(19, 110, 170);
            color: white;
        }
        tr:hover {background-color: #f5f5f5;}
     </style >
</head>
<body>
<div class = "rangkasurat">
     <table width = "100%">
           <tr>
                 <td> <img src="{{ asset('adminLTE/dist/img/AdminLTELogo.png') }}" width="100px"> </td>
                 <td class = "tengah">
                       {{-- <h4>PEMERINTAH DAERAH PROVINSI JAWA BARAT</h2> --}}
                       <h3>Laporan DIL</h3>
                       {{-- <h4>Perumda Tirta Medal Sumedang</h4> --}}
                       <h2>PERUMDAM TIRTA MEDAL</h2>
                       <h3>SUMEDANG</h3>
                       <u>Serang, Kec. Cimalaka, Kabupaten Sumedang, Jawa Barat 45353</u>
                 </td>
            </tr>
     </table >
     <br>
     <br>
     

     @php
     $ini = date('Y,M,D')
     @endphp
      Laporan Bulan : {{ $ini }}
      <br>
      <br>

     <div class = "table">
      {{-- <table border="1px" width="100%" cellpadding="5" cellspacing="0">
            <tr width="100px">
                <th rowspan="2">No</th>
                <th colspan="4">DIL</th>
            </tr>
            <tr>
                <th>Penutupan</th>
                <th>Pemyambungan</th>
                <th>Penggantian</th>
                <th>BBn</th>
            </tr>
            @php
            $no = 1;
            @endphp
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $datalaporan }}</td>
                <td>80</td>
                <td>81</td>
                <td>81</td>
            </tr>
        </table> --}}
</div>
</body>
</html>