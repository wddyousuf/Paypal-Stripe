<div class="profile-sidebar shadow-sm">
    <h2>Hello, User</h2>
    <div class="profile-menubox">
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link  active " href="{{ url('/profile') }}">
                    <i class="far fa-user"></i>
                    profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ url('/orders') }}">
                    <i class="fas fa-shopping-cart"></i>
                    orders
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ url('/change-pass') }}">
                    <i class="fas fa-unlock-alt"></i>
                    change password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off"></i>
                    logout
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>
</div>
