@extends('layouts.sidebar')

@section('content')

<style>

/* =====================================================
   CONTAINER
===================================================== */

.preview-container{
    padding:28px;
    background:#f4f5f9;
    min-height:100vh;
}


/* =====================================================
   BACK
===================================================== */

.back-link{
    display:inline-flex;
    align-items:center;
    gap:7px;
    text-decoration:none;
    color:#4b5563;
    font-size:13px;
    font-weight:500;
    margin-bottom:20px;
}

.back-link i{
    width:16px;
    height:16px;
}


/* =====================================================
   HEADER
===================================================== */

.preview-header{
    margin-bottom:24px;
}

.preview-header h1{
    font-size:30px;
    font-weight:700;
    color:#081b44;
    margin-bottom:5px;
}

.preview-header p{
    font-size:13px;
    color:#6b7280;
}


/* =====================================================
   QUIZ CARD
===================================================== */

.quiz-card{
    max-width:900px;
    background:#fff;
    border-radius:18px;
    padding:28px;
    border:1px solid #ececf2;
    box-shadow:0 8px 24px rgba(0,0,0,.05);
}


/* =====================================================
   QUIZ INFO
===================================================== */

.quiz-info{
    background:#eef2ff;
    border:1px solid #dbe3ff;
    border-radius:12px;
    padding:16px;
    margin-bottom:25px;
}

.quiz-title{
    font-size:18px;
    font-weight:700;
    color:#081b44;
    margin-bottom:8px;
}

.quiz-meta{
    font-size:12px;
    color:#6b7280;
    line-height:1.8;
}


/* =====================================================
   QUESTION
===================================================== */

.question-card{
    padding:20px 0;
    border-bottom:1px solid #ececf2;
}

.question-card:last-child{
    border-bottom:none;
}

.question-number{
    font-size:11px;
    font-weight:700;
    color:#5B6CFF;
    margin-bottom:8px;
}

.question-text{
    font-size:15px;
    font-weight:600;
    color:#1f2937;
    line-height:1.6;
    margin-bottom:16px;
}


/* =====================================================
   OPTIONS
===================================================== */

.option{
    display:flex;
    align-items:flex-start;
    gap:10px;
    padding:12px 14px;
    border:1px solid #e5e7eb;
    border-radius:10px;
    margin-bottom:9px;
    font-size:13px;
    color:#374151;
    background:#fff;
}

.option-letter{
    font-weight:700;
    color:#081b44;
    min-width:20px;
}

.option-text{
    flex:1;
}


/* =====================================================
   QUESTION FOOTER
===================================================== */

.question-footer{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top:12px;
}

.difficulty{
    font-size:11px;
    color:#6b7280;
}

.point{
    font-size:11px;
    font-weight:700;
    color:#081b44;
}


/* =====================================================
   EMPTY
===================================================== */

.empty{
    text-align:center;
    padding:50px 20px;
    color:#6b7280;
    font-size:13px;
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media(max-width:700px){

    .preview-container{
        padding:20px;
    }

    .quiz-card{
        padding:20px;
    }

    .preview-header h1{
        font-size:25px;
    }

}

</style>


<div class="preview-container">


    {{-- =================================================
         BACK
    ================================================== --}}

    <a
        href="{{ route('soal.index', $kuis->id) }}"
        class="back-link"
    >

        <i data-lucide="arrow-left"></i>

        Kembali ke Detail Kuis

    </a>


    {{-- =================================================
         HEADER
    ================================================== --}}

    <div class="preview-header">

        <h1>
            Preview Kuis
        </h1>

        <p>
            Lihat soal dan pilihan jawaban sebelum kuis dipublish.
        </p>

    </div>


    {{-- =================================================
         QUIZ CARD
    ================================================== --}}

    <div class="quiz-card">


        {{-- =================================================
             INFO KUIS
        ================================================== --}}

        <div class="quiz-info">

            <div class="quiz-title">

                {{ $kuis->judul }}

            </div>


            <div class="quiz-meta">

                <div>

                    <strong>Kategori:</strong>

                    {{ $kuis->kategori->nama_kategori ?? '-' }}

                </div>


                <div>

                    <strong>Jumlah Soal:</strong>

                    {{ $soal->count() }}

                </div>


                <div>

                    <strong>Status:</strong>

                    {{ $kuis->status }}

                </div>

            </div>

        </div>


        {{-- =================================================
             SOAL
        ================================================== --}}

        @forelse($soal as $index => $item)


            <div class="question-card">


                <div class="question-number">

                    SOAL {{ $index + 1 }}

                </div>


                <div class="question-text">

                    {{ $item->pertanyaan }}

                </div>


                {{-- PILIHAN A --}}

                <div class="option">

                    <div class="option-letter">
                        A.
                    </div>

                    <div class="option-text">
                        {{ $item->pilihan_a }}
                    </div>

                </div>


                {{-- PILIHAN B --}}

                <div class="option">

                    <div class="option-letter">
                        B.
                    </div>

                    <div class="option-text">
                        {{ $item->pilihan_b }}
                    </div>

                </div>


                {{-- PILIHAN C --}}

                <div class="option">

                    <div class="option-letter">
                        C.
                    </div>

                    <div class="option-text">
                        {{ $item->pilihan_c }}
                    </div>

                </div>


                {{-- PILIHAN D --}}

                <div class="option">

                    <div class="option-letter">
                        D.
                    </div>

                    <div class="option-text">
                        {{ $item->pilihan_d }}
                    </div>

                </div>


                {{-- FOOTER SOAL --}}

                <div class="question-footer">

                    <div class="difficulty">

                        Kesulitan:

                        {{ $item->kesulitan ?? 'Tidak ditentukan' }}

                    </div>


                    <div class="point">

                        {{ $item->poin }} Poin

                    </div>

                </div>


            </div>


        @empty


            <div class="empty">

                Belum ada soal untuk kuis ini.

            </div>


        @endforelse


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