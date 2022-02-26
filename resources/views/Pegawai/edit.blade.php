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
        <h1>Data Pegawai</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ url('pegawai')}}">Data Pegawai</a></div>
          <div class="breadcrumb-item">Tambah Data Pegawai</div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
            
            <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ url('pegawai')}}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-undo"></i> Back
                </a>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="{{ url('editData/' .$data->id)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label  class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $data->nama}}">
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label  class="form-label">NIP</label>
                            <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ $data->nip}}">
                            @error('nip')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label  class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ $data->alamat}}">
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label  class="form-label">Tanggal</label>
                            <input type="date" name="tanggallahir" class="form-control @error('tanggallahir') is-invalid @enderror" value="{{ $data->tanggallahir}}">
                            @error('tanggallahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jeniskelamin" class="form-control @error('jeniskelamin') is-invalid @enderror"  aria-label="Default select example">
                              <option selected value="{{ $data->jeniskelamin}}">{{ $data->jeniskelamin}}</option>
                              <option value="Laki - Laki">Laki - Laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                            </option>
                            @error('jeniskelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label  class="form-label">no_hp</label>
                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ $data->no_hp}}" >
                            @error('no_hp')
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



