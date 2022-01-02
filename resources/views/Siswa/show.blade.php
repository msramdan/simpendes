<!DOCTYPE html>
<html>

<head>
    <title>Detail Siswa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <br>
    <h2 align="center"><b>Detail Siswa</b></h2>
    <h3 align="center"><b>SMP Negeri 2 Sumenep</b></h3>
    <center>
        <a href="/siswa/cetak_pdf" class="btn btn-primary btn-sm" target="_blank"> <b>Unduh PDF</b></a>
        <a href="/siswa" class="btn btn-primary btn-sm"> <b>Batal</b></a>
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
                        NIPD
                    </th>
                    <th>
                        Nama Siswa
                    </th>
                    <th>
                        Tahun
                    </th>
                    <th>
                        Kelas
                    </th>
                    <th>
                        NISN
                    </th>
                    <th>
                        NIK
                    </th>
                    <th>
                        Alamat
                    </th>
                    <th>
                        Tempat, Tanggal Lahir
                    </th>
                    <th>
                        Jenis Kelamin
                    </th>
                    <th>
                        Agama
                    </th>
                    <th>
                        No. Telepon
                    </th>
                    <th>
                        Nama Orang Tua
                    </th>
                    <th>
                        Pekerjaan
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;?>
                @foreach ($siswa as $item)
                <?php $no++;?>
                <tr>
                    <td style="text-align: center">{{ $no }}</td>
                    <td>{{ $item->nipd }}</td>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>{{ $item->tahun_ajaran->tahun }}</td>
                    <td>{{ $item->kelas->nama_kelas }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->agama }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>{{ $item->nama_ortu }}</td>
                    <td>{{ $item->pekerjaan_ortu }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>