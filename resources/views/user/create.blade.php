@extends('templates.v_template')
@section('title','edit_User')
@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Edit User</h3>
    </div>
    <div class="card-body">
 <!-- Horizontal Form -->
 <div class="row">
  <div class="col-md-12">
      @if($errors->any())
      @foreach($errors->all() as $err)
      <p class="alert alert-danger">{{ $err }}</p>
      @endforeach
      @endif
      <form action="{{ route('user.store') }}" method="POST">
          @csrf
          <div class="form-group">
              <label>Nama User <span class="text-danger">*</span></label>
              <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
          </div>
          <div class="form-group">
              <label>Email <span class="text-danger">*</span></label>
              <input class="form-control" type="email" name="email" value="{{ old('email') }}" />
          </div>
          <div class="form-group">
              <label>Password <span class="text-danger">*</span></label>
              <input class="form-control" type="password" name="password" />
          </div>
          <div class="form-group">
              <label>Level <span class="text-danger">*</span></label>
              <select class="form-control" name="level" />
              @foreach($levels as $key => $val)
              @if($key==old('level'))
              <option value="{{ $key }}" selected>{{ $val }}</option>
              @else
              <option value="{{ $key }}">{{ $val }}</option>
              @endif
              @endforeach
              </select>
          </div>
          <div class="form-group">
              <button class="btn btn-primary">Simpan</button>
              <a class="btn btn-danger" href="{{ route('user.index') }}">Kembali</a>
          </div>
      </form>
  </div>
</div>
@endsection