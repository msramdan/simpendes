<!doctype html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   
    <title>Laporan Data Siswa</title>

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
  <hr>
        <table align="center" style="width: 95%">
          <tr>
            <th>
                <td>NIPD</td>
                <td>:</td>
                <td>&nbsp;{{ $create_tunggal->siswa->nipd }}</td>
            </th>
            <th>
                <td>Tahun Ajaran/Semester</td>
                <td>:</td>
                <td>&nbsp;{{ $create_tunggal->siswa->tahun_ajaran->tahun }}/{{ $create_tunggal->semester }}</td>
            </th>
          </tr>
          <tr>
            <th>
                <td>Nama</td>
                <td>:</td>
                <td>&nbsp;{{ $create_tunggal->siswa->nama_siswa }}</td>
            </th>
            <th>
                <td>Mata Pelajaran</td>
                <td>:</td>
                <td>&nbsp;{{ $create_tunggal->mapel->nama_mapel }}</td>
            </th>
          </tr>
          <tr>
            <td><br>Nilai Siswa <br></td>
          </tr>
          <tr>
            <td>UAS</td>
            <td>:</td>
            <td>&nbsp;{{ $create_tunggal->uas }}</td>
          </tr>
          <tr>
            <td>UTS</td>
            <td>:</td>
            <td>&nbsp;{{ $create_tunggal->uts }}</td>
          </tr>
          <tr>
            <td>UH 1</td>
            <td>:</td>
            <td>&nbsp;{{ $create_tunggal->uh1 }}</td>
          </tr>
          <tr>
            <td>UH 2</td>
            <td>:</td>
            <td>&nbsp;{{ $create_tunggal->uh2 }}</td>
          </tr>
          <tr>
            <td>UH 3</td>
            <td>:</td>
            <td>&nbsp;{{ $create_tunggal->uh3 }}</td>
          </tr>
          <tr>
            <td>UH 4</td>
            <td>:</td>
            <td>&nbsp;{{ $create_tunggal->uh4 }}</td>
          </tr>
        </table>
</body>
</html>