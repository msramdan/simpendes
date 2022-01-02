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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Tambah Data User</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Tambah Data User
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
                   <h4 class="card-title">Tambah Data User</h4>
                   <br>
                   <div class="row">
                    <form action="{{route('simpan.user')}}" method="post">
                      @csrf
                      <div class="form-group">
                          <label>Nama</label>
                          <input type="text" class="form-control" name="name" value="{{old('name')}}">
                          @if($errors->has('name'))
                          <div class="text-danger">
                              {{ $errors->first('name')}}
                          </div>
                          @endif
                      </div>
                      <div class="input-field">
                        <p><label for="karyawan_id">NIP/Nomor Pegawai</label></p>
                        <select class="form-control @error('karyawan_id') is-invalid @enderror" id="karyawan_id" name="karyawan_id">
                            @foreach ($karyawan as $thn)
                            <option value="{{$thn->nip}}" {{old('nip')== $thn->nip ? 'selected' : ''}}>{{$thn->nip}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                          <label>Level</label>
                          <select class="custom-select" name="level">
                              <option value="admin" {{old('level') == 'admin' ? 'selected' : ''}}>Admin</option>
                              <option value="guru" {{old('level') == 'guru' ? 'selected' : ''}}>Guru</option>
                          </select>
                          @if($errors->has('level'))
                          <div class="text-danger">
                              {{ $errors->first('level')}}
                          </div>
                          @endif
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email" value="{{old('email')}}">
                          @if($errors->has('email'))
                          <div class="text-danger">
                              {{ $errors->first('email')}}
                          </div>
                          @endif
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>
                      <br>
                      <button type="submit" class="waves-effect waves-light btn-large">Simpan</button>
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