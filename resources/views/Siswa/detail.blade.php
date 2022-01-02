<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    @include('Template.head')
  </head>
  <!-- END: Head-->
  <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('Template.navbar')
    <!-- END: Header-->

    <!-- BEGIN: SideNav-->
    @include('Template.sidebar')
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">
        <div id="breadcrumbs-wrapper" data-image="{{asset('style/assets/app-assets/images/gallery/breadcrumb-bg.jpg')}}">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s12 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Detail Siswa</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Detail Siswa
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="container">
            <div class="section">
               <div class="card">
                 <div class="card-content">
                   <h4 class="card-title">Detail Siswa</h4>
                   <div class="row">
                        <div class="col s12">
                          <a href="{{ url('siswa/create_tunggal', $data->nipd) }}" class="btn waves-effect waves-light gradient-45deg-green-teal gradient-shadow">Download Detail</a><br><br>
                          <table>
                            <tr>
                                <td width="130">NIPD</td>
                                <td width="1">: </td>
                                <td> &nbsp;{{ $data->nipd }}</td>
                            </tr>
                            <tr>
                                <td width="130">NISN</td>
                                <td width="1">: </td>
                                <td> &nbsp;{{ $data->nisn }}</td>
                            </tr>
                            <tr>
                                <td width="130">NIK</td>
                                <td width="1">: </td>
                                <td> &nbsp;{{ $data->nik }}</td>
                            </tr>
                            <tr>
                                <td width="130">Nama Siswa</td>
                                <td width="1">: </td>
                                <td> &nbsp;{{ $data->nama_siswa }}</td>
                            </tr>
                            <tr>
                                <td width="130">Kelas</td>
                                <td width="1">: </td>
                                <td> &nbsp;{{ $data->kelas->nama_kelas }}</td>
                            </tr>
                            <tr>
                                <td width="130">Angkatan</td>
                                <td width="1">: </td>
                                <td> &nbsp;{{ $data->tahun_ajaran->tahun }}</td>
                            </tr>
                            <tr>
                                <td width="130">Alamat</td>
                                <td width="1">: </td>
                                <td> &nbsp;{{ $data->alamat }}</td>
                            </tr>
                            <tr>
                                <td width="130">Tempat, Tanggal Lahir</td>
                                <td width="1">: </td>
                                <td> &nbsp;{{ $data->tempat_lahir }}, {{ $data->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td width="130">Jenis Kelamin</td>
                                <td width="1">: </td>
                                <td> &nbsp;{{ $data->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <td width="130">Agama</td>
                                <td width="1">:</td>
                                <td> &nbsp;{{ $data->agama }}</td>
                            </tr>
                            <tr>
                                <td width="130">No. Telepon</td>
                                <td width="1">: </td>
                                <td> &nbsp;{{ $data->no_telp }}</td>
                            </tr>
                            <tr>
                                <td width="130">Nama Orang Tua</td>
                                <td width="1">: </td>
                                <td> &nbsp;{{ $data->nama_ortu }}</td>
                            </tr>                          <tr>
                                <td width="130">Pekerjaan</td>
                                <td width="1">: </td>
                                <td> &nbsp;{{ $data->pekerjaan_ortu }}</td>
                            </tr>
                        </table>
                        <br> <br>
                        <a href="/siswa">
                          <button class="waves-effect waves-secondary btn-large" type="button">Kembali</button>
                        </a>
                      </div>
                   </div>
                 </div>
               </div>
   
</div>

<div style="bottom: 50px; right: 19px;" class="fixed-action-btn direction-top"><a class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow"><i class="material-icons">add</i></a>
    <ul>
        <li><a href="css-helpers.html" class="btn-floating blue"><i class="material-icons">help_outline</i></a></li>
        <li><a href="cards-extended.html" class="btn-floating green"><i class="material-icons">widgets</i></a></li>
        <li><a href="app-calendar.html" class="btn-floating amber"><i class="material-icons">today</i></a></li>
        <li><a href="app-email.html" class="btn-floating red"><i class="material-icons">mail_outline</i></a></li>
    </ul>
</div>
          </div>
          <div class="content-overlay"></div>
        </div>
      </div>
    </div>

    <!-- Modal Trigger -->
  <!-- Modal Structure -->
    <!-- END: Page Main-->
    
    <!-- BEGIN: Footer-->
    @include('Template.footer')
    <!-- END: Footer-->

    <!-- BEGIN VENDOR JS-->
    @include('Template.script')
    
    @include('sweetalert::alert')
    <!-- END PAGE LEVEL JS-->
  </body>
</html>

