@extends('layouts.sidebar')

@section('content')

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins', sans-serif;
}

.content{
    padding:26px 22px;
    background:#f4f5f9;
    min-height:100vh;
}

/* ================= HEADER ================= */

.page-header{
    margin-bottom:24px;
}

.header-title h1{
    font-size:42px;
    color:#13234a;
    font-weight:700;
    margin-bottom:4px;
}

.header-title p{
    color:#6b7280;
    font-size:14px;
}

/* ================= CARD ================= */

.form-card{
    background:white;
    border-radius:20px;
    padding:30px;
    border:1px solid #ececf2;
    max-width:1000px;
    box-shadow:0 4px 14px rgba(0,0,0,0.03);
}

/* ================= FORM ================= */

.form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:22px;
}

.form-group{
    display:flex;
    flex-direction:column;
}

.form-group.full{
    grid-column:1/3;
}

label{
    font-size:13px;
    font-weight:600;
    color:#374151;
    margin-bottom:8px;
}

input,
select,
textarea{
    width:100%;
    border:1px solid #dcdfe7;
    border-radius:12px;
    padding:13px 14px;
    font-size:13px;
    outline:none;
    transition:0.2s;
    background:white;
    color:#111827;
}

input:focus,
select:focus,
textarea:focus{
    border-color:#2d3165;
    box-shadow:0 0 0 3px rgba(45,49,101,.08);
}

textarea{
    min-height:120px;
    resize:none;
}

/* ================= FOTO ================= */

.upload-box{
    border:2px dashed #d1d5db;
    border-radius:16px;
    padding:28px;
    text-align:center;
    background:#fafafa;
    transition:0.2s;
}

.upload-box:hover{
    border-color:#2d3165;
    background:#f7f8fc;
}

.upload-box i{
    width:42px;
    height:42px;
    color:#6b7280;
    margin-bottom:12px;
}

.upload-box p{
    font-size:13px;
    color:#6b7280;
    margin-bottom:14px;
}

/* ================= BUTTON ================= */

.form-action{
    margin-top:28px;
    display:flex;
    gap:12px;
}

.btn{
    height:44px;
    padding:0 18px;
    border:none;
    border-radius:10px;
    font-size:13px;
    font-weight:600;
    cursor:pointer;
    display:flex;
    align-items:center;
    gap:8px;
    transition:0.2s;
}

.btn i{
    width:16px;
    height:16px;
}

.btn-primary{
    background:#2d3165;
    color:white;
    box-shadow:0 4px 10px rgba(45,49,101,0.15);
}

.btn-primary:hover{
    background:#252957;
}

.btn-secondary{
    background:#eef0f5;
    color:#374151;
}

.btn-secondary:hover{
    background:#e4e7ef;
}

/* ================= RESPONSIVE ================= */

@media(max-width:768px){

    .form-grid{
        grid-template-columns:1fr;
    }

    .form-group.full{
        grid-column:auto;
    }

    .form-card{
        padding:22px;
    }

}

</style>

<div class="content">

    <!-- HEADER -->
    <div class="page-header">

        <div class="header-title">

            <h1>Tambah Penyuluh</h1>

            <p>
                Tambahkan data penyuluh hukum baru ke dalam sistem EduKum
            </p>

        </div>

    </div>

    <!-- FORM -->
    <div class="form-card">

        <form action="{{ route('penyuluh.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="form-grid">

                <!-- FOTO -->
                <div class="form-group full">

                    <label>Foto Penyuluh</label>

                    <div class="upload-box">

                        <i data-lucide="image-plus"></i>

                        <p>
                            Upload foto profil penyuluh
                        </p>

                        <input
                            type="file"
                            name="foto">

                    </div>

                </div>

                <!-- NAMA -->
                <div class="form-group">

                    <label>Nama Lengkap</label>

                    <input
                        type="text"
                        name="nama"
                        placeholder="Masukkan nama lengkap"
                        required>

                </div>

                <!-- EMAIL -->
                <div class="form-group">

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        placeholder="Masukkan email"
                        required>

                </div>

                <!-- NO HP -->
                <div class="form-group">

                    <label>No Handphone</label>

                    <input
                        type="text"
                        name="no_hp"
                        placeholder="08xxxxxxxxxx">

                </div>

                <!-- JABATAN -->
                <div class="form-group">

                    <label>Jabatan</label>

                    <input
                        type="text"
                        name="jabatan"
                        placeholder="Contoh: Penyuluh Ahli Pertama">

                </div>

                <!-- INSTANSI -->
                <div class="form-group full">

                    <label>Instansi</label>

                    <input
                        type="text"
                        name="instansi"
                        placeholder="Masukkan nama instansi">

                </div>


                <!-- STATUS -->
                <div class="form-group">

                    <label>Status</label>

                    <select name="status">

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

            <!-- BUTTON -->
            <div class="form-action">

                <button type="submit"
                        class="btn btn-primary">

                    <i data-lucide="save"></i>

                    Simpan Penyuluh

                </button>

                <a href="{{ route('penyuluh.index') }}"
                   style="text-decoration:none;">

                    <button type="button"
                            class="btn btn-secondary">

                        <i data-lucide="arrow-left"></i>

                        Kembali

                    </button>

                </a>

            </div>

        </form>

    </div>

</div>

<script>
lucide.createIcons();
</script>

@endsection