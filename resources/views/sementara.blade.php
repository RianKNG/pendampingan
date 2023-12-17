@extends('layouts.v_template')
@section('title','Tambah Data')
@section('content')
{{-- <form action="/dil/insert" method="post" enctype="multipart/form-data">
  @csrf
  <div class="col-md-6">
    <div class="form-group">
      <div class="form-group row">
        <label for="no_sambungan" class="col-sm-2 col-form-label">no_id</label>
        <div class="col-sm-10">
          <input 
          type="text" 
          name="no_sambungan" 
          class="form-control">
        </div>
      </div> 
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">nama</label>
        <div class="col-sm-10">
          <input 
          type="text" 
          name="nama" 
          class="form-control">
        </div>
      </div> 
      <div class="form-group row">
        <label for="alamat" class="col-sm-2 col-form-label">alamat</label>
        <div class="col-sm-10">
          <input 
          type="text" 
          name="alamat" 
          class="form-control">
        </div>
      </div> 
      <div class="form-group row">
        <label for="merek" class="col-sm-2 col-form-label">merek</label>
        <div class="col-sm-10">
          <input 
          type="text" 
          name="merek" 
          class="form-control">
        </div>
      </div>
      <div class="form-group">
        <button class="btn btn-primary">simpan</button>
       </div> 
    </div>
  <form> --}}
  <!-- Main content -->
  <form action="/dil/insert" method="post" enctype="multipart/form-data">
    @csrf
 <section class="content">
  <div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">---Tambah Data---</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="col-md-6">
        <div class="form-group">
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">d</label>
            <div class="col-sm-10">
              <input 
              type="text" 
              name="id" 
              class="form-control">
            </div>
          </div> 
        <div class="col-md-6">
        <div class="form-group">
          <div class="form-group row">
            <label for="no_sambungan" class="col-sm-2 col-form-label">no_id</label>
            <div class="col-sm-10">
              <input 
              type="text" 
              name="no_sambungan" 
              class="form-control">
            </div>
          </div> 
          <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">nama</label>
            <div class="col-sm-10">
              <input 
              type="text" 
              name="nama" 
              class="form-control">
            </div>
          </div> 
          <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">alamat</label>
            <div class="col-sm-10">
              <input 
              type="text" 
              name="alamat" 
              class="form-control">
            </div>
          </div> 
          <div class="form-group row">
            <label for="merek" class="col-sm-2 col-form-label">merek</label>
            <div class="col-sm-10">
              <input 
              type="text" 
              name="merek" 
              class="form-control">
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary">simpan</button>
           </div> 
        </div>
    <!-- /.card -->
    
<form> 
@endsection
