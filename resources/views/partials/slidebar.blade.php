<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">data admin</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('suplier.index') }}">Supplier</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('barang.index') }}">Barang</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('pelanggan.index') }}">Pelanggan</a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
        </ul>
      </div>
    </li> --}}
    </ul>
</nav>
