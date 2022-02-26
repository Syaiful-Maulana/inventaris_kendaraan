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
        <h1>Data Servis</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ url('servis')}}">Data Servis</a></div>
          <div class="breadcrumb-item">Tambah Data Servis</div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
            
            <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ url('servis')}}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-undo"></i> Back
                </a>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="{{ url('addServis')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                            <label  class="form-label">Type</label>
                            <input type="text" name="Type" class="form-control @error('Type') is-invalid @enderror" >
                            @error('Type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label  class="form-label">BBM</label>
                            <input type="text" name="BBM" class="form-control @error('BBM') is-invalid @enderror" >
                            @error('BBM')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label  class="form-label">Servis</label>
                            <input type="text" name="servis" class="form-control @error('servis') is-invalid @enderror" >
                            @error('servis')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label  class="form-label">Tanggal Servis</label>
                            <input type="date" name="Tanggal"  autocomplete="off" class="form-control @error('Tanggal') is-invalid @enderror" >
                            @error('Tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label  class="form-label">Masukkan Nota</label>
                            <input type="file" name="nota" class="form-control @error('nota') is-invalid @enderror" >
                            @error('nota')
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



