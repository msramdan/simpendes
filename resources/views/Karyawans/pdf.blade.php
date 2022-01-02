<!doctype html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   
    <title>Laporan Karyawan</title>

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
                @foreach ($karyawan as $item)
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