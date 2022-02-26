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
       <h1>Profile</h1>
       <div class="section-header-breadcrumb">
         <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
         <div class="breadcrumb-item">Profile</div>
       </div>
     </div>
     <div class="section-body">
       <h2 class="section-title">{{ Auth::user()->name}}</h2>
       <p class="section-lead">
         Ubah data pribadi anda.
       </p>

       <div class="row mt-sm-4">

         <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
             <form action="{{ url('editProfile/')}}" method="post" class="needs-validation" novalidate="">
                @csrf
               <div class="card-header">
                 <h4>Profile</h4>
               </div>
               <div class="card-body">
                   <div class="row">
                     <div class="form-group col-md-6 col-12">
                       <label>Nama</label>
                       <input type="text" name="name" class="form-control" value="{{ Auth::user()->name}}" required="">
                       <div class="invalid-feedback">
                         Masukkan Nama Anda
                       </div>
                     </div>
                     <div class="form-group col-md-6 col-12">
                       <label>Username</label>
                       <input type="text" name="username" class="form-control" value="{{ Auth::user()->username}}" required="">
                       <div class="invalid-feedback">
                        Masukkan Username Anda
                       </div>
                     </div>
                     <div class="form-group col-md-6 col-12">
                       <label>Email</label>
                       <input type="text" class="form-control" name="email"  value="{{ Auth::user()->email}}" required="">
                       <div class="invalid-feedback">
                        Masukkan Email Anda
                       </div>
                     </div>
                     {{-- <div class="form-group col-md-6 col-12">
                       <label>Password</label>
                       <input type="password" class="form-control" name="password" value="" required="">
                       <div class="invalid-feedback">
                         MasukkanPassword
                       </div>
                     </div> --}}
               </div>
               <div class="card-footer text-left">
                 {{-- <button class="btn btn-primary">Save Changes</button> --}}
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
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