
@extends('templates.v_template')
@section('title','BBN Dil')
@section('content')


@if ($message = Session::get('success'))
<div class="alert alert-primary" role="alert">
  {{ $message }}
</div>
@endif
 <!-- Horizontal Form -->
 <div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Edit BBM</h3>
  </div>
  
  <form action="/bbn/update/{{ $data->id }}" method="post" enctype="multipart/form-data" class="form-horizontal">
 
                    @csrf
                      <!-- /.card-header -->
                        <div class="form-group">
                            <h6 for="id_dil" class="col-sm-8 col-form-label">Masukkan No Sambungan</h6>
                            <div class="col-sm-12">
                              <input 
                              type="integer" 
                              value="{{ $data->id_dil }}"
                              name="id_dil" 
                              class="form-control">
                            </div>
                          </div> 
                          <div>
                          {{-- </div> --}}
                          <div class="form-group">
                            <h6 for="tanggal_bbn" class="col-sm-8 col-form-label">tanggal_bbn</h6>
                            <div class="col-sm-12">
                              <input
                              type="date" 
                              name="tanggal_bbn" 
                              value="{{ $data->tanggal_bbn }}"
                              class="form-control">
                            </div>
                          </div> 
                          <div class="form-group">
                            <h6 for="nama_baru" class="col-sm-8 col-form-label">Nama Baru</h6>
                            <div class="col-sm-12">
                              <input 
                              type="text" 
                              name="nama_baru" 
                              value="{{ $data->nama_baru }}"
                              class="form-control">
                            </div>
                          </div> 
                          <div>
                         
                          <div class="form-group">
                            <button class="btn btn-primary btn btn-sm">simpan</button>
                           </div> 
                        </div>
                  <form>
        </div>
      </div>
      <!-- /.row -->
      </section>
      @endsection