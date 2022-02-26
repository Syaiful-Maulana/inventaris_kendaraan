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
        <h1>Data Pegawai</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item">Data Pegawai</div>
        </div>
      </div>


      <a href="{{ url('tambahPegawai')}}" type="button" class="btn btn-success mb-3 mt-3"><i class="fas fa-plus-square"></i> Tambah</a>
      <table class="table table-bordered" id="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">NO</th>
            <th scope="col">Nama</th>
            <th scope="col">NIP</th>
            <th scope="col">Email</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">No Telepon</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <th>{{ $loop->iteration}}</th>
                <th>{{ $item->nama}}</th>
                <th>{{ $item->nip}}</th>
                <th>{{ $item->email}}</th>
                <th>{{ $item->tanggallahir}}</th>
                <th>{{ $item->alamat }}</th>
                <th>{{ $item->jeniskelamin }}</th>
                <th>{{ $item->no_hp }}</th>
                <td>
                    <a href="{{ url('editPegawai/' .$item->id)}}" type="button" class="btn btn-info">Edit</a>
                    <a href="#" type="button" class="btn btn-danger delete" data-id="{{ $item->id}}" data-nama="{{ $item->nama}}">Delete</a>        
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </section>
  </div>
@endsection
@push('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.js"></script>
<script src="{{ asset('assets/toastr/toastr.js')}}"></script>
<script>
    $(document).ready( function () {
    $('#table').DataTable();
} );
</script>
<script>
    $('.delete').click(function(){
      var pegawaiid = $(this).attr('data-id');
      var nama = $(this).attr('data-nama');
      swal({
          title: "Yakin ?",
          text: "Kamu akan menghapus data pegawai dengan id " + nama+ " ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
        .then((willDelete) => {
          if (willDelete) {
          window.location = "/delete/" + pegawaiid+""
            swal("Data Berhasil Dihapus", {
              icon: "success",
            });
          } else {
            swal("Data Tidak Jadi Dihapus");
          }
      });
    });
    
</script>
<script>
    @if(Session::has('success'))   
    toastr.success('{{Session::get('success')}}')
    @endif
</script>
@endpush



