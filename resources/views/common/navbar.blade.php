<header>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm" id="navbar_top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('homepage') }}">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link"
                            aria-current="page" href="{{ route('homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "
                            href="{{ route('courses.index') }}">courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cart-icon" href="{{ route('login') }}">
                            <i class="fa fa-user"></i>
                        </a>
                    </li>


                </ul>

            </div>
        </div>
    </nav>
</header>
