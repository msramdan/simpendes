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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Nilai Siswa</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Edit Nilai Siswa
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
                   <h4 class="card-title">Edit Nilai Siswa</h4>
                   <br>
                   <div class="row">
                    <form action="{{ route('nilais.update', $nilai) }}" method="POST" >
                      @method('PUT')
                      @csrf                      <div class="input-field">
                        <p><label for="siswa_id">Nama Siswa</label></p>
                        <select class="form-control @error('siswa_id') is-invalid @enderror" id="siswa_id" name="siswa_id">
                            @foreach ($siswa as $thn)
                            <option value="{{$thn->nipd}}" {{ $nilai->siswa_id == $thn->id ? 'selected' : '' }}>{{$thn->nama_siswa}}
                            </option>
                            @endforeach
                        </select>
                        @error('siswa_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-field">
                        <p><label for="mapel_id">Mata Pelajaran</label></p>
                        <select class="form-control @error('mapel_id') is-invalid @enderror" id="mapel_id" name="mapel_id">
                            @foreach ($mapel as $thn)
                            <option value="{{$thn->id}}" {{ $nilai->siswa_id == $thn->id ? 'selected' : '' }}>{{$thn->nama_mapel}}
                            </option>
                            @endforeach
                        </select>
                        @error('mapel_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-field">
                        <input id="uas" type="number" name="uas" value="{{$nilai->uas}}" class="validate" required>
                        <label for="uas">UAS</label>
                      </div>
                      <div class="input-field">
                        <input id="uts" type="number" name="uts" value="{{$nilai->uts}}" class="validate" required>
                        <label for="uts">UTS</label>
                      </div>
                      <div class="input-field">
                        <input id="uh1" type="number" name="uh1" value="{{$nilai->uh1}}" class="validate" required>
                        <label for="uh1">UH 1</label>
                      </div>
                      <div class="input-field">
                        <input id="uh2" type="number" name="uh2" value="{{$nilai->uh2}}" class="validate" required>
                        <label for="uh2">UH 2</label>
                      </div>
                      <div class="input-field">
                        <input id="uh3" type="number" name="uh3" value="{{$nilai->uh3}}" class="validate" required>
                        <label for="uh3">UH 3</label>
                      </div>
                      <div class="input-field">
                        <input id="uh4" type="number" name="uh4" value="{{$nilai->uh4}}" class="validate" required>
                        <label for="uh4">UH 4</label>
                      </div>
                      <div class="input-field">
                        <input id="semester" type="text" name="semester" class="validate" value="{{$nilai->semester}}" required>
                        <label for="semester">Semester</label>
                      </div>
                      <a href="{{ route('nilais.index') }}">
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