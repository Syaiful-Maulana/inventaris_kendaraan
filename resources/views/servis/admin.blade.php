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


      <a href="{{ url('tambahServis')}}" type="button" hidden class="btn btn-success mb-3 mt-3"><i class="fas fa-plus-square"></i> Tambah</a>
      <table class="table table-bordered" id="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">NO</th>
            <th scope="col">Nama Penginput</th>
            <th scope="col">Type/Jenis</th>
            <th scope="col">BBM</th>
            <th scope="col">Servis</th>
            <th scope="col">Nota</th>
            <th scope="col">Tanggal</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
            <th>{{ $loop->iteration}}</th>
            <th>{{ $item->users}}</th>
            <th>{{ $item->Type}}</th>
            <th>{{ $item->BBM}}</th>
            <th>{{ $item->servis }}</th>
            <th>
              <a href="{{ url('nota/'.$item->id)}}" type="button" class="btn-btn-success">Lihat Nota</a>
            </th>
            {{-- <th>
              <img src="{{ asset('datanota/'.$item->nota)}}" width="100px" height="100px" alt="">
            </th> --}}
            {{-- <th>{{ $item->total }}</th> --}}
            <th>{{ $item->Tanggal }}</th>
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
      var servisid = $(this).attr('data-id');
      var nama = $(this).attr('data-nama');
      swal({
          title: "Yakin ?",
          text: "Kamu akan menghapus data servis ini",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
        .then((willDelete) => {
          if (willDelete) {
          window.location = "/deleteServis/" + servisid+""
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



