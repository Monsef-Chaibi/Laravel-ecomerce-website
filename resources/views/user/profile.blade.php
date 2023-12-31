<!doctype html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Phoenix</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link href="{{asset('dashassets/css/phoenix.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{asset('dashassets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <style>
      body {
        opacity: 0;
        
      }
    </style>
  </head>

  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">

        <!-- include bar -->
        @include('include/user/SideBar')
        @include('include/user/NavBar')



        <div class="content">
          <div class="pb-5">
            <div class="row g-5">
              <h3 class="text-primary">Modifier Profile</h3>
              <hr>
              @include('include/message')
            <!--form profile-->
              <div class="mb-3 row">
                  <label class="col-sm-2 col-form-label my-3" for="inputPassword">Name</label>
                  <div class="col-sm-10">
                    <input value="{{auth()->user()->name}}" autocomplete="off"  readonly="" name="name" class="my-3 form-control outline-none" id="inputPassword" type="text">
                  </div><br>
                <label class="col-sm-2 col-form-label my-3" for="inputPassword">Email</label>
                <div class="col-sm-10">
                  <input value="{{auth()->user()->email}}" class="my-3 form-control"  readonly="" name="email" id="inputPassword" type="email">
                </div>
                <button class="btn btn-success my-3 col-sm-10 " style="margin-left: 17%"  data-bs-toggle="modal" data-bs-target="#verticallyCentered">Modifier</button>
              </div>
            </form>
                <!--End form profile-->
            </div>
          </div>
          <footer class="footer">
            <div class="row g-0 justify-content-between align-items-center h-100 mb-3">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-900">Thank you for creating with phoenix<span class="d-none d-sm-inline-block"></span><span class="mx-1">|</span><br class="d-sm-none">2022 &copy; <a href="https://themewagon.com">Themewagon</a></p>
              </div>
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">v1.1.0</p>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </main>
    <script src="{{asset('dashassets/js/phoenix.js') }}"></script>
    <script src="{{asset('dashassets/js/ecommerce-dashboard.js') }}"></script>
  </body>

</html>
<div class="modal fade" id="verticallyCentered" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="verticallyCenteredModalLabel">Modifier Profile</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
      </div>
      <div class="modal-body">
        <form action="/ProfileUser/Modifier" method="post">
          @csrf
          <div class="mb-3 row">
              <label class="col-sm-2 col-form-label" for="inputPassword">Name</label>
              <div class="col-sm-10">
                <input value="{{auth()->user()->name}}" autocomplete="off"   name="name" class="form-control outline-none" id="inputPassword" type="text">
              </div>
            <label class="col-sm-2 col-form-label" for="inputPassword">Email</label>
            <div class="col-sm-10">
              <input value="{{auth()->user()->email}}" class="form-control"  name="email" id="inputPassword" type="email">
            </div>
            <label class="col-sm-2 col-form-label" for="inputPassword">Password</label>
            <div class="col-sm-10">
              <input class="form-control" name="password" id="inputPassword" type="password">
            </div>
          </div>
          <div class="modal-footer"><button class="btn btn-primary" type="submit">Okay</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
        </form>
        </div>
      </div>
    </div>
</div>
