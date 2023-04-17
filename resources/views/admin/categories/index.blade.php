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
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('dashassets/css/phoenix.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('dashassets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
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
            @include('include/admin/sidebar')
            @include('include/admin/navbar')




            <div class="content">
                <div class="pb-5">
                    <div class="row g-5">
                        <div>
                            <h3 class="">List
                                des Categories</h4>
                                <hr>
                            <div class="mt-5">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $item => $e)
                                            <tr>
                                                <th scope="row" class="w-20">{{ $item + 1 }}</th>
                                                <td class="w-20">{{ $e->name }}</td>
                                                <td class="w-20">{{ $e->description }}</td>
                                                <td class="w-30">
                                                    <a href data-bs-toggle="modal" data-bs-target="#editCategory{{ $e->id }}" class="btn"
                                                        style="background-color: yellow">Modifier</a>
                                                    <a onclick="return confirm('Voulez-vous vraiment supprimer cette categorie')"
                                                        href="/Categories/{{ $e->id }}/Delete"
                                                        class="btn btn-danger ">Suprimer</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                            <a data-bs-toggle="modal" data-bs-target="#verticallyCentered"
                                class="btn btn-success">Ajouter une Categorie</a>


                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <div class="row g-0 justify-content-between align-items-center h-100 mb-3">
                        <div class="col-12 col-sm-auto text-center">
                            <p class="mb-0 text-900">Thank you for creating with phoenix<span
                                    class="d-none d-sm-inline-block"></span><span class="mx-1">|</span><br
                                    class="d-sm-none">2022 &copy; <a href="https://themewagon.com">Themewagon</a></p>
                        </div>
                        <div class="col-12 col-sm-auto text-center">
                            <p class="mb-0 text-600">v1.1.0</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </main>


    <!-- Modal ajouter une catergorie -->
    <div class="modal fade" id="verticallyCentered" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticallyCenteredModalLabel">Ajouter une Categorie</h5><button
                        class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                            class="fas fa-times fs--1"></span></button>
                </div>

                <form action="/Categories/Add" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input name="name" class="form-control" type="text"
                                placeholder="Nom Categorie ..." aria-describedby="basic-addon1">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-0">
                            <label class="form-label" for="exampleTextarea">Description</label>
                            <textarea name="description" class="form-control" id="exampleTextarea" rows="2"> </textarea>
                        </div>
                        @error('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Okay</button>
                        <button class="btn btn-outline-primary" type="button"
                            data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Fin  Modal ajouter une catergorie  -->
    <!-- Modal modifier une catergorie -->
    @foreach($categories as $index=> $r)
      <div class="modal fade" id="editCategory{{$r->id}}" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="verticallyCenteredModalLabel">Modofier Categorie :<span class="text-primary"> {{$r->name}}</span></h5><button
                          class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                              class="fas fa-times fs--1"></span></button>
                  </div>

                  <form action="/Categories/Modifier" method="post">
                      @csrf
                      <div class="modal-body">

                          <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">@</span>
                              <input name="name" class="form-control" type="text"
                                   aria-describedby="basic-addon1" value="{{$r->name}}">
                          </div>
                          @error('name')
                              <div class="alert alert-danger">
                                  {{ $message }}
                              </div>
                          @enderror
                          <div class="mb-0">
                              <label class="form-label" for="exampleTextarea">Description</label>
                              <textarea name="description" class="form-control" id="exampleTextarea"  rows="2">{{$r->description}}</textarea>
                          </div>
                          @error('description')
                              <div class="alert alert-danger">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>
                      <input type="hidden" value="{{$r->id}}" name="id_categorie">
                      <div class="modal-footer">
                          <button class="btn btn-primary" type="submit">Okay</button>
                          <button class="btn btn-outline-primary" type="button"
                              data-bs-dismiss="modal">Cancel</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    @endforeach
    
    <!-- Fin  Modal modifier une catergorie  -->

    <script src="{{ asset('dashassets/js/phoenix.js') }}"></script>
    <script src="{{ asset('dashassets/js/ecommerce-dashboard.js') }}"></script>
</body>

</html>
