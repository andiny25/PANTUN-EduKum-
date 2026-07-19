@extends('layouts.sidebar')

@section('content')

<style>

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
    font-size:42px;
    font-weight:700;
    color:#13234a;
    margin-bottom:4px;
}

.header-title p{
    color:#6b7280;
    font-size:15px;
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

.penyuluh-wrap img{
    width:42px;
    height:42px;
    border-radius:50%;
    object-fit:cover;
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
}

.action i{
    width:15px;
    height:15px;
    color:#444;
}

.delete{
    color:#dc2626 !important;
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

<div class="content">

    <!-- HEADER -->
    <div class="page-header">

        <div class="header-top">

            <div class="header-title">
                <h1>Daftar Penyuluh</h1>
                <p>Kelola data penyuluh hukum yang terdaftar dalam sistem EduKum.</p>
            </div>

            <a href="{{ route('penyuluh.create') }}"
               style="text-decoration:none;">

                <button class="btn">

                    <i data-lucide="plus"></i>
                    Tambah Penyuluh

                </button>

            </a>

        </div>

    </div>

    <!-- FILTER -->
    <div class="filter-section">

        <div class="filters">

            <select class="filter-select">
                <option>Semua Status</option>
            </select>

            <select class="filter-select">
                <option>Semua Instansi</option>
            </select>

        </div>

    </div>

    <!-- TABLE -->
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

                    <!-- PENYULUH -->
                    <td>

                        <div class="penyuluh-wrap">

                            <img src="https://i.pravatar.cc/100?img={{ $item->id }}">

                            <div>

                                <div class="penyuluh-name">
                                    {{ $item->nama }}
                                </div>

                            </div>

                        </div>

                    </td>

                    <!-- EMAIL -->
                    <td>

                        <div class="text-muted">
                            {{ $item->email }}
                        </div>

                    </td>

                    <!-- NO HP -->
                    <td>

                        <div class="text-muted">
                            {{ $item->no_hp ?? '-' }}
                        </div>

                    </td>

                    <!-- JABATAN -->
                    <td>

                        <div class="text-muted">
                            {{ $item->jabatan }}
                        </div>

                    </td>

                    <!-- INSTANSI -->
                    <td>

                        <div class="text-muted">
                            {{ $item->instansi }}
                        </div>

                    </td>

                    <!-- STATUS -->
                    <td>

                        @if($item->status == 'Aktif')

                            <span class="badge aktif">
                                Aktif
                            </span>

                        @else

                            <span class="badge nonaktif">
                                Nonaktif
                            </span>

                        @endif

                    </td>

                    <!-- BERGABUNG -->
                    <td>

                        <div class="text-muted">
                            {{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}
                        </div>

                    </td>

                    <!-- AKSI -->
                    <td>

                        <div class="action">

                            <!-- EDIT -->
                            <a href="{{ route('penyuluh.edit',$item->id) }}">

                                <i data-lucide="pencil"></i>

                            </a>

                            <!-- DELETE -->
                            <form action="{{ route('penyuluh.destroy',$item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus penyuluh ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        style="border:none;background:none;padding:0;cursor:pointer;">

                                    <i data-lucide="trash-2"
                                       class="delete"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8"
                        style="text-align:center;padding:30px;">

                        Belum ada data penyuluh

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <!-- PAGINATION -->
        <div class="pagination">

            <span>
                Menampilkan {{ count($penyuluh) }} penyuluh
            </span>

            <div class="page-number">

                <div class="page active">1</div>

            </div>

        </div>

    </div>

</div>

<script>
lucide.createIcons();
</script>

@endsection