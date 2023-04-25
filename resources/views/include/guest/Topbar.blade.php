<div class="container-fluid">
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="/Produit/Search" method="post" >
                @csrf
                <div class="input-group">
                    <input type="text" name="search_name" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">@if(Auth::user())
            <div class="btn-group">
                <button style="background-color: #D19C97;border-radius:5px;color:black" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    
                    {{Auth::user()->name;}} 
                   
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/ProfileUser">Profile</a>
                  <a class="dropdown-item" href="/User-pdf">Facture (PDF)</a>
                  <a class="dropdown-item" href="/send-mail">Facture (Mail)</a>
                  <a onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" class="dropdown-item" href="#!"><span class="me-2" data-feather="log-out"></span>Sign out</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>  
                </div>
              </div>  
              @endif
            <a href="/ClientCart" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge"></span>
            </a>
        </div>
    </div>
</div>
