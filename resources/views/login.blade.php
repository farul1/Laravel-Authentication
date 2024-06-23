<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">

        @vite('resources/sass/app.scss')
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
<body>
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #007BFF;">
        <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); text-align: center; width: 300px;">
            <h1><a href="{{ route('home') }}" class="navbar-brand mb-0 h1 custom-brand"><i class="bi-hexagon-fill me-2 custom-icon"></i>Employee Data Master</a></h1>
            <div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div style="margin-bottom: 15px;">
                        <input id="email" type="email" style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Enter Your Email') }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert" style="text-align: left; color: red; font-size: 14px; margin-top: -10px;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 15px;">
                        <input id="password" type="password" style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px;" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Enter Your Password') }}">

                        @error('password')
                            <span class="invalid-feedback" role="alert" style="text-align: left; color: red; font-size: 14px; margin-top: -10px;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 15px; text-align: left;">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div>
                        <button type="submit" style="width: 100%; padding: 10px; background-color: #007BFF; border: none; color: white; border-radius: 4px; cursor: pointer; font-size: 16px;">
                            <i class="bi bi-box-arrow-in-right" style="margin-right: 5px;"></i> {{ __('Login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
