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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Data Siswa</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Edit Data Siswa
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
                   <h4 class="card-title">Edit Data Siswa</h4>
                   <br>
                   <div class="row">
                    <form action="{{ url('updatedatasiswa',$data->nipd) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="input-field">
                        <input id="nipd" type="text" name="nipd" class="validate @error('nipd') is-invalid @enderror" value="{{$data->nipd}}">
                        <label for="nipd">NIPD</label>
                        @error('nipd')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-field">
                        <input id="nisn" type="text" name="nisn" class="validate @error('nisn') is-invalid @enderror" value="{{$data->nisn}}">
                        <label for="nisn">NISN</label>
                        @error('nisn')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-field">
                        <input id="nik" type="text" name="nik" class="validate @error('nik') is-invalid @enderror" value="{{$data->nik}}">
                        <label for="nik">NIK</label>
                        @error('nik')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-field">
                        <input id="nama_siswa" type="text" name="nama_siswa" class="validate @error('nama_siswa') is-invalid @enderror" value="{{$data->nama_siswa}}">
                        <label for="nama_siswa">Nama siswa</label>
                        @error('nama_siswa')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-field">
                        <p><label for="tahun_id">Angkatan</label></p>
                        <select class="form-control @error('tahun_id') is-invalid @enderror" id="tahun_id" name="tahun_id">
                            @foreach ($tahun as $thn)
                            <option value="{{$thn->id}}" {{ $data->tahun_id == $thn->id ? 'selected' : '' }}>{{$thn->tahun}}
                            </option>
                            @endforeach
                        </select>
                        @error('tahun_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-field">
                        <p><label for="kelas_id">Kelas</label></p>
                        <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id">
                            @foreach ($kelas as $thn)
                            <option value="{{$thn->id}}" {{ $data->tahun_id == $thn->id ? 'selected' : '' }}>{{$thn->nama_kelas}}
                            </option>
                            @endforeach
                        </select>
                        @error('tahun_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-field">
                        <input id="alamat" type="text" name="alamat" class="validate @error('alamat') is-invalid @enderror" value="{{$data->alamat}}">
                        <label for="alamat">Alamat</label>
                        @error('alamat')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-field">
                        <input id="tempat_lahir" type="text" name="tempat_lahir" value="{{$data->tempat_lahir}}" class="validate" required>
                        <label for="tempat_lahir">Tempat Lahir</label>
                      </div>
                      <div class="input-field">
                        <input id="tanggal_lahir" type="date" name="tanggal_lahir" value="{{$data->tanggal_lahir}}" class="validate" required>
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                      </div>
                      <div class="input-field">
                        <input id="jenis_kelamin" type="text" name="jenis_kelamin" value="{{$data->jenis_kelamin}}" class="validate" required>
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                      </div>
                      <div class="input-field">
                        <input id="agama" type="text" name="agama" class="validate" value="{{$data->agama}}" required>
                        <label for="agama">Agama</label>
                      </div>
                      <div class="input-field">
                        <input id="no_telp" type="text" name="no_telp" class="validate" value="{{$data->no_telp}}" required>
                        <label for="no_telp">Nomor Telepon</label>
                      </div>
                      <div class="input-field">
                        <p></p>
                        <input id="nama_ortu" type="text" name="nama_ortu" class="validate" value="{{$data->nama_ortu}}" required>
                        <label for="nama_ortu">Nama Orang Tua</label>
                      </div>
                      <div class="input-field">
                        <input id="pekerjaan_ortu" type="text" name="pekerjaan_ortu" class="validate" value="{{$data->pekerjaan_ortu}}" required>
                        <label for="pekerjaan_ortu">Pekerjaan Orang Tua</label>
                      </div>
                      <!-- <div class="file-field input-field">
                        <div class="btn">
                          <span>Foto</span>
                          <input type="file" name="foto" id="foto">
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text">
                        </div>
                      </div>
                      <img src="{{ asset('foto/profil_siswa/'. $data->foto) }}" height="10%" width="10%"> -->
                      <a href="/siswa">
                        <button class="waves-effect waves-secondary btn-large" type="button">Batal</button>
                      </a>
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