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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Data Karyawan</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Edit Data Karyawan
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
                   <h4 class="card-title">Edit Data Karyawan</h4>
                   <br>
                   <div class="row">
                    <form action="{{ route('karyawans.update', $karyawan) }}" method="POST" >
                      @method('PUT')
                      @csrf
                      <div class="input-field">
                        <input id="nip" type="text" name="nip" class="validate @error('nip') is-invalid @enderror" value="{{$karyawan->nip}}">
                        <label for="nip">NIP/Nomor Pegawai</label>
                        @error('nip')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-field">
                        <p><label for="role_id">Role Karyawan</label></p>
                        <select class="form-control @error('role_id') is-invalid @enderror" id="role_id" name="role_id">
                            @foreach ($role as $rl)
                            <option value="{{$rl->id}}" {{ $karyawan->role_id == $rl->id ? 'selected' : '' }}>{{$rl->role_karyawan}}
                            </option>
                            @endforeach
                        </select>
                        @error('tahun_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-field">
                        <p><label for="proker_id">Program Kerja</label></p>
                        <select class="form-control @error('proker_id') is-invalid @enderror" id="proker_id" name="proker_id">
                            @foreach ($proker as $rl)
                            <option value="{{$rl->id}}" {{ $karyawan->role_id == $rl->id ? 'selected' : '' }}>{{$rl->file_proker}}
                            </option>
                            @endforeach
                        </select>
                        @error('tahun_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-field">
                        <input id="nama_karyawan" type="text" name="nama_karyawan" class="validate @error('nama_karyawan') is-invalid @enderror" value="{{$karyawan->nama_karyawan}}">
                        <label for="nama_karyawan">Nama Karyawan</label>
                        @error('nama_karyawan')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-field">
                        <input id="telp_karyawan" type="text" name="telp_karyawan" class="validate @error('telp_karyawan') is-invalid @enderror" value="{{$karyawan->telp_karyawan}}">
                        <label for="telp_karyawan">No. Telepon</label>
                        @error('telp_karyawan')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-field">
                        <input id="email" type="text" name="email" class="validate @error('email') is-invalid @enderror" value="{{$karyawan->email}}">
                        <label for="email">Email</label>
                        @error('email')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <a href="{{ route('karyawans.index') }}">
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