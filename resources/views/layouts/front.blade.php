<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hello, world!</title>


    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/AdminLTE/dist/css/adminlte.min.css') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/front.css') }}">
    @stack('css_vendor')



    @stack('css')

</head>

<body>
    <div class="header bg-gradiant-orange text-white py-2">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-3 social">
                    <a href="#" target="_blank" class="text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" target="_blank" class="text-white ml-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank" class="text-white ml-3"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" target="_blank" class="text-white ml-3"><i class="fab fa-facebook-f"></i></a>
                </div>
                <div class="col-lg-7 office-info text-center">
                    <a href="" class="text-white text-decoration-none">
                        <i class="fas fa-phone-alt"></i>
                        <span class="ml-1"></span>
                    </a>
                    <a href="" class="ml-3 text-white text-decoration-none">
                        <i class="far fa-clock"></i>
                        <span class="ml-1"></span>
                    </a>
                    <a href="" class="ml-3 text-white text-decoration-none">
                        <i class="fas fa-envelope"></i>
                        <span class="ml-1"></span>
                    </a>
                </div>
                <div class="col-lg-2 action " style="white-space: nowrap;">
                    <a href="#" class="btn btn-sm btn-action py-0 rounded-0">Login</a>
                    <a href="#" class="btn btn-sm btn-action py-0 rounded-0">Register</a>
                </div>
            </div>
        </div>
    </div>


    <div class="header bg-gradiant-orange text-white py-2">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-2">
                    <nav class="navbar navbar-expand-lg navbar-light text-white">
                        <a class="navbar-brand brand-title" href="#">Pra Craft</a>
                    </nav>
                </div>

                <div class="col-md-8">
                    <div class="input-group input-group-sm input-search" style="width: 40rem;">
                        <input type="text" class="form-control" placeholder="Search ...."
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-orange" type="button" id="button-addon2">Button</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    cart
                    <i class="fa fa-cart-shopping text-white"></i>
                    <i class="bi bi-cart4"></i>
                </div>


                {{-- <div class="row">
                        <div class="col-sm-6">
                            <div class="kategori-item">
                                <a class="text-white-80" href="">Mawar</a>
                                <a href="">Mawar</a>
                                <a href="">Mawar</a>
                                <a href="">Mawar</a>
                                <a href="">Mawar</a>
                                <a href="">Mawar</a>
                            </div>
                        </div>
                    </div> --}}
            </div>
        </div>
    </div>

    </ <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    @stack('scripts_vendor')

    @stack('scripts')
</body>

</html>
