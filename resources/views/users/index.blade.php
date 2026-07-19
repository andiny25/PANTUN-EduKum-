@extends('layouts.sidebar')

@section('content')

<style>

.page-wrapper{
    padding:10px;
}

.page-title{
    font-size:32px;
    font-weight:700;
    color:#14213D;
    margin-bottom:5px;
}

.page-subtitle{
    color:#6B7280;
    font-size:14px;
}

.filter-card,
.user-card,
.activity-card{
    background:#fff;
    border-radius:20px;
    padding:24px;
    box-shadow:0 5px 20px rgba(0,0,0,.05);
}

.filter-card{
    margin-top:20px;
    margin-bottom:20px;
}

.filter-label{
    font-size:13px;
    font-weight:600;
    color:#374151;
    margin-bottom:8px;
    display:block;
}

.form-select{
    height:48px;
    border-radius:12px;
}

.filter-btn{
    width:100%;
    height:48px;
    border:none;
    border-radius:12px;
    background:#2D3165;
    color:white;
    font-weight:600;
}

.table-modern{
    width:100%;
}

.table-modern th{
    color:#6B7280;
    font-size:13px;
    font-weight:600;
    padding-bottom:15px;
}

.table-modern td{
    padding:18px 0;
    border-top:1px solid #F1F5F9;
    vertical-align:middle;
}

.avatar{
    width:45px;
    height:45px;
    border-radius:50%;
}

.user-name{
    font-weight:600;
    color:#111827;
}

.user-email{
    color:#6B7280;
    font-size:13px;
}

.status-active{
    background:#DCFCE7;
    color:#16A34A;
    padding:6px 12px;
    border-radius:999px;
    font-size:12px;
    font-weight:600;
}

.status-inactive{
    background:#FEE2E2;
    color:#DC2626;
    padding:6px 12px;
    border-radius:999px;
    font-size:12px;
    font-weight:600;
}

.action-btn{
    border:none;
    background:#F3F4F6;
    width:35px;
    height:35px;
    border-radius:10px;
    margin-right:5px;
    cursor:pointer;
}

.action-btn:hover{
    background:#E5E7EB;
}

.activity-title{
    font-size:18px;
    font-weight:700;
}

.activity-item{
    display:flex;
    gap:12px;
    margin-bottom:20px;
}

.activity-icon{
    width:42px;
    height:42px;
    border-radius:50%;
    background:#FFF4D8;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
    font-size:18px;
}

.activity-content{
    font-size:14px;
}

.activity-time{
    color:#6B7280;
    font-size:12px;
    margin-top:4px;
}

.pagination{
    justify-content:center;
    margin-top:20px;
}

</style>

<div class="page-wrapper">

    <!-- HEADER -->
    <div>

        <h1 class="page-title">
            Daftar Pengguna
        </h1>

        <p class="page-subtitle">
            Kelola dan monitor data siswa peserta literasi hukum secara terpusat.
        </p>

    </div>

    <!-- FILTER -->
    <div class="filter-card">

        <form method="GET" action="{{ route('users.index') }}">

            <div class="row g-3">

                <div class="col-md-3">

                    <label class="filter-label">
                        Sekolah
                    </label>

                    <select name="sekolah" class="form-select">

                        <option value="">
                            Semua Sekolah
                        </option>

                        @foreach($sekolahs as $sekolah)
                            <option value="{{ $sekolah }}">
                                {{ $sekolah }}
                            </option>
                        @endforeach

                    </select>

                </div>

                <div class="col-md-3">

                    <label class="filter-label">
                        Kelas
                    </label>

                    <select name="kelas" class="form-select">

                        <option value="">
                            Semua Kelas
                        </option>

                        @foreach($kelas as $item)
                            <option value="{{ $item }}">
                                {{ $item }}
                            </option>
                        @endforeach

                    </select>

                </div>

                <div class="col-md-3">

                    <label class="filter-label">
                        Status
                    </label>

                    <select name="status" class="form-select">

                        <option value="">
                            Semua Status
                        </option>

                        <option value="aktif">
                            Aktif
                        </option>

                        <option value="tidak_aktif">
                            Tidak Aktif
                        </option>

                    </select>

                </div>

                <div class="col-md-3 d-flex align-items-end">

                    <button class="filter-btn">
                        Terapkan Filter
                    </button>

                </div>

            </div>

        </form>

    </div>

    <div class="row">

        <!-- TABEL -->
        <div class="col-lg-8">

            <div class="user-card">

                <table class="table-modern">

                    <thead>

                        <tr>
                            <th>Siswa</th>
                            <th>Sekolah</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Bergabung</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    @forelse($users as $user)

                    <tr>

                        <td>

                            <div class="d-flex align-items-center gap-3">

                                <img
                                    src="https://ui-avatars.com/api/?name={{ urlencode($user->nama) }}"
                                    class="avatar">

                                <div>

                                    <div class="user-name">
                                        {{ $user->nama }}
                                    </div>

                                    <div class="user-email">
                                        {{ $user->email }}
                                    </div>

                                </div>

                            </div>

                        </td>

                        <td>{{ $user->sekolah }}</td>

                        <td>{{ $user->kelas }}</td>

                        <td>

                            @if($user->status == 'aktif')

                                <span class="status-active">
                                    Aktif
                                </span>

                            @else

                                <span class="status-inactive">
                                    Tidak Aktif
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $user->created_at->format('d M Y') }}
                        </td>

                        <td>

                            <button class="action-btn">
                                👁
                            </button>

                            <button class="action-btn">
                                ✏️
                            </button>

                            <button class="action-btn">
                                🗑️
                            </button>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center py-4">
                            Tidak ada data siswa
                        </td>

                    </tr>

                    @endforelse

                    </tbody>

                </table>

                <div class="mt-4">
                    {{ $users->links() }}
                </div>

            </div>

        </div>

        <!-- AKTIVITAS -->
        <div class="col-lg-4">

            <div class="activity-card">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h5 class="activity-title">
                        Aktivitas Terbaru
                    </h5>

                    <small class="text-primary">
                        Lihat Semua
                    </small>

                </div>

                <div class="activity-item">

                    <div class="activity-icon">
                        🏆
                    </div>

                    <div class="activity-content">

                        <strong>Bambang</strong><br>

                        Menyelesaikan kuis Literasi Hukum

                        <div class="activity-time">
                            2 menit yang lalu
                        </div>

                    </div>

                </div>

                <div class="activity-item">

                    <div class="activity-icon">
                        📚
                    </div>

                    <div class="activity-content">

                        <strong>Siti Aminah</strong><br>

                        Membaca materi Hukum Pidana

                        <div class="activity-time">
                            15 menit yang lalu
                        </div>

                    </div>

                </div>

                <div class="activity-item">

                    <div class="activity-icon">
                        👤
                    </div>

                    <div class="activity-content">

                        <strong>Andi Saputra</strong><br>

                        Login ke aplikasi

                        <div class="activity-time">
                            1 jam yang lalu
                        </div>

                    </div>

                </div>

                <div class="activity-item">

                    <div class="activity-icon">
                        📝
                    </div>

                    <div class="activity-content">

                        <strong>Rina Putri</strong><br>

                        Mengikuti penyuluhan hukum

                        <div class="activity-time">
                            3 jam yang lalu
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection