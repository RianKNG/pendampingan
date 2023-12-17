
@extends('templates.v_template')
@section('title','(Laporan Rangakuman Hasil Kegiatan)')
@section('content')
  <!-- Content Wrapper. Contains page content -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Rangkuman Laporan</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          
          <h1>Laporan Narasi</h1>
    <h2>Review: Hasil Pendampingan (2023)</h2>
    <p><i>4 out of 5 stars</i></p>
    <p>From director <b>Vicki Fleming</b> comes the heartwarming tale of a boy named Pete (Trent Dugson) Total Dari Hasil Kegaiata Lapangan Bersama Pendampingan Didapatkan Data Yang Valid Sebanyak <b class="text-warning">{{ $totdilcount }}</b> Konsumen dengan. You may think a boy and his dog learning the true value of friendship sounds familiar, but a big twist sets this flick apart: Rover plays basketball, and he's doggone good at it.</p>
    <p>While it may not have been necessary to include all 150 minutes of Rover's championship game in real time, Basketball Dog will keep your interest for the entirety of its 4-hour runtime, and the end will have any dog lover in tears. If you love basketball or sports pets, this is the movie for you.</p></h6>
    <p>Find the full cast listing at the Basketball Dog website.</p>
          
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection