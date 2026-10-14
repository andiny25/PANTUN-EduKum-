@extends('layouts.sidebar')

@section('content')

<style>

/* =====================================================
   CONTENT
===================================================== */

.paket-detail{
    padding:28px;
    background:#f4f5f9;
    min-height:100vh;
}


/* =====================================================
   HEADER
===================================================== */

.detail-header{
    margin-bottom:22px;
}

.breadcrumb{
    display:flex;
    align-items:center;
    gap:8px;
    font-size:13px;
    color:#8b93a7;
    margin-bottom:10px;
}

.breadcrumb a{
    color:#8b93a7;
    text-decoration:none;
}

.breadcrumb a:hover{
    color:#081b44;
}

.breadcrumb i{
    width:15px;
    height:15px;
}

.detail-header h1{
    font-size:30px;
    font-weight:700;
    color:#13234a;
    margin:0 0 5px 0;
}

.detail-header p{
    color:#6b7280;
    font-size:14px;
    margin:0;
}


/* =====================================================
   MAIN CARD
===================================================== */

.detail-wrapper{
    background:#fff;
    border-radius:20px;
    padding:24px;
    border:1px solid #ececf2;
    box-shadow:0 8px 24px rgba(0,0,0,.05);
}


/* =====================================================
   CATEGORY
===================================================== */

.category-label{
    display:inline-flex;
    align-items:center;

    padding:7px 14px;

    border-radius:20px;

    background:#eef2ff;

    color:#5B6CFF;

    font-size:12px;

    font-weight:700;

    text-transform:uppercase;

    margin-bottom:18px;
}


/* =====================================================
   RESOURCE LIST
===================================================== */

.resource-list{
    display:flex;

    flex-direction:column;

    gap:14px;
}


/* =====================================================
   RESOURCE CARD
===================================================== */

.resource-card{
    min-height:100px;

    background:#4d528d;

    border-radius:16px;

    display:flex;

    align-items:center;

    padding:12px 15px;

    transition:.2s;

    position:relative;

    overflow:hidden;
}

.resource-card:hover{
    transform:translateY(-2px);

    box-shadow:
        0 8px 18px rgba(0,0,0,.12);
}


/* =====================================================
   COVER
===================================================== */

.resource-thumbnail{
    width:155px;

    height:92px;

    border-radius:12px;

    overflow:hidden;

    flex-shrink:0;

    background:#e5e7eb;

    display:flex;

    align-items:center;

    justify-content:center;

    position:relative;
}


/* =====================================================
   COVER IMAGE
===================================================== */

.resource-thumbnail img{
    width:100%;

    height:100%;

    object-fit:cover;

    display:block;

    transition:.25s;
}

.resource-card:hover .resource-thumbnail img{
    transform:scale(1.03);
}


/* =====================================================
   RESOURCE INFO
===================================================== */

.resource-info{
    flex:1;

    min-width:0;

    padding:0 16px;
}

.resource-type{
    display:inline-flex;

    padding:4px 13px;

    border-radius:20px;

    background:#a7f3d0;

    color:#166534;

    font-size:10px;

    font-weight:700;

    margin-bottom:6px;
}

.resource-title{
    color:#fff;

    font-size:15px;

    font-weight:700;

    line-height:1.35;

    white-space:nowrap;

    overflow:hidden;

    text-overflow:ellipsis;
}

.resource-meta{
    color:#d1d5db;

    font-size:10px;

    margin-top:5px;
}


/* =====================================================
   BOOKMARK
===================================================== */

.resource-bookmark{
    width:34px;

    height:34px;

    display:flex;

    align-items:center;

    justify-content:center;

    color:#a78bfa;

    flex-shrink:0;
}

.resource-bookmark i{
    width:18px;

    height:18px;
}


/* =====================================================
   MENU
===================================================== */

.resource-menu{
    width:30px;

    height:30px;

    display:flex;

    align-items:center;

    justify-content:center;

    color:#d1d5db;

    flex-shrink:0;
}

.resource-menu i{
    width:17px;

    height:17px;
}


/* =====================================================
   EMPTY
===================================================== */

.empty-resource{
    padding:50px 20px;

    text-align:center;

    background:#f8f9fc;

    border:1px dashed #d7dbe5;

    border-radius:15px;

    color:#9ca3af;
}

.empty-resource i{
    width:45px;

    height:45px;

    margin-bottom:12px;
}

.empty-resource h3{
    color:#374151;

    font-size:16px;

    margin-bottom:5px;
}

.empty-resource p{
    font-size:12px;

    margin:0;
}


/* =====================================================
   BACK BUTTON
===================================================== */

.back-button{
    margin-top:22px;
}

.back-button a{
    display:inline-flex;

    align-items:center;

    gap:8px;

    height:42px;

    padding:0 17px;

    border-radius:10px;

    background:#eef0f5;

    color:#374151;

    text-decoration:none;

    font-size:13px;

    font-weight:600;

    transition:.2s;
}

.back-button a:hover{
    background:#081b44;

    color:#fff;
}

.back-button i{
    width:16px;

    height:16px;
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media(max-width:700px){

    .paket-detail{
        padding:18px;
    }

    .detail-header h1{
        font-size:25px;
    }

    .resource-thumbnail{
        width:115px;

        height:75px;
    }

    .resource-title{
        font-size:13px;
    }

}


@media(max-width:520px){

    .resource-card{
        padding:10px;
    }

    .resource-thumbnail{
        width:90px;

        height:62px;
    }

    .resource-info{
        padding:0 10px;
    }

    .resource-title{
        white-space:normal;
    }

    .resource-bookmark{
        display:none;
    }

    .resource-menu{
        display:none;
    }

}

</style>


<!-- =====================================================
     MAIN
===================================================== -->

<div class="paket-detail">


    <!-- =================================================
         HEADER
    ================================================== -->

    <div class="detail-header">

        <div class="breadcrumb">

            <a href="{{ route('paket-penyuluhan.index') }}">

                Paket Penyuluhan

            </a>

            <i data-lucide="chevron-right"></i>

            <span>

                {{
                    $paket->kategori->nama_kategori
                    ?? 'Detail'
                }}

            </span>

        </div>


        <h1>
            Paket Penyuluhan
        </h1>


        <p>
            Daftar materi dan kuis dalam paket penyuluhan.
        </p>

    </div>



    <!-- =================================================
         MAIN CARD
    ================================================== -->

    <div class="detail-wrapper">


        <!-- =================================================
             CATEGORY
        ================================================== -->

        <div class="category-label">

            {{
                strtoupper(
                    $paket->kategori->nama_kategori
                    ?? 'UMUM'
                )
            }}

        </div>



        <!-- =================================================
             RESOURCE LIST
        ================================================== -->

        <div class="resource-list">


            @php

                /*
                |--------------------------------------------------------------------------
                | DATA
                |--------------------------------------------------------------------------
                */

                $materiList = collect(
                    $paket->materi ?? []
                );

                $kuisList = collect(
                    $paket->kuis ?? []
                );


                /*
                |--------------------------------------------------------------------------
                | NAMA KATEGORI PAKET
                |--------------------------------------------------------------------------
                */

                $namaKategori = trim(
                    $paket->kategori->nama_kategori ?? ''
                );


                /*
                |--------------------------------------------------------------------------
                | FUNGSI NORMALISASI NAMA
                |--------------------------------------------------------------------------
                |
                | Contoh:
                |
                | Perlindungan Perempuan dan Anak
                |
                | menjadi:
                |
                | perlindungan_perempuan_dan_anak
                |
                */

                $normalisasiNama = function($nama){

                    $nama = strtolower(
                        trim($nama ?? '')
                    );

                    $nama = preg_replace(
                        '/[^a-z0-9]+/',
                        '_',
                        $nama
                    );

                    return trim(
                        $nama,
                        '_'
                    );

                };


                /*
                |--------------------------------------------------------------------------
                | NORMALISASI KATEGORI
                |--------------------------------------------------------------------------
                */

                $kategoriNormal =
                    $normalisasiNama(
                        $namaKategori
                    );


                /*
                |--------------------------------------------------------------------------
                | KHUSUS NAMA COVER
                |--------------------------------------------------------------------------
                |
                | Jika nama kategori di database berbeda sedikit
                | dengan nama file, bisa disamakan di sini.
                |
                */

                $coverKey = $kategoriNormal;


                /*
                |--------------------------------------------------------------------------
                | ALIAS COVER
                |--------------------------------------------------------------------------
                */

                if(
                    in_array(
                        $kategoriNormal,
                        [
                            'perlindungan_perempuan_dan_anak',
                            'perlindungan_perempuan_anak'
                        ]
                    )
                ){

                    $coverKey =
                        'perlindungan_perempuan_anak';

                }


                /*
                |--------------------------------------------------------------------------
                | DEFAULT COVER
                |--------------------------------------------------------------------------
                */

                $defaultCover =
                    asset(
                        'images/covers/cover_default.png'
                    );


                /*
                |--------------------------------------------------------------------------
                | COVER MATERI
                |--------------------------------------------------------------------------
                */

                $materiCoverPath =
                    'images/covers/materi_' .
                    $coverKey .
                    '.png';


                if(
                    file_exists(
                        public_path(
                            $materiCoverPath
                        )
                    )
                ){

                    $materiCoverUrl =
                        asset(
                            $materiCoverPath
                        );

                }else{

                    $materiCoverUrl =
                        $defaultCover;

                }


                /*
                |--------------------------------------------------------------------------
                | COVER KUIS
                |--------------------------------------------------------------------------
                */

                $kuisCoverPath =
                    'images/covers/kuis_' .
                    $coverKey .
                    '.png';


                if(
                    file_exists(
                        public_path(
                            $kuisCoverPath
                        )
                    )
                ){

                    $kuisCoverUrl =
                        asset(
                            $kuisCoverPath
                        );

                }else{

                    $kuisCoverUrl =
                        $defaultCover;

                }

            @endphp



            <!-- =================================================
                 MATERI
            ================================================= -->

            @foreach($materiList as $materi)

                <div class="resource-card">


                    <!-- =========================================
                         COVER MATERI
                    ========================================== -->

                    <div class="resource-thumbnail">

                        <img
                            src="{{ $materiCoverUrl }}"
                            alt="Cover Materi {{ $materi->judul }}"
                            onerror="
                                this.onerror=null;
                                this.src='{{ $defaultCover }}';
                            "
                        >

                    </div>



                    <!-- =========================================
                         INFO
                    ========================================== -->

                    <div class="resource-info">

                        <div class="resource-type">

                            Materi

                        </div>


                        <div class="resource-title">

                            {{ $materi->judul }}

                        </div>


                        <div class="resource-meta">

                            {{
                                strtoupper(
                                    $materi->tipe
                                    ?? 'Materi'
                                )
                            }}

                        </div>

                    </div>



                    <!-- =========================================
                         BOOKMARK
                    ========================================== -->

                    <div class="resource-bookmark">

                        <i
                            data-lucide="bookmark"
                        ></i>

                    </div>



                    <!-- =========================================
                         MENU
                    ========================================== -->

                    <div class="resource-menu">

                        <i
                            data-lucide="more-vertical"
                        ></i>

                    </div>


                </div>

            @endforeach



            <!-- =================================================
                 KUIS
            ================================================= -->

            @foreach($kuisList as $kuis)

                <div class="resource-card">


                    <!-- =========================================
                         COVER KUIS
                    ========================================== -->

                    <div class="resource-thumbnail">

                        <img
                            src="{{ $kuisCoverUrl }}"
                            alt="Cover Kuis {{ $kuis->judul }}"
                            onerror="
                                this.onerror=null;
                                this.src='{{ $defaultCover }}';
                            "
                        >

                    </div>



                    <!-- =========================================
                         INFO
                    ========================================== -->

                    <div class="resource-info">

                        <div
                            class="resource-type"
                            style="
                                background:#fef08a;
                                color:#854d0e;
                            "
                        >

                            Kuis

                        </div>


                        <div class="resource-title">

                            {{ $kuis->judul }}

                        </div>


                        <div class="resource-meta">

                            {{ $kuis->jumlah_soal ?? 0 }}

                            Soal

                        </div>

                    </div>



                    <!-- =========================================
                         BOOKMARK
                    ========================================== -->

                    <div class="resource-bookmark">

                        <i
                            data-lucide="bookmark"
                        ></i>

                    </div>



                    <!-- =========================================
                         MENU
                    ========================================== -->

                    <div class="resource-menu">

                        <i
                            data-lucide="more-vertical"
                        ></i>

                    </div>


                </div>

            @endforeach



            <!-- =================================================
                 EMPTY
            ================================================= -->

            @if(
                $materiList->isEmpty() &&
                $kuisList->isEmpty()
            )

                <div class="empty-resource">

                    <i
                        data-lucide="book-open"
                    ></i>

                    <h3>
                        Belum Ada Materi atau Kuis
                    </h3>

                    <p>
                        Paket penyuluhan ini belum memiliki
                        materi maupun kuis.
                    </p>

                </div>

            @endif


        </div>



        <!-- =================================================
             BACK BUTTON
        ================================================= -->

        <div class="back-button">

            <a
                href="{{ route(
                    'paket-penyuluhan.index'
                ) }}"
            >

                <i
                    data-lucide="arrow-left"
                ></i>

                Kembali ke Paket Penyuluhan

            </a>

        </div>


    </div>

</div>



<!-- =====================================================
     LUCIDE
===================================================== -->

<script>

document.addEventListener(
    'DOMContentLoaded',
    function(){

        if(
            typeof lucide !== 'undefined'
        ){

            lucide.createIcons();

        }

    }
);

</script>

@endsection