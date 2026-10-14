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

/* ================= FORM ================= */

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
.form-group select{
    border:1px solid #e5e7eb;
    border-radius:10px;
    padding:12px;
    font-size:14px;
    outline:none;
    background:white;
    color:#374151;
    transition:0.2s;
}

.form-group input:focus,
.form-group select:focus{
    border-color:#2d3165;
    box-shadow:0 0 0 3px rgba(45,49,101,0.08);
}

/* ================= TITLE ================= */

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

/* ================= CARD ================= */

.form-card{
    max-width:750px;
    margin:auto;
    padding:25px;
    background:white;
    border-radius:18px;
    border:1px solid #ececf2;
}

/* ================= BUTTON ================= */

.form-action{
    margin-top:25px;
    display:flex;
    justify-content:flex-end;
    gap:10px;
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
    transition:0.3s;
}

.btn:hover{
    background:#252957;
}

.filter-btn{
    height:44px;
    border:1px solid #e5e7eb;
    background:white;
    border-radius:10px;
    padding:0 18px;
    font-size:13px;
    color:#444;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    text-decoration:none;
}

.filter-btn:hover{
    background:#f3f4f6;
}

/* ================= ERROR ================= */

.error-message{
    color:#dc2626;
    font-size:11px;
    margin-top:5px;
}

/* ================= RESPONSIVE ================= */

@media(max-width:900px){

    .form-row{
        grid-template-columns:1fr;
        gap:20px;
    }

}

</style>


<div class="table-box form-card">

    <!-- ================= HEADER ================= -->

    <div style="margin-bottom:25px;">

        <h2 class="form-title">
            Edit Kuis
        </h2>

        <p class="form-subtitle">
            Perbarui informasi kuis literasi hukum
        </p>

    </div>


    <!-- ================= FORM ================= -->

    <form
        action="{{ route('kuis.update', $kuis->id) }}"
        method="POST"
    >

        @csrf
        @method('PUT')


        <!-- ================= JUDUL ================= -->

        <div
            class="form-group"
            style="margin-bottom:20px;"
        >

            <label>JUDUL KUIS</label>

            <input
                type="text"
                name="judul"
                value="{{ old('judul', $kuis->judul) }}"
                placeholder="Contoh: Kesadaran Hukum Sejak Dini"
                required
            >

            @error('judul')

                <span class="error-message">
                    {{ $message }}
                </span>

            @enderror

        </div>


        <!-- ================= KATEGORI & JUMLAH SOAL ================= -->

        <div class="form-row">

            <!-- KATEGORI -->

            <div class="form-group">

                <label>KATEGORI</label>

                <select
                    name="kategori_id"
                    required
                >

                    <option value="">
                        Pilih Kategori
                    </option>

                    @foreach($kategoris as $kategori)

                        <option
                            value="{{ $kategori->id }}"
                            {{ old('kategori_id', $kuis->kategori_id) == $kategori->id ? 'selected' : '' }}
                        >

                            {{ $kategori->nama_kategori }}

                        </option>

                    @endforeach

                </select>

                @error('kategori_id')

                    <span class="error-message">
                        {{ $message }}
                    </span>

                @enderror

            </div>


            <!-- JUMLAH SOAL -->

            <div class="form-group">

                <label>JUMLAH SOAL</label>

                <input
                    type="number"
                    name="jumlah_soal"
                    value="{{ old('jumlah_soal', $kuis->jumlah_soal) }}"
                    min="1"
                    placeholder="Contoh: 10"
                    required
                >

                @error('jumlah_soal')

                    <span class="error-message">
                        {{ $message }}
                    </span>

                @enderror

            </div>

        </div>


        <!-- ================= STATUS ================= -->

        <div class="form-group">

            <label>STATUS</label>

            <select
                name="status"
                required
            >

                <option
                    value="Aktif"
                    {{ old('status', $kuis->status) == 'Aktif' ? 'selected' : '' }}
                >
                    Aktif
                </option>

                <option
                    value="Draft"
                    {{ old('status', $kuis->status) == 'Draft' ? 'selected' : '' }}
                >
                    Draft
                </option>

                <option
                    value="Nonaktif"
                    {{ old('status', $kuis->status) == 'Nonaktif' ? 'selected' : '' }}
                >
                    Nonaktif
                </option>

            </select>

            @error('status')

                <span class="error-message">
                    {{ $message }}
                </span>

            @enderror

        </div>


        <!-- ================= BUTTON ================= -->

        <div class="form-action">

            <a
                href="{{ route('kuis.index') }}"
                class="filter-btn"
            >
                Kembali
            </a>

            <button
                type="submit"
                class="btn"
            >

                <i data-lucide="save"></i>

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>


<script>
    lucide.createIcons();
</script>

@endsection