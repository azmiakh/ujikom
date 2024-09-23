<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">


      <a class="logo d-flex align-items-center me-auto">
        <img src="assets/img/hero-img.png" alt="logo" style="margin-right: 20px;">
        <h1 class="sitename">Cendekia Primary School</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#faq">F.A.Q</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      @if(Auth::check())
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="">
          @csrf
          @method('POST')
            <a class="btn-getstarted" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>
        </form>
      @else
        <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
      @endif

    </div>
</header>
<script>
  const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
  const navMenu = document.querySelector('#navmenu');

  mobileNavToggle.addEventListener('click', () => {
    navMenu.classList.toggle('navmenu-active');
  });
</script>