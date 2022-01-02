<!DOCTYPE html>
<html>

<head>
    <title>Detail Nilai Siswa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <br>
    <h2 align="center"><b>Detail Nilai Siswa</b></h2>
    <h3 align="center"><b>SMP Negeri 2 Sumenep</b></h3>
    <center>
        <a href="/nilai/cetak_pdf" class="btn btn-primary btn-sm" target="_blank"> <b>Unduh PDF</b></a>
        <a href="{{ route('nilais.index') }}" class="btn btn-primary btn-sm"> <b>Batal</b></a>
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
                        Mata Pelajaran
                    </th>
                    <th>
                        Semester
                    </th>
                    <th>
                        Nilai UAS
                    </th>
                    <th>
                        Nilai UTS
                    </th>
                    <th>
                        Nilai UH 1
                    </th>
                    <th>
                        Nilai UH 2
                    </th>
                    <th>
                        Nilai UH 3
                    </th>
                    <th>
                        Nilai UH 4
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;?>
                @foreach ($nilais as $item)
                <?php $no++;?>
                <tr>
                    <td style="text-align: center">{{ $no }}</td>
                    <td>{{ $item->siswa->nipd }}</td>
                    <td>{{ $item->siswa->nama_siswa }}</td>
                    <td>{{ $item->mapel->nama_mapel }}</td>
                    <td>{{ $item->semester }}</td>
                    <td>{{ $item->uas }}</td>
                    <td>{{ $item->uts }}</td>
                    <td>{{ $item->uh1 }}</td>
                    <td>{{ $item->uh2 }}</td>
                    <td>{{ $item->uh3 }}</td>
                    <td>{{ $item->uh4 }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>