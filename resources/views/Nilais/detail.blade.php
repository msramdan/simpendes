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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Detail Nilai Siswa</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Detail Nilai Siswa
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
                   <h4 class="card-title">Detail Nilai Siswa</h4>
                   <div class="row">
                        <div class="col s12">
                          <a href="{{ url('nilai/create_tunggal', $nilai->id) }}" class="btn waves-effect waves-light gradient-45deg-green-teal gradient-shadow">Download Detail</a><br><br>
                        <table>
                          <tr>
                              <td width="130">NIPD</td>
                              <td width="1">:</td>
                              <td> &nbsp;{{ $nilai->siswa->nipd }}</td>
                          </tr>
                          <tr>
                              <td width="130">Nama Siswa</td>
                              <td width="1">:</td>
                              <td> &nbsp;{{ $nilai->siswa->nama_siswa }}</td>
                          </tr>
                          <tr>
                              <td width="130">Mata Pelajaran</td>
                              <td width="1">:</td>
                              <td> &nbsp;{{ $nilai->mapel->nama_mapel }}</td>
                          </tr>
                          <tr>
                              <td width="130">Tahun Ajaran</td>
                              <td width="1">:</td>
                              <td> &nbsp;{{ $nilai->siswa->tahun_ajaran->tahun }}</td>
                          </tr>
                          <tr>
                              <td width="130">Semester</td>
                              <td width="1">:</td>
                              <td> &nbsp;{{ $nilai->semester }}</td>
                          </tr>
                          <tr>
                              <td width="130">Nilai UAS</td>
                              <td width="1">:</td>
                              <td> &nbsp;{{ $nilai->uas }}</td>
                          </tr>
                          <tr>
                              <td width="130">Nilai UTS</td>
                              <td width="1">:</td>
                              <td> &nbsp;{{ $nilai->uts }}</td>
                          </tr>
                          <tr>
                              <td width="130">Nilai UH 1</td>
                              <td width="1">:</td>
                              <td> &nbsp;{{ $nilai->uh1 }}</td>
                          </tr>
                          <tr>
                              <td width="130">Nilai UH 2</td>
                              <td width="1">:</td>
                              <td> &nbsp;{{ $nilai->uh2 }}</td>
                          </tr>
                          <tr>
                              <td width="130">Nilai UH 3</td>
                              <td width="1">:</td>
                              <td> &nbsp;{{ $nilai->uh3 }}</td>
                          </tr>

                          <tr>
                              <td width="130">Nilai UH 4</td>
                              <td width="1">:</td>
                              <td> &nbsp;{{ $nilai->uh4 }}</td>
                          </tr>
                      </table>
                      <br> <br>
                      <a href="{{ route('nilais.index') }}">
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

