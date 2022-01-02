    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
      <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img class="hide-on-med-and-down " src="{{asset('style/assets/app-assets/images/logo/logo_smpn2.png')}}" alt="materialize logo"><img class="show-on-medium-and-down hide-on-med-and-up" src="{{asset('style/assets/app-assets/images/logo/logo_smpn2.png')}}" alt="materialize logo"><span class="logo-text hide-on-med-and-down">SIMPENDAS</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
      </div>
      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">
        <li class="navigation-header"><a class="navigation-header-text">Applications</a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="active"><a class="waves-effect waves-cyan" href="/home"><i class="material-icons">dashboard</i><span data-i18n="Page Blank">Dashboard</span></a>
        </li>
        @if (auth()->user()->level=="admin")
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">subject</i><span class="menu-title" data-i18n="Templates">Data Master</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li class="active"><a class="waves-effect waves-cyan" href="{{route('identitassekolah')}}"><i class="material-icons">panorama_fish_eye</i><span data-i18n="Page Blank">Identitas Sekolah</span></a>
              </li>
            </ul>
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li class="active"><a class="waves-effect waves-cyan" href="{{route('tahuns.index')}}"><i class="material-icons">panorama_fish_eye</i><span data-i18n="Page Blank">Tahun Ajaran</span></a>
              </li>
            </ul>
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li class="active"><a class="waves-effect waves-cyan" href="{{ route('mapels.index') }}"><i class="material-icons">panorama_fish_eye</i><span data-i18n="Page Blank">Mata Pelajaran</span></a>
              </li>
            </ul>
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li class="active"><a class="waves-effect waves-cyan" href="{{route('kelass.index')}}"><i class="material-icons">panorama_fish_eye</i><span data-i18n="Page Blank">Kelas</span></a>
              </li>
            </ul>
          </div>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">assignment_ind</i><span class="menu-title" data-i18n="Templates">Data Pengguna</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li class="active"><a class="waves-effect waves-cyan" href="{{route('siswa')}}"><i class="material-icons">panorama_fish_eye</i><span data-i18n="Page Blank">Data Siswa</span></a>
              </li>
            </ul>
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li class="active"><a class="waves-effect waves-cyan" href="{{route('karyawans.index')}}"><i class="material-icons">panorama_fish_eye</i><span data-i18n="Page Blank">Data Guru dan Pegawai</span></a>
              </li>
            </ul>
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li class="active"><a class="waves-effect waves-cyan" href="{{route('roles.index')}}"><i class="material-icons">panorama_fish_eye</i><span data-i18n="Page Blank">Role Karyawan</span></a>
              </li>
            </ul>
          </div>
        </li>
        @endif
        <li class="bold"><a class="waves-effect waves-cyan" href="{{ route('nilais.index') }}"><i class="material-icons">border_color</i><span data-i18n="Page Blank">@if (auth()->user()->level=="admin")Nilai @endif @if (auth()->user()->level=="guru")Data @endif Siswa</span></a>
        </li>
        @if (auth()->user()->level=="guru")
        <li class="bold"><a class="waves-effect waves-cyan" href="{{ route('jadwals.index') }}"><i class="material-icons">description</i><span data-i18n="Page Blank">Jadwal Pelajaran</span></a>
        </li>
        @endif
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">equalizer</i><span class="menu-title" data-i18n="Menu levels">Laporan</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li>
                @if (auth()->user()->level=="admin")
                <a href="/karyawan/show">
                  <i class="material-icons">radio_button_unchecked</i>
                  <span data-i18n="Second level">Guru dan Pegawai</span>
                </a>
                @endif
              </li>
             
              <li>
                <a href="/siswa/show">
                  <i class="material-icons">radio_button_unchecked</i>
                  <span data-i18n="Second level">Siswa</span>
                </a>
              </li>

              <li>
                <a href="/nilai/show">
                  <i class="material-icons">radio_button_unchecked</i>
                  <span data-i18n="Second level">Nilai Siswa</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">equalizer</i><span class="menu-title" data-i18n="Menu levels">File Kurikulum</span></a>
                <div class="collapsible-body">
                  <ul class="collapsible" data-collapsible="accordion">
                    <li><a href="{{ route('prokers.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Third level">Program Kerja</span></a>
                    </li>
                    <li><a href="{{ route('silabuss.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Third level">Silabus</span></a>
                    </li>
                    <li><a href="{{ route('sks.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Third level">SK</span></a>
                    </li>
                    @if (auth()->user()->level=="admin")
                    <li><a href="{{ route('jadwals.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Third level">Jadwal Pelajaran</span></a>
                    </li>
                    @endif
                  </ul>
                </div>
              </li>
        <li class="bold"><a class="waves-effect waves-cyan" href="/rekapitulasi"><i class="material-icons">reply_all</i><span data-i18n="Page Blank">Rekapitulasi Data</span></a>
        </li>
        @if (auth()->user()->level=="admin")
        <li class="bold"><a class="waves-effect waves-cyan" href="/users"><i class="material-icons">people_outline</i><span data-i18n="Page Blank">User</span></a>
        </li>
        @endif
      </ul>
      
      <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>