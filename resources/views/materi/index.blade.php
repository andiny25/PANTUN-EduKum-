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

body{
    background:#f3f4f8;
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
    font-size:40px;
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
    text-decoration:none;
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
    gap:15px;
}

.filters{
    display:flex;
    align-items:center;
    gap:10px;
    flex-wrap:wrap;
}

.filter-select,
.filter-input,
.filter-btn{
    height:38px;
    border:1px solid #e5e7eb;
    background:white;
    border-radius:10px;
    padding:0 14px;
    font-size:13px;
    color:#444;
    outline:none;
}

.filter-select{
    min-width:140px;
    cursor:pointer;
}

.filter-input{
    width:220px;
}

.filter-select:focus,
.filter-input:focus{
    border-color:#2d3165;
    box-shadow:0 0 0 3px rgba(45,49,101,.07);
}

.filter-btn{
    display:flex;
    align-items:center;
    gap:7px;
    cursor:pointer;
    background:#2d3165;
    color:white;
    border-color:#2d3165;
    transition:.2s;
}

.filter-btn:hover{
    background:#252957;
}

.filter-btn i{
    width:14px;
    height:14px;
}

.total-data{
    font-size:13px;
    color:#374151;
    font-weight:600;
    white-space:nowrap;
}

/* ================= TABLE BOX ================= */

.table-box{
    background:white;
    border-radius:18px;
    border:1px solid #ececf2;
    overflow:hidden;

    display:flex;
    flex-direction:column;
}

/* ================= TABLE SCROLL ================= */

.table-scroll{
    max-height:calc(100vh - 300px);
    overflow-y:auto;
    overflow-x:auto;
}

/* ================= SCROLLBAR ================= */

.table-scroll::-webkit-scrollbar{
    width:7px;
    height:7px;
}

.table-scroll::-webkit-scrollbar-track{
    background:#f5f6f8;
}

.table-scroll::-webkit-scrollbar-thumb{
    background:#c8cad3;
    border-radius:10px;
}

.table-scroll::-webkit-scrollbar-thumb:hover{
    background:#aeb1bd;
}

/* ================= TABLE ================= */

table{
    width:100%;
    min-width:1200px;
    border-collapse:collapse;
}

thead{
    position:sticky;
    top:0;
    z-index:5;
    background:white;
}

th{
    padding:15px 12px;
    text-align:left;
    font-size:11px;
    color:#6b7280;
    border-bottom:1px solid #ececf2;
    font-weight:700;
    white-space:nowrap;
    background:white;
}

td{
    padding:14px 12px;
    border-bottom:1px solid #f1f2f6;
    font-size:13px;
    color:#111827;
    vertical-align:middle;
}

tbody tr{
    transition:.15s;
}

tbody tr:hover{
    background:#fafbfe;
}

/* ================= COLUMN ================= */

th:nth-child(1),
td:nth-child(1){
    width:250px;
}

th:nth-child(2),
td:nth-child(2){
    width:300px;
}

th:nth-child(3),
td:nth-child(3){
    width:130px;
}

th:nth-child(4),
td:nth-child(4){
    width:100px;
}

th:nth-child(5),
td:nth-child(5){
    width:140px;
}

th:nth-child(6),
td:nth-child(6){
    width:140px;
}

th:nth-child(7),
td:nth-child(7){
    width:120px;
}

th:nth-child(8),
td:nth-child(8){
    width:120px;
}

/* ================= TITLE ================= */

.title-wrap{
    display:flex;
    align-items:center;
    gap:10px;
}

.file-icon{
    width:32px;
    height:32px;
    border-radius:9px;
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
    width:16px;
    height:16px;
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

    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
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
    gap:9px;
}

.action a{
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
}

.action form{
    display:flex;
    align-items:center;
}

.action button{
    display:flex;
    align-items:center;
    justify-content:center;
    border:none;
    background:none;
    padding:0;
    cursor:pointer;
}

.action i{
    width:16px;
    height:16px;
    cursor:pointer;
}

.present{
    color:#2563eb;
}

.present:hover{
    color:#14224a;
}

.edit{
    color:#14224a;
}

.edit:hover{
    color:#2563eb;
}

.delete{
    color:#dc2626;
}

.delete:hover{
    color:#991b1b;
}

/* ================= EMPTY ================= */

.empty-data{
    text-align:center;
    padding:60px 40px;
    color:#6b7280;
}

.empty-data i{
    width:40px;
    height:40px;
    margin-bottom:10px;
    color:#9ca3af;
}

.empty-data p{
    font-size:13px;
}

/* ================= PAGINATION ================= */

.pagination{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:14px 18px;
    background:#fafafa;
    border-top:1px solid #ececf2;
    flex-shrink:0;
}

.pagination-info{
    font-size:12px;
    color:#666;
}

.page-number{
    display:flex;
    align-items:center;
    gap:5px;
}

.page{
    width:28px;
    height:28px;
    border-radius:7px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:12px;
    cursor:pointer;
    color:#555;
    transition:.2s;
}

.page:hover{
    background:#eef0f5;
}

.page.active{
    background:#14224a;
    color:white;
}

.page.disabled{
    opacity:.35;
    cursor:not-allowed;
}

.page-arrow{
    width:16px;
    height:16px;
    color:#666;
}

/* ================= HIDDEN ROW ================= */

.material-row.hidden{
    display:none;
}

/* ================= RESPONSIVE ================= */

@media(max-width:1100px){

    .header-top{
        gap:20px;
    }

    .filter-section{
        align-items:flex-start;
    }

}

@media(max-width:900px){

    .content{
        padding:20px 15px;
    }

    .header-top{
        flex-direction:column;
        gap:16px;
    }

    .header-title h1{
        font-size:32px;
    }

    .filter-section{
        flex-direction:column;
        align-items:flex-start;
    }

    .filters{
        width:100%;
    }

    .filter-input{
        width:100%;
    }

    .table-scroll{
        max-height:calc(100vh - 350px);
    }

}

</style>


<!-- =========================================================
     HEADER
========================================================= -->

<div class="page-header">

    <div class="header-top">

        <div class="header-title">

            <h1>Kelola Materi</h1>

            <p>
                Kelola dokumen, video, dan artikel literasi hukum
            </p>

        </div>

        <div class="header-action">

            <a
                href="{{ route('materi.create') }}"
                class="btn"
            >

                <i data-lucide="plus"></i>

                Tambah Materi

            </a>

        </div>

    </div>

</div>


<!-- =========================================================
     FILTER
========================================================= -->

<div class="filter-section">

    <div class="filters">

        <!-- SEARCH -->

        <input
            type="text"
            id="searchMateri"
            class="filter-input"
            placeholder="Cari nama materi..."
        >


        <!-- STATUS -->

        <select
            id="filterStatus"
            class="filter-select"
        >

            <option value="">
                Semua Status
            </option>

            <option value="Diterbitkan">
                Diterbitkan
            </option>

            <option value="Draft">
                Draft
            </option>

        </select>


        <!-- KATEGORI -->

        <select
            id="filterKategori"
            class="filter-select"
        >

            <option value="">
                Semua Kategori
            </option>

            @foreach(
                $materi
                    ->pluck('kategori.nama_kategori')
                    ->filter()
                    ->unique()
                    ->sort()
                as $kategori
            )

                <option value="{{ strtolower($kategori) }}">
                    {{ $kategori }}
                </option>

            @endforeach

        </select>


        <!-- FILTER BUTTON -->

        <button
            type="button"
            class="filter-btn"
            id="btnFilter"
        >

            <i data-lucide="filter"></i>

            Filter

        </button>

    </div>


    <div
        class="total-data"
        id="totalData"
    >

        {{ count($materi) }} Materi ditemukan

    </div>

</div>


<!-- =========================================================
     TABLE
========================================================= -->

<div class="table-box">

    <div class="table-scroll">

        <table>

            <thead>

                <tr>

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


            <tbody id="materiTable">

            @forelse($materi as $item)

                @php

                    $fileUrl = $item->file
                        ? asset('storage/' . $item->file)
                        : '#';

                    $extension = $item->file
                        ? strtolower(
                            pathinfo(
                                $item->file,
                                PATHINFO_EXTENSION
                            )
                        )
                        : '';

                    $kategoriNama =
                        $item->kategori->nama_kategori ?? '';

                @endphp


                <tr
                    class="material-row"

                    data-title="{{ strtolower($item->judul) }}"

                    data-tipe="{{ strtolower($item->tipe ?? '') }}"

                    data-status="{{ strtolower($item->status ?? '') }}"

                    data-kategori="{{ strtolower($kategoriNama) }}"
                >


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

                            @elseif(
                                $item->tipe == 'JPG' ||
                                $item->tipe == 'PNG' ||
                                $item->tipe == 'Gambar'
                            )

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

                            {{ $kategoriNama ?: '-' }}

                        </span>

                    </td>


                    <!-- TIPE -->

                    <td>

                        {{ $item->tipe ?? '-' }}

                    </td>


                    <!-- PENULIS -->

                    <td>

                        {{ $item->penulis ?? '-' }}

                    </td>


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

                            <!-- PRESENTASI -->

                            @if($item->file)

                                @if(in_array($extension, ['ppt', 'pptx']))

                                    <a
                                        href="https://view.officeapps.live.com/op/view.aspx?src={{ urlencode($fileUrl) }}"
                                        target="_blank"
                                        title="Buka Presentasi"
                                        class="present"
                                    >

                                        <i
                                            data-lucide="presentation"
                                        ></i>

                                    </a>

                                @else

                                    <a
                                        href="{{ $fileUrl }}"
                                        target="_blank"
                                        title="Buka Materi"
                                        class="present"
                                    >

                                        <i
                                            data-lucide="presentation"
                                        ></i>

                                    </a>

                                @endif

                            @else

                                <span
                                    style="
                                        color:#9ca3af;
                                        display:flex;
                                        align-items:center;
                                    "
                                    title="Tidak ada file"
                                >

                                    <i
                                        data-lucide="presentation"
                                    ></i>

                                </span>

                            @endif


                            <!-- EDIT -->

                            <a
                                href="{{ route('materi.edit', $item->id) }}"
                                title="Edit materi"
                            >

                                <i
                                    data-lucide="pencil"
                                    class="edit"
                                ></i>

                            </a>


                            <!-- DELETE -->

                            <form
                                action="{{ route('materi.destroy', $item->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus materi ini?')"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    title="Hapus materi"
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

                <tr id="emptyData">

                    <td colspan="8">

                        <div class="empty-data">

                            <i data-lucide="folder-open"></i>

                            <p>
                                Belum ada data materi
                            </p>

                        </div>

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>


    <!-- =====================================================
         PAGINATION
    ====================================================== -->

    <div class="pagination">

        <div
            class="pagination-info"
            id="paginationInfo"
        >

            Menampilkan 0 materi

        </div>


        <div class="page-number">

            <div
                class="page disabled"
                id="prevPage"
                title="Halaman sebelumnya"
            >

                <i
                    data-lucide="chevron-left"
                    class="page-arrow"
                ></i>

            </div>


            <div
                class="page active"
                id="currentPage"
            >

                1

            </div>


            <div
                class="page disabled"
                id="nextPage"
                title="Halaman berikutnya"
            >

                <i
                    data-lucide="chevron-right"
                    class="page-arrow"
                ></i>

            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

/* ================= LUCIDE ================= */

lucide.createIcons();


/* ================= ELEMENT ================= */

const searchMateri =
    document.getElementById('searchMateri');

const filterStatus =
    document.getElementById('filterStatus');

const filterKategori =
    document.getElementById('filterKategori');

const btnFilter =
    document.getElementById('btnFilter');

const totalData =
    document.getElementById('totalData');

const paginationInfo =
    document.getElementById('paginationInfo');

const prevPage =
    document.getElementById('prevPage');

const nextPage =
    document.getElementById('nextPage');

const currentPage =
    document.getElementById('currentPage');


/* ================= DATA ================= */

const rows = Array.from(
    document.querySelectorAll('.material-row')
);


/* ================= PAGINATION ================= */

let currentPageNumber = 1;

const rowsPerPage = 8;

let filteredRows = [...rows];


/* ================= FILTER ================= */

function applyFilter(){

    const searchValue =
        searchMateri.value
            .toLowerCase()
            .trim();

    const statusValue =
        filterStatus.value
            .toLowerCase()
            .trim();

    const kategoriValue =
        filterKategori.value
            .toLowerCase()
            .trim();


    filteredRows = rows.filter(function(row){

        const title =
            row.dataset.title || '';

        const status =
            row.dataset.status || '';

        const kategori =
            row.dataset.kategori || '';


        const matchSearch =
            title.includes(searchValue);

        const matchStatus =
            statusValue === '' ||
            status === statusValue;

        const matchKategori =
            kategoriValue === '' ||
            kategori === kategoriValue;


        return (
            matchSearch &&
            matchStatus &&
            matchKategori
        );

    });


    currentPageNumber = 1;

    displayRows();

}


/* ================= DISPLAY ROW ================= */

function displayRows(){

    rows.forEach(function(row){

        row.classList.add('hidden');

    });


    const total =
        filteredRows.length;


    const totalPages =
        Math.max(
            1,
            Math.ceil(
                total / rowsPerPage
            )
        );


    if(
        currentPageNumber >
        totalPages
    ){

        currentPageNumber =
            totalPages;

    }


    const start =
        (currentPageNumber - 1)
        * rowsPerPage;


    const end =
        start + rowsPerPage;


    const pageRows =
        filteredRows.slice(
            start,
            end
        );


    pageRows.forEach(function(row){

        row.classList.remove('hidden');

    });


    /* ================= TOTAL ================= */

    totalData.textContent =
        total + ' Materi ditemukan';


    /* ================= PAGINATION INFO ================= */

    if(total === 0){

        paginationInfo.textContent =
            'Tidak ada materi ditemukan';

    }else{

        paginationInfo.textContent =
            'Menampilkan ' +
            (start + 1) +
            '–' +
            Math.min(end, total) +
            ' dari ' +
            total +
            ' materi';

    }


    /* ================= PAGE ================= */

    currentPage.textContent =
        currentPageNumber;


    /* ================= PREVIOUS ================= */

    if(
        currentPageNumber <= 1
    ){

        prevPage.classList.add('disabled');

    }else{

        prevPage.classList.remove('disabled');

    }


    /* ================= NEXT ================= */

    if(
        currentPageNumber >=
        totalPages
    ){

        nextPage.classList.add('disabled');

    }else{

        nextPage.classList.remove('disabled');

    }

}


/* ================= FILTER BUTTON ================= */

btnFilter.addEventListener(
    'click',
    function(){

        applyFilter();

    }
);


/* ================= SEARCH ================= */

searchMateri.addEventListener(
    'input',
    function(){

        applyFilter();

    }
);


/* ================= STATUS ================= */

filterStatus.addEventListener(
    'change',
    function(){

        applyFilter();

    }
);


/* ================= KATEGORI ================= */

filterKategori.addEventListener(
    'change',
    function(){

        applyFilter();

    }
);


/* ================= PREVIOUS PAGE ================= */

prevPage.addEventListener(
    'click',
    function(){

        if(
            currentPageNumber > 1
        ){

            currentPageNumber--;

            displayRows();

        }

    }
);


/* ================= NEXT PAGE ================= */

nextPage.addEventListener(
    'click',
    function(){

        const totalPages =
            Math.max(
                1,
                Math.ceil(
                    filteredRows.length /
                    rowsPerPage
                )
            );


        if(
            currentPageNumber <
            totalPages
        ){

            currentPageNumber++;

            displayRows();

        }

    }
);


/* ================= INITIAL DISPLAY ================= */

displayRows();

</script>

@endsection