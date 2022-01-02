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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Silabus</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Silabus
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        @if(session('sukses'))
          <div class="card-alert card green lighten-5">
              <div class="card-content green-text">
                <p>Data berhasil disimpan.</p>
              </div>
                <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
          </div>
        @endif
        @if(session('update'))
          <div class="card-alert card green lighten-5">
              <div class="card-content green-text">
                <p>Data berhasil diupdate.</p>
              </div>
                <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
          </div>
        @endif
        @if(session('delete'))
          <div class="card-alert card danger lighten-5">
              <div class="card-content danger-text">
                <p>Data berhasil dihapus.</p>
              </div>
                <button type="button" class="close danger-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
          </div>
        @endif
        <div class="col s12">
          <div class="container">
            <div class="section">
               <div class="card">
                 <div class="card-content">
                   <h4 class="card-title">Silabus</h4>
                   <div class="row">
                    @if ($users->level=='admin')
                      <a href="{{ route('silabuss.create') }}" class="right btn waves-effect waves-light gradient-45deg-light-blue-cyan gradient-shadow">Tambah Data</a>
                    @endif
                        <div class="col s12">
                        <table id="page-length-option" class="display">
                           <thead>
                              <tr>
                                <th>No</th>
                                 <th>File Silabus</th>
                                 <th>Mata Pelajaran</th>
                                 <th>Tahun</th>
                                 <th>Download</th>\
                                 @if ($users->level=='admin')
                                 <th>Action</th>
                                 @endif
                              </tr>
                           </thead>
                           <tbody>
                            @foreach($silabuss as $item)
                              <tr>
                                 <td>{{ $loop->iteration }}.</td>
                                 <td>{{ $item->file_silabus }}</td>
                                 <td>{{ $item->mapel->nama_mapel }}</td>
                                 <td>{{ $item->tahun_ajaran->tahun }}</td>
                                 <td><a href="{{ route('silabus.download', $item->id) }}">{{ $item->file_silabus }}</a></td>
                                 @if ($users->level=='admin')
                                 <td class="text-center" width="250px">
                                      <a href="{{ url('deletesilabus',$item->id) }}" style="color: red;" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="material-icons">delete_forever</i>
                                      </a>
                                 </td>
                                 @endif
                              </tr>
                            @endforeach
                           </tbody>
                        </table>
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

