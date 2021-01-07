<html>
    <head>
        <title>Postify - @yield('title')</title>
    </head>
    <body>
    <nav>
    </nav>
    <main>
    <nav>
        <a href="/">Postify | Admin </a>
        <ul>
            @guest
            <li>
                <a href="/login"> Log In </a>
            </li>
            <li>
                <a href="/register"> Register </a>
            </li>
            @endguest

            @auth
            <li>
                <a href="/profile"> {{ auth()->user()->name }} </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
            @endauth

        </ul>
    </nav>
        <div class="container">
            @yield('content')
        </div>
    </main>
    </body>
</html>