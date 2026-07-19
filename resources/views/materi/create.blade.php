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

.content{
    padding:20px;
}

.table-box{
    border-radius:14px;
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

/* BUTTON */

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

.file-orange{
    background:#ffe7d6;
    color:#ea580c;
}

.file-gray{
    background:#ececec;
    color:#666;
}

.file-green{
    background:#dcfce7;
    color:#16a34a;
}

.file-orange{
    background:#ffe7d6;
    color:#ea580c;
}

.file-gray{
    background:#ececec;
    color:#666;
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

/* BIAR JARAK ANTAR KOLOM LEBIH RAPAT */

th:nth-child(1),
td:nth-child(1){
    width:40px;
}

th:nth-child(2),
td:nth-child(2){
    width:260px;
}

th:nth-child(3),
td:nth-child(3){
    width:120px;
}

th:nth-child(4),
td:nth-child(4){
    width:90px;
}

th:nth-child(5),
td:nth-child(5){
    width:130px;
}

th:nth-child(6),
td:nth-child(6){
    width:120px;
}

th:nth-child(7),
td:nth-child(7){
    width:120px;
}

th:nth-child(8),
td:nth-child(8){
    width:90px;
}

/* TITLE */

.title-wrap{
    display:flex;
    align-items:center;
    gap:9px;
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

.file-icon i{
    width:10px;
    height:10px;
}

.material-title{
    font-weight:600;
    line-height:1.35;
    color:#14224a;
    font-size:13px;
    max-width:200px;
}

/* CATEGORY */

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

/* STATUS */

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

/* ACTION */

.action{
    display:flex;
    align-items:center;
    gap:5px;
}

.action i{
    width:5x;
    height:5fpx;
    cursor:pointer;
}

.delete{
    color:#dc2626;
    width:15px;
    height:15px;
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
        min-width:1000px;
    }

}

.form-row{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
    margin-bottom:20px;
}

.form-group{
    display:flex;
    flex-direction:column;
}

.form-group label{
    font-size:12px;
    font-weight:700;
    margin-bottom:8px;
    color:#374151;
}

.form-group input,
.form-group select,
.form-group textarea{
    border:1px solid #e5e7eb;
    border-radius:10px;
    padding:12px;
    font-size:14px;
}

.upload-box{
    border:2px dashed #d1d5db;
    border-radius:12px;
    padding:20px;
    background:#fafafa;
    text-align:center;
}

.form-title{
    color:#13234a;
    font-size:24px;
    font-weight:700;
}

.form-subtitle{
    color:#6b7280;
    font-size:13px;
    margin-top:4px;
}

.upload-box i{
    width:40px;
    height:40px;
    color:#2d3165;
}

.upload-box h4{
    margin-top:10px;
    color:#13234a;
}

.upload-box p{
    color:#6b7280;
    font-size:13px;
    margin:10px 0;
}

.form-card{
    max-width:750px;
    margin:auto;
    padding:25px;
}

</style>

<div class="content">

    <div class="table-box form-card">

        <div style="margin-bottom:25px;">
            <h2 class="form-title">Tambah Materi Baru</h2>

            <p class="form-subtitle">
                Unggah dan lengkapi detail materi untuk dipublikasikan
            </p>
        </div>

        <form action="{{ route('materi.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="form-row">

                <div class="form-group">

                    <label>JUDUL MATERI</label>

                    <input
                        type="text"
                        name="judul"
                        placeholder="Contoh: Kesadaran Hukum Sejak Dini">

                </div>

                <div class="form-group">

                    <label>KATEGORI</label>

                    <select name="kategori">
                        <option>Pilih Kategori</option>
                        <option>Hukum Pidana</option>
                        <option>Hukum Perdata</option>
                        <option>HAM</option>
                    </select>

                </div>

            </div>

            <div class="form-row">

                <div class="form-group">

                    <label>PENULIS</label>

                    <input
                        type="text"
                        name="penulis"
                        placeholder="Andini">

                </div>

                <div class="form-group">

                    <label>TIPE MATERI</label>

                    <select name="tipe">
                        <option>PDF</option>
                        <option>Video</option>
                        <option>Artikel</option>
                        <option>PPT</option>
                        <option>JPG</option>
                        <option>PNG</option>
                    </select>

                </div>

            </div>

            <div class="form-group">

                <label>UNGGAH DOKUMEN</label>

                <div class="upload-box">

                    <i data-lucide="upload-cloud"></i>

                    <h4>Klik untuk unggah file</h4>

                    <p>
                        PDF, PPT, JPG, PNG, MP4 (Maks. 50MB)
                    </p>

                    <input type="file" name="file">

                </div>

            </div>

            <div class="form-group" style="margin-top:20px;">

                <label>DESKRIPSI</label>

                <textarea
                    rows="5"
                    name="deskripsi"
                    placeholder="Tuliskan ringkasan materi atau petunjuk penggunaan..."></textarea>

            </div>

            <div
                style="
                margin-top:25px;
                display:flex;
                justify-content:flex-end;
                gap:10px;">

                <a href="/materi"
                   class="filter-btn"
                   style="text-decoration:none;">

                    Kembali

                </a>

                <button type="submit" class="btn">
                    Tambah Materi
                </button>

            </div>

        </form>

    </div>

</div>

<script>
    lucide.createIcons();
</script>

@endsection