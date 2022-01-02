<!DOCTYPE html>
<html>

<head>
    <title>Detail Karyawan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <br>
    <h2 align="center"><b>Detail Karyawan</b></h2>
    <h3 align="center"><b>SMP Negeri 2 Sumenep</b></h3>
    <center>
        <a href="/karyawan/cetak_pdf" class="btn btn-primary btn-sm" target="_blank"> <b>Unduh PDF</b></a>
        <a href="{{ route('karyawans.index') }}" class="btn btn-primary btn-sm"> <b>Batal</b></a>
    </center>
    <hr>
    <br>
    <table class='table table-bordered'>
        <table align="center" border="1px" style="width: 95%">
            <thead class="text-center thead-light">
                <tr>
                    <th>
                        No.
                    </th>
                    <th>
                        NIP
                    </th>
                    <th>
                        Nama Karyawan
                    </th>
                    <th>
                        Role
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        No. Telepon
                    </th>
                    <th>
                        Email
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;?>
                @foreach ($karyawans as $item)
                <?php $no++;?>
                <tr>
                    <td style="text-align: center">{{ $no }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama_karyawan }}</td>
                    <td>{{ $item->role->role_karyawan }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->telp_karyawan }}</td>
                    <td>{{ $item->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>