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
}

/* ================= HEADER ================= */

.page-header{
    margin-bottom:24px;
}

.header-title h1{
    font-size:38px;
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
    border-radius:18px;
    padding:28px;
    border:1px solid #ececf2;
    max-width:850px;
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
    transition:0.2s;
    background:white;
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

/* ================= BUTTON ================= */

.form-action{
    margin-top:24px;
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

.btn-primary{
    background:#2d3165;
    color:white;
}

.btn-primary:hover{
    background:#252957;
}

.btn-secondary{
    background:#eef0f5;
    color:#374151;
}

.btn-secondary:hover{
    background:#e3e6ed;
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
            <h1>Edit Materi</h1>
            <p>Perbarui data materi literasi hukum</p>
        </div>

    </div>

    <!-- FORM -->
    <div class="form-card">

        <form action="{{ route('materi.update', $materi->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-grid">

                <!-- JUDUL -->
                <div class="form-group full">

                    <label>Judul Materi</label>

                    <input
                        type="text"
                        name="judul"
                        value="{{ $materi->judul }}"
                        placeholder="Masukkan judul materi"
                        required>

                </div>

                <!-- DESKRIPSI -->
                <div class="form-group full">

                    <label>Deskripsi</label>

                    <textarea
                        name="deskripsi"
                        placeholder="Masukkan deskripsi materi">{{ $materi->deskripsi }}</textarea>

                </div>

                <!-- KATEGORI -->
                <div class="form-group">

                    <label>Kategori</label>

                    <select name="kategori" required>

                        <option value="Bullying"
                            {{ $materi->kategori == 'Bullying' ? 'selected' : '' }}>
                            Bullying
                        </option>

                        <option value="Narkoba"
                            {{ $materi->kategori == 'Narkoba' ? 'selected' : '' }}>
                            Narkoba
                        </option>

                        <option value="Cyber Crime"
                            {{ $materi->kategori == 'Cyber Crime' ? 'selected' : '' }}>
                            Cyber Crime
                        </option>

                        <option value="Kenakalan Remaja"
                            {{ $materi->kategori == 'Kenakalan Remaja' ? 'selected' : '' }}>
                            Kenakalan Remaja
                        </option>

                    </select>

                </div>

                <!-- TIPE -->
                <div class="form-group">

                    <label>Tipe Materi</label>

                    <select name="tipe" required>

                        <option value="PDF"
                            {{ $materi->tipe == 'PDF' ? 'selected' : '' }}>
                            PDF
                        </option>

                        <option value="Video"
                            {{ $materi->tipe == 'Video' ? 'selected' : '' }}>
                            Video
                        </option>

                        <option value="Artikel"
                            {{ $materi->tipe == 'Artikel' ? 'selected' : '' }}>
                            Artikel
                        </option>

                        <option value="PPT"
                            {{ $materi->tipe == 'PPT' ? 'selected' : '' }}>
                            PPT
                        </option>

                        <option value="Gambar"
                            {{ $materi->tipe == 'Gambar' ? 'selected' : '' }}>
                            Gambar
                        </option>

                    </select>

                </div>

                <!-- PENULIS -->
                <div class="form-group">

                    <label>Penulis</label>

                    <input
                        type="text"
                        name="penulis"
                        value="{{ $materi->penulis }}"
                        placeholder="Masukkan nama penulis"
                        required>

                </div>

                <!-- STATUS -->
                <div class="form-group">

                    <label>Status</label>

                    <select name="status">

                        <option value="Diterbitkan"
                            {{ $materi->status == 'Diterbitkan' ? 'selected' : '' }}>
                            Diterbitkan
                        </option>

                        <option value="Draft"
                            {{ $materi->status == 'Draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                    </select>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="form-action">

                <button type="submit" class="btn btn-primary">

                    <i data-lucide="save"></i>
                    Simpan Perubahan

                </button>

                <a href="{{ route('materi.index') }}"
                   style="text-decoration:none;">

                    <button type="button" class="btn btn-secondary">

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