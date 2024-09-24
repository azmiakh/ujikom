<aside id="sidebar" class="sidebar">



    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('administrator.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="nav-link" href="{{ route('admin.logintables')}}">
              <i class="bi bi-circle"></i><span>Login Data Tables</span>
            </a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('admin.formtables')}}">
              <i class="bi bi-circle"></i><span>Formulir Data Tables</span>
            </a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('admin.ekstrakurikuler')}}">
              <i class="bi bi-circle"></i><span>Ekstrakurikuler Data Tables</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

    </ul>

  </aside>