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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Silabus</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Edit Silabus
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
                   <h4 class="card-title">Edit Silabus</h4>
                   <br>
                   <div class="row">
                    <form action="{{ route('silabuss.update', $silabus) }}" method="POST" enctype="multipart/form-data">
                      @method('PUT')
                      @csrf

                      <div class="file-field input-field">
                        <div class="btn">
                          <span>Silabus</span>
                          <input type="file" name="file_silabus" id="file_silabus">
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text">
                        </div>
                      </div>
                      <div class="input-field">
                        <input id="keterangan" type="text" name="keterangan" class="validate @error('keterangan') is-invalid @enderror" value="{{$silabus->keterangan}}">
                        <label for="keterangan">Keterangan</label>
                        @error('keterangan')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-field">
                        <p><label for="tahun_id">Tahun Ajaran</label></p>
                        <select class="form-control @error('tahun_id') is-invalid @enderror" id="tahun_id" name="tahun_id">
                            @foreach ($tahun as $thn)
                            <option value="{{$thn->id}}" {{ $silabus->tahun_id == $thn->id ? 'selected' : '' }}>{{$thn->tahun}}
                            </option>
                            @endforeach
                        </select>
                        @error('tahun_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                       <a href="{{ route('silabuss.index') }}">
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