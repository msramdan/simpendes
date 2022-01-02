<!doctype html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   
    <title>Laporan Siswa</title>

</head>

<body>
    <style>
      .page-break{
         page-break-after:always;
       }
      .text-center{
         text-align:center;
       }
      .text-header {
         font-size:1.1rem;
      }
      .size2 {
         font-size:1.4rem;
      }
      .border-bottom {
         border-bottom:1px black solid;
      }
      .border {
         border: 2px block solid;
      }
      .border-top {
         border-top:1px black solid;
      }
      .float-right {
         float:right;
      }
      .mt-4 {
         margin-top:4px;
       }
      .mx-1 {
         margin:1rem 0 1rem 0;
      }
      .mr-1 {
         margin-right:1rem;
      }
      .mt-1 {
         margin-top:1rem;
      }
      ml-2 {
         margin-left:2rem;
      }
      .ml-min-5 {
         margin-left:-5px;
      }
      .text-uppercase {
         font:uppercase;
      }
      .d1 {
         font-size:2rem;
      }
      .img {
         position:absolute;
      }
      .link {
         font-style:underline;
      }
      .text-desc {
         font-size:14px;
      }
      .text-bold {
         font-style:bold;
      }
      .underline {
         text-decoration:underline;
      }
      .table-center {
         margin-left:auto;
         margin-right:auto;
      }
      .mb-1 {
         margin-bottom:1rem;
      }
   </style>
  <!-- header -->
    <div class="text-center">
      <img src="{{ public_path('/Logo/logo1.jpg') }}" class="img" alt="logo.png" width="90">
      <div style="margin-left:6rem;">
         <span class="text-header text-bold text-danger">
            PEMERINTAH KABUPATEN SUMENEP <br> DINAS PENDIDIKAN <br>
               <span class="size2">SMPN 2 SUMENEP</span> 
                <br>
         </span>
         <span class="text-desc">Jl. Payudan Barat No.9, Mastasek, Pabian, Kota Sumenep, Telp. (0328) 662572 <br>Website <span class="underline">http://www.smpn2sumenep.sch.id</span> - Email <span class="underline">smpn2_sumenep@yahoo.com <br><br></span> </span> 
      </div>
    <div>
  <!-- /header -->
        <table align="center" style="width: 95%">
            <tr>
                <td>NIPD</td>
                <td>:</td>
                <td>&nbsp;{{ $create_tunggal->nipd }}</td>
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td>:</td>
                <td>&nbsp;{{ $create_tunggal->nama_siswa }}</td>
            </tr>
            <tr>
                <td>Tahun Ajaran</td>
                <td>:</td>
                <td>&nbsp;{{ $create_tunggal->tahun_ajaran->tahun }}</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>&nbsp;{{ $create_tunggal->kelas->nama_kelas }}</td>
            </tr>
            <tr>
                <td>NISN</td>
                <td>:</td>
                <td>&nbsp;{{ $create_tunggal->nisn }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>&nbsp;{{ $create_tunggal->nik }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>&nbsp;{{ $create_tunggal->alamat }}</td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td>&nbsp;{{$create_tunggal->tempat_lahir}}, {{$create_tunggal->tanggal_lahir}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>&nbsp;{{$create_tunggal->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>&nbsp;{{ $create_tunggal->agama }}</td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td>:</td>
                <td>&nbsp;{{ $create_tunggal->no_telp }}</td>
            </tr>
            <tr>
                <td>Nama Orang Tua</td>
                <td>:</td>
                <td>&nbsp;{{ $create_tunggal->nama_ortu }}</td>
            </tr>
            <tr>
                <td>Pekerjaan Orang Tua</td>
                <td>:</td>
                <td>&nbsp;{{ $create_tunggal->pekerjaan_ortu }}</td>
            </tr>
        </table>
</body>
</html>