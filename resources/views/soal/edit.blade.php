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


/* HEADER */

.page-header{
    margin-bottom:24px;
}

.header-title h1{
    font-size:32px;
    font-weight:700;
    color:#13234a;
    margin-bottom:5px;
}

.header-title p{
    color:#6b7280;
    font-size:13px;
}


/* CARD */

.form-card{
    background:white;
    border-radius:20px;
    padding:28px;
    border:1px solid #ececf2;
    box-shadow:0 8px 24px rgba(0,0,0,.04);
    max-width:900px;
}


/* INFO */

.kuis-info{
    background:#eef2ff;
    border:1px solid #dbe3ff;
    border-radius:12px;
    padding:14px 16px;
    margin-bottom:22px;
    font-size:12px;
    color:#475569;
    line-height:1.6;
}

.kuis-info strong{
    color:#081b44;
}


/* ERROR */

.error-box{
    background:#fee2e2;
    border:1px solid #fecaca;
    color:#991b1b;
    border-radius:10px;
    padding:14px 16px;
    margin-bottom:20px;
    font-size:12px;
}

.error-box ul{
    margin:0;
    padding-left:18px;
}

.error-text{
    color:#dc2626;
    font-size:11px;
    margin-top:5px;
}


/* GRID */

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
    grid-column:1 / -1;
}


/* LABEL */

.form-group label{
    font-size:13px;
    font-weight:600;
    color:#374151;
    margin-bottom:8px;
}

.required{
    color:#dc2626;
}


/* INPUT */

.form-group input,
.form-group select,
.form-group textarea{

    width:100%;

    border:1px solid #dcdfe7;

    border-radius:11px;

    padding:12px 14px;

    font-size:13px;

    outline:none;

    background:white;

    color:#374151;

    transition:.2s;

}

.form-group input,
.form-group select{
    height:44px;
}

.form-group textarea{
    min-height:120px;
    resize:vertical;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus{
    border-color:#081b44;
    box-shadow:
        0 0 0 3px
        rgba(8,27,68,.08);
}

.input-error{
    border-color:#ef4444 !important;
    background:#fffafa !important;
}


/* OPTION */

.option-label{
    display:flex;
    align-items:center;
    gap:7px;
}

.option-letter{
    width:24px;
    height:24px;
    border-radius:7px;
    background:#eef2ff;
    color:#081b44;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:11px;
    font-weight:700;
}


/* HELPER */

.helper{
    margin-top:6px;
    font-size:10px;
    color:#9ca3af;
}


/* ACTION */

.form-action{
    display:flex;
    align-items:center;
    gap:10px;
    margin-top:26px;
    padding-top:20px;
    border-top:1px solid #ececf2;
}

.btn{
    height:43px;
    padding:0 18px;
    border-radius:10px;
    font-size:13px;
    font-weight:600;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    cursor:pointer;
    text-decoration:none;
    transition:.2s;
}

.btn-primary{
    background:#081b44;
    color:white;
    border:none;
}

.btn-primary:hover{
    background:#10295d;
    transform:translateY(-1px);
}

.btn-secondary{
    background:#eef0f5;
    color:#374151;
}

.btn-secondary:hover{
    background:#e2e5ec;
}

.btn i{
    width:16px;
    height:16px;
}


/* RESPONSIVE */

@media(max-width:768px){

    .content{
        padding:20px;
    }

    .form-card{
        padding:20px;
    }

    .form-grid{
        grid-template-columns:1fr;
    }

    .form-group.full{
        grid-column:auto;
    }

    .form-action{
        flex-direction:column-reverse;
        align-items:stretch;
    }

    .btn{
        width:100%;
    }

}

</style>


<div class="content">


    {{-- HEADER --}}

    <div class="page-header">

        <div class="header-title">

            <h1>
                Edit Soal
            </h1>

            <p>
                Perbarui soal pada kuis
                <strong>{{ $kuis->judul }}</strong>.
            </p>

        </div>

    </div>


    <div class="form-card">


        {{-- INFO --}}

        <div class="kuis-info">

            <strong>Kuis:</strong>
            {{ $kuis->judul }}

            <br>

            <strong>Penilaian:</strong>
            Semua soal memiliki bobot yang sama.
            Nilai akhir menggunakan skala 0–100.

        </div>


        {{-- ERROR --}}

        @if($errors->any())

            <div class="error-box">

                <strong>
                    Soal belum dapat diperbarui.
                </strong>

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- FORM --}}

        <form
            action="{{ route('soal.update', $soal->id) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="form-grid">


                {{-- PERTANYAAN --}}

                <div class="form-group full">

                    <label>

                        Pertanyaan

                        <span class="required">
                            *
                        </span>

                    </label>

                    <textarea
                        name="pertanyaan"
                        class="@error('pertanyaan') input-error @enderror"
                        required
                    >{{ old('pertanyaan', $soal->pertanyaan) }}</textarea>

                    @error('pertanyaan')

                        <span class="error-text">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                {{-- A --}}

                <div class="form-group">

                    <label class="option-label">

                        <span class="option-letter">
                            A
                        </span>

                        Pilihan A

                        <span class="required">
                            *
                        </span>

                    </label>

                    <input
                        type="text"
                        name="pilihan_a"
                        value="{{ old('pilihan_a', $soal->pilihan_a) }}"
                        class="@error('pilihan_a') input-error @enderror"
                        required
                    >

                    @error('pilihan_a')

                        <span class="error-text">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                {{-- B --}}

                <div class="form-group">

                    <label class="option-label">

                        <span class="option-letter">
                            B
                        </span>

                        Pilihan B

                        <span class="required">
                            *
                        </span>

                    </label>

                    <input
                        type="text"
                        name="pilihan_b"
                        value="{{ old('pilihan_b', $soal->pilihan_b) }}"
                        class="@error('pilihan_b') input-error @enderror"
                        required
                    >

                    @error('pilihan_b')

                        <span class="error-text">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                {{-- C --}}

                <div class="form-group">

                    <label class="option-label">

                        <span class="option-letter">
                            C
                        </span>

                        Pilihan C

                        <span class="required">
                            *
                        </span>

                    </label>

                    <input
                        type="text"
                        name="pilihan_c"
                        value="{{ old('pilihan_c', $soal->pilihan_c) }}"
                        class="@error('pilihan_c') input-error @enderror"
                        required
                    >

                    @error('pilihan_c')

                        <span class="error-text">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                {{-- D --}}

                <div class="form-group">

                    <label class="option-label">

                        <span class="option-letter">
                            D
                        </span>

                        Pilihan D

                        <span class="required">
                            *
                        </span>

                    </label>

                    <input
                        type="text"
                        name="pilihan_d"
                        value="{{ old('pilihan_d', $soal->pilihan_d) }}"
                        class="@error('pilihan_d') input-error @enderror"
                        required
                    >

                    @error('pilihan_d')

                        <span class="error-text">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                {{-- JAWABAN --}}

                <div class="form-group">

                    <label>

                        Jawaban Benar

                        <span class="required">
                            *
                        </span>

                    </label>

                    <select
                        name="jawaban_benar"
                        required
                    >

                        <option value="">
                            Pilih jawaban
                        </option>

                        <option
                            value="A"
                            {{ old('jawaban_benar', $soal->jawaban_benar) == 'A' ? 'selected' : '' }}
                        >
                            A
                        </option>

                        <option
                            value="B"
                            {{ old('jawaban_benar', $soal->jawaban_benar) == 'B' ? 'selected' : '' }}
                        >
                            B
                        </option>

                        <option
                            value="C"
                            {{ old('jawaban_benar', $soal->jawaban_benar) == 'C' ? 'selected' : '' }}
                        >
                            C
                        </option>

                        <option
                            value="D"
                            {{ old('jawaban_benar', $soal->jawaban_benar) == 'D' ? 'selected' : '' }}
                        >
                            D
                        </option>

                    </select>

                </div>


                {{-- KESULITAN --}}

                <div class="form-group">

                    <label>

                        Tingkat Kesulitan

                        <span class="required">
                            *
                        </span>

                    </label>

                    <select
                        name="kesulitan"
                        required
                    >

                        <option value="">
                            Pilih tingkat kesulitan
                        </option>

                        <option
                            value="Mudah"
                            {{ old('kesulitan', $soal->kesulitan) == 'Mudah' ? 'selected' : '' }}
                        >
                            Mudah
                        </option>

                        <option
                            value="Sedang"
                            {{ old('kesulitan', $soal->kesulitan) == 'Sedang' ? 'selected' : '' }}
                        >
                            Sedang
                        </option>

                        <option
                            value="Sulit"
                            {{ old('kesulitan', $soal->kesulitan) == 'Sulit' ? 'selected' : '' }}
                        >
                            Sulit
                        </option>

                    </select>

                </div>


            </div>


            {{-- ACTION --}}

            <div class="form-action">

                <a
                    href="{{ route('soal.index', $kuis->id) }}"
                    class="btn btn-secondary"
                >

                    <i data-lucide="arrow-left"></i>

                    Kembali

                </a>


                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <i data-lucide="save"></i>

                    Simpan Perubahan

                </button>

            </div>


        </form>


    </div>


</div>


<script>

document.addEventListener(
    'DOMContentLoaded',
    function(){

        if(typeof lucide !== 'undefined'){

            lucide.createIcons();

        }

    }
);

</script>

@endsection