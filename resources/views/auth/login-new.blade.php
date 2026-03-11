<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital</title>
    <!-- Bootstrap 5.3 & Feather Icons (lightweight) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">
    <!-- Inter font – clean, professional -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">

    <style>
        /* === PROFESSIONAL & FUNCTIONAL DESIGN === */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body, html {
            height: 100%;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #edeeef;
        }
        .login-wrapper {
            display: flex;
            min-height: 100vh;
            /* background: #f2f7ff; */
        }
        /* LEFT IMAGE — your exact asset, left spaced */
        .login-image {
            flex: 1.1;
            background-color: transparent !important;

            background: url('{{ asset("images/auth-cover-login-bg.svg") }}') no-repeat left center;
            /* background-size: contain;
            background-position: left 3rem center; */
            /* margin: 2.5rem 1.5rem 2.5rem 2.5rem;
            border-radius: 32px;
            box-shadow: 0 20px 40px -15px rgba(0, 20, 50, 0.12);
            background-color: #e9f0fa; soft fallback */
        }
        /* RIGHT FORM — clean glass panel */
        .login-form-container {
            flex: 0.9;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 3rem 2rem 1rem;
        }
        .login-card {
            width: 100%;
            max-width: 440px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 44px;
            padding: 2.8rem 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.7);
            box-shadow: 0 30px 50px -25px rgba(0, 40, 80, 0.2), 0 0 0 1px rgba(255,255,255,0.5) inset;
        }
        /* logo – left aligned, your exact path */
        .login-logo {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 2rem;
        }
        .login-logo img {
            max-width: 110px;
            height: auto;
            filter: drop-shadow(0 6px 12px rgba(0, 30, 60, 0.1));
        }
        /* headings */
        .login-card h2 {
            font-weight: 600;
            font-size: 2rem;
            color: #0b253c;
            letter-spacing: -0.02em;
            margin-bottom: 0.2rem;
        }
        .subtitle {
            color: #4f6b8a;
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }
        /* form fields – crisp & accessible */
        .form-control {
            background: rgba(255, 255, 255, 0.9);
            border: 1.5px solid #dfe8f2;
            border-radius: 20px !important;
            padding: 0.9rem 1.5rem !important;
            font-size: 0.95rem;
            color: #152f4b;
            transition: all 0.2s;
        }
        .form-control:focus {
            border-color: #2b6ed7;
            background: #ffffff;
            box-shadow: 0 4px 14px rgba(0, 85, 204, 0.1), 0 0 0 3px rgba(43, 110, 215, 0.1);
            outline: none;
        }
        .form-control::placeholder {
            color: #8aa0bc;
            font-weight: 400;
        }
        /* validation styling */
        .form-control.is-invalid {
            border-color: #d14b5e;
            background: #fff7f8;
        }
        .invalid-feedback {
            font-size: 0.8rem;
            color: #b13e4e;
            padding-left: 0.5rem;
            font-weight: 500;
        }
        /* remember & forgot */
        .form-check-input {
            border: 1.5px solid #cbd6e4;
            border-radius: 5px;
            background-color: white;
            cursor: pointer;
        }
        .form-check-input:checked {
            background-color: #1f5fcf;
            border-color: #1f5fcf;
        }
        .form-check-label {
            color: #244362;
            font-weight: 500;
            font-size: 0.9rem;
        }
        .forgot-link {
            color: #1e5bbf;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            border-bottom: 1px solid transparent;
            transition: border-color 0.15s;
        }
        .forgot-link:hover {
            border-bottom-color: #1e5bbf;
        }
        /* primary button – professional, flat */
        .btn-primary-custom {
            background: #0f2d5c;
            border: none;
            border-radius: 40px;
            padding: 0.9rem 0;
            font-weight: 600;
            font-size: 1rem;
            color: white;
            box-shadow: 0 8px 18px -8px rgba(10, 40, 90, 0.4);
            transition: all 0.2s;
        }
        .btn-primary-custom:hover {
            background: #173e76;
            transform: scale(1.02);
            
            box-shadow: 0 12px 24px -10px #b6b6b6;
        }
        .btn-primary-custom:active {
            background: #0a2347;
            transform: scale(0.98);
        }
        /* social buttons – minimal, elegant */
        .social-login .btn-social {
            background: #ffffffd9;
            border: 1px solid #000000;
            border-radius: 50px;
            width: 54px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #284f7c;
            font-size: 1.4rem;
            transition: 0.15s;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        }
        .social-login .btn-social:hover {
            background: white;
            border-color: #25354e;
            color: #103d77;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px -8px rgba(0,65,130,0.2);
        }
        /* register link */
        .register-link {
            color: #49678b;
            font-size: 0.95rem;
        }
        .register-link a {
            font-weight: 700;
            color: #154c9e;
            text-decoration: none;
            border-bottom: 1.5px solid #cddff5;
            transition: border-color 0.15s;
        }
        .register-link a:hover {
            border-bottom-color: #154c9e;
        }
        /* responsive */
        @media (max-width: 1000px) {
            .login-wrapper { flex-direction: column; }
            .login-image {
                flex: 0 0 220px;
                margin: 2rem 2rem 0 2rem;
                background-position: center;
            }
            .login-form-container { padding: 2rem; }
            .login-card { max-width: 480px; }
        }
        @media (max-width: 480px) {
            .login-card { padding: 2rem 1.5rem; }
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <!-- LEFT: your image (exact path) -->
    <div class="login-image d-none d-lg-block"
         style="background-image: url('{{ asset("images/auth-cover-login-bg.svg") }}'); background-position: left 3rem center; background-size: contain; background-repeat: no-repeat;">
    </div>

    <!-- RIGHT: login form (fully functional with Laravel) -->
    <div class="login-form-container">
        <div class="login-card">
            <!-- logo – your exact path -->
            <div class="login-logo">
                <img src="{{ asset('images/logo-abbr.png') }}" alt="Duralux" onerror="this.src='https://cdn-icons-png.flaticon.com/512/2830/2830285.png'">
            </div>

            <h2>Sign in to your Medical Billing account</h2>
            {{-- <div class="subtitle">Sign in to your hopital account</div> --}}

            <!-- ===== LARAVEL LOGIN FORM ===== -->
            <!-- method POST, CSRF, route name, remember, error display — all present -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email / Username -->
                <div class="mb-3">
                    <input id="email" type="email" name="email" placeholder="Email or username"
                           value="{{ old('email') }}" required autofocus
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <input id="password" type="password" name="password" placeholder="Password" required
                           class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Remember me & Forgot password -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                        <label class="form-check-label" for="remember_me">Keep me signed in</label>
                    </div>
                    @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
                    @endif
                </div>

                <!-- Login button -->
                <div class="d-grid mb-4">
                    <button type="submit" class="btn btn-primary-custom">Sign in</button>
                </div>
            </form>

            <!-- Register link -->
            <p class="text-center register-link mt-4 mb-0">
                Don't have an account? <a href="{{ route('register') }}">Create account</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>