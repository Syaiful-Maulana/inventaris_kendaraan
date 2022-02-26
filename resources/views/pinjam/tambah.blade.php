@extends('layouts.app')

@section('title', 'Dashboard')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.css">
@endpush

@section('content')
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Data Pinjam</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ url('pinjam')}}">Data Pinjam</a></div>
          <div class="breadcrumb-item">Tambah Data Pinjam</div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
            
            <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ url('pinjam')}}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-undo"></i> Back
                </a>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="{{ url('addPinjam')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label  class="form-label">Unit Kerja</label>
                            <input type="text" name="Unit" class="form-control @error('Unit') is-invalid @enderror" >
                            @error('Unit')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label  class="form-label">Tanggal Pinjam</label>
                            <input type="date" name="Tanggal" class="form-control @error('Tanggal') is-invalid @enderror" >
                            @error('Tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                          <div class="mb-3">
                            <label  class="form-label">Keperluan</label>
                            <input type="text" name="Keperluan" class="form-control @error('Keperluan') is-invalid @enderror" >
                            @error('Keperluan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

 
    </section>
  </div>
@endsection
@push('js')


@endpush



