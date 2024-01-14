
@extends('templates.v_template')
@section('title','Wilayah')
@section('content')
@section('wilayahCss')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

@endsection
<div class="container">


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                  
                        {{-- <td>1</td>
                        <td>SS</td>
                        <td>SS</td>
                       
                        
                        <td><button type="button" value="" class="btn btn-primary btn-sm">Edit</></td>
                        <td><button type="button" value="" class="btn btn-primary btn-sm">Delete</button></td> --}}
                   
                </tbody>
            </table>
    </div>
 

@endsection
@push('wilayah')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
        
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
        function allData(){
            $.ajax({
              type : "GET",
              dataType: "json",
              url: "/wilayah/all",
                success:function(response){
                    var data =""
                    // console.log(data);
                    $.each(response, function(key,value){
                        // data =data
                        // console.log(value.kode);
                        data =data+"<tr>"
                        data =data+"<td>"+value.id+"</td>"
                        data =data+"<td>"+value.kode+"</td>"
                        data =data+"<td>"+value.nama_wilayah+"</td>"
                        data =data+"</tr>"
                    })
                    $('tbody').html(data);
                }
            })
        }
            
            allData();
       

</script>

@endpush