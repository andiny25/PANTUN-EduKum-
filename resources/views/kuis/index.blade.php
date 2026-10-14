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

/* ================= CONTENT ================= */

.content{
    padding:26px 22px;
    background:#f4f5f9;
    min-height:100vh;
}

/* ================= HEADER ================= */

.page-header{
    margin-bottom:24px;
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

/* ================= HEADER BUTTON ================= */

.header-action{
    flex-shrink:0;
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
    justify-content:center;
    gap:8px;
    box-shadow:0 4px 10px rgba(45,49,101,0.15);
    transition:0.2s;
}

.btn:hover{
    background:#252957;
}

.btn i{
    width:16px;
    height:16px;
}

/* ================= NOTIFICATION ================= */

.alert-success{
    position:relative;
    display:flex;
    align-items:center;
    gap:12px;

    background:#e8f8ef;
    color:#16865b;

    border:1px solid #c9efd9;
    border-radius:12px;

    padding:13px 16px;
    margin-bottom:20px;

    font-size:13px;
    font-weight:600;

    animation:slideDown .3s ease;
}

.alert-success > i{
    width:19px;
    height:19px;
    flex-shrink:0;
}

.alert-close{
    margin-left:auto;

    width:28px;
    height:28px;

    border:none;
    background:transparent;

    color:#16865b;

    cursor:pointer;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:7px;

    transition:.2s;
}

.alert-close:hover{
    background:rgba(22,134,91,.10);
}

.alert-close i{
    width:16px;
    height:16px;
}

@keyframes slideDown{

    from{
        opacity:0;
        transform:translateY(-8px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}

@keyframes fadeOut{

    from{
        opacity:1;
        transform:translateY(0);
    }

    to{
        opacity:0;
        transform:translateY(-8px);
    }

}

/* ================= TABLE BOX ================= */

.table-box{
    background:white;
    border-radius:18px;
    overflow:hidden;
    border:1px solid #ececf2;
}

/* ================= TABLE ================= */

table{
    width:100%;
    border-collapse:collapse;
    table-layout:fixed;
}

thead{
    background:#fafafa;
}

th{
    height:54px;
    padding:0 14px;
    text-align:left;
    vertical-align:middle;
    font-size:11px;
    color:#6b7280;
    border-bottom:1px solid #ececf2;
    font-weight:700;
    white-space:nowrap;
}

td{
    height:64px;
    padding:12px 14px;
    border-bottom:1px solid #f1f2f6;
    font-size:13px;
    color:#111827;
    vertical-align:middle;
}

/* ================= COLUMN SIZE ================= */

/* Judul */

th:nth-child(1),
td:nth-child(1){
    width:36%;
    padding-left:28px;
}

/* Kategori */

th:nth-child(2),
td:nth-child(2){
    width:19%;
}

/* Jumlah soal */

th:nth-child(3),
td:nth-child(3){
    width:14%;
}

/* Status */

th:nth-child(4),
td:nth-child(4){
    width:12%;
}

/* Tanggal */

th:nth-child(5),
td:nth-child(5){
    width:12%;
}

/* Aksi */

th:nth-child(6),
td:nth-child(6){
    width:90px;
    padding-left:8px;
    padding-right:8px;
}

/* ================= TITLE ================= */

.quiz-title{
    display:flex;
    align-items:center;
    gap:10px;
    min-height:38px;
}

.quiz-icon{
    width:32px;
    height:32px;
    border-radius:9px;

    background:#e8e9f5;
    color:#2d3165;

    display:flex;
    align-items:center;
    justify-content:center;

    flex-shrink:0;
}

.quiz-icon i{
    width:16px;
    height:16px;
}

.quiz-name{
    display:flex;
    align-items:center;
    min-width:0;
}

.quiz-name a{
    color:#14224a;
    text-decoration:none;

    font-size:13px;
    font-weight:600;
    line-height:1.4;

    display:block;
    max-width:100%;

    overflow:hidden;
    text-overflow:ellipsis;
    white-space:nowrap;
}

.quiz-name a:hover{
    color:#2563eb;
}

/* ================= CATEGORY ================= */

.category{
    background:#eeeeee;
    color:#555;

    padding:5px 10px;

    border-radius:30px;

    font-size:10px;
    font-weight:700;

    display:inline-flex;
    align-items:center;

    white-space:nowrap;
}

/* ================= TEXT ================= */

.text-muted{
    color:#6b7280;
    font-size:12px;
}

.question-count{
    font-size:12px;
    color:#374151;
    font-weight:600;
    white-space:nowrap;
}

/* ================= STATUS ================= */

.badge{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:5px;

    padding:5px 10px;

    border-radius:20px;

    font-size:10px;
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

.nonaktif{
    background:#fee2e2;
    color:#dc2626;
}

/* ================= ACTION ================= */

.action{
    display:flex;
    align-items:center;
    justify-content:flex-start;
    gap:8px;
}

.action a{
    width:20px;
    height:20px;

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
    width:20px;
    height:20px;

    padding:0;

    border:none;
    background:none;

    display:flex;
    align-items:center;
    justify-content:center;

    cursor:pointer;
}

.action i{
    width:13px;
    height:13px;

    stroke-width:2.3;
}

.edit{
    color:#14224a;
}

.delete{
    color:#dc2626;
}

.soal{
    color:#2563eb;
}

/* ================= PAGINATION ================= */

.pagination{
    display:flex;
    justify-content:space-between;
    align-items:center;

    padding:16px 20px;

    background:#fafafa;
}

.pagination span{
    font-size:12px;
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
    color:#333;
}

.page.active{
    background:#14224a;
    color:white;
}

.page-arrow{
    width:15px;
    height:15px;
    color:#666;
}

/* ================= EMPTY ================= */

.empty-data{
    text-align:center;
    padding:45px 20px;
    color:#6b7280;
}

.empty-icon{
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
        gap:15px;
    }

    .table-box{
        overflow-x:auto;
    }

    table{
        min-width:850px;
        table-layout:auto;
    }

}

</style>

<!-- ================= HEADER ================= -->

<div class="page-header">


<div class="header-top">

    <div class="header-title">

        <h1>Kelola Kuis</h1>

        <p>
            Kelola kuis literasi hukum untuk evaluasi pemahaman siswa.
        </p>

    </div>


    <div class="header-action">

        <a
            href="{{ route('kuis.create') }}"
            style="text-decoration:none;"
        >

            <button
                type="button"
                class="btn"
            >

                <i data-lucide="plus"></i>

                Buat Kuis Baru

            </button>

        </a>

    </div>

</div>


</div>

<!-- ================= NOTIFICATION ================= -->

@if(session('success'))


<div
    class="alert-success"
    id="successAlert"
>

    <i data-lucide="check-circle"></i>

    <span>
        {{ session('success') }}
    </span>


    <button
        type="button"
        class="alert-close"
        onclick="closeAlert()"
        title="Tutup"
    >

        <i data-lucide="x"></i>

    </button>

</div>


@endif

<!-- ================= TABLE ================= -->

<div class="table-box">

<table>

    <thead>

        <tr>

            <th>JUDUL KUIS</th>

            <th>KATEGORI</th>

            <th>JUMLAH SOAL</th>

            <th>STATUS</th>

            <th>TANGGAL DIBUAT</th>

            <th>AKSI</th>

        </tr>

    </thead>


    <tbody>

    @forelse($kuis as $item)

        <tr>

            <!-- ================= JUDUL ================= -->

            <td>

                <div class="quiz-title">

                    <div class="quiz-icon">

                        <i data-lucide="clipboard-check"></i>

                    </div>


                    <div class="quiz-name">

                        <a
                            href="{{ route('kuis.show', $item->id) }}"
                        >

                            {{ $item->judul }}

                        </a>

                    </div>

                </div>

            </td>


            <!-- ================= KATEGORI ================= -->

            <td>

                @if($item->kategori)

                    <span class="category">

                        {{ $item->kategori->nama_kategori }}

                    </span>

                @else

                    <span class="text-muted">
                        -
                    </span>

                @endif

            </td>


            <!-- ================= JUMLAH SOAL ================= -->

            <td>

                <span class="question-count">

                    {{ $item->jumlah_soal ?? 0 }} Soal

                </span>

            </td>


            <!-- ================= STATUS ================= -->

            <td>

                @if($item->status == 'Aktif')

                    <span class="badge publish">
                        ● Aktif
                    </span>

                @elseif($item->status == 'Draft')

                    <span class="badge draft">
                        ● Draft
                    </span>

                @else

                    <span class="badge nonaktif">
                        ● Nonaktif
                    </span>

                @endif

            </td>


            <!-- ================= TANGGAL ================= -->

            <td>

                <span class="text-muted">

                    {{ $item->created_at
                        ? $item->created_at->format('d M Y')
                        : '-'
                    }}

                </span>

            </td>


            <!-- ================= AKSI ================= -->

            <td>

                <div class="action">

                    <!-- EDIT -->

                    <a
                        href="{{ route('kuis.edit', $item->id) }}"
                        title="Edit Kuis"
                    >

                        <i
                            data-lucide="pencil"
                            class="edit"
                        ></i>

                    </a>


                    <!-- DELETE -->

                    <form
                        action="{{ route('kuis.destroy', $item->id) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus kuis ini?')"
                    >

                        @csrf

                        @method('DELETE')

                        <button
                            type="submit"
                            title="Hapus Kuis"
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

            <td colspan="6">

                <div class="empty-data">

                    <i
                        data-lucide="clipboard-x"
                        class="empty-icon"
                    ></i>

                    <h3>
                        Belum Ada Kuis
                    </h3>

                    <p>
                        Belum ada kuis literasi hukum yang ditambahkan.
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

        Menampilkan {{ count($kuis) }} kuis

    </span>


    <div class="page-number">

        <i
            data-lucide="chevron-left"
            class="page-arrow"
        ></i>

        <div class="page active">
            1
        </div>

        <i
            data-lucide="chevron-right"
            class="page-arrow"
        ></i>

    </div>

</div>

</div>

<script>

    // =========================
    // LUCIDE ICON
    // =========================

    lucide.createIcons();


    // =========================
    // CLOSE NOTIFICATION
    // =========================

    function closeAlert(){

        const alert = document.getElementById('successAlert');

        if(alert){

            alert.style.animation =
                'fadeOut .3s ease forwards';

            setTimeout(function(){

                alert.remove();

            }, 300);

        }

    }


    // =========================
    // AUTO CLOSE 4 DETIK
    // =========================

    @if(session('success'))

        setTimeout(function(){

            closeAlert();

        }, 4000);

    @endif

</script>

@endsection
