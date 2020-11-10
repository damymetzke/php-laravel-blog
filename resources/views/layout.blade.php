<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>

    <script src="res/js/layout.js" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('resources')
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/posts">Posts</a></li>
                <li><a href="/admin">Admin</a></li>
                @guest
                    <li><a href="/login">Login</a></li>   
                @else    
                    <li><div id="layout-logout">Logout</div></li>   
                @endauth
                @yield('navigation')
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <div id="footer-padding"></div>
    <footer>
        <div>
            <p>
                Copyright &copy; Damy Metzke (2020) <br>
                <a href="https://github.com/damymetzke/php-laravel-blog">https://github.com/damymetzke/php-laravel-blog</a>
            </p>
        </div>
    </footer>
</body>
</html>