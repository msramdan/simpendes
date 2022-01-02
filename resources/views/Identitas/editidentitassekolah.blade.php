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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Identitas Sekolah</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Edit Identitas Sekolah
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
                   <h4 class="card-title">Edit Identitas Sekolah</h4>
                   <br>
                   <div class="row">
                    <form action="{{ url('updateidentitassekolah', $data->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="input-field">
                        <input id="npsn" type="text" name="npsn" class="validate" value="{{ $data->npsn }}" required>
                        <label for="npsn">NPSN</label>
                      </div>
                      <div class="input-field">
                        <input id="nama_sekolah" type="text" name="nama_sekolah" value="{{ $data->nama_sekolah }}" class="validate" required>
                        <label for="nama_sekolah">Nama Sekolah</label>
                      </div>
                      <div class="input-field">
                        <input id="nama_kepsek" type="text" name="nama_kepsek" class="validate" value="{{ $data->nama_kepsek }}" required>
                        <label for="nama_kepsek">Nama Kepala Sekolah</label>
                      </div>
                      <div class="input-field">
                        <input id="alamat" type="text" name="alamat" class="validate" value="{{ $data->alamat }}" required>
                        <label for="alamat">Alamat</label>
                      </div>
                      <div class="input-field">
                        <input id="kabupaten" type="text" name="kabupaten" class="validate" value="{{ $data->kabupaten }}" required>
                        <label for="kabupaten">Kabupaten</label>
                      </div>
                      <div class="input-field">
                        <input id="kode_pos" type="number" name="kode_pos" class="validate" value="{{ $data->kode_pos }}" required>
                        <label for="kode_pos">Kode Pos</label>
                      </div>
                      <div class="file-field input-field">
                        <div class="btn">
                          <span>Logo</span>
                          <input type="file" name="logo" id="logo">
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text">
                        </div>
                      </div>
                      <img src="{{ asset('Logo/'. $data->logo) }}" height="10%" width="10%">
                      <div class="input-field">
                        <input id="no_telp" type="number" name="no_telp" class="validate" value="{{ $data->no_telp }}" required>
                        <label for="no_telp">No Telpon</label>
                      </div>
                      <button class="waves-effect waves-light btn-large" type="submit">Update</button>
                    </form>
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
    <!-- END: Page Main-->
    
    <!-- BEGIN: Footer-->
    @include('Template.footer')
    <!-- END: Footer-->

    <!-- BEGIN VENDOR JS-->
    @include('Template.script')
    <!-- END PAGE LEVEL JS-->
  </body>
</html>