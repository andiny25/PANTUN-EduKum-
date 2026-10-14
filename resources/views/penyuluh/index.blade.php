@extends('layouts.sidebar')

@section('content')

<script src="https://unpkg.com/lucide@latest"></script>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins', sans-serif;
}

.content{
    padding:28px;
    background:#f4f5f9;
    min-height:100vh;
}

/* ================= HEADER ================= */

.page-header{
    margin-bottom:22px;
}

.header-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
}

.header-title h1{
    font-size:40px;
    font-weight:700;
    color:#13234a;
    margin-bottom:4px;
}

.header-title p{
    color:#6b7280;
    font-size:15px;
}

/* ================= NOTIFICATION ================= */

.alert-success{
    display:flex;
    align-items:center;
    gap:10px;
    background:#dcfce7;
    color:#166534;
    border:1px solid #bbf7d0;
    border-radius:10px;
    padding:12px 15px;
    margin-bottom:18px;
    font-size:13px;
    font-weight:500;
}

.alert-success > i{
    width:18px;
    height:18px;
    flex-shrink:0;
}

.alert-success span{
    flex:1;
}

.alert-success button{
    border:none;
    background:transparent;
    color:#166534;
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:3px;
}

.alert-success button i{
    width:16px;
    height:16px;
}

/* ================= BUTTON ================= */

.btn{
    height:42px;
    padding:0 18px;
    border:none;
    border-radius:10px;
    background:#081b44;
    color:white;
    display:flex;
    align-items:center;
    gap:8px;
    font-size:13px;
    font-weight:600;
    cursor:pointer;
    box-shadow:0 4px 10px rgba(8,27,68,0.18);
    text-decoration:none;
}

.btn:hover{
    background:#061532;
}

.btn i{
    width:16px;
    height:16px;
}

/* ================= FILTER ================= */

.filter-section{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:16px;
}

.filters{
    display:flex;
    gap:10px;
}

.filter-select{
    height:38px;
    border:1px solid #dcdfe7;
    background:white;
    border-radius:10px;
    padding:0 14px;
    font-size:13px;
    color:#444;
    outline:none;
}

/* ================= TABLE ================= */

.table-box{
    background:white;
    border-radius:20px;
    overflow:hidden;
    border:1px solid #e5e7eb;
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:#fafafa;
}

th{
    padding:18px 16px;
    text-align:left;
    font-size:11px;
    font-weight:700;
    color:#6b7280;
    border-bottom:1px solid #ececf2;
    white-space:nowrap;
}

td{
    padding:14px 16px;
    border-bottom:1px solid #ececf2;
    font-size:13px;
    color:#111827;
    vertical-align:middle;
}

/* ================= PENYULUH ================= */

.penyuluh-wrap{
    display:flex;
    align-items:center;
    gap:12px;
}

.penyuluh-photo{
    width:42px;
    height:42px;
    border-radius:50%;
    object-fit:cover;
    flex-shrink:0;
    display:block;
}

.penyuluh-initial{
    width:42px;
    height:42px;
    border-radius:50%;
    background:#e8ebf7;
    color:#2d3165;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:14px;
    font-weight:700;
    flex-shrink:0;
    text-transform:uppercase;
}

.penyuluh-name{
    font-size:14px;
    font-weight:700;
    color:#13234a;
    line-height:1.3;
}

/* ================= TEXT ================= */

.text-muted{
    color:#4b5563;
    line-height:1.5;
    font-size:13px;
}

/* ================= BADGE ================= */

.badge{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    padding:5px 12px;
    border-radius:20px;
    font-size:11px;
    font-weight:600;
}

.aktif{
    background:#dcfce7;
    color:#16a34a;
}

.pending{
    background:#fef3c7;
    color:#d97706;
}

.nonaktif{
    background:#fee2e2;
    color:#dc2626;
}

/* ================= ACTION ================= */

.action{
    display:flex;
    align-items:center;
    gap:12px;
}

.action a{
    text-decoration:none;
    display:flex;
    align-items:center;
    justify-content:center;
}

.action form{
    margin:0;
    padding:0;
}

.action button{
    border:none;
    background:none;
    padding:0;
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
}

.action i{
    width:15px;
    height:15px;
    color:#444;
}

.action a:hover i{
    color:#2563eb;
}

.delete{
    color:#dc2626 !important;
}

.action button:hover .delete{
    color:#b91c1c !important;
}

/* ================= PAGINATION ================= */

.pagination{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:16px 18px;
    background:#fafafa;
}

.pagination span{
    font-size:13px;
    color:#666;
}

.page-number{
    display:flex;
    align-items:center;
    gap:8px;
}

.page{
    width:28px;
    height:28px;
    border-radius:8px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:12px;
    cursor:pointer;
    border:1px solid #d1d5db;
    color:#374151;
}

.page.active{
    background:#081b44;
    color:white;
    border:none;
}

/* ================= EMPTY ================= */

.empty-data{
    text-align:center;
    padding:40px 20px;
    color:#6b7280;
}

.empty-data i{
    width:40px;
    height:40px;
    margin-bottom:10px;
    color:#9ca3af;
}

.empty-data h3{
    font-size:14px;
    color:#374151;
    margin-bottom:5px;
}

.empty-data p{
    font-size:12px;
    color:#9ca3af;
}

/* ================= RESPONSIVE ================= */

@media(max-width:900px){

    .header-top{
        flex-direction:column;
        align-items:flex-start;
    }

    .filter-section{
        flex-direction:column;
        align-items:flex-start;
        gap:14px;
    }

    .table-box{
        overflow-x:auto;
    }

    table{
        min-width:1300px;
    }

}

</style>


<!-- ================= HEADER ================= -->

<div class="page-header">

    <div class="header-top">

        <div class="header-title">

            <h1>Daftar Penyuluh</h1>

            <p>
                Kelola data penyuluh hukum yang terdaftar dalam sistem EduKum.
            </p>

        </div>

        <a
            href="{{ route('penyuluh.create') }}"
            class="btn"
        >

            <i data-lucide="plus"></i>

            Tambah Penyuluh

        </a>

    </div>

</div>


<!-- ================= NOTIFICATION ================= -->

@if(session('success'))

    <div class="alert-success">

        <i data-lucide="check-circle"></i>

        <span>
            {{ session('success') }}
        </span>

        <button
            type="button"
            onclick="this.parentElement.remove()"
            title="Tutup"
        >

            <i data-lucide="x"></i>

        </button>

    </div>

@endif


<!-- ================= FILTER ================= -->

<div class="filter-section">

    <div class="filters">

        <select class="filter-select">

            <option value="">
                Semua Status
            </option>

            <option value="Aktif">
                Aktif
            </option>

            <option value="Pending">
                Pending
            </option>

            <option value="Nonaktif">
                Nonaktif
            </option>

        </select>

    </div>

</div>


<!-- ================= TABLE ================= -->

<div class="table-box">

    <table>

        <thead>

            <tr>

                <th>PENYULUH</th>
                <th>EMAIL</th>
                <th>NO HP</th>
                <th>JABATAN</th>
                <th>INSTANSI</th>
                <th>STATUS</th>
                <th>BERGABUNG</th>
                <th>AKSI</th>

            </tr>

        </thead>


        <tbody>

        @forelse($penyuluh as $item)

            <tr>

                <!-- ================= PENYULUH ================= -->

                <td>

                    <div class="penyuluh-wrap">

                        @php

                            /*
                            |--------------------------------------------------------------------------
                            | Cari User berdasarkan email penyuluh
                            |--------------------------------------------------------------------------
                            */

                            $emailPenyuluh = strtolower(
                                trim($item->email ?? '')
                            );

                            $user = $users->get($emailPenyuluh);

                        @endphp


                        <!-- ================= FOTO GOOGLE ================= -->

                        @if($user && !empty($user->avatar))

                            <img
                                src="{{ $user->avatar }}"
                                alt="Foto {{ $item->nama }}"
                                class="penyuluh-photo"
                                referrerpolicy="no-referrer"
                            >

                        @else

                            <!-- ================= INITIAL ================= -->

                            @php

                                $nama = trim(
                                    $item->nama ?? ''
                                );

                                $initial = strtoupper(
                                    substr($nama, 0, 1)
                                );

                            @endphp

                            <div class="penyuluh-initial">

                                {{ $initial ?: '?' }}

                            </div>

                        @endif


                        <!-- ================= NAMA ================= -->

                        <div>

                            <div class="penyuluh-name">

                                {{ $item->nama }}

                            </div>

                        </div>

                    </div>

                </td>


                <!-- ================= EMAIL ================= -->

                <td>

                    <div class="text-muted">

                        {{ $item->email }}

                    </div>

                </td>


                <!-- ================= NO HP ================= -->

                <td>

                    <div class="text-muted">

                        {{ $item->no_hp ?? '-' }}

                    </div>

                </td>


                <!-- ================= JABATAN ================= -->

                <td>

                    <div class="text-muted">

                        {{ $item->jabatan ?? '-' }}

                    </div>

                </td>


                <!-- ================= INSTANSI ================= -->

                <td>

                    <div class="text-muted">

                        {{ $item->instansi ?? '-' }}

                    </div>

                </td>


                <!-- ================= STATUS ================= -->

                <td>

                    @if($item->status == 'Aktif')

                        <span class="badge aktif">
                            Aktif
                        </span>

                    @elseif($item->status == 'Pending')

                        <span class="badge pending">
                            Pending
                        </span>

                    @else

                        <span class="badge nonaktif">
                            Nonaktif
                        </span>

                    @endif

                </td>


                <!-- ================= BERGABUNG ================= -->

                <td>

                    <div class="text-muted">

                        {{ $item->created_at
                            ? $item->created_at->format('d M Y')
                            : '-'
                        }}

                    </div>

                </td>


                <!-- ================= AKSI ================= -->

                <td>

                    <div class="action">

                        <!-- EDIT -->

                        <a
                            href="{{ route('penyuluh.edit', $item->id) }}"
                            title="Edit Penyuluh"
                        >

                            <i data-lucide="pencil"></i>

                        </a>


                        <!-- DELETE -->

                        <form
                            action="{{ route('penyuluh.destroy', $item->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus data penyuluh ini?')"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                title="Hapus Penyuluh"
                            >

                                <i
                                    data-lucide="trash-2"
                                    class="delete"
                                ></i>

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="8">

                    <div class="empty-data">

                        <i data-lucide="users"></i>

                        <h3>
                            Belum Ada Data Penyuluh
                        </h3>

                        <p>
                            Belum ada penyuluh hukum yang ditambahkan ke sistem.
                        </p>

                    </div>

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>


    <!-- ================= PAGINATION ================= -->

    <div class="pagination">

        <span>
            Menampilkan {{ $penyuluh->count() }} penyuluh
        </span>

        <div class="page-number">

            <div class="page active">
                1
            </div>

        </div>

    </div>

</div>


<script>

lucide.createIcons();

</script>

@endsection