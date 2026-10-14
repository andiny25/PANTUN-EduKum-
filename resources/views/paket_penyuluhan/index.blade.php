@extends('layouts.sidebar')

@section('content')

<style>

/* =====================================================
   CONTENT
===================================================== */

.paket-content{
    padding:28px;
    background:#f4f5f9;
    min-height:100vh;
}


/* =====================================================
   HEADER
===================================================== */

.paket-page-header{
    margin-bottom:24px;
}

.paket-header-title h1{
    font-size:40px;
    font-weight:700;
    color:#13234a;
    margin-bottom:4px;
}

.paket-header-title p{
    color:#6b7280;
    font-size:15px;
}


/* =====================================================
   WRAPPER
===================================================== */

.paket-wrapper{
    background:#fff;
    border-radius:22px;
    padding:26px;
    border:1px solid #ececf2;
    box-shadow:0 8px 24px rgba(0,0,0,.05);
}


/* =====================================================
   SEARCH
===================================================== */

.paket-search-box{
    width:320px;
    height:44px;
    border-radius:30px;
    background:#f5f5f5;

    display:flex;
    align-items:center;

    padding:0 18px;

    margin-bottom:28px;

    border:1px solid transparent;

    transition:.2s;
}

.paket-search-box:focus-within{
    background:#fff;
    border-color:#5B6CFF;
    box-shadow:0 0 0 3px rgba(91,108,255,.10);
}

.paket-search-box i{
    color:#9ca3af;
    width:18px;
    height:18px;
    flex-shrink:0;
}

.paket-search-box input{
    border:none;
    background:transparent;

    margin-left:10px;

    width:100%;

    outline:none;

    font-size:14px;

    color:#13234a;
}

.paket-search-box input::placeholder{
    color:#9ca3af;
}


/* =====================================================
   GRID
===================================================== */

.paket-card-grid{
    display:grid;

    grid-template-columns:
    repeat(auto-fill,minmax(240px,1fr));

    gap:22px;
}


/* =====================================================
   CARD
===================================================== */

.paket-card{
    background:#fff;

    border-radius:18px;

    overflow:hidden;

    border:1px solid #ececf2;

    transition:.25s;

    box-shadow:
        0 4px 12px rgba(0,0,0,.08);
}

.paket-card:hover{
    transform:translateY(-4px);

    box-shadow:
        0 14px 30px rgba(0,0,0,.12);
}


/* =====================================================
   COVER
===================================================== */

.paket-cover{
    height:180px;

    overflow:hidden;

    background:#eef2ff;

    position:relative;

    display:flex;

    align-items:center;

    justify-content:center;
}

.paket-cover img{
    width:100%;
    height:100%;

    object-fit:cover;

    display:block;

    transition:.3s;
}

.paket-card:hover .paket-cover img{
    transform:scale(1.03);
}


/* =====================================================
   CARD BODY
===================================================== */

.paket-card-body{
    padding:16px;
}


/* =====================================================
   CATEGORY
===================================================== */

.paket-category{
    color:#5B6CFF;

    font-size:12px;

    font-weight:700;

    text-transform:uppercase;

    margin-bottom:8px;
}


/* =====================================================
   TITLE
===================================================== */

.paket-title-link{
    display:block;

    text-decoration:none;

    color:inherit;

    margin:0;

    padding:0;
}

.paket-title{
    font-size:17px;

    font-weight:700;

    color:#13234a;

    line-height:1.45;

    min-height:48px;

    transition:.2s;

    cursor:pointer;
}

.paket-title-link:hover .paket-title{
    color:#5B6CFF;

    text-decoration:underline;

    text-underline-offset:3px;
}


/* =====================================================
   DESCRIPTION
===================================================== */

.paket-description{
    margin-top:8px;

    color:#6b7280;

    font-size:12px;

    line-height:1.5;

    min-height:36px;
}


/* =====================================================
   META
===================================================== */

.paket-meta{
    margin-top:16px;

    display:flex;

    justify-content:flex-start;

    align-items:center;

    color:#6b7280;

    font-size:12px;
}

.paket-meta-left{
    display:flex;

    gap:12px;
}

.paket-meta-item{
    display:flex;

    align-items:center;

    gap:5px;
}

.paket-meta-item i{
    width:14px;
    height:14px;
}


/* =====================================================
   SEARCH EMPTY
===================================================== */

.paket-search-empty{
    grid-column:1/-1;

    padding:60px;

    text-align:center;

    color:#9ca3af;
}

.paket-search-empty i{
    width:55px;
    height:55px;

    margin-bottom:15px;
}

.paket-search-empty h3{
    margin-bottom:10px;

    color:#374151;

    font-size:18px;
}

.paket-search-empty p{
    font-size:13px;
}


/* =====================================================
   EMPTY DATABASE
===================================================== */

.paket-empty-state{
    grid-column:1/-1;

    padding:60px;

    text-align:center;

    color:#9ca3af;
}

.paket-empty-state i{
    width:55px;
    height:55px;

    margin-bottom:15px;
}

.paket-empty-state h3{
    margin-bottom:10px;

    color:#374151;
}


/* =====================================================
   SEARCH RESULT INFO
===================================================== */

.paket-search-result{
    display:none;

    margin-top:-18px;

    margin-bottom:20px;

    color:#6b7280;

    font-size:12px;
}

.paket-search-result strong{
    color:#13234a;
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media(max-width:900px){

    .paket-card-grid{
        grid-template-columns:repeat(2,1fr);
    }

}


@media(max-width:600px){

    .paket-card-grid{
        grid-template-columns:1fr;
    }

    .paket-search-box{
        width:100%;
    }

    .paket-content{
        padding:20px;
    }

}

</style>


    <!-- =================================================
         HEADER
    ================================================== -->

    <div class="paket-page-header">

        <div class="paket-header-title">

            <h1>
                Paket Penyuluhan
            </h1>

            <p>
                Pengelompokan materi dan kuis berdasarkan kategori.
            </p>

        </div>

    </div>


    <!-- =================================================
         WRAPPER
    ================================================== -->

    <div class="paket-wrapper">


        <!-- =================================================
             SEARCH
        ================================================== -->

        <div class="paket-search-box">

            <i data-lucide="search"></i>

            <input
                type="text"
                id="searchPaket"
                placeholder="Cari paket, materi, kategori..."
                autocomplete="off"
            >

        </div>


        <!-- =================================================
             SEARCH RESULT
        ================================================== -->

        <div
            class="paket-search-result"
            id="searchResult"
        >

            Menampilkan

            <strong id="jumlahHasil">
                0
            </strong>

            hasil pencarian

        </div>


        <!-- =================================================
             GRID
        ================================================== -->

        <div
            class="paket-card-grid"
            id="paketCardGrid"
        >


            @forelse($paket as $item)


                @php

                    /*
                    |--------------------------------------------------------------------------
                    | NAMA KATEGORI
                    |--------------------------------------------------------------------------
                    */

                    $namaKategori = trim(
                        $item->kategori->nama_kategori ?? ''
                    );


                    /*
                    |--------------------------------------------------------------------------
                    | JUDUL PAKET
                    |--------------------------------------------------------------------------
                    */

                    $judulPaket =
                        'Paket Penyuluhan ' .
                        ($namaKategori ?: 'Umum');


                    /*
                    |--------------------------------------------------------------------------
                    | NORMALISASI NAMA KATEGORI
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

                    $namaCover = strtolower(
                        $namaKategori
                    );

                    $namaCover = preg_replace(
                        '/[^a-z0-9]+/',
                        '_',
                        $namaCover
                    );

                    $namaCover = trim(
                        $namaCover,
                        '_'
                    );


                    /*
                    |--------------------------------------------------------------------------
                    | FOLDER COVER
                    |--------------------------------------------------------------------------
                    */

                    $coverDirectory =
                        public_path(
                            'images/covers'
                        );


                    /*
                    |--------------------------------------------------------------------------
                    | COVER DEFAULT
                    |--------------------------------------------------------------------------
                    */

                    $coverUrl = null;


                    /*
                    |--------------------------------------------------------------------------
                    | CARI SEMUA FILE PNG
                    |--------------------------------------------------------------------------
                    */

                    if (
                        is_dir($coverDirectory)
                    ) {

                        $files = glob(
                            $coverDirectory . '/*.png'
                        );


                        /*
                        |--------------------------------------------------------------------------
                        | LOOP FILE COVER
                        |--------------------------------------------------------------------------
                        */

                        foreach ($files as $file) {


                            /*
                            |--------------------------------------------------------------------------
                            | AMBIL NAMA FILE
                            |--------------------------------------------------------------------------
                            */

                            $namaFile = pathinfo(
                                $file,
                                PATHINFO_FILENAME
                            );


                            /*
                            |--------------------------------------------------------------------------
                            | HAPUS NOMOR DI DEPAN
                            |--------------------------------------------------------------------------
                            |
                            | 01_Kejahatan_Digital
                            | menjadi
                            | Kejahatan_Digital
                            |
                            */

                            $namaFileTanpaNomor =
                                preg_replace(
                                    '/^\d+[_-]/',
                                    '',
                                    $namaFile
                                );


                            /*
                            |--------------------------------------------------------------------------
                            | NORMALISASI NAMA FILE
                            |--------------------------------------------------------------------------
                            */

                            $namaFileTanpaNomor =
                                strtolower(
                                    $namaFileTanpaNomor
                                );


                            $namaFileTanpaNomor =
                                preg_replace(
                                    '/[^a-z0-9]+/',
                                    '_',
                                    $namaFileTanpaNomor
                                );


                            $namaFileTanpaNomor =
                                trim(
                                    $namaFileTanpaNomor,
                                    '_'
                                );


                            /*
                            |--------------------------------------------------------------------------
                            | COCOKKAN DENGAN KATEGORI
                            |--------------------------------------------------------------------------
                            */

                            if (
                                $namaFileTanpaNomor ===
                                $namaCover
                            ) {

                                $coverUrl =
                                    asset(
                                        'images/covers/' .
                                        basename($file)
                                    );

                                break;

                            }

                        }

                    }

                    /*
                    |--------------------------------------------------------------------------
                    | SEARCH DATA
                    |--------------------------------------------------------------------------
                    */

                    $searchData =
                        $namaKategori .
                        ' ' .
                        $judulPaket;


                    /*
                    |--------------------------------------------------------------------------
                    | SEMUA MATERI
                    |--------------------------------------------------------------------------
                    */

                    $semuaMateri =
                        $item->materi;


                    foreach (
                        $semuaMateri as $materi
                    ) {

                        $searchData .=
                            ' ' .
                            ($materi->judul ?? '') .
                            ' ' .
                            ($materi->deskripsi ?? '') .
                            ' ' .
                            ($materi->penulis ?? '') .
                            ' ' .
                            ($materi->tipe ?? '') .
                            ' ' .
                            ($materi->file ?? '');

                    }

                @endphp


                <!-- =================================================
                     CARD
                ================================================== -->

                <div
                    class="paket-card"
                    data-search="{{ strtolower($searchData) }}"
                >


                    <!-- =================================================
                         COVER
                    ================================================== -->

                    <div class="paket-cover">


                        @if($coverUrl)

                            <img
                                src="{{ $coverUrl }}"
                                alt="Cover {{ $namaKategori }}"
                            >

                        @else

                            <!-- =========================================
                                 FALLBACK JIKA COVER TIDAK DITEMUKAN
                            ========================================== -->

                            <div
                                style="
                                    width:100%;
                                    height:100%;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    text-align:center;
                                    padding:20px;
                                    background:linear-gradient(
                                        135deg,
                                        #eef2ff,
                                        #e4e9ff
                                    );
                                    color:#13234a;
                                    font-size:15px;
                                    font-weight:600;
                                "
                            >

                                {{ $namaKategori ?: 'Paket Penyuluhan' }}

                            </div>

                        @endif


                    </div>


                    <!-- =================================================
                         CARD BODY
                    ================================================== -->

                    <div class="paket-card-body">


                        <!-- =================================================
                             CATEGORY
                        ================================================== -->

                        <div class="paket-category">

                            {{ strtoupper(
                                $namaKategori ?: '-'
                            ) }}

                        </div>


                        <!-- =================================================
                             TITLE
                        ================================================== -->

                        <a
                            href="{{ route(
                                'paket-penyuluhan.show',
                                $item->id
                            ) }}"
                            class="paket-title-link"
                        >

                            <div class="paket-title">

                                {{ $judulPaket }}

                            </div>

                        </a>


                        <!-- =================================================
                             DESCRIPTION
                        ================================================== -->

                        <div class="paket-description">

                            Materi dan kuis literasi hukum
                            kategori
                            {{ $namaKategori ?: '-' }}.

                        </div>


                        <!-- =================================================
                             META
                        ================================================== -->

                        <div class="paket-meta">

                            <div class="paket-meta-left">


                                <!-- =====================================
                                     MATERI
                                ====================================== -->

                                <span
                                    class="paket-meta-item"
                                >

                                    <i
                                        data-lucide="file-text"
                                    ></i>

                                    {{ $item->materi->count() }}

                                    Materi

                                </span>


                                <!-- =====================================
                                     KUIS
                                ====================================== -->

                                <span
                                    class="paket-meta-item"
                                >

                                    <i
                                        data-lucide="clipboard-list"
                                    ></i>

                                    {{ $item->kuis->count() }}

                                    Kuis

                                </span>


                            </div>

                        </div>


                    </div>


                </div>


            @empty


                <!-- =================================================
                     EMPTY DATABASE
                ================================================== -->

                <div
                    class="paket-empty-state"
                    id="databaseEmpty"
                >

                    <i
                        data-lucide="book-open"
                    ></i>

                    <h3>
                        Belum Ada Paket Penyuluhan
                    </h3>

                    <p>
                        Buat materi terlebih dahulu.
                    </p>

                </div>


            @endforelse


            <!-- =================================================
                 SEARCH EMPTY
            ================================================== -->

            <div
                class="paket-search-empty"
                id="searchEmpty"
                style="display:none;"
            >

                <i
                    data-lucide="search-x"
                ></i>

                <h3>
                    Paket Tidak Ditemukan
                </h3>

                <p>
                    Tidak ada paket, materi, kategori,
                    atau informasi lain yang sesuai
                    dengan pencarian.
                </p>

            </div>


        </div>


        <!-- =================================================
             PAGINATION
        ================================================== -->

        @if($paket->hasPages())

            <div
                style="
                    margin-top:25px;
                    display:flex;
                    justify-content:center;
                "
                id="paginationPaket"
            >

                {{ $paket->links() }}

            </div>

        @endif


    </div>

</div>


<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script>

document.addEventListener(
    'DOMContentLoaded',
    function(){

        /* =================================================
           LUCIDE
        ================================================= */

        if(
            typeof lucide !== 'undefined'
        ){

            lucide.createIcons();

        }


        /* =================================================
           ELEMENT
        ================================================= */

        const searchInput =
            document.getElementById(
                'searchPaket'
            );


        const cards =
            document.querySelectorAll(
                '.paket-card'
            );


        const searchEmpty =
            document.getElementById(
                'searchEmpty'
            );


        const searchResult =
            document.getElementById(
                'searchResult'
            );


        const jumlahHasil =
            document.getElementById(
                'jumlahHasil'
            );


        const pagination =
            document.getElementById(
                'paginationPaket'
            );


        /* =================================================
           SEARCH FUNCTION
        ================================================= */

        function lakukanSearch(){

            if(!searchInput){

                return;

            }


            const keyword =
                searchInput.value
                    .toLowerCase()
                    .trim();


            let jumlahTampil = 0;


            cards.forEach(
                function(card){

                    const dataSearch =
                        (
                            card.getAttribute(
                                'data-search'
                            ) || ''
                        ).toLowerCase();


                    /*
                    |--------------------------------------------------------------------------
                    | KOSONG
                    |--------------------------------------------------------------------------
                    */

                    if(
                        keyword === ''
                    ){

                        card.style.display =
                            '';

                        jumlahTampil++;

                        return;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | ADA HASIL
                    |--------------------------------------------------------------------------
                    */

                    if(
                        dataSearch.includes(
                            keyword
                        )
                    ){

                        card.style.display =
                            '';

                        jumlahTampil++;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | TIDAK ADA HASIL
                    |--------------------------------------------------------------------------
                    */

                    else{

                        card.style.display =
                            'none';

                    }

                }
            );


            /*
            |--------------------------------------------------------------------------
            | JUMLAH HASIL
            |--------------------------------------------------------------------------
            */

            jumlahHasil.textContent =
                jumlahTampil;


            /*
            |--------------------------------------------------------------------------
            | SEARCH AKTIF
            |--------------------------------------------------------------------------
            */

            if(
                keyword !== ''
            ){

                searchResult.style.display =
                    'block';


                if(pagination){

                    pagination.style.display =
                        'none';

                }

            }


            /*
            |--------------------------------------------------------------------------
            | SEARCH KOSONG
            |--------------------------------------------------------------------------
            */

            else{

                searchResult.style.display =
                    'none';


                if(pagination){

                    pagination.style.display =
                        'flex';

                }

            }


            /*
            |--------------------------------------------------------------------------
            | TIDAK ADA HASIL
            |--------------------------------------------------------------------------
            */

            if(
                keyword !== '' &&
                jumlahTampil === 0
            ){

                searchEmpty.style.display =
                    'block';

            }

            else{

                searchEmpty.style.display =
                    'none';

            }

        }


        /* =================================================
           INPUT SEARCH
        ================================================= */

        if(searchInput){

            searchInput.addEventListener(
                'input',
                lakukanSearch
            );


            searchInput.addEventListener(
                'keydown',
                function(event){

                    if(
                        event.key === 'Enter'
                    ){

                        event.preventDefault();

                        lakukanSearch();

                    }

                }
            );

        }

    }
);

</script>

@endsection