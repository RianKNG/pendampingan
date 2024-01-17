@extends('templates.v_template')
@section('title','edit_Cabang')
@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Edit Cabang</h3>
    </div>
    <div class="card-body">
    @if($errors->any())
    @foreach($errors->all() as $err)
    <p class="alert alert-danger">{{ $err }}</p>
    @endforeach
    @endif
    <form action="{{ route('cabang.update', $row) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Kode <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="kode" value="{{ old('kode', $row->kode) }}" />
        </div>
        <div class="form-group">
            <label>Cabang <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="cabang" value="{{ old('cabang', $row->cabang) }}" />
        </div>

        <div class="form-group">
            <button class="btn btn-primary">Simpan</button>
            <a class="btn btn-danger" href="{{ route('cabang.index') }}">Kembali</a>
        </div>
    </form>
  </div>
  </div>

@endsection