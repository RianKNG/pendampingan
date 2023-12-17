

  <nav class="mt-2">
    <li>
        <label for="">Dashboard</label>
    </li>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="{{ Request::is('/')? "active":"" }}">
        <a href="/" class="nav-link">
          <span class="icon"><i class="fa fa-signal text-warning"></i></span>
            <p class="btn-xs">Dashboard</p>
          </a>
      </li>
      <li class="{{ Request::is('/test')? "active":"" }}">
        <a href="/test" class="nav-link">
          <span class="icon"><i class="fa fa-coins text-red"></i></span>
            <p class="btn-xs">Dashboard Accesories</p>
          </a>
      </li>
    <li>
      <i><label for="">Data Dil</label></i>
        
    </li>
    <li class="{{ Request::is('/dil')? "active":"" }}">
      <a href="/dil" class="nav-link">
        <span class="icon"><i class="fa fa-home text-primary"></i></span>
        <p class="btn-xs">
          Master DIL  
        </p>
      </a>
    </li>
    <li>
      <i><label for="">Layanan</label></i>
      
    </li>
    <li class="{{ Request::is('/dil/add')? "active":"" }}">
      <a href="/dil/add" class="nav-link">
        <i class="nav-icon fa fa-plus text-danger"></i>
        <p class="btn-xs">
          Tambah DIl
        </p>
      </a>
    </li>
    <li class="{{ Request::is('/penutupan')? "active":"" }}">
      <a href="/penutupan" class="nav-link">
        {{-- <i class="nav-icon far fa-circle text-blue"></i> --}}
        <span class="icon"><i class="fa fa-share text-primary"></i></i></span>
        <p class="btn-xs">
          Penutupan
        </p>
      </a>
    </li>
     {{-- <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Layanan SL Baru
        </p>
      </a>
    </li> --}}
    <li class="{{ Request::is('/penyambungan')? "active":"" }}">
      <a href="/penyambungan" class="nav-link">
        {{-- <i class="nav-icon far fa-circle text-success"></i> --}}
        <span class="icon"><i class="fa fa-arrow-down text-success"></i></span>
        <p class="btn-xs">
          Penyambungan
        </p>
      </a>
    </li>
    <li class="{{ Request::is('/penggantian')? "active":"" }}">
      <a href="/penggantian" class="nav-link">
        {{-- <i class="nav-icon far fa-circle text-white"></i> --}}
        <span class="icon"><i class="fa fa-arrow-up text-warning"></i></span>
        <p class="btn-xs">
          Penggantian
        </p>
      </a>
    </li>
    <li class="{{ Request::is('/bbn')? "active":"" }}">
      <a href="/bbn" class="nav-link">
        {{-- <i class="nav-icon far fa-circle text-green"></i> --}}
        <span class="icon"><i class="fa fa-file text-info"></i></span>
        <p class="btn-xs">
          Balik Nama
        </p>
      </a>
    </li>
    <li>
      <i><label for="">Master ACC</label></i>
      
    </li>
    <li class="{{ Request::is('/watermeter')? "active":"" }}">
      <a href="/watermeter" class="nav-link">
        <span class="icon"><i class="fa fa-coins text-red"></i></span>
     
        <p class="btn-xs">
          <i>Water Meter</i>
        </p>
      </a>
    </li>
    <li class="{{ Request::is('/golongan')? "active":"" }}">
      <a href="/golongan" class="nav-link">
        <span class="icon"><i class="fa fa-code-branch text-primary"></i></i></span>
        <p class="btn-xs">
          Golongan
        </p>
      </a>
    </li>
    @if (auth()->user()->level =="admin")
    <li>
      <i> <label for="">Managenent User</label></i>
     
    </li>
      <li class="{{ Request::is('/user')? "active":"" }}">
        <a href="/user" class="nav-link">
          <span class="icon"><i class="fa fa-user"></i></span>
          <p class="btn-xs">
            <i>Master User</i>
            
          </p>
        </a>
      </li>
     
     @endif
      <li>
        <i> <label for="">Laporan</label></i>
       
      </li>

      <li class="{{ Request::is('/layanan')? "active":"" }}">
      {{-- <li class="nav-item"> --}}
        <a href="/layanan" class="nav-link">
          <i class="nav-icon fas fa-book text-warning"></i>
          <p class="btn-xs">
            <i>Layanan</i>
            
          </p>
        </a>
      </li>
      {{-- <li class="{{ Request::is('/layanan')? "active":"" }}">
        <a href="/report" class="nav-link">
          <span class="icon"><i class="fa fa-pen text-success"></i></span>
          <p class="btn-xs">
            <i>Report Pelanggan</i>
            
          </p>
        </a>
      </li> --}}
      <li class="{{ Request::is('/evaluasi')? "active":"" }}">
        <a href="/evaluasi" class="nav-link">
          <span class="icon"><i class="fa fa-pen text-success"></i></span>
          <p class="btn-xs">
            <i>Evaluasi</i>
            
          </p>
        </a>
      </li>
    </ul>
  </nav> 