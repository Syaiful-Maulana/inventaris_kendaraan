@extends('layouts.app')

@section('title', 'Kendaraan')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.css">
    <link rel="stylesheet" href="{{ asset('assets/toastr/build/toastr.css')}}">
@endpush

@section('content')
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Data Kendaraan</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item">Data Kendaraan</div>
        </div>
      </div>


      <a href="{{ url('tambahKendaraan')}}" type="button" class="btn btn-success mb-3 mt-3"><i class="fas fa-plus-square"></i> Tambah</a>
      <table class="table table-bordered" id="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">NO</th>
            <th scope="col">Nama Penanggung Jawab</th>
            <th scope="col">Jenis Kendaraan</th>
            <th scope="col">Tahun Kendaraan</th>
            <th scope="col">Nomer Kendaraan</th>
            <th scope="col">No BPKB</th>
            <th scope="col">Unit Kerja</th>
            <th scope="col">Kondisi</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <th>{{ $loop->iteration}}</th>
                <th>{{ $item->pegawais}}</th>
                <th>{{ $item->Jenis}}</th>
                <th>{{ $item->Tahun}}</th>
                <th>{{ $item->NoKendaraan }}</th>
                <th>{{ $item->NoBPKB }}</th>
                <th>{{ $item->unitKerja }}</th>
                <th>{{ $item->Kondisi }}</th>
                <td>
                    <a href="{{ url('editKendaraan/' .$item->id)}}" type="button" class="btn btn-info">Edit</a>
                    <a href="#" type="button" class="btn btn-danger delete" data-id="{{ $item->id}}" >Delete</a>        
                </td>
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
      var kendaraanid = $(this).attr('data-id');
      swal({
          title: "Yakin ?",
          text: "Kamu akan menghapus data Kendaraan  ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
        .then((willDelete) => {
          if (willDelete) {
          window.location = "/deleteKendaraan/" + kendaraanid+""
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



