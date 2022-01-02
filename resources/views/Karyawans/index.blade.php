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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Karyawan</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Karyawan
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
                   <h4 class="card-title">Data Karyawan</h4>
                   <div class="row">
                    <a href="{{ route('exportkaryawan') }}" class="btn waves-effect waves-light gradient-45deg-green-teal gradient-shadow">Export</a>
                    <a class="waves-effect waves-light btn modal-trigger gradient-45deg-green-teal gradient-shadow" href="#modal1">Import</a>
                    <a class="waves-effect waves-light btn modal-trigger gradient-45deg-green-teal gradient-shadow" href="file/Format Import Karyawan.xlsx">Download Format Import</a>
                      <a href="{{ route('karyawans.create') }}" class="right btn waves-effect waves-light gradient-45deg-light-blue-cyan gradient-shadow">Tambah Data</a>
                        <div class="col s12">
                        <table id="page-length-option" class="display">
                           <thead>
                              <tr>
                                 <th>No</th>
                                 <th>Foto</th>
                                 <th>NIP</th>
                                 <th>Nama Karyawan</th>
                                 <th>Role</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>

                            @foreach($karyawans as $item)
                              <tr>
                                 <td>{{ $loop->iteration }}.</td>
                                 <td> <img src="{{ asset('foto/profil_karyawan/'. $item->foto_karyawan ) }}" height="10%" width="10%"></td>
                                 <td>{{ $item->nip }}</td>
                                 <td>{{ $item->nama_karyawan }}</td>
                                 <td>{{ $item->role->role_karyawan }}</td>
                                 <td>{{ $item->status }}</td>
                                 <td class="text-center" width="250px">
                                      <a href="{{ url('detailkaryawan', $item->nip) }}"><i class="material-icons">slideshow</i>
                                      </a> |
                                      <a href="{{ route('karyawans.edit', $item) }}"><i class="material-icons">edit</i>
                                      </a> |
                                      <a href="{{ url('deletekaryawan',$item->nip) }}" style="color: red;" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="material-icons">delete_forever</i>
                                      </a>
                                 </td>
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
    <div id="modal1" class="modal">
        <div class="modal-content">
          <h4>Import Data</h4>
          <form action="{{ route('importkaryawan') }}" method="POST" enctype="multipart/form-data">
          @csrf
            {{-- <div class="input-field">
                <p><label for="tahun_id">Angkatan</label></p>
                <select class="form-control" id="tahun_id" name="tahun_id" required="required">
                    <option value="">Pilih</option>
                    @foreach ($tahuns as $thn)
                    <option value="{{$thn->id}}" {{old('id')== $thn->id ? 'selected' : ''}}>{{$thn->tahun}}</option>
                    @endforeach
                </select>
              </div> --}}
              {{-- <div class="input-field">
                <p><label for="kelas_id">Kelas</label></p>
                <select class="form-control" id="kelas_id" name="kelas_id" required="required">
                    <option value="">Pilih</option>
                    @foreach ($kelass as $kelas)
                    <option value="{{$kelas->id}}" {{old('id')== $kelas->id ? 'selected' : ''}}>{{$kelas->nama_kelas}}</option>
                    @endforeach
                </select>
              </div> --}}

            <div class="input-field">
                <p><label for="file">File</label></p>
                <input type="file" name="file" required="required">
              </div>

          <br>
        </div>
        <div class="modal-footer">
          <a data-dismiss="modal" class="modal-action modal-close waves-effect waves-secondary btn-flat">Selesai</a>
          <button class="waves-effect waves-light btn" type="submit">Import</button>
        </div>
        </form>
      </div>

    <!-- BEGIN: Footer-->
    @include('Template.footer')
    <!-- END: Footer-->

    <!-- BEGIN VENDOR JS-->
    @include('Template.script')

    @include('sweetalert::alert')
    <!-- END PAGE LEVEL JS-->
  </body>
</html>

