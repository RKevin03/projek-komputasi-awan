<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breadship</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #644961">
        <div class="container-fluid" style="background-color: #644961; ">
            <a class="navbar-brand fw-bold fs-4 px-5" href="#"><img class="d-inline-block align-text-top"
                    src="{{ Vite::asset('resources/images/logo.png') }}" width="45" height="40">Breadship</a>
            <ul class="navbar-nav mb-2 mb-md-0 fs-5" style="padding-right: 5rem;">

                <li class="nav-item">
                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                            @auth
                                <a class="nav-link text-light fw-semibold" href="{{ url('/home') }}">Login</a>
                            @else
                                <a class="nav-link text-light fw-semibold" href="{{ route('login') }}">Login</a>
                            @endauth
                        </div>
                    @endif
                </li>
            </ul>
        </div>
    </nav>
    {{-- HERO PART 1 --}}
    <div class="container-fluid text-center" style="background-color:#F4CDB0">
        <div class="row justify-content-center">
            <div class="col-4">
                <img src="{{ Vite::asset('resources/images/hero.png') }}" class="d-block mx-lg-auto img-fluid"
                    width="700" height="500" loading="lazy">
            </div>
            <div class="col-4">
                <h1 class="display-6 fw-bold lh-1 my-5" style="color: #D28468">Temukan kue dan roti yang anda sukai di
                </h1>
                <p class="text-center fw-bold display-1 my-5" style="color: #644961">BREADSHIP</p>
            </div>
        </div>
    </div>

    {{-- HERO PART 2 --}}
    <div class="py-3 text-center" style="background-color: #D28468">
        <div class="container text-center">
            <div class="row">
                <p class="text-center fw-bold display-1" style="color: #F4CDB0">Our Product</p>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/Abread.jpg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Bread</h5>
                                <p class="card-text">Menikmati hangat dan kenyamanan dari roti yang baru dipanggang,
                                    dibuat dengan cinta dan perhatian.
                                    Sesuai untuk sarapan yang nyaman atau camilan yang memuaskan, roti kami adalah
                                    tawaran untuk indra.
                                    Coba sekarang dan rasakan nikmatnya rasa tradisional, seperti di rumah!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/Acake.jpg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Pastry</h5>
                                <p class="card-text">Siapkan diri Anda untuk mengalami sensasi rasa pastry yang luar
                                    biasa dengan produk kami.
                                    Dengan bahan-bahan berkualitas dan proses pembuatan yang teliti,
                                    pastry kami menawarkan tekstur yang lembut dan rasa yang enak. Coba sekarang dan
                                    rasakan perbedaan!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/Apastry.jpg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Cake</h5>
                                <p class="card-text">Perkenalkan diri Anda pada kelezatan cake yang tak terlupakan
                                    dengan produk kami.
                                    Dengan bahan-bahan premium dan proses pembuatan yang teliti,
                                    cake kami menawarkan tekstur yang lembut dan rasa yang enak. Coba sekarang dan
                                    rasakan perbedaan!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- HERO PART 3 --}}
    <div class="text-center" style="background-color: #F4CDB0">
        <div class="container text-center">
            <div class="row">
                <p class="text-center fw-bold display-1 my-5" style="color: #644961">Catalog Product</p>
                <div class="row row-cols-1 row-cols-md-5 g-6">
                    <div class="col py-4">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/BRotiSosisKeju.jpeg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Roti Sosis Keju</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col py-4">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/BCoffeeBun.jpeg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Coffee Bun</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col py-4">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/BGarlicBread.jpeg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Garlic Bread</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col py-4">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/BRotiPizzaMini.jpeg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Roti Pizza Mini</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col py-4">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/BStuffedTunaBun.jpeg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Stuffed Tuna Bun</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col py-4">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/PCroissant.jpeg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Croissant</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col py-4">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/PCinnamonPalmiers.jpeg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Cinnamon Palmiers</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col py-4">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/PCinnamonRoll.jpeg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Cinnamon Roll</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col py-4">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/PBlackberryCreamCheese.jpeg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Blackberry Cream Cheese</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col py-4">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/PCromboloni.jpeg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Cromboloni</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col py-4">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/CBlueberryCheesecake.jpeg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Blueberry Cheesecake</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col py-4">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/CStrawberryLemonLayerCake.jpeg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Strawberry Lemon Layer Cake</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col py-4">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/CChocolateRaspberryCheesecake.jpeg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Chocolate Raspberry Cheesecake</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col py-4">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/CRedVelvet.jpeg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Red Velvet</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col py-4">
                        <div class="card h-100">
                            <img src="{{ Vite::asset('resources/images/COperaCake.jpeg') }}">
                            <div class="card-body">
                                <h5 class="card-title">Opera Cake</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <div class="container-fluid" style="background-color: #644961">
        <footer class="py-3" style="background-color: #644961">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>
            <p class="text-center text-white">© 2024 Breadship, Inc</p>
        </footer>
    </div>
    {{-- <footer class="footer mt-auto py-3" style="background-color: #644961">
        <div class="px-1 py-5 my-1" style="background-color: #644961">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p class="text-muted">&copy; 2024 - [Breadship]. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted">Terms of Service</a></li>
                        <li><a href="#" class="text-muted">Privacy Policy</a></li>
                        <li><a href="#" class="text-muted">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted">Social Media</a></li>
                        <li><a href="#" class="text-muted">FAQ</a></li>
                        <li><a href="#" class="text-muted">About Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </footer> --}}
    @vite('resources/js/app.js')
</body>

</html>

{{-- src="{{Vite::asset('resources/images/logo.png')}}" --}}
