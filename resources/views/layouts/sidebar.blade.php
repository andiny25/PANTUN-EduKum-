
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PANTUN</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
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

        /* SIDEBAR */
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
            border: 2px solid rgba(255,255,255,.6);
            box-shadow: 0 5px 12px rgba(0,0,0,.15);
        }

        .brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .brand h2 {
            color: #fff;
            font-size: 19px;
            font-weight: 800;
            letter-spacing: -.4px;
            margin: 0;
            line-height: 1;
        }

        .menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu a {
            text-decoration: none;
            display: block;
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
            transition: .2s;
            cursor: pointer;
        }

        .menu-item:hover {
            background: rgba(255,255,255,.08);
            color: #fff;
        }

        .menu-item.active {
            background: linear-gradient(135deg, #ffe76b, #ffd000);
            color: #111827;
            font-weight: 600;
        }

        .menu-item svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .logout-btn {
            width: 100%;
            border: none;
            border-radius: 12px;
            padding: 11px;
            background: #4f5f8e;
            color: #fff;
            font-size: 12px;
            cursor: pointer;
            transition: .2s;
        }

        .logout-btn:hover {
            background: #5f709f;
        }

        /* MAIN DAN TOPBAR */
        .main {
            margin-left: 190px;
            min-height: 100vh;
            padding-top: 70px;
        }

        .topbar {
            position: fixed;
            top: 0;
            left: 190px;
            right: 0;
            height: 70px;
            background: #fff;
            border-bottom: 1px solid #eceff5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 999;
            gap: 16px;
        }

        /* PENCARIAN GLOBAL */
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
            transition: .2s;
        }

        .search-box:focus-within {
            background: #fff;
            border: 1px solid #d8dbea;
            box-shadow: 0 4px 15px rgba(0,0,0,.06);
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

        .search-results {
            position: absolute;
            top: 50px;
            left: 0;
            right: 0;
            max-height: 420px;
            overflow-y: auto;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(0,0,0,.12);
            display: none;
            z-index: 2000;
        }

        .search-results.show {
            display: block;
        }

        .search-result-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            text-decoration: none;
            color: #374151;
            font-size: 13px;
            transition: .2s;
            border-bottom: 1px solid #f3f4f6;
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

        /* BAGIAN KANAN TOPBAR */
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-left: 10px;
        }

        /* NOTIFIKASI */
        .notif {
            position: relative;
            cursor: pointer;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            transition: .2s;
            flex-shrink: 0;
        }

        .notif:hover {
            background: #f3f4f8;
        }

        .notif > svg {
            width: 20px;
            height: 20px;
            color: #374151;
        }

        .notif-badge {
            position: absolute;
            top: 1px;
            right: 0;
            min-width: 17px;
            height: 17px;
            padding: 0 4px;
            background: #ef4444;
            color: #fff;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 700;
            align-items: center;
            justify-content: center;
            border: 2px solid #fff;
        }

        .notification-panel {
            position: absolute;
            top: 48px;
            right: 0;
            width: 350px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0,0,0,.12);
            overflow: hidden;
            display: none;
            z-index: 3000;
            cursor: default;
        }

        .notification-panel.show {
            display: block;
        }

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

        .notification-list {
            max-height: 330px;
            overflow-y: auto;
        }

        .notification-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 18px;
            border-bottom: 1px solid #f3f4f6;
            cursor: pointer;
            transition: .2s;
        }

        .notification-item:hover {
            background: #f8f9fc;
        }

        .notification-item.unread {
            background: #f4f6ff;
        }

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
            overflow-wrap: anywhere;
        }

        .notification-time {
            font-size: 9px;
            color: #9ca3af;
            margin-top: 5px;
        }

        .unread-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #2d3165;
            margin-top: 5px;
            flex-shrink: 0;
        }

        .notification-empty {
            padding: 30px 20px;
            text-align: center;
            color: #9ca3af;
            font-size: 11px;
        }

        .notification-empty svg {
            width: 30px;
            height: 30px;
            margin-bottom: 8px;
        }

        /* PROFIL */
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

        .profile img,
        .profile-placeholder {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .profile img {
            object-fit: cover;
        }

        .profile-placeholder {
            background: #e9ecf5;
            color: #2d3165;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-placeholder svg {
            width: 20px;
            height: 20px;
        }

        .page-content {
            padding: 25px;
        }

        /* RESPONSIVE */
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
                gap: 8px;
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

            .page-content {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div>
            <div class="brand">
                <div class="brand-logo">
                    <img src="{{ asset('logo pantun.png') }}" alt="Logo PANTUN">
                </div>
                <h2>PANTUN</h2>
            </div>

            <ul class="menu">
                <a href="/dashboard">
                    <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i data-lucide="layout-dashboard"></i>
                        <span>Dashboard</span>
                    </li>
                </a>

                <a href="/materi">
                    <li class="menu-item {{ request()->is('materi*') ? 'active' : '' }}">
                        <i data-lucide="book-open"></i>
                        <span>Kelola Materi</span>
                    </li>
                </a>

                <a href="/kategori">
                    <li class="menu-item {{ request()->is('kategori*') ? 'active' : '' }}">
                        <i data-lucide="tags"></i>
                        <span>Kelola Kategori</span>
                    </li>
                </a>

                <a href="/kuis">
                    <li class="menu-item {{ request()->is('kuis*') ? 'active' : '' }}">
                        <i data-lucide="badge-help"></i>
                        <span>Kuis</span>
                    </li>
                </a>

                <a href="/hasil-kuis">
                    <li class="menu-item {{ request()->is('hasil-kuis*') ? 'active' : '' }}">
                        <i data-lucide="bar-chart-3"></i>
                        <span>Hasil Kuis</span>
                    </li>
                </a>

                <a href="/paket-penyuluhan">
                    <li class="menu-item {{ request()->is('paket-penyuluhan*') ? 'active' : '' }}">
                        <i data-lucide="archive"></i>
                        <span>Paket Penyuluhan</span>
                    </li>
                </a>

                @if (session('user.role') === 'admin')
                    <a href="/penyuluh">
                        <li class="menu-item {{ request()->is('penyuluh*') ? 'active' : '' }}">
                            <i data-lucide="briefcase"></i>
                            <span>Data Penyuluh</span>
                        </li>
                    </a>

                    <a href="/users">
                        <li class="menu-item {{ request()->is('users*') ? 'active' : '' }}">
                            <i data-lucide="users"></i>
                            <span>Daftar Pengguna</span>
                        </li>
                    </a>
                @endif
            </ul>
        </div>

        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>

    <!-- MAIN -->
    <div class="main">

        <!-- TOPBAR -->
        <div class="topbar">

            <!-- PENCARIAN GLOBAL -->
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

                <div class="search-results" id="searchResults"></div>
            </div>

            <div class="topbar-right">

                <!-- NOTIFIKASI REAL-TIME -->
                <div
                    class="notif"
                    id="notificationButton"
                    role="button"
                    tabindex="0"
                    aria-label="Buka notifikasi"
                    aria-expanded="false"
                >
                    <i data-lucide="bell"></i>

                    <span
                        class="notif-badge"
                        id="notificationBadge"
                        style="display:none"
                    >0</span>

                    <div class="notification-panel" id="notificationPanel">

                        <div class="notification-header">
                            <h3>Notifikasi</h3>

                            <button
                                type="button"
                                class="mark-read"
                                id="markAllRead"
                            >
                                Tandai sudah dibaca
                            </button>
                        </div>

                        <div
                            class="notification-list"
                            id="notificationList"
                        >
                            <div class="notification-empty">
                                Memuat notifikasi...
                            </div>
                        </div>

                        <div
                            class="notification-empty"
                            id="notificationEmpty"
                            style="display:none"
                        >
                            <i data-lucide="bell-off"></i>
                            <div>Tidak ada notifikasi</div>
                        </div>

                    </div>
                </div>

                <!-- PROFIL PENGGUNA -->
                <div class="profile">
                    <span>
                        {{ session('user.name', 'Pengguna') }}
                    </span>

                    @if (session('user.avatar'))
                        <img
                            src="{{ session('user.avatar') }}"
                            alt="Foto Profil"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                        >

                        <div class="profile-placeholder" style="display:none">
                            <i data-lucide="user-round"></i>
                        </div>
                    @else
                        <div class="profile-placeholder" aria-label="Tidak ada foto profil">
                            <i data-lucide="user-round"></i>
                        </div>
                    @endif
                </div>

            </div>
        </div>

        <!-- KONTEN HALAMAN -->
        <div class="page-content">
            @yield('content')
        </div>

    </div>

    <!-- JAVASCRIPT -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {

        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        /* =====================================
           PENCARIAN GLOBAL
        ===================================== */

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

            @if (session('user.role') === 'admin')
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
            },
            @endif
        ];

        const searchInput = document.getElementById('globalSearch');
        const searchResults = document.getElementById('searchResults');

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        function renderSearch(keyword) {
            const value = keyword.toLowerCase().trim();

            if (!value) {
                searchResults.innerHTML = '';
                searchResults.classList.remove('show');
                return;
            }

            const results = searchData.filter(item =>
                item.title.toLowerCase().includes(value) ||
                item.description.toLowerCase().includes(value)
            );

            if (!results.length) {
                searchResults.innerHTML = `
                    <div class="search-empty">
                        Tidak ditemukan halaman yang sesuai dengan
                        "<strong>${escapeHtml(value)}</strong>".
                    </div>
                `;
            } else {
                searchResults.innerHTML = results.map(item => `
                    <a href="${item.url}" class="search-result-item">
                        <i data-lucide="${item.icon}"></i>
                        <div class="search-result-text">
                            <div class="search-result-title">
                                ${escapeHtml(item.title)}
                            </div>
                            <div class="search-result-description">
                                ${escapeHtml(item.description)}
                            </div>
                        </div>
                    </a>
                `).join('');

                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            }

            searchResults.classList.add('show');
        }

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                renderSearch(this.value);
            });

            searchInput.addEventListener('focus', function () {
                if (this.value.trim()) {
                    renderSearch(this.value);
                }
            });

            searchInput.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    const first = searchResults.querySelector(
                        '.search-result-item'
                    );

                    if (first) {
                        window.location.href = first.getAttribute('href');
                    }
                }

                if (event.key === 'Escape') {
                    searchResults.classList.remove('show');
                    searchInput.blur();
                }
            });
        }

        /* =====================================
           NOTIFIKASI REAL-TIME
        ===================================== */

        const notificationButton =
            document.getElementById('notificationButton');

        const notificationPanel =
            document.getElementById('notificationPanel');

        const notificationBadge =
            document.getElementById('notificationBadge');

        const notificationList =
            document.getElementById('notificationList');

        const notificationEmpty =
            document.getElementById('notificationEmpty');

        const markAllRead =
            document.getElementById('markAllRead');

        const csrfToken =
            document.querySelector('meta[name="csrf-token"]').content;

        let notificationData = [];
        let notificationRequestRunning = false;

        function escapeNotificationHtml(value) {
            const div = document.createElement('div');
            div.textContent = value ?? '';
            return div.innerHTML;
        }

        function notificationIcon(type) {
            const icons = {
                materi: 'book-open',
                kuis: 'badge-help',
                paket: 'archive',
                pengguna: 'users',
                penyuluh: 'briefcase',
                info: 'bell'
            };

            return icons[type] || 'bell';
        }

        function renderNotifications() {
            if (!notificationList || !notificationEmpty) return;

            if (notificationData.length === 0) {
                notificationList.style.display = 'none';
                notificationEmpty.style.display = 'block';
                return;
            }

            notificationList.style.display = 'block';
            notificationEmpty.style.display = 'none';

            notificationList.innerHTML = notificationData.map(item => {
                const icon = notificationIcon(item.tipe);

                const title = escapeNotificationHtml(item.judul);
                const message = escapeNotificationHtml(item.pesan);
                const time = escapeNotificationHtml(item.waktu);

                const colorClass = {
                    materi: 'notification-blue',
                    kuis: 'notification-yellow',
                    paket: 'notification-green',
                    pengguna: 'notification-purple',
                    penyuluh: 'notification-purple'
                }[item.tipe] || 'notification-blue';

                return `
                    <div
                        class="notification-item ${item.dibaca ? '' : 'unread'}"
                        data-id="${Number(item.id)}"
                        role="button"
                        tabindex="0"
                    >
                        <div class="notification-icon ${colorClass}">
                            <i data-lucide="${icon}"></i>
                        </div>

                        <div class="notification-content">
                            <div class="notification-title">${title}</div>
                            <div class="notification-description">${message}</div>
                            <div class="notification-time">${time}</div>
                        </div>

                        ${item.dibaca ? '' : '<span class="unread-dot"></span>'}
                    </div>
                `;
            }).join('');

            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        }

        async function loadNotifications() {
            if (notificationRequestRunning) return;

            notificationRequestRunning = true;

            try {
                const response = await fetch('/notifikasi', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    cache: 'no-store'
                });

                if (!response.ok) {
                    throw new Error(
                        'Gagal mengambil notifikasi: ' + response.status
                    );
                }

                const result = await response.json();

                notificationData = result.notifikasi || [];

                const count = Number(result.total_belum_dibaca || 0);

                notificationBadge.textContent =
                    count > 99 ? '99+' : count;

                notificationBadge.style.display =
                    count > 0 ? 'flex' : 'none';

                renderNotifications();

            } catch (error) {
                console.error('Gagal memuat notifikasi:', error);
            } finally {
                notificationRequestRunning = false;
            }
        }

        async function markNotificationRead(id) {
            try {
                const response = await fetch(
                    `/notifikasi/${Number(id)}/dibaca`,
                    {
                        method: 'PATCH',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    }
                );

                if (!response.ok) {
                    throw new Error(
                        'Gagal memperbarui notifikasi: ' + response.status
                    );
                }

                await loadNotifications();

            } catch (error) {
                console.error(error);
                alert(
                    'Notifikasi gagal diperbarui. Silakan coba lagi.'
                );
            }
        }

        async function markAllNotificationsRead() {
            try {
                const response = await fetch(
                    '/notifikasi-dibaca-semua',
                    {
                        method: 'PATCH',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    }
                );

                if (!response.ok) {
                    throw new Error(
                        'Gagal menandai notifikasi: ' + response.status
                    );
                }

                await loadNotifications();

            } catch (error) {
                console.error(error);
                alert(
                    'Gagal menandai notifikasi sudah dibaca.'
                );
            }
        }

        function toggleNotificationPanel() {
            if (!notificationPanel) return;

            const isOpen = notificationPanel.classList.toggle('show');

            notificationButton.setAttribute(
                'aria-expanded',
                String(isOpen)
            );

            if (isOpen) {
                loadNotifications();
            }
        }

        if (notificationButton && notificationPanel) {
            notificationButton.addEventListener('click', function (event) {
                if (event.target.closest('.notification-panel')) return;

                event.stopPropagation();
                toggleNotificationPanel();
            });

            notificationButton.addEventListener('keydown', function (event) {
                if (
                    event.target !== notificationButton ||
                    !['Enter', ' '].includes(event.key)
                ) {
                    return;
                }

                event.preventDefault();
                toggleNotificationPanel();
            });
        }

        if (notificationList) {
            notificationList.addEventListener('click', function (event) {
                const item = event.target.closest('.notification-item');

                if (!item) return;

                const id = Number(item.dataset.id);

                const data = notificationData.find(
                    notification => Number(notification.id) === id
                );

                if (!data) return;

                if (!data.dibaca) {
                    markNotificationRead(id);
                }

                if (data.url) {
                    window.location.href = data.url;
                }
            });

            notificationList.addEventListener('keydown', function (event) {
                if (
                    !['Enter', ' '].includes(event.key) ||
                    !event.target.classList.contains('notification-item')
                ) {
                    return;
                }

                event.preventDefault();
                event.target.click();
            });
        }

        if (markAllRead) {
            markAllRead.addEventListener('click', function (event) {
                event.stopPropagation();
                markAllNotificationsRead();
            });
        }

        /* Tutup panel saat klik di luar */
        document.addEventListener('click', function (event) {
            if (
                searchResults &&
                !event.target.closest('.search-wrapper')
            ) {
                searchResults.classList.remove('show');
            }

            if (
                notificationButton &&
                !notificationButton.contains(event.target)
            ) {
                notificationPanel.classList.remove('show');

                notificationButton.setAttribute(
                    'aria-expanded',
                    'false'
                );
            }
        });

        /* Muat notifikasi saat halaman dibuka */
        loadNotifications();

        /* Periksa pembaruan setiap 5 detik */
        setInterval(loadNotifications, 5000);

    });
    </script>

</body>
</html>
