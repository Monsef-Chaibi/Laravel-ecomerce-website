<nav class="navbar navbar-light navbar-top navbar-expand">
    <div class="navbar-logo"><button class="btn navbar-toggler navbar-toggler-humburger-icon" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button> <a class="navbar-brand me-1 me-sm-3" href="/admin/Dashboard">
        <div class="d-flex align-items-center">
          <div class="d-flex align-items-center"><img src="{{asset('dashassets/img/icons/logo.png')}}" alt="phoenix" width="32">
            <p class="logo-text ms-2 d-none d-sm-block">Phoenix</p>
          </div>
        </div>
      </a></div>
    <div class="collapse navbar-collapse">
      <div class="px-3">
        <a onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"><span class="me-2" data-feather="log-out"></span>Sign out</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>  
    </div>
    </div>
  </nav>