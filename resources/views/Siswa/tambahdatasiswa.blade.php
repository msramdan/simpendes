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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Tambah Data Siswa</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Tambah Data Siswa
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
                   <h4 class="card-title">Tambah Data Siswa</h4>
                   <br>
                   <div class="row">
                    <form action="{{ route('simpandatasiswa') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="input-field">
                        <input id="nipd" type="text" name="nipd" class="validate" required>
                        <label for="nipd">NIPD</label>
                      </div>
                      <div class="input-field">
                        <input id="nisn" type="text" name="nisn" class="validate" required>
                        <label for="nisn">NISN</label>
                      </div>
                      <div class="input-field">
                        <input id="nik" type="text" name="nik" class="validate" required>
                        <label for="nik">NIK</label>
                      </div>
                      <div class="input-field">
                        <input id="nama_siswa" type="text" name="nama_siswa" class="validate" required>
                        <label for="nama_siswa">Nama siswa</label>
                      </div>
                      <div class="input-field">
                        <p><label for="tahun_id">Angkatan</label></p>
                        <select class="form-control @error('tahun_id') is-invalid @enderror" id="tahun_id" name="tahun_id">
                            @foreach ($tahun as $thn)
                            <option value="{{$thn->id}}" {{old('id')== $thn->id ? 'selected' : ''}}>{{$thn->tahun}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="input-field">
                        <p><label for="kelas_id">Kelas</label></p>
                        <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id">
                            @foreach ($kelas as $thn)
                            <option value="{{$thn->id}}" {{old('id')== $thn->id ? 'selected' : ''}}>{{$thn->nama_kelas}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="input-field">
                        <input id="alamat" type="text" name="alamat" class="validate" required>
                        <label for="alamat">Alamat</label>
                      </div>
                      <div class="input-field">
                        <input id="tempat_lahir" type="text" name="tempat_lahir" class="validate" required>
                        <label for="tempat_lahir">Tempat Lahir</label>
                      </div>
                      <div class="input-field">
                        <input id="tanggal_lahir" type="date" name="tanggal_lahir" class="validate" required>
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                      </div>
                      <div class="input-field">
                        <p><label for="jenis_kelamin">Jenis Kelamin</label></p>
                        <select class="validate" id="jenis_kelamin" name="jenis_kelamin" required>
                          <option value="Perempuan">Perempuan</option>
                          <option value="Laki-laki">Laki-laki</option>
                        </select>
                      </div>
                      <div class="input-field">
                        <p><label for="agama">Agama</label></p>
                        <select class="validate" id="agama" name="agama" required>
                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Khatolik">Khatolik</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Buddha">Buddha</option>
                          <option value="Khonghucu">Khonghucu</option>
                        </select>
                      </div>
                      <div class="input-field">
                        <input id="no_telp" type="text" name="no_telp" class="validate" required>
                        <label for="no_telp">Nomor Telepon</label>
                      </div>
                      <div class="input-field">
                        <input id="nama_ortu" type="text" name="nama_ortu" class="validate" required>
                        <label for="nama_ortu">Nama Orang Tua</label>
                      </div>
                      <div class="input-field">
                        <input id="pekerjaan_ortu" type="text" name="pekerjaan_ortu" class="validate" required>
                        <label for="pekerjaan_ortu">Pekerjaan Orang Tuan</label>
                      </div>
                      <button class="waves-effect waves-light btn-large" type="submit">Simpan</button>
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