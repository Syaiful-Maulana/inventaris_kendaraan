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
        <h1>Data Pinjam</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item">Data Pinjam</div>
        </div>
      </div>


      <a href="{{ url('tambahPinjam')}}" type="button" hidden class="btn btn-success mb-3 mt-3"><i class="fas fa-plus-square"></i> Tambah</a>
      <table class="table table-bordered" id="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">NO</th>
            <th scope="col">Nama Peminjam</th>
            <th scope="col">Unit Kerja</th>
            <th scope="col">Tanggal Pinjam</th>
            <th scope="col">Keperluan</th>
            {{-- <th scope="col">Action</th> --}}
        </tr>
        </thead>
        <tbody>
          
            @foreach ($data as $item)
            <th>{{ $loop->iteration}}</th>
            <th>{{ $item->users}}</th>
            <th>{{ $item->Unit}}</th>
            <th>{{ $item->Tanggal}}</th>
            <th>{{ $item->Keperluan }}</th>
            {{-- <td>
                <a href="{{ url('editPinjam/' .$item->id)}}" type="button" class="btn btn-info">Edit</a>
                <a href="#" type="button" class="btn btn-danger delete" data-id="{{ $item->id}}">Delete</a>        
            </td> --}}

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
      var pinjamid = $(this).attr('data-id');
      swal({
          title: "Yakin ?",
          text: "Kamu akan menghapus data pinjam ini",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
        .then((willDelete) => {
          if (willDelete) {
          window.location = "/deletePinjam/" + pinjamid+""
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



