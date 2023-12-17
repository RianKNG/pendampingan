
@extends('templates.v_template')
@section('title','User Management')
@section('content')
@if(session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
<div class="card card-default">
    <div class="card-header">
        <form class="form-inline">
            <div class="form-group mr-1">
                <input class="form-control" type="text" name="q" value="{{ $q}}" placeholder="Pencarian..." />
            </div>
            <div class="form-group mr-1">
                <button class="btn btn-success">Refresh</button>
            </div>
            <div class="form-group mr-1">
                <a class="btn btn-primary" href="{{ route('user.create') }}">Tambah</a>
            </div>
        </form>
    </div>
    <div class="card-body">
        {{-- <div class="card-body"> --}}
          {{-- {{ $data->links() }} --}}
            {{-- <div class="card-body table-responsive p-0" style="height: 500px;"> --}}
              {{-- @include('pagination_child') --}}
              {{-- <table id="table" class="table table-bordered table-striped"> --}}
                <table id="table" class="table table-bordered table-striped">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1 ?>
            @foreach($rows as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->level }}</td>
                <td>
                    <a class="btn btn-sm btn-warning" href="{{ route('user.edit', $row) }}">Ubah</a>
                    <form method="POST" action="{{ route('user.destroy', $row) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection