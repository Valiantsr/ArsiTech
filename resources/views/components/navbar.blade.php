<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ auth()->user()->avatar }}" class="user-image img-circle elevation-2"
                    alt="User Image">
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary mb-2">
                    <img src="{{ auth()->user()->avatar }}" class="img-circle elevation-2"
                        alt="User Image">
                    <p>
                        @if (auth()->user()->role == 'admin')
                        {{ auth()->user()->email }}
                        @elseif (auth()->user()->role == 'arsitek')
                        {{ Auth::user()->arsitek->nama_depan }}
                        @else
                        {{ Auth::user()->pelanggan->nama_depan }}
                        @endif
                        
                        <small>Member since {{ auth()->user()->created_at }}</small>
                    </p>
                </li>
                <li class="user-footer">
                    <a href="#" class="btn btn-default">Profile</a>
                    <a class="btn btn-danger float-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>

</nav>
