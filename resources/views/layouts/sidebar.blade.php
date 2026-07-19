<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduKum</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Poppins',sans-serif;
    }

    body{
        background:#f6f8fc;
        overflow-x:hidden;
    }

    /* ================= SIDEBAR ================= */

    .sidebar{
        position:fixed;
        left:0;
        top:0;
        width:190px;
        height:100vh;
        background:#2d3165;
        display:flex;
        flex-direction:column;
        justify-content:space-between;
        padding:16px 12px;
        z-index:1000;
    }

    .brand{
        display:flex;
        align-items:center;
        gap:10px;
        margin-bottom:25px;
        padding-left:6px;
    }

    .brand img{
        width:38px;
        height:38px;
        object-fit:contain;
    }

    .brand h2{
        color:#fff;
        font-size:14px;
        font-weight:700;
        margin:0;
    }

    .menu{
        list-style:none;
        padding:0;
        margin:0;
    }

    .menu a{
        text-decoration:none;
    }

    .menu-item{
        display:flex;
        align-items:center;
        gap:10px;
        padding:10px 12px;
        margin-bottom:6px;
        border-radius:12px;
        color:#d6daf7;
        font-size:12px;
        transition:.2s;
    }

    .menu-item:hover{
        background:rgba(255,255,255,.08);
    }

    .menu-item.active{
        background:#f7d991;
        color:#111827;
        font-weight:600;
    }

    .menu-item svg{
        width:16px;
        height:16px;
    }

    /* ================= LOGOUT ================= */

    .logout-btn{
        width:100%;
        border:none;
        border-radius:12px;
        padding:11px;
        background:#4f5f8e;
        color:white;
        font-size:12px;
        cursor:pointer;
    }

    .logout-btn:hover{
        background:#5f709f;
    }

    /* ================= MAIN ================= */

    .main{
        margin-left:190px;
        min-height:100vh;
    }

    /* ================= TOPBAR ================= */

    .topbar{
        height:70px;
        background:white;
        border-bottom:1px solid #eceff5;

        display:flex;
        align-items:center;
        justify-content:space-between;

        padding:0 20px;
    }

    .search-box{
        width:100%;
        max-width:720px;
        height:42px;
        background:#f3f4f6;
        border-radius:999px;

        display:flex;
        align-items:center;
        gap:10px;

        padding:0 18px;
    }

    .search-box svg{
        width:18px;
        height:18px;
        color:#6b7280;
    }

    .search-box input{
        width:100%;
        border:none;
        outline:none;
        background:transparent;
        font-size:13px;
    }

    .topbar-right{
        display:flex;
        align-items:center;
        gap:20px;
    }

    .notif{
        position:relative;
        cursor:pointer;
    }

    .notif svg{
        width:20px;
        height:20px;
    }

    .notif::after{
        content:'';
        width:7px;
        height:7px;
        border-radius:50%;
        background:#ef4444;

        position:absolute;
        top:-2px;
        right:-2px;
    }

    .profile{
        display:flex;
        align-items:center;
        gap:12px;
        padding-left:20px;
        border-left:1px solid #e5e7eb;
    }

    .profile span{
        font-size:13px;
        font-weight:600;
        color:#111827;
    }

    .profile img{
        width:36px;
        height:36px;
        border-radius:50%;
        object-fit:cover;
    }

    /* ================= CONTENT ================= */

    .page-content{
        padding:25px;
    }

    </style>

</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div>

        <div class="brand">
            <img src="{{ asset('Logo-Kemenkumham-RI.png') }}" alt="Logo">
            <h2>EduKum</h2>
        </div>

        <ul class="menu">

            <a href="/dashboard">
                <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i data-lucide="layout-dashboard"></i>
                    Dashboard
                </li>
            </a>

            <a href="/materi">
                <li class="menu-item {{ request()->is('materi*') ? 'active' : '' }}">
                    <i data-lucide="book-open"></i>
                    Kelola Materi
                </li>
            </a>

            <a href="/kuis">
                <li class="menu-item {{ request()->is('kuis*') ? 'active' : '' }}">
                    <i data-lucide="badge-help"></i>
                    Kuis
                </li>
            </a>

            <a href="/hasil-kuis">
                <li class="menu-item">
                    <i data-lucide="bar-chart-3"></i>
                    Hasil Kuis
                </li>
            </a>

            <a href="/paket-penyuluhan">
                <li class="menu-item">
                    <i data-lucide="archive"></i>
                    Paket Penyuluhan
                </li>
            </a>

            <a href="/penyuluh">
                <li class="menu-item">
                    <i data-lucide="briefcase"></i>
                    Data Penyuluh
                </li>
            </a>

            <a href="/users">
                <li class="menu-item {{ request()->is('users*') ? 'active' : '' }}">
                    <i data-lucide="users"></i>
                    Daftar Pengguna
                </li>
            </a>

            <a href="/settings">
                <li class="menu-item">
                    <i data-lucide="settings"></i>
                    Pengaturan
                </li>
            </a>

        </ul>

    </div>

    <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="logout-btn">
            Logout
        </button>
    </form>

</div>

<!-- MAIN -->
<div class="main">

    <div class="topbar">

        <div class="search-box">
            <i data-lucide="search"></i>
            <input
                type="text"
                placeholder="Cari kuis, kategori, atau penyuluhan...">
        </div>

        <div class="topbar-right">

            <div class="notif">
                <i data-lucide="bell"></i>
            </div>

            <div class="profile">
                <span>Andini Nur</span>
                <img src="https://i.pravatar.cc/100?img=12">
            </div>

        </div>

    </div>

    <div class="page-content">
        @yield('content')
    </div>

</div>

<script>
    lucide.createIcons();
</script>

</body>
</html>