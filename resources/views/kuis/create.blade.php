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
    margin-bottom:25px;
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

.info-box{
    background:#f5f6fb;
    border:1px solid #e5e7eb;
    border-radius:11px;
    padding:13px 15px;
    margin-bottom:22px;
    color:#64748b;
    font-size:12px;
    line-height:1.6;
}

.info-box strong{
    color:#13234a;
}

.form-row{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

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
.form-group select{
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
.form-group select:focus{
    border-color:#2d3165;
    box-shadow:0 0 0 3px rgba(45,49,101,.08);
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

.alert-error{
    background:#fee2e2;
    color:#991b1b;
    border:1px solid #fecaca;
    padding:12px 15px;
    border-radius:10px;
    margin-bottom:18px;
    font-size:13px;
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
        gap:0;
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
                Buat Kuis Baru
            </h2>

            <p class="form-subtitle">
                Tambahkan data kuis literasi hukum baru
            </p>

        </div>



        {{-- ERROR DARI SESSION --}}

        @if(session('error'))

            <div class="alert-error">
                {{ session('error') }}
            </div>

        @endif


        {{-- ERROR VALIDASI --}}

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
            action="{{ route('kuis.store') }}"
            method="POST"
        >

            @csrf


            {{-- JUDUL --}}

            <div class="form-group">

                <label>
                    JUDUL KUIS
                </label>

                <input
                    type="text"
                    name="judul"
                    value="{{ old('judul') }}"
                    placeholder="Contoh: Kesadaran Hukum Sejak Dini"
                    required
                >

                @error('judul')

                    <span class="error-message">
                        {{ $message }}
                    </span>

                @enderror

            </div>


            {{-- KATEGORI + JUMLAH SOAL --}}

            <div class="form-row">


                {{-- KATEGORI --}}

                <div class="form-group">

                    <label>
                        KATEGORI
                    </label>

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
                                {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}
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


                {{-- JUMLAH SOAL --}}

                <div class="form-group">

                    <label>
                        JUMLAH SOAL
                    </label>

                    <input
                        type="number"
                        name="jumlah_soal"
                        value="{{ old('jumlah_soal', 10) }}"
                        min="1"
                        max="100"
                        placeholder="Contoh: 10"
                        required
                    >

                    <span
                        style="
                            margin-top:5px;
                            color:#9ca3af;
                            font-size:11px;
                        "
                    >
                        Tentukan jumlah soal yang harus dibuat.
                    </span>

                    @error('jumlah_soal')

                        <span class="error-message">
                            {{ $message }}
                        </span>

                    @enderror

                </div>

            </div>


            {{-- STATUS --}}

            <div class="form-group">

                <label>
                    STATUS
                </label>

                <select
                    name="status"
                    required
                >

                    <option
                        value="Aktif"
                        {{ old('status', 'Aktif') == 'Aktif' ? 'selected' : '' }}
                    >
                        Aktif
                    </option>

                    <option
                        value="Draft"
                        {{ old('status') == 'Draft' ? 'selected' : '' }}
                    >
                        Draft
                    </option>

                    <option
                        value="Nonaktif"
                        {{ old('status') == 'Nonaktif' ? 'selected' : '' }}
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


            {{-- BUTTON --}}

            <div class="form-action">

                <a
                    href="{{ route('kuis.index') }}"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>


                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <i data-lucide="plus"></i>

                    Buat Kuis

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