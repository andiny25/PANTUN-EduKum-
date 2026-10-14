@extends('layouts.sidebar')

@section('content')

<style>

.content{
    padding:26px 22px;
    background:#f3f4f8;
    min-height:100vh;
}

.form-card{
    max-width:700px;
    margin:auto;
    background:white;
    border:1px solid #ececf2;
    border-radius:18px;
    padding:28px;
    box-shadow:0 6px 18px rgba(0,0,0,.04);
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
    margin-top:5px;
    margin-bottom:25px;
}

/* ================= FORM ================= */

.form-group{
    display:flex;
    flex-direction:column;
    margin-bottom:20px;
}

.form-group label{
    font-size:12px;
    font-weight:700;
    margin-bottom:8px;
    color:#374151;
}

.form-group input,
.form-group textarea{
    border:1px solid #e5e7eb;
    border-radius:10px;
    padding:12px;
    font-size:14px;
    outline:none;
    font-family:inherit;
    transition:.2s;
}

.form-group input:focus,
.form-group textarea:focus{
    border-color:#2d3165;
    box-shadow:0 0 0 3px rgba(45,49,101,.08);
}

.form-group textarea{
    min-height:130px;
    resize:vertical;
}

/* ================= ERROR ================= */

.error-message{
    color:#dc2626;
    font-size:11px;
    margin-top:5px;
}

/* ================= ACTION ================= */

.form-actions{
    display:flex;
    justify-content:flex-end;
    gap:10px;
    margin-top:25px;
}

.btn{
    height:42px;
    padding:0 18px;
    border-radius:10px;
    font-size:13px;
    font-weight:600;
    cursor:pointer;
    text-decoration:none;
    display:flex;
    align-items:center;
    justify-content:center;
    border:none;
}

.btn-back{
    background:white;
    border:1px solid #e5e7eb;
    color:#374151;
}

.btn-back:hover{
    background:#f9fafb;
}

.btn-save{
    background:#2d3165;
    color:white;
}

.btn-save:hover{
    background:#252957;
}

/* ================= RESPONSIVE ================= */

@media(max-width:600px){

    .content{
        padding:20px 15px;
    }

    .form-card{
        padding:22px;
    }

    .form-actions{
        flex-direction:column-reverse;
    }

    .btn{
        width:100%;
    }

}

</style>


<div class="content">

    <div class="form-card">

        <!-- ================= TITLE ================= -->

        <h2 class="form-title">
            Edit Kategori
        </h2>

        <p class="form-subtitle">
            Perbarui informasi kategori yang digunakan
            untuk materi dan kuis.
        </p>


        <!-- ================= FORM ================= -->

        <form
            action="{{ route('kategori.update', $kategori->id) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <!-- ================= NAMA KATEGORI ================= -->

            <div class="form-group">

                <label for="nama_kategori">
                    NAMA KATEGORI
                </label>

                <input
                    type="text"
                    id="nama_kategori"
                    name="nama_kategori"
                    value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                    placeholder="Contoh: Perlindungan Anak"
                    required
                >

                @error('nama_kategori')

                    <span class="error-message">
                        {{ $message }}
                    </span>

                @enderror

            </div>


            <!-- ================= DESKRIPSI ================= -->

            <div class="form-group">

                <label for="deskripsi">
                    DESKRIPSI
                </label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    placeholder="Tuliskan deskripsi singkat mengenai kategori..."
                >{{ old('deskripsi', $kategori->deskripsi) }}</textarea>

                @error('deskripsi')

                    <span class="error-message">
                        {{ $message }}
                    </span>

                @enderror

            </div>


            <!-- ================= BUTTON ================= -->

            <div class="form-actions">

                <a
                    href="{{ route('kategori.index') }}"
                    class="btn btn-back"
                >
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-save"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection