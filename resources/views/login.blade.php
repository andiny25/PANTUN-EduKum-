<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login PANTUN</title>

    <style>

        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }


        /* =====================================================
           BODY / BACKGROUND
        ===================================================== */

        body {
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 30px 20px;

            position: relative;

            overflow: hidden;

            background-color: #101943;

            background-image:
                linear-gradient(
                    rgba(16, 25, 67, 0.50),
                    rgba(16, 25, 67, 0.50)
                ),
                url("{{ asset('legal-pattern.png') }}");

            background-size:
                cover,
                850px;

            background-repeat:
                no-repeat,
                repeat;

            background-position:
                center,
                center;
        }


        /* =====================================================
           BACKGROUND LIGHT EFFECT
        ===================================================== */

        body::before {
            content: "";

            position: fixed;

            inset: 0;

            background:
                radial-gradient(
                    circle at 15% 20%,
                    rgba(95, 135, 220, 0.08),
                    transparent 25%
                ),
                radial-gradient(
                    circle at 85% 80%,
                    rgba(95, 135, 220, 0.08),
                    transparent 25%
                );

            pointer-events: none;

            z-index: 0;
        }


        /* =====================================================
           LINGKARAN DEKORASI
        ===================================================== */

        body::after {
            content: "";

            position: fixed;

            width: 650px;
            height: 650px;

            border-radius: 50%;

            border: 1px solid rgba(170, 195, 240, 0.07);

            top: -370px;
            right: -120px;

            pointer-events: none;

            z-index: 0;
        }


        /* =====================================================
           LEGAL DECORATION BAGIAN BAWAH
        ===================================================== */

        .bottom-decoration {
            position: fixed;

            left: 0;

            bottom: -100px;

            width: 100%;

            z-index: 2;

            pointer-events: none;

            overflow: hidden;

            display: flex;

            justify-content: center;

            align-items: flex-end;

            opacity: 0.30;
        }


        .bottom-decoration img {
            display: block;

            width: 100%;

            height: auto;

            max-width: none;

            object-fit: contain;

            object-position: bottom center;
        }


        /* =====================================================
           LOGIN CARD
           DIPENDEKKAN
        ===================================================== */

        .container {
            width: 510px;

            max-width: 100%;

            background: rgba(255, 255, 255, 0.98);

            border-radius: 30px;

            /* Tinggi card diperkecil */
            padding: 20px 48px 18px;

            text-align: center;

            box-shadow:
                0 30px 70px rgba(0, 0, 0, 0.30);

            border: 1px solid rgba(255, 255, 255, 0.90);

            position: relative;

            z-index: 10;
        }


        /* =====================================================
           BRAND
        ===================================================== */

        .brand {
            display: flex;

            flex-direction: column;

            align-items: center;

            margin-bottom: 14px;
        }


        /* =====================================================
           LOGO WRAPPER
        ===================================================== */

        .logo-wrapper {
            position: relative;

            width: 105px;
            height: 105px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 6px;
        }


        .logo-wrapper::before {
            content: "";

            position: absolute;

            width: 105px;
            height: 105px;

            border-radius: 38%;

            background:
                linear-gradient(
                    145deg,
                    #edf7ff,
                    #d9ebff
                );

            box-shadow:
                0 10px 28px
                rgba(40, 90, 170, 0.18);

            transform: rotate(-4deg);
        }


        /* =====================================================
           LOGO PANTUN
        ===================================================== */

        .brand img {
            position: relative;

            width: 94px;
            height: 94px;

            object-fit: contain;

            border-radius: 35%;

            display: block;

            filter:
                drop-shadow(
                    0 7px 12px
                    rgba(0, 0, 0, 0.18)
                );
        }


        /* =====================================================
           NAMA PANTUN
        ===================================================== */

        .brand-text {
            display: flex;

            flex-direction: column;

            align-items: center;

            text-align: center;
        }


        .brand-text span {
            color: #263a80;

            font-size: 24px;

            font-weight: 800;

            line-height: 1.1;

            letter-spacing: -0.5px;
        }


        .brand-text p {
            color: #667085;
            font-size: 12px;
            font-weight: 500;
            line-height: 1.5;
            margin-top: 5px;
            max-width: 360px;
        }


        /* =====================================================
           JUDUL LOGIN
        ===================================================== */

        .container h3 {
            color: #20232d;

            font-size: 27px;

            font-weight: 800;

            line-height: 1.2;

            margin-bottom: 4px;

            letter-spacing: -0.5px;
        }


        .container > p {
            color: #737b8d;

            font-size: 13px;

            line-height: 1.5;

            margin-bottom: 15px;
        }


        /* =====================================================
           ERROR LOGIN
        ===================================================== */

        .error {
            background: #fee2e2;

            color: #dc2626;

            padding: 9px 12px;

            border-radius: 9px;

            margin-bottom: 12px;

            font-size: 12px;

            text-align: left;
        }


        /* =====================================================
           FORM GROUP
        ===================================================== */

        .form-group {
            text-align: left;

            margin-bottom: 10px;
        }


        .form-group > label {
            display: block;

            color: #374151;

            font-size: 12px;

            font-weight: 600;

            margin-bottom: 5px;
        }


        /* =====================================================
           INPUT EMAIL
        ===================================================== */

        input[type="email"] {
            width: 100%;

            height: 43px;

            padding: 0 13px;

            border-radius: 10px;

            border: 1px solid #d9dfe9;

            outline: none;

            background: #ffffff;

            color: #1f2937;

            font-size: 13px;

            transition: 0.25s;
        }


        input[type="email"]::placeholder {
            color: #a2a9b8;
        }


        input[type="email"]:focus {
            border-color: #397ee8;

            box-shadow:
                0 0 0 3px
                rgba(57, 126, 232, 0.10);
        }


        /* =====================================================
           PASSWORD
        ===================================================== */

        .password-wrapper {
            position: relative;

            width: 100%;
        }


        .password-wrapper input {
            width: 100%;

            height: 43px;

            padding: 0 43px 0 13px;

            border-radius: 10px;

            border: 1px solid #d9dfe9;

            outline: none;

            background: #ffffff;

            color: #1f2937;

            font-size: 13px;

            transition: 0.25s;
        }


        .password-wrapper input::placeholder {
            color: #a2a9b8;
        }


        .password-wrapper input:focus {
            border-color: #397ee8;

            box-shadow:
                0 0 0 3px
                rgba(57, 126, 232, 0.10);
        }


        /* =====================================================
           TOGGLE PASSWORD
        ===================================================== */

        .toggle-password {
            position: absolute;

            right: 7px;

            top: 50%;

            transform: translateY(-50%);

            width: 31px;

            height: 31px;

            border: none;

            background: transparent;

            cursor: pointer;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 16px;

            color: #7a8394;

            border-radius: 7px;

            transition: 0.2s;
        }


        .toggle-password:hover {
            background: #f1f5f9;
        }


        /* =====================================================
           OPTIONS
        ===================================================== */

        .options {
            display: flex;

            justify-content: space-between;

            align-items: center;

            font-size: 11px;

            margin: 6px 0 12px;
        }


        .remember {
            display: flex;

            align-items: center;

            gap: 6px;

            color: #596273;

            cursor: pointer;
        }


        .remember input {
            cursor: pointer;

            accent-color: #2879e8;
        }


        .options a {
            text-decoration: none;

            color: #2879e8;

            font-weight: 600;
        }


        .options a:hover {
            text-decoration: underline;
        }


        /* =====================================================
           BUTTON LOGIN
        ===================================================== */

        .btn-login {
            width: 100%;

            height: 44px;

            border: none;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    #397ee8,
                    #2468d5
                );

            color: #ffffff;

            font-size: 13px;

            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 7px 16px
                rgba(45, 112, 220, 0.22);

            transition: 0.25s;
        }


        .btn-login:hover {
            transform: translateY(-1px);

            box-shadow:
                0 9px 20px
                rgba(45, 112, 220, 0.30);
        }


        .btn-login:active {
            transform: translateY(0);
        }


        /* =====================================================
           DIVIDER
        ===================================================== */

        .divider {
            display: flex;

            align-items: center;

            margin: 13px 0;

            color: #9ca3af;

            font-size: 10px;
        }


        .divider::before,
        .divider::after {
            content: "";

            flex: 1;

            height: 1px;

            background: #e4e7ed;
        }


        .divider span {
            padding: 0 11px;
        }


        /* =====================================================
           GOOGLE BUTTON
        ===================================================== */

        .btn-google {
            width: 100%;

            height: 43px;

            border-radius: 10px;

            border: 1px solid #d9dfe9;

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 9px;

            color: #343844;

            font-size: 12px;

            font-weight: 600;

            cursor: pointer;

            transition: 0.25s;

            box-shadow:
                0 3px 8px rgba(0, 0, 0, 0.04);

            text-decoration: none;
        }


        .btn-google:hover {
            background: #f8fafc;

            transform: translateY(-1px);

            box-shadow:
                0 5px 12px
                rgba(0, 0, 0, 0.07);
        }


        .btn-google img {
            width: 17px;

            height: 17px;
        }


        /* =====================================================
           SECURITY TEXT
        ===================================================== */

        .secure-text {
            margin-top: 10px;

            color: #91a5ca;

            font-size: 10px;

            font-weight: 600;
        }


        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 700px) {

            body {
                padding: 20px 15px;

                background-size:
                    cover,
                    650px;
            }


            .container {
                width: 100%;

                max-width: 470px;

                padding: 22px 30px 20px;

                border-radius: 25px;
            }


            .logo-wrapper {
                width: 90px;

                height: 90px;
            }


            .logo-wrapper::before {
                width: 90px;

                height: 90px;
            }


            .brand img {
                width: 80px;

                height: 80px;
            }


            .brand-text span {
                font-size: 22px;
            }


            .container h3 {
                font-size: 24px;
            }


            .bottom-decoration img {
                width: 100%;

                height: auto;
            }


            .bottom-decoration {
                opacity: 0.26;
            }
        }


        /* =====================================================
           HP
        ===================================================== */

        @media (max-width: 500px) {

            body {
                padding: 12px;

                background-size:
                    cover,
                    500px;
            }


            .container {
                padding: 20px 20px 18px;

                border-radius: 21px;
            }


            .logo-wrapper {
                width: 75px;

                height: 75px;

                margin-bottom: 6px;
            }


            .logo-wrapper::before {
                width: 75px;

                height: 75px;
            }


            .brand img {
                width: 67px;

                height: 67px;
            }


            .brand-text span {
                font-size: 20px;
            }


            .brand-text p {
                font-size: 8px;

                max-width: 280px;
            }


            .container h3 {
                font-size: 21px;
            }


            .container > p {
                font-size: 11px;
            }


            .options {
                font-size: 10px;
            }


            .btn-login,
            .btn-google {
                height: 42px;
            }


            .bottom-decoration img {
                width: 100%;

                height: auto;
            }


            .bottom-decoration {
                opacity: 0.22;
            }
        }

    </style>

</head>


<body>


    <!-- =====================================================
         DECORATION BAWAH
    ===================================================== -->

    <div class="bottom-decoration">

        <img
            src="{{ asset('legal-decoration.png') }}"
            alt="Dekorasi hukum"
        >

    </div>


    <!-- =====================================================
         LOGIN CARD
    ===================================================== -->

    <div class="container">


        <!-- =================================================
             LOGO PANTUN
        ================================================= -->

        <div class="brand">

            <div class="logo-wrapper">

                <img
                    src="{{ asset('logo pantun.png') }}"
                    alt="Logo PANTUN"
                >

            </div>


            <div class="brand-text">

                <span>
                    PANTUN
                </span>


                <p>
                    Sistem Pengelolaan & Penyajian
                    Materi Literasi Hukum Terpadu
                </p>

            </div>

        </div>


        <!-- =================================================
             JUDUL LOGIN
        ================================================= -->

        <h3>
            Masuk ke PANTUN
        </h3>


        <p>
            Silakan masukkan detail Anda untuk melanjutkan
        </p>


        <!-- =================================================
             ERROR
        ================================================= -->

        @if ($errors->any())

            <div class="error">

                {{ $errors->first() }}

            </div>

        @endif


        <!-- =================================================
             FORM LOGIN
        ================================================= -->

        <form
            method="POST"
            action="/login"
        >

            @csrf


            <!-- EMAIL -->

            <div class="form-group">

                <label for="email">
                    Email
                </label>


                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Masukkan Email Anda"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                >

            </div>


            <!-- PASSWORD -->

            <div class="form-group">

                <label for="password">
                    Kata Sandi
                </label>


                <div class="password-wrapper">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan Kata Sandi"
                        required
                        autocomplete="current-password"
                    >


                    <button
                        type="button"
                        class="toggle-password"
                        id="togglePassword"
                        title="Lihat kata sandi"
                    >
                        👁
                    </button>

                </div>

            </div>


            <!-- OPTIONS -->

            <div class="options">

                <label class="remember">

                    <input
                        type="checkbox"
                        name="remember"
                    >

                    <span>
                        Ingat Saya
                    </span>

                </label>


                <a href="{{ route('password.request') }}">
                    Lupa Kata Sandi?
                </a>

            </div>


            <!-- LOGIN -->

            <button
                type="submit"
                class="btn-login"
            >
                Masuk
            </button>


            <!-- DIVIDER -->

            <div class="divider">

                <span>
                    atau
                </span>

            </div>


            <!-- GOOGLE LOGIN -->

            <a
                href="{{ route('google.login') }}"
                class="btn-google"
            >

                <img
                    src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg"
                    alt="Google"
                >


                <span>
                    Masuk dengan Google
                </span>

            </a>


            <!-- SECURITY -->

            <div class="secure-text">

                Sistem login menggunakan autentikasi yang aman.

            </div>


        </form>


    </div>


    <!-- =====================================================
         JAVASCRIPT
    ===================================================== -->

    <script>

        const togglePassword =
            document.getElementById('togglePassword');

        const password =
            document.getElementById('password');


        togglePassword.addEventListener(
            'click',
            function () {

                if (password.type === 'password') {

                    password.type = 'text';

                    togglePassword.textContent = '👁';

                    togglePassword.title =
                        'Sembunyikan kata sandi';

                } else {

                    password.type = 'password';

                    togglePassword.textContent = '👁';

                    togglePassword.title =
                        'Lihat kata sandi';

                }

            }
        );

    </script>


</body>

</html>