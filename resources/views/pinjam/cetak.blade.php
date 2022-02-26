<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('template.head')
    <title>Cetak Data Peminjaman</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Peminjaman Pertanggal</b></p>
        <table class="table table-bordered" id="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Unit Kerja</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Keperluan</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <th>{{ $loop->iteration}}</th>
                    <th>{{ $item->users}}</th>
                    <th>{{ $item->Unit}}</th>
                    <th>{{ $item->Tanggal}}</th>
                    <th>{{ $item->Keperluan }}</th>
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