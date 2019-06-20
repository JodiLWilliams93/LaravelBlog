<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="{{ route('blog.index') }}" class="navbar-brand">Laravel Guide</a>
            <ul class="nav navbar-nav">
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                <li><a href="{{ route('other.about') }}">About</a></li>
                <li><a href="{{ route('tutorial.index') }}">Tutorials</a></li>
                <li class=""><a href="{{ route('admin.index') }}">Posts</a></li>
                <li class=""><a href="{{ route('admin.tutorialList') }}">Manage Tutorials</a></li>
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>