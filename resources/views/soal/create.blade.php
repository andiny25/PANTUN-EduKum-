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

.content{
    padding:26px 22px;
    min-height:100vh;
}

.form-card{
    max-width:750px;
    margin:0 auto;
    padding:28px;
    background:white;
    border-radius:18px;
    border:1px solid #ececf2;
}

.form-header{
    margin-bottom:20px;
}

.form-title{
    color:#13234a;
    font-size:26px;
    font-weight:700;
    margin-bottom:5px;
}

.form-subtitle{
    color:#6b7280;
    font-size:13px;
}

.quiz-info{
    background:#f5f6fb;
    border:1px solid #e5e7eb;
    border-radius:12px;
    padding:15px;
    margin-bottom:22px;
}

.quiz-info-title{
    display:flex;
    align-items:center;
    gap:9px;
    color:#13234a;
    font-size:13px;
    font-weight:700;
    margin-bottom:8px;
}

.quiz-info-title i{
    width:17px;
    height:17px;
}

.progress-text{
    font-size:12px;
    color:#64748b;
}

.progress-text strong{
    color:#13234a;
}

.progress-bar{
    width:100%;
    height:8px;
    background:#e5e7eb;
    border-radius:20px;
    overflow:hidden;
    margin-top:10px;
}

.progress-fill{
    height:100%;
    background:#2d3165;
    border-radius:20px;
    transition:.3s;
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

.form-group.full{
    grid-column:1 / 3;
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
    width:100%;
    border:1px solid #e5e7eb;
    border-radius:10px;
    padding:12px;
    font-size:13px;
    outline:none;
    background:white;
    color:#374151;
    transition:.2s;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus{
    border-color:#2d3165;
    box-shadow:0 0 0 3px rgba(45,49,101,.08);
}

.form-group textarea{
    min-height:120px;
    resize:vertical;
}

.option-label{
    display:flex;
    align-items:center;
    gap:7px;
}

.option-badge{
    width:22px;
    height:22px;
    border-radius:6px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    background:#e8e9f5;
    color:#2d3165;
    font-size:11px;
    font-weight:700;
}

.error-message{
    color:#dc2626;
    font-size:11px;
    margin-top:5px;
}

.error-box{
    background:#fee2e2;
    border:1px solid #fecaca;
    color:#b91c1c;
    padding:13px 15px;
    border-radius:10px;
    margin-bottom:20px;
    font-size:12px;
}

.error-box ul{
    margin:0;
    padding-left:18px;
}

.form-action{
    margin-top:25px;
    display:flex;
    justify-content:flex-end;
    gap:10px;
}

.btn{
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
    transition:.2s;
}

.btn-secondary{
    background:#eef0f5;
    color:#374151;
    text-decoration:none;
}

.btn-secondary:hover{
    background:#e2e5ec;
}

.btn-primary{
    background:#2d3165;
    color:white;
    border:none;
    box-shadow:0 4px 10px rgba(45,49,101,.15);
}

.btn-primary:hover{
    background:#252957;
}

.btn-primary i{
    width:16px;
    height:16px;
}

@media(max-width:700px){

    .content{
        padding:20px 15px;
    }

    .form-card{
        padding:20px;
    }

    .form-row{
        grid-template-columns:1fr;
    }

    .form-group.full{
        grid-column:auto;
    }

    .form-action{
        flex-direction:column-reverse;
    }

    .btn{
        width:100%;
    }

}

</style>


<div class="content">

    <div class="form-card">


        {{-- HEADER --}}

        <div class="form-header">

            <h2 class="form-title">
                Tambah Soal
            </h2>

            <p class="form-subtitle">
                Tambahkan soal untuk kuis literasi hukum
            </p>

        </div>


        {{-- INFO KUIS --}}

        <div class="quiz-info">

            <div class="quiz-info-title">

                <i data-lucide="clipboard-check"></i>

                {{ $kuis->judul }}

            </div>


            <div class="progress-text">

                Soal yang sudah dibuat:

                <strong>
                    {{ $jumlahSoalSaatIni }}
                    /
                    {{ $kuis->jumlah_soal }}
                    soal
                </strong>

            </div>


            @php

                $persentase = $kuis->jumlah_soal > 0
                    ? ($jumlahSoalSaatIni / $kuis->jumlah_soal) * 100
                    : 0;

            @endphp


            <div class="progress-bar">

                <div
                    class="progress-fill"
                    style="width:{{ min($persentase, 100) }}%;"
                ></div>

            </div>

        </div>


        {{-- ERROR --}}

        @if($errors->any())

            <div class="error-box">

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
            action="{{ route('soal.store', $kuis->id) }}"
            method="POST"
        >

            @csrf


            {{-- PERTANYAAN --}}

            <div
                class="form-group"
                style="margin-bottom:20px;"
            >

                <label>
                    PERTANYAAN
                </label>

                <textarea
                    name="pertanyaan"
                    placeholder="Masukkan pertanyaan soal..."
                    required
                >{{ old('pertanyaan') }}</textarea>

                @error('pertanyaan')

                    <span class="error-message">
                        {{ $message }}
                    </span>

                @enderror

            </div>


            {{-- A + B --}}

            <div class="form-row">


                <div class="form-group">

                    <label class="option-label">

                        <span class="option-badge">
                            A
                        </span>

                        PILIHAN A

                    </label>

                    <input
                        type="text"
                        name="pilihan_a"
                        value="{{ old('pilihan_a') }}"
                        placeholder="Masukkan jawaban A"
                        required
                    >

                    @error('pilihan_a')

                        <span class="error-message">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <div class="form-group">

                    <label class="option-label">

                        <span class="option-badge">
                            B
                        </span>

                        PILIHAN B

                    </label>

                    <input
                        type="text"
                        name="pilihan_b"
                        value="{{ old('pilihan_b') }}"
                        placeholder="Masukkan jawaban B"
                        required
                    >

                    @error('pilihan_b')

                        <span class="error-message">
                            {{ $message }}
                        </span>

                    @enderror

                </div>

            </div>


            {{-- C + D --}}

            <div class="form-row">


                <div class="form-group">

                    <label class="option-label">

                        <span class="option-badge">
                            C
                        </span>

                        PILIHAN C

                    </label>

                    <input
                        type="text"
                        name="pilihan_c"
                        value="{{ old('pilihan_c') }}"
                        placeholder="Masukkan jawaban C"
                        required
                    >

                    @error('pilihan_c')

                        <span class="error-message">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <div class="form-group">

                    <label class="option-label">

                        <span class="option-badge">
                            D
                        </span>

                        PILIHAN D

                    </label>

                    <input
                        type="text"
                        name="pilihan_d"
                        value="{{ old('pilihan_d') }}"
                        placeholder="Masukkan jawaban D"
                        required
                    >

                    @error('pilihan_d')

                        <span class="error-message">
                            {{ $message }}
                        </span>

                    @enderror

                </div>

            </div>


            {{-- JAWABAN + KESULITAN --}}

            <div class="form-row">


                <div class="form-group">

                    <label>
                        JAWABAN BENAR
                    </label>

                    <select
                        name="jawaban_benar"
                        required
                    >

                        <option value="">
                            Pilih jawaban yang benar
                        </option>

                        <option
                            value="A"
                            {{ old('jawaban_benar') == 'A' ? 'selected' : '' }}
                        >
                            A
                        </option>

                        <option
                            value="B"
                            {{ old('jawaban_benar') == 'B' ? 'selected' : '' }}
                        >
                            B
                        </option>

                        <option
                            value="C"
                            {{ old('jawaban_benar') == 'C' ? 'selected' : '' }}
                        >
                            C
                        </option>

                        <option
                            value="D"
                            {{ old('jawaban_benar') == 'D' ? 'selected' : '' }}
                        >
                            D
                        </option>

                    </select>

                    @error('jawaban_benar')

                        <span class="error-message">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <div class="form-group">

                    <label>
                        TINGKAT KESULITAN
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
                            {{ old('kesulitan') == 'Mudah' ? 'selected' : '' }}
                        >
                            Mudah
                        </option>

                        <option
                            value="Sedang"
                            {{ old('kesulitan') == 'Sedang' ? 'selected' : '' }}
                        >
                            Sedang
                        </option>

                        <option
                            value="Sulit"
                            {{ old('kesulitan') == 'Sulit' ? 'selected' : '' }}
                        >
                            Sulit
                        </option>

                    </select>

                    @error('kesulitan')

                        <span class="error-message">
                            {{ $message }}
                        </span>

                    @enderror

                </div>

            </div>


            {{-- BUTTON --}}

            <div class="form-action">

                <a
                    href="{{ route('soal.index', $kuis->id) }}"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>


                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <i data-lucide="save"></i>

                    Simpan Soal

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