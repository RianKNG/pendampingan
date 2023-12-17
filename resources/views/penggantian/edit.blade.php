
@extends('templates.v_template')
@section('title','Penggantian Dil')
@section('content')


@if ($message = Session::get('success'))
<div class="alert alert-primary" role="alert">
  {{ $message }}
</div>
@endif
 <!-- Horizontal Form -->
 <div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Edit Penyambungan</h3>
  </div>
  
  <form action="/penggantian/update/{{ $data->id }}" method="post" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    
      <div class="form-group">
          <h6 for="id_dil" class="col-sm-8 col-form-label">masukkan No Sambungan</h6>
          <div class="col-sm-12">
            <input 
            type="integer" 
            name="id_dil" 
            value="{{ $data->id_dil }}"
            class="form-control">
          </div>
        </div> 
        {{-- </div> --}}
        <div class="form-group">
          <h6 for="tanggal_ganti" class="col-sm-8 col-form-label">tanggal_ganti</h6>
          <div class="col-sm-12">
            <input
            type="date" 
            name="tanggal_ganti" 
            value="{{ $data->tanggal_ganti }}"
            class="form-control">
          </div>
        </div> 

          <div class="form-group">
            <div class="col-sm-12">
            <label>Merek Warter Meter</label>
            <select name="id_merek" class="form-control">
              <option value="">--- Merek ---</option>
              @foreach($mer as $item)
                  <option value="{{ $item->id }}">{{ $item->merek }}</option>
              @endforeach    
            </select>
          </div>
        
      
        <div class="form-group">
          <h6 for="no_wmbaru" class="col-sm-8 col-form-label">Noseri Baru</h6>
          <div class="col-sm-12">
            <input 
            type="text" 
            name="no_wmbaru" 
            value="{{ $data->no_wmbaru }}"
            class="form-control">
          </div>
        </div>
        <div class="col-md-12">
          <button class="btn btn-primary btn-small">simpan</button>
         </div> 
        </div>
      </div>
   
    </form>
</div>

@endsection