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
                                des Produits</h4>
                                <hr>
                                <div class="mt-5">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nom </th>
                                                <th scope="col">Image </th>
                                                <th scope="col">Description </th>
                                                <th scope="col">Prix </th>
                                                <th scope="col">Quantite </th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($produits as $item => $p)
                                                <tr>
                                                    <td>{{ $item + 1 }}</td>
                                                    <td>{{ $p->name }}</td>
                                                    <td>
                                                        <img src="{{ asset('Image_upload') }}/{{ $p->image }}"
                                                            style="height: 50px; width:50px" alt="">
                                                    </td>
                                                    <td>{{ $p->description }}</td>
                                                    <td>{{ $p->prix }}</td>
                                                    <td>{{ $p->qte }}</td>
                                                    <td>
                                                        <a href data-bs-toggle="modal"
                                                            data-bs-target="#editProduits{{ $p->id }}"
                                                            class="btn" style="background-color: yellow">Modifier</a>
                                                        <a onclick="return confirm('Voulez-vous vraiment supprimer ce produit')"
                                                            href="/Produit/{{ $p->id }}/Delete"
                                                            class="btn btn-danger ">Suprimer</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


                                <a data-bs-toggle="modal" data-bs-target="#verticallyCentered"
                                    class="btn btn-success">Ajouter un Produit</a>


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


    <!-- Modal ajouter un produit -->
    <div class="modal fade" id="verticallyCentered" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="verticallyCenteredModalLabel">Ajouter u Produit</h5><button
                        class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                            class="fas fa-times fs--1"></span></button>
                </div>

                <form action="/Produit/Add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input name="name" class="form-control" type="text" placeholder="Nom Produit ..."
                                aria-describedby="basic-addon1">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">$</span>
                            <input name="prix" class="form-control" type="number" placeholder="Prix Produit ..."
                                aria-describedby="basic-addon1">
                        </div>
                        @error('prix')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <>
                            </span>
                            <input name="qte" class="form-control" type="text"
                                placeholder="Quantite Produit ..." aria-describedby="basic-addon1">
                        </div>
                        @error('qte')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="input-group mb-3">
                            <input name="image" class="form-control" type="file"
                                placeholder="Image Produit ..." aria-describedby="basic-addon1">
                        </div>
                        @error('image')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">-></span>
                            <select name="categorie_select" class="form-select" aria-label="Default select example">
                                @foreach ($categories as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
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
    <!-- Fin  Modal ajouter un produit  -->
    <!-- Modal modifier un produit -->
    @foreach ($produits as $index => $r)
        <div class="modal fade" id="editProduits{{ $r->id }}" tabindex="-1"
            aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verticallyCenteredModalLabel">Modofier Produit :<span
                                class="text-primary"> {{ $r->name }}</span></h5><button class="btn p-1"
                            type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                class="fas fa-times fs--1"></span></button>
                    </div>

                    <form action="/Produit/Modifier" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input name="name" class="form-control" type="text"
                                    aria-describedby="basic-addon1" value="{{ $r->name }}">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            @error('name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <>
                                </span>
                                <input name="qte" class="form-control" type="text"
                                    aria-describedby="basic-addon1" value="{{ $r->qte }}">
                            </div>
                            @error('qte')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">$</span>
                                <input name="prix" class="form-control" type="text"
                                    aria-describedby="basic-addon1" value="{{ $r->prix }}">
                            </div>

                            @error('prix')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="input-group mb-3">
                                <input name="image" class="form-control" type="file"
                                    placeholder="Image Produit ..." aria-describedby="basic-addon1">
                            </div>
                            <h5 class="text-primary">Image Actuele : </h5>
                            <img src="{{ asset('Image_upload') }}/{{ $r->image }}"
                                style="height: 50px; width:50px" alt="">
                            <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">-></span>
                                    <select name="categorie_select" class="form-select" aria-label="Default select example">
                                        @foreach ($categories as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="mb-0">
                                <label class="form-label" for="exampleTextarea">Description</label>
                                <textarea name="description" class="form-control" id="exampleTextarea" rows="2">{{ $r->description }}</textarea>
                            </div>
                            @error('description')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="hidden" value="{{ $r->id }}" name="id_produit">
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
