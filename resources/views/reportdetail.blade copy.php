<!DOCTYPE html>
<html>
<head>
	<title>Laporan DIL</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  @php
      $tanggal = date('Y-m-d');
      $newDateFormat = \Carbon\Carbon::createFromFormat('Y-m-d', $tanggal)->format('d F Y');
    @endphp
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>LAPORAN DIL HUMAS VDPR</h4>
		<h6>{{  $newDateFormat }}</h5>
	</center>
 
	<table class='table table-bordered'>

      <tr>
        <th>No</th>
        <th>Status</label></th>
        <th>No Sambungan</th>  
        <th>Nama</th>
        {{-- <th>nama_sekarang</th> --}}
        {{-- <th>nama_pemilik</th> --}}
        {{-- <th>no_rumah</th> --}}
        <th>rt</th>
        <th>rw</th>
        <th>blok</th>
        <th>kecamatan</th>
        {{-- <th>jml_jiwa_tetap</th> --}}
        <th> merek</th>
        <th>segel</th>
        <th>stop_kran</th>
        <th>ceck_valve</th>
        <th>kopling</th>
        <th>plugran</th>
        <th>box</th>
        <th>sumber_lain</th>
        <th>J.Tetap</th>
        <th>J.T.tetap</th>
        
        {{-- <th>jml_jiwa_tidak_tetap</th> --}}
        {{-- <th>dusun</th>
        <th>kecamatan</th>
        <th>status_milik</th>
        <th>jml_jiwa_tetap</th>
        <th>jml_jiwa_tidak_tetap</th>
        <th>tanggal_pasang</th>
        <th> merek</th>
        <th>segel</th>
        <th>stop_kran</th>
        <th>ceck_valve</th>
        <th>kopling</th>
        <th>plugran</th>
        <th>box</th>
        <th>bln_billing</th>
        <th>thn_billing</th>
        <th>sumber_lain</th>
        <th>jenis_usaha</th>
        
        <th>timestamp</th> --}}
      </tr>
     
     @foreach ($data as $index => $k)
    <tr >  
    </td>
    <td>{{ $loop->iteration }}</td>
    {{-- <td><label class=" btn {{ ($k->status == 1 ) ? 'btn-success btn-xs' : 'btn-danger btn-xs'}}">{{ ($k->status == 1 ) ? 'Aktip' : 'Non Aktip' }}</label></td> --}}
    <td>{{ $k->id }}</td>  
    <td>{{ $k->nama_sekarang }}</td>
    {{-- <td>{{ $k->no_rumah }}</td> --}}
    <td>{{ $k->rt }}</td>
    <td>{{ $k->rw }}</td>
    <td>{{ $k->dusun }}</td>
    <td>{{ $k->kecamatan}}</td>
    {{-- <td>{{ $k->jml_jiwa_tetap }}</td> --}}
    {{-- <td><label class=" btn {{ ($k->merek == NULL ) ? 'btn-warning btn-xs' : ''}}"></label></td> --}}
    <td>{{ $k->segel }}</td>
    <td>{{ $k->stop_kran }}</td>
    <td>{{ $k->ceck_valve }}</td>
    <td>{{ $k->kopling}}</td>
    <td>{{ $k->plugran }}</td>
    <td>{{ $k->box }}</td>
    <td>{{ $k->sumber_lain}}</td>
    <td>{{ $k->jml_jiwa_tetap }}</td>
    <td>{{ $k->jml_jiwa_tidak_tetap}}</td>
    
   

    {{-- <td>{{ $k->nama_pemilik }}</td> --}}
    {{-- <td>{{ $k->no_rumah }}</td> --}}
    {{-- <td>{{ $k->rt }}</td>
    <td>{{ $k->rw }}</td>
    <td>{{ $k->blok }}</td>
    <td>{{ $k->dusun }}</td> --}}
    {{-- <td>{{ $k->no_rekening }}</td>
    <td>{{ $k->nama_sekarang }}</td>
    <td>{{ $k->nama_pemilik }}</td>
    <td>{{ $k->no_rumah }}</td>
    <td>{{ $k->rt }}</td>
    <td>{{ $k->rw }}</td>
    <td>{{ $k->blok }}</td>
    <td>{{ $k->dusun }}</td>
    <td>{{ $k->kecamatan}}</td>
    <td>{{ $k->status_milik }}</td>
    <td>{{ $k->jml_jiwa_tetap }}</td>
    <td>{{ $k->jml_jiwa_tidak_tetap}}</td>
    <td>{{ $k->tanggal_pasang }}</td>
    <td> {{ $k->merek}}</td>
    <td>{{ $k->segel }}</td>
    <td>{{ $k->stop_kran }}</td>
    <td>{{ $k->ceck_valve }}</td>
    <td>{{ $k->kopling}}</td>
    <td>{{ $k->plugran }}</td>
    <td>{{ $k->box }}</td>
    <td>{{ $k->bln_billing }}</td>
    <td>{{ $k->thn_billing }}</td>
    <td>{{ $k->sumber_lain}}</td>
    <td>{{ $k->jenis_usaha }}</td> --}}
    
    {{-- <td>{{ $k->timestamp}}</td> --}}
    
    </tr>  
        
    @endforeach
    
    </table>
 
</body>
</html>