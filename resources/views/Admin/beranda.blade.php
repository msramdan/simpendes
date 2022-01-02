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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Dashboard</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Dashboard
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
          <h5 style="text-transform:uppercase" align="center"><b>Selamat Datang di Dashboard {{auth()->user()->level}}</b></h5>
        </div>
    </div>

   <div id="card-stats" class="pt-0">
    @if (auth()->user()->level=='admin')
      <div class="row">
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">portrait</i>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">{{ $jumlah_siswa }}</h5>
                        <p class="no-margin">Siswa</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">people_outline</i>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">{{ $jumlah_karyawan }}</h5>
                        <p class="no-margin">Karyawan</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">collections_bookmark</i>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">{{ $jumlah_kelas }}</h5>
                        <p class="no-margin">Kelas</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">storage</i>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">{{ $jumlah_user }}</h5>
                        <p class="no-margin">User</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </div>
    @endif
    @if (auth()->user()->level=='guru')
    <div class="col s12 m6 xl4">
         <div id="profile-card" class="card">
            <div class="card-image waves-effect waves-block waves-light">
               <img class="activator" src="{{asset('style/assets/app-assets/images/gallery/37.png')}}" alt="user bg">
            </div>
            <div class="card-content">
               <img src="{{asset('style/assets/app-assets/images/gallery/profil.jpg')}}" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2">
               <!-- <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                  <i class="material-icons">edit</i>
               </a> --><br><br>
               <table>
                <tr>
                  <td width="130">Nama</td>
                  <td width="1">:</td>
                  <td> &nbsp;{{ $user->name }}</td>
                </tr>
                <tr>
                  <td width="130">NIP</td>
                  <td width="1">:</td>
                  <td> &nbsp;{{ $user->karyawan_id }}</td>
                </tr>
                <tr>
                  <td width="130">Level</td>
                  <td width="1">:</td>
                  <td> &nbsp;{{ $user->level }}</td>
                </tr>
                <tr>
                  <td width="130">Email</td>
                  <td width="1">:</td>
                  <td> &nbsp;{{ $user->email }}</td>
                </tr>
               </table>
            </div>
         </div>
      </div>
      @endif

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