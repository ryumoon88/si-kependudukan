<div class="container d-flex align-items-center justify-content-between">
    <div class="logo">
        <h1><a href="{{ route('user.home') }}">SI Kependudukan</a></h1>
        {{-- <!-- Uncomment below if you prefer to use an image logo --> --}}
        {{-- <a href="index.html"><img src="assets{{ Vite::image('logo.png') }}" alt="" class="img-fluid"></a> --}}
    </div>

    <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto"
                    href="@if (Route::is('user.home')) #hero @else {{ route('user.home') }} @endif">Home</a></li>
            <li><a class="nav-link scrollto"
                    href="@if (Route::is('user.home')) #about @else {{ url('/#about') }} @endif">About</a>
            </li>
            <li><a class="nav-link scrollto" href="#services">Services</a></li>
            {{-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li> --}}
            <li><a class="nav-link scrollto" href="#berita">News & Article</a></li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

            @auth
                <li class="dropdown"><a href="" type="button"><img src="{{ Vite::image('team/team-3.jpg') }}"
                            alt="" srcset="" style="max-width: 30px;" class="img-fluid rounded-circle me-2">
                        <span>{{ Auth::user()->citizen->first_name . ' ' . Auth::user()->citizen->last_name }}</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul>
                        @if (Auth::user()->hasPermissionTo('view-admin-dashboard', 'admin'))
                            <li><a href="{{ route('admin.dashboard') }}"> Dashboard</a></li>
                        @endif
                        <li>
                            <form action="{{ route('user.logout') }}" method="post" class="d-flex">
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
