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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Data User</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Edit Data User
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
                   <h4 class="card-title">Edit Data User</h4>
                   <br>
                   <div class="row">
                    <form action="{{ route('update.user', $user->id)}}" method="post">
                      @csrf
                      @method('PUT')
                      </div><br>
                      <div class="modal-body">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>ID</label>
                                  <input type="text" name="id" class="form-control" value="{{$user->id}}" readonly>
                              </div>
                              <div class="form-group">
                                  <label>Nama</label>
                                  <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                  @if($errors->has('name'))
                                  <div class="text-danger">
                                      {{ $errors->first('name')}}
                                  </div>
                                  @endif
                              </div>
                              <div class="form-group">
                                <label>NIP/Nomor Pegawai</label>
                                <input class="form-control" name="karyawan_id" value="{{$user->karyawan_id}}" readonly>
                                @if($errors->has('karyawan_id'))
                                  <div class="text-danger">
                                      {{ $errors->first('name')}}
                                  </div>
                                @endif
                              </div>
                              <div class="form-group">
                                  <label>Level</label>
                                  <input class="form-control" name="level" value="{{$user->level}}" readonly>
                                  @if($errors->has('level'))
                                  <div class="text-danger">
                                      {{ $errors->first('level')}}
                                  </div>
                                  @endif
                              </div>
                              <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                  @if($errors->has('email'))
                                  <div class="text-danger">
                                      {{ $errors->first('email')}}
                                  </div>
                                  @endif
                              </div>
                          </div><br>
                          <div class="modal-footer bg-whitesmoke br">
                            <a href="/users">
                              <button class="waves-effect waves-secondary btn-large" type="button">Batal</button>
                            </a>
                              <button type="submit" class="waves-effect waves-secondary btn-large">Update</button>
                          </div>
                      </div>
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