<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('styles.css') }}" rel="stylesheet">
    <link href="{{ asset('join.css') }}" rel="stylesheet">
    <title>Denger.in - Join</title>
</head>

<body class="full-height-grow">
    <div class="container full-height-grow">
        <header class="main-header">
            <a href="/" class="brand-logo">
                <img src="images/logo.png">
                <div class="brand-logo-name">Denger.in</div>
            </a>
            <nav class="main-nav">
                <ul>
                    <li><a href="/login">Sign In</a></li>
                </ul>
            </nav>
        </header>
        <section class="join-main-section">
            <h1 class="join-text">
                Join the
                <span class="accent-text">fun.</span>
            </h1>
            <form class="join-form" method="POST" action="{{ route('register') }}">
                @csrf
                @if ($errors->any())
                <span style="color: #f75111;">Login Failed. Make sure you're not BOT!</span>
                @endif
                @if (session('register_error'))
                <span style="color: #f75111;"> {{ session('register_error') }}</span>
                @endif
                <div class="input-group">
                    <label>Username:</label>
                    <input type="text" name="username" value="{{ old('username') }}">
                    @error('username')
                    <span style="color: #f75111;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label>Email:</label>
                    <input type="email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <span style="color: #f75111;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label>Password:</label>
                    <input type="password" name="password">
                </div>
                <div class="input-group">
                    <button type="submit" class="btn">Join Now</button>
                </div>
            </form>
        </section>
    </div>

    <div class="join-page-circle-1"></div>
    <div class="join-page-circle-2"></div>

    <footer class="main-footer">
        <div class="container">
            <nav class="footer-nav">
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
            <nav class="footer-nav">
                <ul>
                    <li>
                        <a href="#" class="social-link">
                            <img src="{{ asset('images/twitter.svg') }}">
                            Twitter
                        </a>
                    </li>
                    <li>
                        <a href="#" class="social-link">
                            <img src="{{ asset('images/facebook.svg') }}">
                            Facebook
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </footer>
</body>

</html>