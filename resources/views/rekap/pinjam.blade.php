@extends('layouts.app')

@section('title', 'Dashboard')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.css">
    <link rel="stylesheet" href="{{ asset('assets/toastr/build/toastr.css')}}">
@endpush

@section('content')
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Rekap Pinjam</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item">Rekap Pinjam</div>
        </div>
      </div>
      <div class="card card-info card-outline">
          <div class="card-header">
              <h3>Print Rekap Peminjaman</h3>
          </div>
          <div class="card-body">
                <div class="form-group">
                    <label for="label">Tanggal Awal</label>
                    <input type="date" name="tglawal" id="tglawal" class="form-control">
                </div>
                <div class="form-group">
                    <label for="label">Tanggal Akhir</label>
                    <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                </div>
                <div class="input-group mb-3">
                  <a href="" onclick="this.href='/cetakPinjam/'+document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value"  type="submit" class="btn btn-primary col-md-12"><li class="fas fa-print"></li> Cetak</a>
                </div>
          </div>
      </div>
    </section>
  </div>
@endsection




