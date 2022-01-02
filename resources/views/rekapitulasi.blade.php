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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Rekapitulasi Data
                  </li></span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Rekapitulasi Data
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="container">
            <div class="section">

    <!--card stats start-->
    <div class="card-stats">
        <div class="card-content">
          <h6 style="text-transform:uppercase" align="center"><b>Rekapitulasi Data</b></h6>
        </div>
    </div>

   <div id="card-stats" class="pt-0">
    <table>
      <tr>
        <td>Jumlah Siswa</td>
        <td>:</td>
        <td> &nbsp;{{ $jumlah_siswa }}</td>
      </tr>
      <tr>
        <td>Jumlah Karyawan</td>
        <td>:</td>
        <td> &nbsp;{{ $jumlah_karyawan}}</td>
      </tr>
      <tr>
        <td>Jumlah User Aplikasi</td>
        <td>:</td>
        <td> &nbsp;{{ $jumlah_user }}</td>
      </tr>
      <tr>
        <td>Jumlah Kelas</td>
        <td>:</td>
        <td> &nbsp;{{ $jumlah_kelas }}</td>
      </tr>
      <tr>
        <td>Jumlah Mata Pelajaran</td>
        <td>:</td>
        <td> &nbsp;{{ $jumlah_mapel }}</td>
      </tr>
      <tr>
        <td>Jumlah Program Kerja</td>
        <td>:</td>
        <td> &nbsp;{{ $jumlah_proker }}</td>
      </tr>
      <tr>
        <td>Jumlah Silabus</td>
        <td>:</td>
        <td> &nbsp;{{ $jumlah_silabus }}</td>
      </tr>
      <tr>
        <td width="250">Jumlah SK</td>
        <td width="1">:</td>
        <td> &nbsp;{{ $jumlah_sk }}</td>
      </tr>
    </table>
    <!--card stats end-->
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
    <!-- END: Page Main-->
    
    <!-- BEGIN: Footer-->
    @include('Template.footer')
    <!-- END: Footer-->

    <!-- BEGIN VENDOR JS-->
    @include('Template.script')
    <!-- END PAGE LEVEL JS-->
  </body>
</html>