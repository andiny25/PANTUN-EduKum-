<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lupa Kata Sandi - PANTUN</title>

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
           BACKGROUND LIGHT
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
           DEKORASI BAWAH
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
           CARD
        ===================================================== */

        .container {
            width: 510px;

            max-width: 100%;

            background: rgba(255, 255, 255, 0.98);

            border-radius: 30px;

            padding: 35px 48px 32px;

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

            margin-bottom: 24px;
        }


        /* =====================================================
           LOGO
        ===================================================== */

        .logo-wrapper {
            position: relative;

            width: 95px;
            height: 95px;

            display: flex;

            align-items: center;
            justify-content: center;

            margin-bottom: 10px;
        }


        .logo-wrapper::before {
            content: "";

            position: absolute;

            width: 95px;
            height: 95px;

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


        .brand img {
            position: relative;

            width: 85px;
            height: 85px;

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
           JUDUL
        ===================================================== */

        .container h3 {
            color: #20232d;

            font-size: 25px;

            font-weight: 800;

            line-height: 1.2;

            margin-bottom: 7px;

            letter-spacing: -0.5px;
        }


        .container > p {
            color: #737b8d;

            font-size: 13px;

            line-height: 1.5;

            margin-bottom: 22px;
        }


        /* =====================================================
           STATUS BERHASIL
        ===================================================== */

        .status {
            background: #dcfce7;

            color: #15803d;

            padding: 11px 13px;

            border-radius: 9px;

            margin-bottom: 15px;

            font-size: 12px;

            text-align: left;

            line-height: 1.5;
        }


        /* =====================================================
           ERROR
        ===================================================== */

        .error {
            background: #fee2e2;

            color: #dc2626;

            padding: 10px 12px;

            border-radius: 9px;

            margin-bottom: 15px;

            font-size: 12px;

            text-align: left;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-group {
            text-align: left;

            margin-bottom: 16px;
        }


        .form-group label {
            display: block;

            color: #374151;

            font-size: 12px;

            font-weight: 600;

            margin-bottom: 6px;
        }


        input[type="email"] {
            width: 100%;

            height: 46px;

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
           BUTTON KIRIM
        ===================================================== */

        .btn-submit {
            width: 100%;

            height: 46px;

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


        .btn-submit:hover {
            transform: translateY(-1px);

            box-shadow:
                0 9px 20px
                rgba(45, 112, 220, 0.30);
        }


        .btn-submit:active {
            transform: translateY(0);
        }


        /* =====================================================
           KEMBALI KE LOGIN
        ===================================================== */

        .back-login {
            display: inline-block;

            margin-top: 18px;

            color: #2879e8;

            font-size: 11px;

            font-weight: 600;

            text-decoration: none;
        }


        .back-login:hover {
            text-decoration: underline;
        }


        /* =====================================================
           SECURITY
        ===================================================== */

        .secure-text {
            margin-top: 14px;

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

                padding: 30px 30px 27px;

                border-radius: 25px;
            }


            .logo-wrapper {
                width: 85px;
                height: 85px;
            }


            .logo-wrapper::before {
                width: 85px;
                height: 85px;
            }


            .brand img {
                width: 76px;
                height: 76px;
            }


            .brand-text span {
                font-size: 22px;
            }


            .container h3 {
                font-size: 23px;
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
                padding: 27px 20px 24px;

                border-radius: 21px;
            }


            .logo-wrapper {
                width: 75px;
                height: 75px;

                margin-bottom: 8px;
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
                font-size: 10px;

                max-width: 280px;
            }


            .container h3 {
                font-size: 21px;
            }


            .container > p {
                font-size: 11px;
            }


            .btn-submit {
                height: 43px;
            }


            .bottom-decoration {
                opacity: 0.22;
            }


            .bottom-decoration img {
                width: 100%;
                height: auto;
            }
        }

    </style>

</head>


<body>


    <!-- =====================================================
         DEKORASI BAWAH
    ===================================================== -->

    <div class="bottom-decoration">

        <img
            src="{{ asset('legal-decoration.png') }}"
            alt="Dekorasi hukum"
        >

    </div>


    <!-- =====================================================
         CARD
    ===================================================== -->

    <div class="container">


        <!-- =================================================
             BRAND
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
             JUDUL
        ================================================= -->

        <h3>
            Lupa Kata Sandi?
        </h3>


        <p>
            Jangan khawatir. Masukkan email yang terdaftar
            untuk mendapatkan link reset kata sandi.
        </p>


        <!-- =================================================
             STATUS
        ================================================= -->

        @if (session('status'))

            <div class="status">
                {{ session('status') }}
            </div>

        @endif


        <!-- =================================================
             ERROR
        ================================================= -->

        @if ($errors->any())

            <div class="error">
                {{ $errors->first('email') }}
            </div>

        @endif


        <!-- =================================================
             FORM
        ================================================= -->

        <form
            method="POST"
            action="{{ route('password.email') }}"
        >

            @csrf


            <div class="form-group">

                <label for="email">
                    Email
                </label>


                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Masukkan email Anda"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                >

            </div>


            <button
                type="submit"
                class="btn-submit"
            >
                Kirim Link Reset
            </button>


        </form>


        <!-- =================================================
             KEMBALI
        ================================================= -->

        <a
            href="{{ route('login') }}"
            class="back-login"
        >
            ← Kembali ke Halaman Login
        </a>


        <!-- =================================================
             SECURITY
        ================================================= -->

        <div class="secure-text">

            Sistem login menggunakan autentikasi yang aman.

        </div>


    </div>

</body>

</html>