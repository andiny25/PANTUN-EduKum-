@extends('layouts.sidebar')

@section('content')

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins', sans-serif;
}

/* ================= CONTENT ================= */

.content{
    padding:26px 22px;
}

/* ================= HEADER ================= */

.page-header{
    margin-bottom:24px;
}

.header-top{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
}

.header-title h1{
    font-size:42px;
    color:#13234a;
    font-weight:700;
    margin-bottom:4px;
}

.header-title p{
    color:#6b7280;
    font-size:15px;
}

/* ================= BUTTON ================= */

.header-action{
    padding-top:10px;
}

.btn{
    background:#2d3165;
    color:white;
    border:none;
    height:44px;
    padding:0 18px;
    border-radius:10px;
    font-size:13px;
    font-weight:600;
    cursor:pointer;
    display:flex;
    align-items:center;
    gap:8px;
    box-shadow:0 4px 10px rgba(45,49,101,0.15);
    transition:0.3s;
}

.btn:hover{
    background:#252957;
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

.filter-select,
.filter-btn{
    height:38px;
    border:1px solid #e5e7eb;
    background:white;
    border-radius:10px;
    padding:0 14px;
    font-size:13px;
    color:#444;
}

.filter-btn{
    display:flex;
    align-items:center;
    gap:8px;
    cursor:pointer;
}

.total-data{
    font-size:13px;
    color:#374151;
    font-weight:600;
}

/* ================= TABLE ================= */

.table-box{
    background:white;
    border-radius:18px;
    overflow:hidden;
    border:1px solid #ececf2;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    padding:15px 12px;
    text-align:left;
    font-size:11px;
    color:#6b7280;
    border-bottom:1px solid #ececf2;
    font-weight:700;
    white-space:nowrap;
}

td{
    padding:14px 12px;
    border-bottom:1px solid #f1f2f6;
    font-size:13px;
    color:#111827;
    vertical-align:middle;
}

/* ================= COLUMN ================= */

th:nth-child(1),
td:nth-child(1){
    width:40px;
}

th:nth-child(2),
td:nth-child(2){
    width:250px;
}

th:nth-child(3),
td:nth-child(3){
    width:300px;
}

th:nth-child(4),
td:nth-child(4){
    width:130px;
}

th:nth-child(5),
td:nth-child(5){
    width:100px;
}

th:nth-child(6),
td:nth-child(6){
    width:140px;
}

th:nth-child(7),
td:nth-child(7){
    width:140px;
}

th:nth-child(8),
td:nth-child(8){
    width:120px;
}

th:nth-child(9),
td:nth-child(9){
    width:120px;
}

/* ================= TITLE ================= */

.title-wrap{
    display:flex;
    align-items:center;
    gap:10px;
}

.file-icon{
    width:20px;
    height:20px;
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
}

.file-red{
    background:#ffe5e5;
    color:#ef4444;
}

.file-blue{
    background:#dbeafe;
    color:#2563eb;
}

.file-yellow{
    background:#fff4d4;
    color:#d97706;
}

.file-orange{
    background:#ffe7d6;
    color:#ea580c;
}

.file-green{
    background:#dcfce7;
    color:#16a34a;
}

.file-gray{
    background:#ececec;
    color:#666;
}

.file-icon i{
    width:15px;
    height:15px;
}

.material-title{
    font-weight:600;
    line-height:1.4;
    color:#14224a;
    font-size:13px;
}

/* ================= DESKRIPSI ================= */

.material-desc{
    color:#6b7280;
    font-size:12px;
    line-height:1.5;
    max-width:280px;
}

/* ================= CATEGORY ================= */

.category{
    background:#eeeeee;
    padding:5px 10px;
    border-radius:30px;
    font-size:10px;
    font-weight:700;
    display:inline-block;
    color:#555;
    white-space:nowrap;
}

/* ================= STATUS ================= */

.badge{
    padding:5px 12px;
    border-radius:20px;
    font-size:11px;
    font-weight:600;
    white-space:nowrap;
}

.publish{
    background:#dff7e8;
    color:#189a55;
}

.draft{
    background:#ffe9bf;
    color:#c78300;
}

/* ================= ACTION ================= */

.action{
    display:flex;
    align-items:center;
    gap:5px;
}

.action a{
    text-decoration:none;
    display:flex;
    align-items:center;
}

.action i{
    width:10px;
    height:10px;
    cursor:pointer;
}

.edit{
    color:#14224a;
}

.delete{
    color:#dc2626;
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
    gap:10px;
}

.page{
    width:24px;
    height:24px;
    border-radius:6px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:12px;
    cursor:pointer;
}

.page.active{
    background:#14224a;
    color:white;
}

.page-arrow{
    width:16px;
    height:16px;
    color:#666;
}

/* ================= EMPTY ================= */

.empty-data{
    text-align:center;
    padding:40px;
    color:#6b7280;
}

/* ================= RESPONSIVE ================= */

@media(max-width:900px){

    .header-top{
        flex-direction:column;
        gap:16px;
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
        min-width:1200px;
    }

}

</style>

<div class="content">

    <!-- HEADER -->
    <div class="page-header">

        <div class="header-top">

            <div class="header-title">
                <h1>Kelola Materi</h1>
                <p>Kelola dokumen, video, dan artikel literasi hukum</p>
            </div>

            <div class="header-action">

                <a href="{{ route('materi.create') }}" style="text-decoration:none;">

                    <button class="btn">

                        <i data-lucide="plus"></i>
                        Tambah Materi

                    </button>

                </a>

            </div>

        </div>

    </div>

    <!-- FILTER -->
    <div class="filter-section">

        <div class="filters">

            <select class="filter-select">
                <option>Semua Tipe</option>
            </select>

            <select class="filter-select">
                <option>Status: Semua</option>
            </select>

            <button class="filter-btn">

                <i data-lucide="filter"></i>
                Filter

            </button>

        </div>

        <div class="total-data">
            {{ count($materi) }} Materi ditemukan
        </div>

    </div>

    <!-- TABLE -->
    <div class="table-box">

        <table>

            <thead>

                <tr>

                    <th>
                        <input type="checkbox">
                    </th>

                    <th>NAMA MATERI</th>
                    <th>DESKRIPSI</th>
                    <th>KATEGORI</th>
                    <th>TIPE</th>
                    <th>PENULIS</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>STATUS</th>
                    <th>AKSI</th>

                </tr>

            </thead>

            <tbody>

            @forelse($materi as $item)

                <tr>

                    <td>
                        <input type="checkbox">
                    </td>

                    <!-- NAMA MATERI -->
                    <td>

                        <div class="title-wrap">

                            @if($item->tipe == 'PDF')

                                <div class="file-icon file-red">
                                    <i data-lucide="file-text"></i>
                                </div>

                            @elseif($item->tipe == 'Video')

                                <div class="file-icon file-blue">
                                    <i data-lucide="play-circle"></i>
                                </div>

                            @elseif($item->tipe == 'Artikel')

                                <div class="file-icon file-yellow">
                                    <i data-lucide="newspaper"></i>
                                </div>

                            @elseif($item->tipe == 'PPT')

                                <div class="file-icon file-orange">
                                    <i data-lucide="presentation"></i>
                                </div>

                            @elseif($item->tipe == 'JPG' || $item->tipe == 'PNG' || $item->tipe == 'Gambar')

                                <div class="file-icon file-green">
                                    <i data-lucide="image"></i>
                                </div>

                            @else

                                <div class="file-icon file-gray">
                                    <i data-lucide="folder"></i>
                                </div>

                            @endif

                            <div class="material-title">
                                {{ $item->judul }}
                            </div>

                        </div>

                    </td>

                    <!-- DESKRIPSI -->
                    <td>

                        <div class="material-desc">

                            {{ $item->deskripsi ?? '-' }}

                        </div>

                    </td>

                    <!-- KATEGORI -->
                    <td>

                        <span class="category">
                            {{ $item->kategori }}
                        </span>

                    </td>

                    <!-- TIPE -->
                    <td>{{ $item->tipe }}</td>

                    <!-- PENULIS -->
                    <td>{{ $item->penulis }}</td>

                    <!-- TANGGAL -->
                    <td>
                        {{ optional($item->created_at)->format('d M Y') ?? '-' }}
                    </td>

                    <!-- STATUS -->
                    <td>

                        @if($item->status == 'Diterbitkan')

                            <span class="badge publish">
                                ● Diterbitkan
                            </span>

                        @else

                            <span class="badge draft">
                                ● Draft
                            </span>

                        @endif

                    </td>

                    <!-- AKSI -->
                    <td>

                        <div class="action">

                            <!-- EDIT -->
                            <a href="{{ route('materi.edit', $item->id) }}">

                                <i
                                    data-lucide="pencil"
                                    class="edit">
                                </i>

                            </a>

                            <!-- DELETE -->
                            <form
                                action="{{ route('materi.destroy', $item->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus materi ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    style="
                                        border:none;
                                        background:none;
                                        padding:0;
                                        display:flex;
                                        align-items:center;
                                        cursor:pointer;
                                    ">

                                    <i
                                        data-lucide="trash-2"
                                        class="delete">
                                    </i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="9">

                        <div class="empty-data">
                            Belum ada data materi
                        </div>

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <!-- PAGINATION -->
        <div class="pagination">

            <span>
                Menampilkan {{ count($materi) }} materi
            </span>

            <div class="page-number">

                <i data-lucide="chevron-left" class="page-arrow"></i>

                <div class="page active">1</div>

                <i data-lucide="chevron-right" class="page-arrow"></i>

            </div>

        </div>

    </div>

</div>

<script>
lucide.createIcons();
</script>

@endsection