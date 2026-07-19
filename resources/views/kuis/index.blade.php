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

.header-action{
    display:flex;
    align-items:center;
    gap:10px;
}

.filter-btn{
    height:42px;
    padding:0 16px;
    border:1px solid #dcdfe7;
    background:white;
    border-radius:10px;
    display:flex;
    align-items:center;
    gap:8px;
    font-size:13px;
    font-weight:600;
    color:#444;
    cursor:pointer;
}

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

.btn i,
.filter-btn i{
    width:16px;
    height:16px;
}

/* ================= TABLE ================= */

.table-box{
    background:white;
    border-radius:20px;
    overflow:hidden;
    border:1px solid #ececf2;
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:#fafafa;
}

th{
    padding:20px 16px;
    text-align:left;
    font-size:11px;
    font-weight:700;
    color:#6b7280;
    border-bottom:1px solid #ececf2;
    white-space:nowrap;
}

td{
    padding:16px;
    border-bottom:1px solid #ececf2;
    font-size:13px;
    color:#111827;
    vertical-align:middle;
}

/* ================= COLUMN SIZE ================= */

th:nth-child(1),
td:nth-child(1){
    width:240px;
    padding-left:55px;
}

th:nth-child(2),
td:nth-child(2){
    width:140px;
}

th:nth-child(3),
td:nth-child(3){
    width:170px;
}

th:nth-child(4),
td:nth-child(4){
    width:120px;
}

th:nth-child(5),
td:nth-child(5){
    width:120px;
}

th:nth-child(6),
td:nth-child(6){
    width:130px;
}

th:nth-child(7),
td:nth-child(7){
    width:90px;
}

/* ================= TITLE ================= */

.quiz-title{
    font-size:14px;
    font-weight:700;
    color:#202020;
    line-height:1.35;
    max-width:180px;

    display:flex;
    align-items:center;
    min-height:50px;
}

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

.publish{
    background:#dcfce7;
    color:#16a34a;
}

.draft{
    background:#fef3c7;
    color:#ca8a04;
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
    cursor:pointer;
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
    gap:14px;
}

.page{
    width:24px;
    height:24px;
    border-radius:7px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:12px;
    cursor:pointer;
    color:#333;
}

.page.active{
    background:#081b44;
    color:white;
}

.page-arrow{
    width:15px;
    height:15px;
    color:#666;
    cursor:pointer;
}

/* ================= RESPONSIVE ================= */

@media(max-width:900px){

    .header-top{
        flex-direction:column;
        align-items:flex-start;
    }

    .table-box{
        overflow-x:auto;
    }

    table{
        min-width:900px;
    }

}

</style>

<div class="content">

    <!-- HEADER -->
    <div class="page-header">

        <div class="header-top">

            <div class="header-title">
                <h1>Kelola Kuis</h1>
                <p>Kelola kuis literasi hukum untuk evaluasi pemahaman siswa.</p>
            </div>

            <div class="header-action">

                <button class="filter-btn">
                    <i data-lucide="filter"></i>
                    Filter
                </button>

                <a href="{{ route('kuis.create') }}" style="text-decoration:none;">
                    <button class="btn">
                        <i data-lucide="plus"></i>
                        Buat Kuis Baru
                    </button>
                </a>

            </div>

        </div>

    </div>

    <!-- TABLE -->
    <div class="table-box">

        <table>

            <thead>

                <tr>

                    <th>JUDUL KUIS</th>
                    <th>KATEGORI</th>
                    <th>PAKET<br>PENYULUHAN</th>
                    <th>JUMLAH<br>SOAL</th>
                    <th>STATUS</th>
                    <th>TANGGAL<br>DIBUAT</th>
                    <th>AKSI</th>

                </tr>

            </thead>

            <tbody>

@forelse($kuis as $item)

<tr>

    <!-- JUDUL -->
    <td>

        <a href="{{ route('kuis.show',$item->id) }}"
           style="text-decoration:none;">

            <div class="quiz-title"
                 style="
                    color:#081b44;
                    cursor:pointer;
                    transition:.2s;
                 "
                 onmouseover="this.style.color='#2563eb'"
                 onmouseout="this.style.color='#081b44'">

                {{ $item->judul }}

            </div>

        </a>

    </td>

    <!-- KATEGORI -->
    <td>

        <div class="text-muted">
            {{ $item->kategori }}
        </div>

    </td>

    <!-- PAKET -->
    <td>

        <div class="text-muted">
            {{ $item->paket_penyuluhan }}
        </div>

    </td>

    <!-- JUMLAH SOAL -->
    <td>

        <div class="text-muted">
            {{ $item->jumlah_soal }} Soal
        </div>

    </td>

    <!-- STATUS -->
    <td>

        @if($item->status == 'Aktif')

            <span class="badge publish">
                Aktif
            </span>

        @elseif($item->status == 'Draft')

            <span class="badge draft">
                Draft
            </span>

        @else

            <span class="badge nonaktif">
                Nonaktif
            </span>

        @endif

    </td>

    <!-- TANGGAL -->
    <td>

        <div class="text-muted">
            {{ $item->created_at ? $item->created_at->format('d M') : '-' }}<br>
            {{ $item->created_at ? $item->created_at->format('Y') : '-' }}
        </div>

    </td>

    <!-- AKSI -->
    <td>

        <div class="action">

            <!-- EDIT -->
            <a href="{{ route('kuis.edit',$item->id) }}">

                <i data-lucide="pencil"></i>

            </a>

            <!-- DELETE -->
            <form action="{{ route('kuis.destroy',$item->id) }}"
                  method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus kuis ini?')">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    style="
                        border:none;
                        background:none;
                        padding:0;
                        cursor:pointer;
                    ">

                    <i data-lucide="trash-2"
                       class="delete"></i>

                </button>

            </form>

        </div>

    </td>

</tr>

@empty

<tr>

    <td colspan="7"
        style="text-align:center;padding:30px;">

        Belum ada data kuis

    </td>

</tr>

@endforelse

</tbody>

        </table>

        <!-- PAGINATION -->
        <div class="pagination">

            <span>
                Menampilkan 1-{{ count($kuis) }} dari {{ count($kuis) }} kuis
            </span>

            <div class="page-number">

                <i data-lucide="chevron-left" class="page-arrow"></i>

                <div class="page active">1</div>
                <div class="page">2</div>
                <div class="page">3</div>

                <i data-lucide="chevron-right" class="page-arrow"></i>

            </div>

        </div>

    </div>

</div>

<script>
lucide.createIcons();
</script>

@endsection