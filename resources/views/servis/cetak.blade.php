<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('template.head')
    <title>Cetak Data Servis</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Servis</b></p>
        <table class="table table-bordered" id="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Nama Penginput</th>
                <th scope="col">Type/Jenis</th>
                <th scope="col">BBM</th>
                <th scope="col">Servis</th>
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
                <th>{{ $item->Tanggal }}</th>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    @include('template.script')
    <script> type="text/javascript"
    window.print()
    </script>
</body>
</html>