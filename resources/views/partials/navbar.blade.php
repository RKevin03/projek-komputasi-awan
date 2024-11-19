<!-- navbar.blade.php -->
<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #644961">
    <div class="container-fluid" style="background-color: #644961;">
        <a class="navbar-brand fw-bold fs-4 px-5" href="#"><img class="d-inline-block align-text-top"
                src="{{ Vite::asset('resources/images/logo.png') }}" width="45" height="40">Breadship</a>
        <ul class="navbar-nav mb-2 mb-md-0 fs-5" style="padding-right: 5rem;">
            {{-- <li class="nav-item">
                <a class="nav-link text-light fw-semibold" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light fw-semibold" href="#">Product</a>
            </li> --}}
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
