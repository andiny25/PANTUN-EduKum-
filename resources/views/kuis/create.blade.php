```php
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
    padding:28px;
    background:#f4f5f9;
    min-height:100vh;
}

/* ================= HEADER ================= */

.page-header{
    margin-bottom:24px;
}

.header-title h1{
    font-size:40px;
    font-weight:700;
    color:#13234a;
    margin-bottom:4px;
}

.header-title p{
    color:#6b7280;
    font-size:14px;
}

/* ================= FORM CARD ================= */

.form-card{
    background:white;
    border-radius:20px;
    padding:28px;
    border:1px solid #ececf2;
    max-width:900px;
}

/* ================= FORM ================= */

.form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
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
    padding:12px 14px;
    font-size:13px;
    outline:none;
    background:white;
    transition:.2s;
}

input:focus,
select:focus,
textarea:focus{
    border-color:#081b44;
    box-shadow:0 0 0 3px rgba(8,27,68,.08);
}

textarea{
    resize:none;
    min-height:120px;
}

/* ================= BUTTON ================= */

.form-action{
    margin-top:26px;
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
    transition:.2s;
}

.btn-primary{
    background:#081b44;
    color:white;
}

.btn-primary:hover{
    background:#061532;
}

.btn-secondary{
    background:#eef0f5;
    color:#374151;
}

.btn-secondary:hover{
    background:#dde2ea;
}

.btn i{
    width:16px;
    height:16px;
}

/* ================= RESPONSIVE ================= */

@media(max-width:768px){

    .form-grid{
        grid-template-columns:1fr;
    }

    .form-group.full{
        grid-column:auto;
    }

}

</style>

<div class="content">

    <!-- HEADER -->
    <div class="page-header">

        <div class="header-title">

            <h1>Buat Kuis Baru</h1>

            <p>
                Tambahkan data kuis literasi hukum baru
            </p>

        </div>

    </div>

    <!-- FORM -->
    <div class="form-card">

        <form action="{{ route('kuis.store') }}"
              method="POST">

            @csrf

            <div class="form-grid">

                <!-- JUDUL -->
                <div class="form-group full">

                    <label>Judul Kuis</label>

                    <input type="text"
                           name="judul"
                           placeholder="Masukkan judul kuis"
                           required>

                </div>

                <!-- KATEGORI -->
                <div class="form-group">

                    <label>Kategori</label>

                    <select name="kategori" required>

                        <option value="">
                            Pilih Kategori
                        </option>

                        <option value="Bullying">
                            Bullying
                        </option>

                        <option value="Narkoba">
                            Narkoba
                        </option>

                        <option value="Cyber Crime">
                            Cyber Crime
                        </option>

                        <option value="Kenakalan Remaja">
                            Kenakalan Remaja
                        </option>

                    </select>

                </div>

                <!-- PAKET -->
                <div class="form-group">

                    <label>Paket Penyuluhan</label>

                    <input type="text"
                           name="paket_penyuluhan"
                           placeholder="Masukkan paket penyuluhan">

                </div>

                <!-- JUMLAH SOAL -->
                <div class="form-group">

                    <label>Jumlah Soal</label>

                    <input type="number"
                           name="jumlah_soal"
                           placeholder="Contoh: 10"
                           required>

                </div>

                <!-- STATUS -->
                <div class="form-group">

                    <label>Status</label>

                    <select name="status">

                        <option value="Aktif">
                            Aktif
                        </option>

                        <option value="Draft">
                            Draft
                        </option>

                        <option value="Nonaktif">
                            Nonaktif
                        </option>

                    </select>

                </div>

                <!-- DESKRIPSI -->
                <div class="form-group full">

                    <label>Deskripsi Kuis</label>

                    <textarea name="deskripsi"
                              placeholder="Masukkan deskripsi kuis"></textarea>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="form-action">

                <button type="submit"
                        class="btn btn-primary">

                    <i data-lucide="save"></i>

                    Simpan Kuis

                </button>

                <a href="{{ route('kuis.index') }}"
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
