<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PANTUN</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <script src="https://unpkg.com/lucide@latest"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f6f8fc;
            overflow-x: hidden;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 190px;
            height: 100vh;

            background: #101943;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            padding: 14px 12px;

            z-index: 1000;
        }


        /* =====================================================
           BRAND / LOGO
        ===================================================== */

        .brand {
            display: flex;
            align-items: center;

            gap: 12px;

            margin-bottom: 28px;

            padding-left: 4px;
        }

        .brand-logo {
            width: 54px;
            height: 54px;

            flex-shrink: 0;

            border-radius: 16px;

            background: #dceeff;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;

            border: 2px solid rgba(255, 255, 255, 0.6);

            box-shadow:
                0 5px 12px rgba(0, 0, 0, 0.15);
        }

        .brand-logo img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            display: block;
        }

        .brand h2 {
            color: #ffffff;

            font-size: 19px;

            font-weight: 800;

            letter-spacing: -0.4px;

            margin: 0;

            line-height: 1;
        }


        /* =====================================================
           MENU
        ===================================================== */

        .menu {
            list-style: none;

            padding: 0;

            margin: 0;
        }

        .menu a {
            text-decoration: none;
        }

        .menu-item {
            display: flex;
            align-items: center;

            gap: 10px;

            padding: 10px 12px;

            margin-bottom: 6px;

            border-radius: 12px;

            color: #d6daf7;

            font-size: 12px;

            transition: 0.2s;

            cursor: pointer;
        }

        .menu-item:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        .menu-item.active {
            background: linear-gradient(
                135deg,
                #FFE76B,
                #ffd000
            );

            color: #111827;

            font-weight: 600;
        }

        .menu-item svg {
            width: 16px;
            height: 16px;

            flex-shrink: 0;
        }


        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout-btn {
            width: 100%;

            border: none;

            border-radius: 12px;

            padding: 11px;

            background: #4f5f8e;

            color: white;

            font-size: 12px;

            cursor: pointer;

            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #5f709f;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            margin-left: 190px;

            min-height: 100vh;

            padding-top: 70px;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {
            position: fixed;

            top: 0;

            left: 190px;

            right: 0;

            height: 70px;

            background: white;

            border-bottom: 1px solid #eceff5;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 20px;

            z-index: 999;
        }


        /* =====================================================
           SEARCH
        ===================================================== */

        .search-wrapper {
            position: relative;

            width: 100%;

            max-width: 720px;
        }

        .search-box {
            width: 100%;

            height: 42px;

            background: #f3f4f6;

            border-radius: 999px;

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 0 18px;

            transition: 0.2s;
        }

        .search-box:focus-within {
            background: #fff;

            border: 1px solid #d8dbea;

            box-shadow:
                0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .search-box svg {
            width: 18px;
            height: 18px;

            color: #6b7280;

            flex-shrink: 0;
        }

        .search-box input {
            width: 100%;

            border: none;

            outline: none;

            background: transparent;

            font-size: 13px;

            color: #374151;
        }

        .search-box input::placeholder {
            color: #9ca3af;
        }


        /* =====================================================
           SEARCH RESULT
        ===================================================== */

        .search-results {
            position: absolute;

            top: 50px;

            left: 0;

            right: 0;

            max-height: 420px;

            overflow-y: auto;

            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 14px;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.12);

            overflow-x: hidden;

            display: none;

            z-index: 2000;
        }

        .search-results.show {
            display: block;
        }

        .search-results::-webkit-scrollbar {
            width: 6px;
        }

        .search-results::-webkit-scrollbar-track {
            background: #f5f6f8;
        }

        .search-results::-webkit-scrollbar-thumb {
            background: #c8cad3;

            border-radius: 10px;
        }

        .search-result-item {
            display: flex;

            align-items: center;

            gap: 12px;

            padding: 12px 16px;

            text-decoration: none;

            color: #374151;

            font-size: 13px;

            transition: 0.2s;

            border-bottom: 1px solid #f3f4f6;
        }

        .search-result-item:last-child {
            border-bottom: none;
        }

        .search-result-item:hover {
            background: #f5f6fa;
        }

        .search-result-item svg {
            width: 17px;
            height: 17px;

            color: #2d3165;

            flex-shrink: 0;
        }

        .search-result-text {
            display: flex;

            flex-direction: column;

            min-width: 0;
        }

        .search-result-title {
            font-weight: 600;

            color: #111827;

            line-height: 1.4;
        }

        .search-result-description {
            font-size: 10px;

            color: #9ca3af;

            margin-top: 2px;

            line-height: 1.4;
        }

        .search-empty {
            padding: 18px;

            text-align: center;

            font-size: 12px;

            color: #9ca3af;
        }


        /* =====================================================
           TOPBAR RIGHT
        ===================================================== */

        .topbar-right {
            display: flex;

            align-items: center;

            gap: 20px;

            margin-left: 20px;
        }


        /* =====================================================
           NOTIFICATION
        ===================================================== */

        .notif {
            position: relative;

            cursor: pointer;

            width: 38px;
            height: 38px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 10px;

            transition: 0.2s;
        }

        .notif:hover {
            background: #f3f4f8;
        }

        .notif > svg {
            width: 20px;
            height: 20px;

            color: #374151;
        }


        /* =====================================================
           NOTIFICATION BADGE
        ===================================================== */

        .notif-badge {
            position: absolute;

            top: 1px;
            right: 0;

            min-width: 17px;
            height: 17px;

            padding: 0 4px;

            background: #ef4444;

            color: white;

            border-radius: 20px;

            font-size: 9px;

            font-weight: 700;

            display: flex;

            align-items: center;
            justify-content: center;

            border: 2px solid white;
        }


        /* =====================================================
           NOTIFICATION PANEL
        ===================================================== */

        .notification-panel {
            position: absolute;

            top: 48px;

            right: 0;

            width: 350px;

            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 16px;

            box-shadow:
                0 15px 40px rgba(0, 0, 0, 0.12);

            overflow: hidden;

            display: none;

            z-index: 3000;
        }

        .notification-panel.show {
            display: block;
        }


        /* =====================================================
           NOTIFICATION HEADER
        ===================================================== */

        .notification-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 16px 18px;

            border-bottom: 1px solid #f0f1f4;
        }

        .notification-header h3 {
            margin: 0;

            font-size: 14px;

            font-weight: 700;

            color: #14224a;
        }

        .mark-read {
            border: none;

            background: none;

            color: #2d3165;

            font-size: 10px;

            font-weight: 600;

            cursor: pointer;

            padding: 0;
        }

        .mark-read:hover {
            text-decoration: underline;
        }


        /* =====================================================
           NOTIFICATION LIST
        ===================================================== */

        .notification-list {
            max-height: 330px;

            overflow-y: auto;
        }

        .notification-list::-webkit-scrollbar {
            width: 6px;
        }

        .notification-list::-webkit-scrollbar-track {
            background: #f5f6f8;
        }

        .notification-list::-webkit-scrollbar-thumb {
            background: #c8cad3;

            border-radius: 10px;
        }


        /* =====================================================
           NOTIFICATION ITEM
        ===================================================== */

        .notification-item {
            display: flex;

            gap: 12px;

            padding: 14px 18px;

            border-bottom: 1px solid #f3f4f6;

            cursor: pointer;

            transition: 0.2s;
        }

        .notification-item:hover {
            background: #f8f9fc;
        }

        .notification-item.unread {
            background: #f4f6ff;
        }


        /* =====================================================
           NOTIFICATION ICON
        ===================================================== */

        .notification-icon {
            width: 34px;
            height: 34px;

            flex-shrink: 0;

            border-radius: 10px;

            display: flex;

            align-items: center;
            justify-content: center;
        }

        .notification-icon svg {
            width: 17px;
            height: 17px;
        }

        .notification-blue {
            background: #dbeafe;

            color: #2563eb;
        }

        .notification-yellow {
            background: #fff4d4;

            color: #d97706;
        }

        .notification-green {
            background: #dcfce7;

            color: #16a34a;
        }

        .notification-purple {
            background: #ede9fe;

            color: #7c3aed;
        }


        /* =====================================================
           NOTIFICATION CONTENT
        ===================================================== */

        .notification-content {
            flex: 1;

            min-width: 0;
        }

        .notification-title {
            font-size: 12px;

            font-weight: 600;

            color: #1f2937;

            margin-bottom: 3px;
        }

        .notification-description {
            font-size: 10px;

            color: #6b7280;

            line-height: 1.5;
        }

        .notification-time {
            font-size: 9px;

            color: #9ca3af;

            margin-top: 5px;
        }


        /* =====================================================
           UNREAD DOT
        ===================================================== */

        .unread-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #2d3165;

            margin-top: 5px;

            flex-shrink: 0;
        }


        /* =====================================================
           EMPTY NOTIFICATION
        ===================================================== */

        .notification-empty {
            padding: 35px 20px;

            text-align: center;

            color: #9ca3af;

            font-size: 11px;
        }

        .notification-empty svg {
            width: 30px;
            height: 30px;

            margin-bottom: 8px;
        }


        /* =====================================================
           NOTIFICATION FOOTER
        ===================================================== */

        .notification-footer {
            padding: 12px;

            text-align: center;

            border-top: 1px solid #f0f1f4;
        }


        /* =====================================================
           PROFILE
        ===================================================== */

        .profile {
            display: flex;

            align-items: center;

            gap: 12px;

            padding-left: 20px;

            border-left: 1px solid #e5e7eb;

            min-width: 0;
        }

        .profile span {
            font-size: 13px;

            font-weight: 600;

            color: #111827;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;

            max-width: 150px;
        }

        .profile img {
            width: 36px;

            height: 36px;

            border-radius: 50%;

            object-fit: cover;

            flex-shrink: 0;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .page-content {
            padding: 25px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {

            .sidebar {
                width: 170px;
            }

            .main {
                margin-left: 170px;
            }

            .topbar {
                left: 170px;
            }

            .search-wrapper {
                max-width: 450px;
            }

        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 650px) {

            .sidebar {
                width: 70px;

                padding: 14px 8px;
            }

            .brand {
                justify-content: center;

                padding: 0;
            }

            .brand-logo {
                width: 42px;

                height: 42px;
            }

            .brand h2 {
                display: none;
            }

            .menu-item {
                justify-content: center;

                padding: 11px;
            }

            .menu-item span {
                display: none;
            }

            .main {
                margin-left: 70px;
            }

            .topbar {
                left: 70px;

                padding: 0 12px;
            }

            .search-wrapper {
                max-width: none;
            }

            .profile span {
                display: none;
            }

            .profile {
                padding-left: 10px;
            }

            .topbar-right {
                gap: 10px;
            }

            .notification-panel {
                position: fixed;

                top: 65px;

                right: 10px;

                left: 80px;

                width: auto;
            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     SIDEBAR
========================================================= -->

<div class="sidebar">

    <div>


        <!-- =================================================
             BRAND
        ================================================== -->

        <div class="brand">

            <div class="brand-logo">

                <img
                    src="{{ asset('logo pantun.png') }}"
                    alt="Logo PANTUN"
                >

            </div>

            <h2>
                PANTUN
            </h2>

        </div>


        <!-- =================================================
             MENU
        ================================================== -->

        <ul class="menu">


            <!-- DASHBOARD -->

            <a href="/dashboard">

                <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">

                    <i data-lucide="layout-dashboard"></i>

                    <span>
                        Dashboard
                    </span>

                </li>

            </a>


            <!-- MATERI -->

            <a href="/materi">

                <li class="menu-item {{ request()->is('materi*') ? 'active' : '' }}">

                    <i data-lucide="book-open"></i>

                    <span>
                        Kelola Materi
                    </span>

                </li>

            </a>


            <!-- KATEGORI -->

            <a href="/kategori">

                <li class="menu-item {{ request()->is('kategori*') ? 'active' : '' }}">

                    <i data-lucide="tags"></i>

                    <span>
                        Kelola Kategori
                    </span>

                </li>

            </a>


            <!-- KUIS -->

            <a href="/kuis">

                <li class="menu-item {{ request()->is('kuis*') ? 'active' : '' }}">

                    <i data-lucide="badge-help"></i>

                    <span>
                        Kuis
                    </span>

                </li>

            </a>


            <!-- HASIL KUIS -->

            <a href="/hasil-kuis">

                <li class="menu-item {{ request()->is('hasil-kuis*') ? 'active' : '' }}">

                    <i data-lucide="bar-chart-3"></i>

                    <span>
                        Hasil Kuis
                    </span>

                </li>

            </a>


            <!-- PAKET PENYULUHAN -->

            <a href="/paket-penyuluhan">

                <li class="menu-item {{ request()->is('paket-penyuluhan*') ? 'active' : '' }}">

                    <i data-lucide="archive"></i>

                    <span>
                        Paket Penyuluhan
                    </span>

                </li>

            </a>


            <!-- DATA PENYULUH -->

            <a href="/penyuluh">

                <li class="menu-item {{ request()->is('penyuluh*') ? 'active' : '' }}">

                    <i data-lucide="briefcase"></i>

                    <span>
                        Data Penyuluh
                    </span>

                </li>

            </a>


            <!-- DAFTAR PENGGUNA -->

            <a href="/users">

                <li class="menu-item {{ request()->is('users*') ? 'active' : '' }}">

                    <i data-lucide="users"></i>

                    <span>
                        Daftar Pengguna
                    </span>

                </li>

            </a>


        </ul>

    </div>


    <!-- =====================================================
         LOGOUT
    ====================================================== -->

    <form action="/logout" method="POST">

        @csrf

        <button
            type="submit"
            class="logout-btn"
        >
            Logout
        </button>

    </form>

</div>


<!-- =========================================================
     MAIN
========================================================= -->

<div class="main">


    <!-- =====================================================
         TOPBAR
    ====================================================== -->

    <div class="topbar">


        <!-- =================================================
             SEARCH
        ================================================== -->

        <div class="search-wrapper">

            <div class="search-box">

                <i data-lucide="search"></i>

                <input
                    type="text"
                    id="globalSearch"
                    placeholder="Cari kuis, kategori, atau penyuluhan..."
                    autocomplete="off"
                >

            </div>


            <!-- SEARCH RESULTS -->

            <div
                class="search-results"
                id="searchResults"
            ></div>

        </div>


        <!-- =================================================
             TOPBAR RIGHT
        ================================================== -->

        <div class="topbar-right">


            <!-- =================================================
                 NOTIFICATION
            ================================================== -->

            <div
                class="notif"
                id="notificationButton"
            >

                <i data-lucide="bell"></i>


                <!-- BADGE -->

                <span
                    class="notif-badge"
                    id="notificationBadge"
                >
                    4
                </span>


                <!-- =================================================
                     NOTIFICATION PANEL
                ================================================== -->

                <div
                    class="notification-panel"
                    id="notificationPanel"
                >


                    <!-- HEADER -->

                    <div class="notification-header">

                        <h3>
                            Notifikasi
                        </h3>

                        <button
                            type="button"
                            class="mark-read"
                            id="markAllRead"
                        >
                            Tandai sudah dibaca
                        </button>

                    </div>


                    <!-- LIST -->

                    <div
                        class="notification-list"
                        id="notificationList"
                    >


                        <!-- NOTIFIKASI 1 -->

                        <div
                            class="notification-item unread"
                            data-notification="1"
                        >

                            <div class="notification-icon notification-blue">

                                <i data-lucide="book-open"></i>

                            </div>

                            <div class="notification-content">

                                <div class="notification-title">
                                    Materi baru ditambahkan
                                </div>

                                <div class="notification-description">
                                    Terdapat materi literasi hukum baru yang ditambahkan.
                                </div>

                                <div class="notification-time">
                                    Baru saja
                                </div>

                            </div>

                            <span class="unread-dot"></span>

                        </div>


                        <!-- NOTIFIKASI 2 -->

                        <div
                            class="notification-item unread"
                            data-notification="2"
                        >

                            <div class="notification-icon notification-yellow">

                                <i data-lucide="badge-help"></i>

                            </div>

                            <div class="notification-content">

                                <div class="notification-title">
                                    Kuis baru tersedia
                                </div>

                                <div class="notification-description">
                                    Kuis literasi hukum baru telah dibuat.
                                </div>

                                <div class="notification-time">
                                    1 jam yang lalu
                                </div>

                            </div>

                            <span class="unread-dot"></span>

                        </div>


                        <!-- NOTIFIKASI 3 -->

                        <div
                            class="notification-item unread"
                            data-notification="3"
                        >

                            <div class="notification-icon notification-green">

                                <i data-lucide="archive"></i>

                            </div>

                            <div class="notification-content">

                                <div class="notification-title">
                                    Paket penyuluhan diperbarui
                                </div>

                                <div class="notification-description">
                                    Terdapat perubahan pada paket penyuluhan.
                                </div>

                                <div class="notification-time">
                                    3 jam yang lalu
                                </div>

                            </div>

                            <span class="unread-dot"></span>

                        </div>


                        <!-- NOTIFIKASI 4 -->

                        <div
                            class="notification-item unread"
                            data-notification="4"
                        >

                            <div class="notification-icon notification-purple">

                                <i data-lucide="users"></i>

                            </div>

                            <div class="notification-content">

                                <div class="notification-title">
                                    Pengguna baru terdaftar
                                </div>

                                <div class="notification-description">
                                    Terdapat pengguna baru yang terdaftar pada sistem.
                                </div>

                                <div class="notification-time">
                                    5 jam yang lalu
                                </div>

                            </div>

                            <span class="unread-dot"></span>

                        </div>

                    </div>


                    <!-- EMPTY -->

                    <div
                        class="notification-empty"
                        id="notificationEmpty"
                        style="display:none;"
                    >

                        <i data-lucide="bell-off"></i>

                        <div>
                            Tidak ada notifikasi baru
                        </div>

                    </div>


                    <!-- FOOTER -->

                    <div class="notification-footer">

                    </div>

                </div>

            </div>


            <!-- =================================================
                 PROFILE
            ================================================== -->

            <div class="profile">

                <span>
                    {{ session('user')->name ?? 'Pengguna' }}
                </span>

                <img
                    src="{{ session('user')->avatar ?? 'https://i.pravatar.cc/100?img=12' }}"
                    alt="Profile"
                >

            </div>

        </div>

    </div>


    <!-- =====================================================
         PAGE CONTENT
    ====================================================== -->

    <div class="page-content">

        @yield('content')

    </div>


</div>


<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =====================================================
       LUCIDE
    ===================================================== */

    if (typeof lucide !== 'undefined') {

        lucide.createIcons();

    }


    /* =====================================================
       SEARCH DATA
    ===================================================== */

    const searchData = [

        {
            title: 'Dashboard',
            description: 'Halaman utama sistem',
            icon: 'layout-dashboard',
            url: '/dashboard'
        },

        {
            title: 'Kelola Materi',
            description: 'Mengelola materi literasi hukum',
            icon: 'book-open',
            url: '/materi'
        },

        {
            title: 'Kelola Kategori',
            description: 'Mengelola kategori materi dan kuis',
            icon: 'tags',
            url: '/kategori'
        },

        {
            title: 'Kuis',
            description: 'Mengelola kuis literasi hukum',
            icon: 'badge-help',
            url: '/kuis'
        },

        {
            title: 'Hasil Kuis',
            description: 'Melihat hasil kuis',
            icon: 'bar-chart-3',
            url: '/hasil-kuis'
        },

        {
            title: 'Paket Penyuluhan',
            description: 'Mengelola paket penyuluhan',
            icon: 'archive',
            url: '/paket-penyuluhan'
        },

        {
            title: 'Data Penyuluh',
            description: 'Melihat dan mengelola data penyuluh hukum',
            icon: 'briefcase',
            url: '/penyuluh'
        },

        {
            title: 'Daftar Pengguna',
            description: 'Melihat dan mengelola pengguna sistem',
            icon: 'users',
            url: '/users'
        }

    ];


    /* =====================================================
       SEARCH ELEMENT
    ===================================================== */

    const searchInput =
        document.getElementById('globalSearch');

    const searchResults =
        document.getElementById('searchResults');


    /* =====================================================
       ESCAPE HTML
    ===================================================== */

    function escapeHtml(text) {

        const div =
            document.createElement('div');

        div.textContent =
            text;

        return div.innerHTML;

    }


    /* =====================================================
       RENDER SEARCH
    ===================================================== */

    function renderSearch(keyword) {

        const value =
            keyword.toLowerCase().trim();


        /* =================================================
           KOSONG
        ================================================= */

        if (value === '') {

            searchResults.innerHTML = '';

            searchResults.classList.remove('show');

            return;

        }


        /* =================================================
           FILTER HASIL
        ================================================= */

        const results =
            searchData.filter(function (item) {

                const title =
                    item.title.toLowerCase();

                const description =
                    item.description.toLowerCase();

                return (
                    title.includes(value) ||
                    description.includes(value)
                );

            });


        /* =================================================
           TIDAK ADA HASIL
        ================================================= */

        if (results.length === 0) {

            searchResults.innerHTML = `

                <div class="search-empty">

                    Tidak ditemukan halaman
                    yang sesuai dengan
                    "<strong>${escapeHtml(value)}</strong>".

                </div>

            `;

            searchResults.classList.add('show');

            return;

        }


        /* =================================================
           HASIL SEARCH
        ================================================= */

        searchResults.innerHTML =
            results.map(function (item) {

                return `

                    <a
                        href="${item.url}"
                        class="search-result-item"
                    >

                        <i
                            data-lucide="${item.icon}"
                        ></i>

                        <div class="search-result-text">

                            <div class="search-result-title">
                                ${escapeHtml(item.title)}
                            </div>

                            <div class="search-result-description">
                                ${escapeHtml(item.description)}
                            </div>

                        </div>

                    </a>

                `;

            }).join('');


        searchResults.classList.add('show');


        /* =================================================
           UPDATE LUCIDE
        ================================================= */

        if (typeof lucide !== 'undefined') {

            lucide.createIcons();

        }

    }


    /* =====================================================
       SEARCH INPUT
    ===================================================== */

    if (searchInput) {

        searchInput.addEventListener(
            'input',
            function () {

                renderSearch(this.value);

            }
        );


        /* =================================================
           SEARCH FOCUS
        ================================================= */

        searchInput.addEventListener(
            'focus',
            function () {

                if (this.value.trim() !== '') {

                    renderSearch(this.value);

                }

            }
        );


        /* =================================================
           SEARCH ENTER / ESC
        ================================================= */

        searchInput.addEventListener(
            'keydown',
            function (event) {


                /* =========================================
                   ENTER
                ========================================= */

                if (event.key === 'Enter') {

                    const firstResult =
                        searchResults.querySelector(
                            '.search-result-item'
                        );


                    if (firstResult) {

                        window.location.href =
                            firstResult.getAttribute('href');

                    }

                }


                /* =========================================
                   ESCAPE
                ========================================= */

                if (event.key === 'Escape') {

                    searchResults.classList.remove(
                        'show'
                    );

                    searchInput.blur();

                }

            }
        );

    }


    /* =====================================================
       NOTIFICATION ELEMENT
    ===================================================== */

    const notificationButton =
        document.getElementById(
            'notificationButton'
        );

    const notificationPanel =
        document.getElementById(
            'notificationPanel'
        );

    const notificationBadge =
        document.getElementById(
            'notificationBadge'
        );

    const notificationList =
        document.getElementById(
            'notificationList'
        );

    const notificationEmpty =
        document.getElementById(
            'notificationEmpty'
        );

    const markAllRead =
        document.getElementById(
            'markAllRead'
        );


    /* =====================================================
       OPEN / CLOSE NOTIFICATION
    ===================================================== */

    if (
        notificationButton &&
        notificationPanel
    ) {

        notificationButton.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();

                notificationPanel.classList.toggle(
                    'show'
                );

            }
        );

    }


    /* =====================================================
       UPDATE NOTIFICATION COUNT
    ===================================================== */

    function updateNotificationCount() {

        if (
            !notificationBadge ||
            !notificationEmpty ||
            !notificationList
        ) {

            return;

        }


        const unread =
            document.querySelectorAll(
                '.notification-item.unread'
            ).length;


        if (unread > 0) {

            notificationBadge.textContent =
                unread;

            notificationBadge.style.display =
                'flex';

            notificationEmpty.style.display =
                'none';

            notificationList.style.display =
                'block';

        }

        else {

            notificationBadge.style.display =
                'none';

            notificationEmpty.style.display =
                'block';

            notificationList.style.display =
                'none';

        }

    }


    /* =====================================================
       CLICK NOTIFICATION ITEM
    ===================================================== */

    document
        .querySelectorAll('.notification-item')
        .forEach(function (item) {

            item.addEventListener(
                'click',
                function (event) {

                    event.stopPropagation();


                    if (
                        this.classList.contains(
                            'unread'
                        )
                    ) {

                        this.classList.remove(
                            'unread'
                        );


                        const dot =
                            this.querySelector(
                                '.unread-dot'
                            );


                        if (dot) {

                            dot.remove();

                        }


                        updateNotificationCount();

                    }

                }
            );

        });


    /* =====================================================
       MARK ALL AS READ
    ===================================================== */

    if (markAllRead) {

        markAllRead.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();


                document
                    .querySelectorAll(
                        '.notification-item.unread'
                    )
                    .forEach(function (item) {

                        item.classList.remove(
                            'unread'
                        );


                        const dot =
                            item.querySelector(
                                '.unread-dot'
                            );


                        if (dot) {

                            dot.remove();

                        }

                    });


                updateNotificationCount();

            }
        );

    }


    /* =====================================================
       CLICK OUTSIDE
    ===================================================== */

    document.addEventListener(
        'click',
        function (event) {


            /* =============================================
               SEARCH
            ============================================= */

            const searchWrapper =
                document.querySelector(
                    '.search-wrapper'
                );


            if (
                searchWrapper &&
                !searchWrapper.contains(
                    event.target
                )
            ) {

                searchResults.classList.remove(
                    'show'
                );

            }


            /* =============================================
               NOTIFICATION
            ============================================= */

            if (
                notificationButton &&
                notificationPanel &&
                !notificationButton.contains(
                    event.target
                )
            ) {

                notificationPanel.classList.remove(
                    'show'
                );

            }

        }
    );


    /* =====================================================
       INITIAL NOTIFICATION
    ===================================================== */

    updateNotificationCount();

});

</script>


</body>

</html>