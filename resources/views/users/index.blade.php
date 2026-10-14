@extends('layouts.sidebar')

@section('content')

<style>

/* =====================================================
   PAGE
===================================================== */

.page-wrapper {
    padding: 10px;
    background: #F5F6F8;
    min-height: calc(100vh - 70px);
}

.page-title {
    font-size: 40px;
    font-weight: 700;
    color: #13234a;
    margin-bottom: 4px;
}

.page-subtitle {
    color: #6B7280;
    font-size: 15px;
    margin-bottom: 0;
}


/* =====================================================
   FILTER CARD
===================================================== */

.filter-card {
    background: #fff;
    border-radius: 18px;
    padding: 20px;
    margin-top: 20px;
    margin-bottom: 20px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, .05);
    border: 1px solid #F0F1F5;
}

.filter-label {
    font-size: 12px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 7px;
    display: block;
}

.form-select,
.search-input {
    height: 45px;
    border-radius: 11px;
    border: 1px solid #E5E7EB;
    font-size: 12px;
}

.form-select:focus,
.search-input:focus {
    border-color: #363E79;
    box-shadow: 0 0 0 3px rgba(54, 62, 121, .08);
}

.filter-btn {
    width: 100%;
    height: 45px;
    border: none;
    border-radius: 11px;
    background: #2D3165;
    color: white;
    font-size: 12px;
    font-weight: 600;
    transition: .2s;
}

.filter-btn:hover {
    background: #202650;
}

.reset-btn {
    width: 100%;
    height: 45px;
    border: 1px solid #E5E7EB;
    border-radius: 11px;
    background: #fff;
    color: #374151;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: .2s;
}

.reset-btn:hover {
    background: #F3F4F6;
    color: #111827;
}


/* =====================================================
   USER CARD
===================================================== */

.user-card {
    background: #fff;
    border-radius: 18px;
    padding: 20px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, .05);
    border: 1px solid #F0F1F5;
}

.user-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.user-card-title {
    font-size: 16px;
    font-weight: 700;
    color: #14213D;
    margin: 0;
}

.total-user {
    font-size: 11px;
    color: #6B7280;
    background: #F3F4F6;
    padding: 6px 10px;
    border-radius: 999px;
}


/* =====================================================
   TABLE
===================================================== */

.table-responsive {
    overflow-x: auto;
}

.table-modern {
    width: 100%;
    min-width: 750px;
    border-collapse: collapse;
}

.table-modern th {
    color: #6B7280;
    font-size: 11px;
    font-weight: 600;
    padding: 12px 10px;
    border-bottom: 1px solid #E5E7EB;
    white-space: nowrap;
}

.table-modern td {
    padding: 14px 10px;
    border-bottom: 1px solid #F1F5F9;
    vertical-align: middle;
    font-size: 11px;
    color: #374151;
}

.table-modern tbody tr {
    transition: .2s;
}

.table-modern tbody tr:hover {
    background: #FAFBFD;
}

.table-modern tbody tr:last-child td {
    border-bottom: none;
}


/* =====================================================
   USER
===================================================== */

.user-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.avatar {
    width: 42px;
    height: 42px;
    min-width: 42px;
    border-radius: 50%;
    object-fit: cover;
    background: #E9EBF7;
}

.user-name {
    font-weight: 600;
    color: #111827;
    font-size: 11px;
    margin-bottom: 2px;
}

.user-email {
    color: #6B7280;
    font-size: 9px;
}


/* =====================================================
   STATUS
===================================================== */

.status-active {
    background: #DCFCE7;
    color: #16A34A;
    padding: 5px 10px;
    border-radius: 999px;
    font-size: 10px;
    font-weight: 600;
    display: inline-block;
}

.status-inactive {
    background: #FEE2E2;
    color: #DC2626;
    padding: 5px 10px;
    border-radius: 999px;
    font-size: 10px;
    font-weight: 600;
    display: inline-block;
}

.status-default {
    background: #F3F4F6;
    color: #6B7280;
    padding: 5px 10px;
    border-radius: 999px;
    font-size: 10px;
    font-weight: 600;
    display: inline-block;
}


/* =====================================================
   ACTION
===================================================== */

.action-wrapper {
    display: flex;
    gap: 5px;
}

.action-btn {
    border: none;
    background: #F3F4F6;
    width: 32px;
    height: 32px;
    border-radius: 9px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: .2s;
}

.action-btn svg {
    width: 14px;
    height: 14px;
}

.action-btn:hover {
    background: #E5E7EB;
    transform: translateY(-1px);
}

.action-view {
    color: #2D3165;
}

.action-delete {
    color: #DC2626;
}


/* =====================================================
   EMPTY
===================================================== */

.empty-data {
    padding: 45px 20px !important;
    text-align: center;
    color: #9CA3AF;
}

.empty-icon {
    width: 50px;
    height: 50px;
    border-radius: 14px;
    background: #F3F4F6;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 10px;
}

.empty-icon svg {
    width: 24px;
    height: 24px;
}

.empty-title {
    font-size: 13px;
    font-weight: 600;
    color: #4B5563;
}

.empty-description {
    font-size: 10px;
    color: #9CA3AF;
    margin-top: 4px;
}


/* =====================================================
   ACTIVITY CARD
===================================================== */

.activity-card {
    background: #fff;
    border-radius: 18px;
    padding: 20px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, .05);
    border: 1px solid #F0F1F5;
}

.activity-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.activity-title {
    font-size: 16px;
    font-weight: 700;
    color: #14213D;
    margin: 0;
}

.activity-link {
    font-size: 10px;
    color: #363E79;
    text-decoration: none;
    font-weight: 600;
}

.activity-link:hover {
    text-decoration: underline;
}


/* =====================================================
   ACTIVITY ITEM
===================================================== */

.activity-item {
    display: flex;
    gap: 11px;
    margin-bottom: 18px;
}

.activity-item:last-child {
    margin-bottom: 0;
}

.activity-icon {
    width: 38px;
    height: 38px;
    min-width: 38px;
    border-radius: 11px;
    background: #FFF4D8;
    color: #B77900;
    display: flex;
    align-items: center;
    justify-content: center;
}

.activity-icon svg {
    width: 17px;
    height: 17px;
}

.activity-content {
    font-size: 11px;
    color: #374151;
    line-height: 1.5;
}

.activity-content strong {
    color: #111827;
    font-weight: 600;
}

.activity-time {
    color: #9CA3AF;
    font-size: 9px;
    margin-top: 3px;
}


/* =====================================================
   PAGINATION
===================================================== */

.pagination-wrapper {
    margin-top: 20px;
    display: flex;
    justify-content: center;
}

.pagination {
    margin: 0;
}

.pagination .page-link {
    font-size: 11px;
    color: #363E79;
    border-color: #E5E7EB;
}

.pagination .active .page-link {
    background: #363E79;
    border-color: #363E79;
    color: #fff;
}


/* =====================================================
   MODAL
===================================================== */

.modal-content {
    border: none;
    border-radius: 18px;
    overflow: hidden;
}

.modal-header {
    background: #363E79;
    color: #fff;
    border: none;
    padding: 18px 20px;
}

.modal-title {
    font-size: 15px;
    font-weight: 600;
}

.modal-header .btn-close {
    filter: brightness(0) invert(1);
}

.modal-body {
    padding: 22px;
}

.detail-profile {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 20px;
}

.detail-avatar {
    width: 58px;
    height: 58px;
    border-radius: 50%;
    object-fit: cover;
}

.detail-name {
    font-size: 16px;
    font-weight: 700;
    color: #111827;
}

.detail-email {
    font-size: 11px;
    color: #6B7280;
}

.detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}

.detail-box {
    background: #F8F9FC;
    padding: 12px;
    border-radius: 11px;
}

.detail-label {
    font-size: 9px;
    color: #9CA3AF;
    margin-bottom: 4px;
}

.detail-value {
    font-size: 11px;
    color: #111827;
    font-weight: 600;
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media (max-width: 1200px) {

    .col-lg-8 {
        width: 100%;
    }

    .col-lg-4 {
        width: 100%;
        margin-top: 15px;
    }

}

@media (max-width: 768px) {

    .page-wrapper {
        padding: 5px;
    }

    .page-title {
        font-size: 23px;
    }

    .filter-card,
    .user-card,
    .activity-card {
        padding: 15px;
    }

    .detail-grid {
        grid-template-columns: 1fr;
    }

}

</style>
    <div>

        <h1 class="page-title">
            Daftar Pengguna
        </h1>

        <p class="page-subtitle">
            Kelola dan monitor data siswa peserta literasi hukum dari aplikasi mobile.
        </p>

    </div>


    <!-- =====================================================
         FILTER
    ====================================================== -->

    <div class="filter-card">

        <form method="GET" action="{{ route('users.index') }}">

            <div class="row g-3">

                <!-- SEARCH -->

                <div class="col-md-4">

                    <label class="filter-label">
                        Cari Pengguna
                    </label>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control search-input"
                        placeholder="Nama atau email..."
                    >

                </div>


                <!-- SEKOLAH -->

                <div class="col-md-3">

                    <label class="filter-label">
                        Sekolah
                    </label>

                    <select
                        name="sekolah"
                        class="form-select"
                    >

                        <option value="">
                            Semua Sekolah
                        </option>

                        @foreach($sekolahs ?? [] as $sekolah)

                            <option
                                value="{{ $sekolah }}"
                                {{ request('sekolah') == $sekolah ? 'selected' : '' }}
                            >
                                {{ $sekolah }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- STATUS -->

                <div class="col-md-3">

                    <label class="filter-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                    >

                        <option value="">
                            Semua Status
                        </option>

                        <option
                            value="aktif"
                            {{ request('status') == 'aktif' ? 'selected' : '' }}
                        >
                            Aktif
                        </option>

                        <option
                            value="tidak_aktif"
                            {{ request('status') == 'tidak_aktif' ? 'selected' : '' }}
                        >
                            Tidak Aktif
                        </option>

                    </select>

                </div>

            </div>

        </form>

    </div>


    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <div class="row g-3">


        <!-- =================================================
             USER TABLE
        ================================================== -->

        <div class="col-lg-8">

            <div class="user-card">


                <!-- HEADER -->

                <div class="user-card-header">

                    <h4 class="user-card-title">
                        Data Pengguna
                    </h4>

                    <span class="total-user">

                        Total:
                        {{ $users->total() ?? 0 }}
                        pengguna

                    </span>

                </div>


                <!-- TABLE -->

                <div class="table-responsive">

                    <table class="table-modern">

                        <thead>

                            <tr>

                                <th>
                                    SISWA
                                </th>

                                <th>
                                    SEKOLAH
                                </th>

                                <th>
                                    KELAS
                                </th>

                                <th>
                                    STATUS
                                </th>

                                <th>
                                    BERGABUNG
                                </th>

                                <th>
                                    AKSI
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                        @forelse($users as $user)

                            <tr>


                                <!-- SISWA -->

                                <td>

                                    <div class="user-info">

                                        <img
                                            src="https://ui-avatars.com/api/?name={{ urlencode($user->nama ?? $user->name ?? 'User') }}&background=363e79&color=ffffff"
                                            class="avatar"
                                            alt="Avatar"
                                        >

                                        <div>

                                            <div class="user-name">

                                                {{ $user->nama ?? $user->name ?? '-' }}

                                            </div>

                                            <div class="user-email">

                                                {{ $user->email ?? '-' }}

                                            </div>

                                        </div>

                                    </div>

                                </td>


                                <!-- SEKOLAH -->

                                <td>

                                    {{ $user->sekolah ?? '-' }}

                                </td>


                                <!-- KELAS -->

                                <td>

                                    {{ $user->kelas ?? '-' }}

                                </td>


                                <!-- STATUS -->

                                <td>

                                    @if(($user->status ?? '') === 'aktif')

                                        <span class="status-active">
                                            Aktif
                                        </span>

                                    @elseif(($user->status ?? '') === 'tidak_aktif')

                                        <span class="status-inactive">
                                            Tidak Aktif
                                        </span>

                                    @else

                                        <span class="status-default">
                                            {{ $user->status ?? 'Tidak diketahui' }}
                                        </span>

                                    @endif

                                </td>


                                <!-- BERGABUNG -->

                                <td>

                                    @if($user->created_at)

                                        {{ $user->created_at->format('d M Y') }}

                                    @else

                                        -

                                    @endif

                                </td>


                                <!-- AKSI -->

                                <td>

                                    <div class="action-wrapper">


                                        <!-- DETAIL -->

                                        <button
                                            type="button"
                                            class="action-btn action-view"
                                            title="Lihat Detail"
                                            data-bs-toggle="modal"
                                            data-bs-target="#userDetailModal"
                                            data-name="{{ $user->nama ?? $user->name ?? '-' }}"
                                            data-email="{{ $user->email ?? '-' }}"
                                            data-sekolah="{{ $user->sekolah ?? '-' }}"
                                            data-kelas="{{ $user->kelas ?? '-' }}"
                                            data-status="{{ $user->status ?? '-' }}"
                                            data-created="{{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}"
                                            onclick="showUserDetail(this)"
                                        >

                                            <i data-lucide="eye"></i>

                                        </button>


                                        <!-- HAPUS -->

                                        @if(Route::has('users.destroy'))

                                            <form
                                                action="{{ route('users.destroy', $user->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah kamu yakin ingin menghapus pengguna ini?')"
                                                style="display:inline;"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="action-btn action-delete"
                                                    title="Hapus"
                                                >

                                                    <i data-lucide="trash-2"></i>

                                                </button>

                                            </form>

                                        @endif


                                    </div>

                                </td>


                            </tr>


                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="empty-data"
                                >

                                    <div class="empty-icon">

                                        <i data-lucide="users"></i>

                                    </div>

                                    <div class="empty-title">
                                        Belum ada pengguna
                                    </div>

                                    <div class="empty-description">
                                        Data pengguna dari aplikasi mobile belum tersedia.
                                    </div>

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>


                <!-- PAGINATION -->

                @if($users instanceof \Illuminate\Pagination\LengthAwarePaginator)

                    <div class="pagination-wrapper">

                        {{ $users->withQueryString()->links() }}

                    </div>

                @endif


            </div>

        </div>


        <!-- =================================================
             AKTIVITAS
        ================================================== -->

        <div class="col-lg-4">

            <div class="activity-card">


                <div class="activity-header">

                    <h5 class="activity-title">
                        Aktivitas Terbaru
                    </h5>

                    <span
                        class="activity-link"
                        style="cursor: default;"
                    >
                        Mobile
                    </span>

                </div>


                @if(isset($activities) && count($activities) > 0)

                    @foreach($activities as $activity)

                        <div class="activity-item">


                            <div class="activity-icon">

                                @if(($activity->type ?? '') === 'quiz')

                                    <i data-lucide="trophy"></i>

                                @elseif(($activity->type ?? '') === 'materi')

                                    <i data-lucide="book-open"></i>

                                @elseif(($activity->type ?? '') === 'login')

                                    <i data-lucide="log-in"></i>

                                @else

                                    <i data-lucide="activity"></i>

                                @endif

                            </div>


                            <div class="activity-content">

                                <strong>

                                    {{ $activity->nama ?? $activity->user_name ?? 'Pengguna' }}

                                </strong>

                                <br>

                                {{ $activity->description ?? 'Melakukan aktivitas pada aplikasi.' }}


                                <div class="activity-time">

                                    @if(isset($activity->created_at))

                                        {{ \Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}

                                    @else

                                        Baru saja

                                    @endif

                                </div>

                            </div>

                        </div>

                    @endforeach

                @else

                    <div class="text-center py-4">

                        <div class="empty-icon">

                            <i data-lucide="activity"></i>

                        </div>

                        <div class="empty-title">
                            Belum ada aktivitas
                        </div>

                        <div class="empty-description">
                            Aktivitas pengguna dari aplikasi mobile akan muncul di sini.
                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>

</div>


<!-- =====================================================
     DETAIL USER MODAL
====================================================== -->

<div
    class="modal fade"
    id="userDetailModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">


            <div class="modal-header">

                <h5 class="modal-title">
                    Detail Pengguna
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                ></button>

            </div>


            <div class="modal-body">


                <div class="detail-profile">

                    <img
                        id="detailAvatar"
                        class="detail-avatar"
                        src=""
                        alt="Avatar"
                    >

                    <div>

                        <div
                            class="detail-name"
                            id="detailName"
                        >
                            -
                        </div>

                        <div
                            class="detail-email"
                            id="detailEmail"
                        >
                            -
                        </div>

                    </div>

                </div>


                <div class="detail-grid">


                    <div class="detail-box">

                        <div class="detail-label">
                            SEKOLAH
                        </div>

                        <div
                            class="detail-value"
                            id="detailSekolah"
                        >
                            -
                        </div>

                    </div>


                    <div class="detail-box">

                        <div class="detail-label">
                            KELAS
                        </div>

                        <div
                            class="detail-value"
                            id="detailKelas"
                        >
                            -
                        </div>

                    </div>


                    <div class="detail-box">

                        <div class="detail-label">
                            STATUS
                        </div>

                        <div
                            class="detail-value"
                            id="detailStatus"
                        >
                            -
                        </div>

                    </div>


                    <div class="detail-box">

                        <div class="detail-label">
                            BERGABUNG
                        </div>

                        <div
                            class="detail-value"
                            id="detailCreated"
                        >
                            -
                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>

</div>


<!-- =====================================================
     JAVASCRIPT
====================================================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | LUCIDE ICON
    |--------------------------------------------------------------------------
    */

    if (typeof lucide !== 'undefined') {

        lucide.createIcons();

    }

});


/*
|--------------------------------------------------------------------------
| DETAIL USER
|--------------------------------------------------------------------------
*/

function showUserDetail(button) {

    const name =
        button.getAttribute('data-name') || '-';

    const email =
        button.getAttribute('data-email') || '-';

    const sekolah =
        button.getAttribute('data-sekolah') || '-';

    const kelas =
        button.getAttribute('data-kelas') || '-';

    const status =
        button.getAttribute('data-status') || '-';

    const created =
        button.getAttribute('data-created') || '-';


    /*
    |--------------------------------------------------------------------------
    | SET DATA
    |--------------------------------------------------------------------------
    */

    document.getElementById('detailName').textContent =
        name;

    document.getElementById('detailEmail').textContent =
        email;

    document.getElementById('detailSekolah').textContent =
        sekolah;

    document.getElementById('detailKelas').textContent =
        kelas;

    document.getElementById('detailStatus').textContent =
        status;

    document.getElementById('detailCreated').textContent =
        created;


    /*
    |--------------------------------------------------------------------------
    | AVATAR
    |--------------------------------------------------------------------------
    */

    document.getElementById('detailAvatar').src =
        'https://ui-avatars.com/api/?name=' +
        encodeURIComponent(name) +
        '&background=363e79&color=ffffff';

}


/*
|--------------------------------------------------------------------------
| AUTO HIDE ALERT
|--------------------------------------------------------------------------
*/

setTimeout(function () {

    const alerts =
        document.querySelectorAll('.alert');

    alerts.forEach(function (alert) {

        alert.style.transition =
            'opacity .3s';

        alert.style.opacity = '0';

        setTimeout(function () {

            alert.remove();

        }, 300);

    });

}, 4000);

</script>

@endsection