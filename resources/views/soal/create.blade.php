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

            <h1>Tambah Soal</h1>

            <p>
                Tambahkan soal baru untuk kuis literasi hukum
            </p>

        </div>

    </div>

    <!-- FORM -->
    <div class="form-card">

        <form action="{{ route('soal.store', $kuis->id) }}"
              method="POST">

            @csrf

            <div class="form-grid">

                <!-- PERTANYAAN -->
                <div class="form-group full">

                    <label>Pertanyaan</label>

                    <textarea name="pertanyaan"
                              placeholder="Masukkan pertanyaan soal..."
                              required></textarea>

                </div>

                <!-- OPSI A -->
                <div class="form-group">

                    <label>Opsi A</label>

                    <input type="text"
                           name="opsi_a"
                           placeholder="Masukkan jawaban A"
                           required>

                </div>

                <!-- OPSI B -->
                <div class="form-group">

                    <label>Opsi B</label>

                    <input type="text"
                           name="opsi_b"
                           placeholder="Masukkan jawaban B"
                           required>

                </div>

                <!-- OPSI C -->
                <div class="form-group">

                    <label>Opsi C</label>

                    <input type="text"
                           name="opsi_c"
                           placeholder="Masukkan jawaban C"
                           required>

                </div>

                <!-- OPSI D -->
                <div class="form-group">

                    <label>Opsi D</label>

                    <input type="text"
                           name="opsi_d"
                           placeholder="Masukkan jawaban D"
                           required>

                </div>

                <!-- JAWABAN BENAR -->
                <div class="form-group">

                    <label>Jawaban Benar</label>

                    <select name="jawaban_benar" required>

                        <option value="">
                            Pilih Jawaban
                        </option>

                        <option value="A">
                            A
                        </option>

                        <option value="B">
                            B
                        </option>

                        <option value="C">
                            C
                        </option>

                        <option value="D">
                            D
                        </option>

                    </select>

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

            </div>

            <!-- BUTTON -->
            <div class="form-action">

                <button type="submit"
                        class="btn btn-primary">

                    <i data-lucide="save"></i>

                    Simpan Soal

                </button>

                <a href="{{ route('soal.index', $kuis->id) }}"
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