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
        <h1>Data kendaraan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ url('kendaraan')}}">Data kendaraan</a></div>
          <div class="breadcrumb-item">Tambah Data kendaraan</div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
            
            <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ url('kendaraan')}}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-undo"></i> Back
                </a>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="{{ url('editKendaraan/' .$data->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Penanggung Jawab</label>
                            <select name="nama_id" class="form-control  @error('nama_id') is-invalid @enderror">
                                <option value="">--Pilih--</option>
                                @foreach ($pegawai as $item)
                                <option value="{{$item->id}}"{{old('nama_id', $data->nama_id) == $item->id ? 'selected' : null}}>{{$item->nama}}</option>
                                @endforeach
                            </select>
                            @error('nama_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Jenis Kendaraan</label>
                            <input type="text" name="Jenis" class="form-control @error('Jenis') is-invalid @enderror" value="{{ $data->Jenis}}">
                            @error('Jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label  class="form-label">Tanggal Kendaraan</label>
                            <input type="date" name="Tahun" class="form-control @error('Tahun') is-invalid @enderror" value="{{ $data->Tahun}}">
                            @error('Tahun')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label  class="form-label">No Kendaraan</label>
                            <input type="text" name="NoKendaraan" class="form-control @error('NoKendaraan') is-invalid @enderror"  value="{{ $data->NoKendaraan}}">
                            @error('NoKendaraan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label  class="form-label">NO BPKB</label>
                            <input type="number" name="NoBPKB" class="form-control @error('NoBPKB') is-invalid @enderror" value="{{ $data->NoBPKB}}">
                            @error('NoBPKB')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label  class="form-label">Unit Kerja</label>
                            <input type="text" name="unitKerja" class="form-control @error('unitKerja') is-invalid @enderror" value="{{ $data->unitKerja}}">
                            @error('unitKerja')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label  class="form-label">Kondisi</label>
                            <input type="text" name="Kondisi" class="form-control @error('Kondisi') is-invalid @enderror" value="{{ $data->Kondisi}}" >
                            @error('Kondisi')
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



