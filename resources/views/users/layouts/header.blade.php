<div class="container d-flex align-items-center justify-content-between">
    <div class="logo">
        <h1><a href="{{ route('users.index') }}">SI Kependudukan</a></h1>
        {{-- <!-- Uncomment below if you prefer to use an image logo --> --}}
        {{-- <a href="index.html"><img src="assets{{ Vite::image('logo.png') }}" alt="" class="img-fluid"></a> --}}
    </div>

    <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto"
                    href="@if (Route::is('users.index')) #hero @else {{ route('users.index') }} @endif">Home</a></li>
            <li><a class="nav-link scrollto"
                    href="@if (Route::is('users.index')) #about @else {{ url('/#about') }} @endif">About</a>
            </li>
            <li><a class="nav-link scrollto" href="#services">Services</a></li>
            {{-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li> --}}
            <li><a class="nav-link scrollto" href="/Berita">News & Article</a></li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

            @auth
                <li class="dropdown"><a href="" type="button"><img src="{{ Vite::image('team/team-3.jpg') }}"
                            alt="" srcset="" style="max-width: 30px;" class="img-fluid rounded-circle me-2">
                        <span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @if (Auth::user()->hasPermissionTo('view-admin-dashboard', 'admin'))
                            <li><a href="{{ route('admins.dashboard') }}"> Dashboard</a></li>
                        @endif
                        <li>
                            <form action="{{ route('users.logout') }}" method="post" class="d-flex">
                                @csrf
                                <button type="submit" class="btn w-100 text-start">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li><a class="nav-link" href="/login">Login</a></li>
            @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

</div>
