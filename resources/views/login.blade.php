<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login EduKum</title>

  <style>
    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
      font-family:'Segoe UI',sans-serif;
    }

    body{
      height:100vh;
      display:flex;
      flex-direction:column;
      justify-content:center;
      align-items:center;
      background:linear-gradient(
        180deg,
        #2B3056 0%,
        #333863 50%,
        #2B3056 100%
      );
    }

    /* LOGO */
    .brand{
      display:flex;
      align-items:center;
      gap:10px;
      margin-bottom:25px;
    }

    .brand img{
      width:45px;
      height:45px;
    }

    .brand span{
      font-size:22px;
      font-weight:bold;
      color:#fff;
    }

    /* CARD LOGIN */
    .container{
      width:400px;
      background:#f5f5f5;
      border-radius:18px;
      padding:30px;
      text-align:center;
      box-shadow:0 10px 30px rgba(0,0,0,0.25);
    }

    h3{
      margin-bottom:6px;
      color:#1f2937;
      font-size:24px;
    }

    p{
      color:#6b7280;
      margin-bottom:22px;
      font-size:14px;
    }

    .form-group{
      text-align:left;
      margin-bottom:16px;
    }

    label{
      font-weight:600;
      font-size:14px;
      color:#374151;
    }

    input[type="email"],
    input[type="password"]{
      width:100%;
      padding:12px;
      border-radius:10px;
      border:1px solid #d1d5db;
      margin-top:6px;
      outline:none;
      transition:0.3s;
    }

    input[type="email"]:focus,
    input[type="password"]:focus{
      border-color:#5a67d8;
    }

    .options{
      display:flex;
      justify-content:space-between;
      align-items:center;
      font-size:13px;
      margin:12px 0;
    }

    .options a{
      text-decoration:none;
      color:#4f46e5;
      font-weight:500;
    }

    .btn-login{
      width:100%;
      padding:12px;
      background:linear-gradient(
        90deg,
        #6c7ae0,
        #5a67d8
      );
      border:none;
      border-radius:12px;
      color:#fff;
      font-weight:600;
      cursor:pointer;
      margin-top:10px;
      transition:0.3s;
    }

    .btn-login:hover{
      opacity:0.9;
    }

   .divider{
    display:flex;
    align-items:center;
    margin:20px 0;
    color:#9ca3af;
    font-size:12px;
}

.divider::before,
.divider::after{
    content:'';
    flex:1;
    border-bottom:1px solid #d1d5db;
}

.divider span{
    padding:0 12px;
}

.btn-google{
    width:100%;
    height:50px;
    background:#fff;
    border:1px solid #d1d5db;
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    cursor:pointer;
    font-size:14px;
    font-weight:600;
    color:#374151;
    transition:.3s;
}

.btn-google:hover{
    background:#f9fafb;
}

.btn-google img{
    width:18px;
    height:18px;
}

    .btn-google:hover{
      background:#f3f4f6;
    }

    .signup{
      margin-top:18px;
      font-size:14px;
      color:#4b5563;
    }

    .signup a{
      color:#4f46e5;
      text-decoration:none;
      font-weight:600;
    }

    .error{
      background:#fee2e2;
      color:#dc2626;
      padding:10px;
      border-radius:10px;
      margin-bottom:15px;
      font-size:14px;
    }

    @media(max-width:500px){

      .container{
        width:90%;
      }

    }

  </style>
</head>

<body>

  <!-- LOGO -->
  <div class="brand">
    <img src="{{ asset('Logo-Kemenkumham-RI.png') }}" alt="Logo">
    <span>EduKum</span>
  </div>

  <!-- CARD LOGIN -->
  <div class="container">

    <h3>Masuk ke EduKum</h3>

    <p>
      Silakan masukkan detail Anda
    </p>

    @if ($errors->any())
      <div class="error">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="/login">
      @csrf

      <div class="form-group">
        <label>Email</label>
        <input
          type="email"
          name="email"
          placeholder="Masukkan Email Anda"
          required>
      </div>

      <div class="form-group">
        <label>Kata Sandi</label>
        <input
          type="password"
          name="password"
          placeholder="Masukkan Kata Sandi"
          required>
      </div>

      <div class="options">

        <label>
          <input type="checkbox" name="remember">
          Ingat Saya
        </label>

        <a href="#">
          Lupa Kata Sandi?
        </a>

      </div>

      <button type="submit" class="btn-login">
        Masuk
      </button>

      <div class="divider">
    <span>atau</span>
      </div>

      <button type="button" class="btn-google">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" alt="Google">
          Masuk dengan Google
      </button>

      <div class="signup">
        Belum memiliki akun?
        <a href="#">
          Daftar
        </a>
      </div>

    </form>

  </div>

</body>
</html>