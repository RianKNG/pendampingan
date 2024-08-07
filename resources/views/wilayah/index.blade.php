
@extends('templates.v_template')
{{-- @section('title','(MASTER WILAYAH)') --}}
@section('content')
<div class="loader-div">
    {{-- <img class="loader-img" src="ajax-loader.gif" style="height: 120px;width: auto;" /> --}}
    <img class="loader-img" src="{{ asset('adminLTE/dist/img/load.gif') }}" style="height: 120px;width: auto;">
</div> 
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">(MASTER WILAYAH)</h3>
    </div>
<section class="content table-striped">
    <div class="container-fluid table-striped">
      {{-- <div class="card card-warning card-outline">
        <div class="card-header text-center btn btn-secondary"> --}}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">TambahData</button>
                <form action="{{ url('/importwilayah') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>PILIH FILE</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                        <button type="submit" class="btn btn-success">IMPORT</button>
                    </div>
                </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode</th>
                        <th>Nama Wilayah</th>
                        <th>Cabang</th>
                        <th>Aksi</th>
                        
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
    </div>
</div>
</div>
</div>
 @include('wilayah.add_modal')
 @include('wilayah.edit_modal')
@endsection
@push('wilayah')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    // $('addW').show();
    // $('addButton').show();
    // $('updateW').hide();
    // $('updateButton').hide();
   
    
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    xhrFields:{
                        withCredentials:'true',
                    }
                })
                // -------------------------------------startget all from data--------------------------------------
        function allData(){
            $.ajax({
              type : "GET",
              dataType: "json",
              url: "{{ @url('/wilayah/all') }}",
              beforeSend:function(){
                // $(".loader-div").show(); // show loader
                $(".loader-div").show(); // hide loader
              },
                success:function(response){
                    $(".loader-div").hide(); // show loader
                    var data =""
                    // console.log(data);
                    $.each(response, function(key,value){
                        // data =data
                        // console.log(value.kode);
                        data =data+"<tr>"
                        data =data+"<td>"+value.id+"</td>"
                        data =data+"<td>"+value.kode+"</td>"
                        data =data+"<td>"+value.nama_wilayah+"</td>"
                        data =data+"<td>"+value.cabang+"</td>"
                        data =data+"<td>"
                        data =data+"<button class='btn btn-primary btn-sm-2 mr-2' data-toggle='modal' data-target='#editModal' onclick='editData("+value.id+")'>Edit</button>"
                        data =data+"<button class='btn btn-danger btn-sm-2' onclick='deleteData("+value.id+")'>Delete</button>"
                        data =data+"</td>"
                        data =data+"</tr>"
                    })
                    $('tbody').html(data);
                }
            })
        }
        allData();
 // -------------------------------------endtget all from data--------------------------------------
 // -------------------------------------satart clear from data--------------------------------------
        function clearData(){
            $('#kode').val('');
            $('#nama_wilayah').val('');
            $('#cabang').val('');
            $('#kodeError').text('');
            $('#wilayahError').text('');
            $('#cabang').text('');

        }

// -------------------------------------endt clear from data--------------------------------------
 // -------------------------------------satart add from data--------------------------------------
            function addData(){
                var kode = $('#kode').val();
                var nama_wilayah = $('#nama_wilayah').val();
                var cabang = $('#cabang').val();
                console.log(kode);
                console.log(nama_wilayah);
                console.log(cabang);

                $.ajax({
                    type:"POST",
                    dataType:"json",
                    data:{kode:kode,nama_wilayah:nama_wilayah,cabang:cabang},
                    url:"/wilayah/add",
                    success:function(data){
                        // console.log('Data Berhasil Ditambahkan');
                        clearData();
                        allData();
                        
                        console.log('Data Berhasil Ditambahkan');

                    },
                    error: function(error){
                        $('#kodeError').text('error.responseJSON.errors.kode');
                        $('#nama_wilayahError').text('error.responseJSON.errors.nama_wilayah');
                        $('#cabangError').text('error.responseJSON.errors.cabang');
                        // console.log(error.responseJSON.errors.kode);
                        // console.log(error.responseJSON.errors.nama_wilayah);
                    }
                })
              
            }
       // -------------------------------------end add from data--------------------------------------
        // -------------------------------------satart edit data--------------------------------------
        function editData(id){
            var url = "{{URL::to('/')}}";
            // alert(id);
            $.ajax({
                type:"GET",
                dataType:"json",
                url:url +"/wilayah/edit/"+id,
                success:function(data){
                    $('#id').val(data.id);
                    $('#kodeU').val(data.kode);
                    $('#nama_wilayahU').val(data.nama_wilayah);
                    $('#cabangU').val(data.cabang);
                    console.log(data);
                }
            })
        }
        // -------------------------------------end edit from data--------------------------------------
         // -------------------------------------satart update data--------------------------------------
         function updateData(id){
            var url = "{{URL::to('/')}}";
            // alert(id);
            var id = $('#id').val();
            var kode = $('#kodeU').val();
            var nama_wilayah = $('#nama_wilayahU').val();
            var cabang = $('#cabangU').val();
            $.ajax({
                type:"POST",
                dataType:"json",
                data:{kode:kode,nama_wilayah:nama_wilayah,cabang:cabang},
                url:url +"/wilayah/update/"+id,
                success:function(data){
                    clearData();
                    allData();
                    // $('#id').val(data.id);
                    // $('#kodeU').val(data.kode);
                    // $('#nama_wilayahU').val(data.nama_wilayah);
                    console.log('data berhasil diupdate');
                },
                error: function(error){
                        // $('#kodeErrorU').text('error.responseJSON.errors.kodeU');
                        // $('#nama_wilayahErrorU').text('error.responseJSON.errors.nama_wilayahU');
                        console.log(error.responseJSON.errors.kodeU);
                        console.log(error.responseJSON.errors.nama_wilayahU);
                }
            })
        }
        // -------------------------------------end update from data--------------------------------------
        function deleteData(id){
            $.ajax({
                type:"GET",
                dataType:"json",
                url:"/wilayah/delete/"+id,
                success:function(data){
                    alert('data berhasil dihapus');
                },
                error: function(error){
                        // $('#kodeErrorU').text('error.responseJSON.errors.kodeU');
                        // $('#nama_wilayahErrorU').text('error.responseJSON.errors.nama_wilayahU');
                        // console.log(error.responseJSON.errors.kodeU);
                        // console.log(error.responseJSON.errors.nama_wilayahU);
                        console.log('Gagal');
                }
            })
        }
        

</script>

@endpush