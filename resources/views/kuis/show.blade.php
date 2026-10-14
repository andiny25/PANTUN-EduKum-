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

.content{
    padding:26px;
    background:#f5f6fa;
    min-height:100vh;
    width:100%;
}

.top-link{
    margin-bottom:10px;
}

.top-link a{
    text-decoration:none;
    color:#4b5563;
    font-size:13px;
    display:flex;
    align-items:center;
    gap:7px;
    font-weight:500;
}

.top-link i{
    width:16px;
    height:16px;
}

.breadcrumb{
    font-size:11px;
    color:#9ca3af;
    margin-bottom:18px;
    font-weight:600;
}

.breadcrumb span{
    color:#081b44;
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    margin-bottom:20px;
    gap:16px;
}

.title{
    flex:1;
}

.title h1{
    font-size:30px;
    color:#081b44;
    font-weight:700;
    margin:0 0 4px 0;
}

.title p{
    font-size:13px;
    color:#6b7280;
    margin:0;
}

.btn-add{
    background:#081b44;
    color:white;
    border:none;
    height:42px;
    padding:0 16px;
    border-radius:10px;
    font-size:13px;
    font-weight:600;
    display:flex;
    align-items:center;
    gap:8px;
    cursor:pointer;
    white-space:nowrap;
    text-decoration:none;
    transition:.2s;
}

.btn-add:hover{
    background:#10295d;
    transform:translateY(-1px);
}

.btn-add i{
    width:16px;
    height:16px;
}

.btn-disabled{
    background:#d1d5db;
    color:#6b7280;
    cursor:not-allowed;
}

.btn-disabled:hover{
    background:#d1d5db;
    transform:none;
}

.toolbar{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:18px;
    width:100%;
}

.question-search{
    flex:1;
    height:42px;
    background:white;
    border:1px solid #e5e7eb;
    border-radius:10px;
    display:flex;
    align-items:center;
    gap:10px;
    padding:0 12px;
    min-width:0;
}

.question-search i{
    width:17px;
    height:17px;
    color:#9ca3af;
}

.question-search input{
    border:none;
    outline:none;
    width:100%;
    font-size:13px;
    background:transparent;
    font-family:'Poppins',sans-serif;
}

.toolbar-right{
    display:flex;
    gap:10px;
}

.action-btn{
    height:42px;
    padding:0 14px;
    border:none;
    border-radius:10px;
    font-size:13px;
    font-weight:600;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    cursor:pointer;
    white-space:nowrap;
    transition:.2s;
    font-family:'Poppins',sans-serif;
}

.action-btn i{
    width:16px;
    height:16px;
}

.preview{
    background:#eef2ff;
    color:#081b44;
    text-decoration:none;
}

.preview:hover{
    background:#dfe6ff;
}

.publish{
    background:#f7d77c;
    color:#081b44;
}

.publish:hover{
    background:#f2ca55;
}

.publish-disabled{
    background:#e5e7eb;
    color:#9ca3af;
    cursor:not-allowed;
}

.table-wrapper{
    background:white;
    border-radius:16px;
    overflow:hidden;
    border:1px solid #ececf2;
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:#fafafa;
}

th{
    padding:14px;
    text-align:left;
    font-size:11px;
    color:#6b7280;
    font-weight:700;
    border-bottom:1px solid #ececf2;
}

td{
    padding:16px 14px;
    border-bottom:1px solid #f1f2f6;
    font-size:13px;
    color:#111827;
    vertical-align:top;
}

tbody tr:last-child td{
    border-bottom:none;
}

.question{
    font-weight:600;
    line-height:1.5;
    color:#1f2937;
}

.answer{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-width:32px;
    height:28px;
    padding:0 9px;
    border-radius:8px;
    background:#eef2ff;
    color:#081b44;
    font-size:11px;
    font-weight:700;
}

.badge{
    display:inline-flex;
    padding:5px 10px;
    border-radius:20px;
    font-size:11px;
    font-weight:700;
}

.easy{
    background:#dcfce7;
    color:#16a34a;
}

.medium{
    background:#fed7aa;
    color:#ea580c;
}

.hard{
    background:#fee2e2;
    color:#dc2626;
}

.default-badge{
    background:#f1f5f9;
    color:#64748b;
}

.action{
    display:flex;
    align-items:center;
    gap:10px;
}

.action a{
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
}

.action form{
    margin:0;
}

.action button{
    background:none;
    border:none;
    padding:0;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
}

.action i{
    width:15px;
    height:15px;
}

.edit{
    color:#081b44;
}

.edit:hover{
    color:#4f5dff;
}

.delete{
    color:#dc2626;
}

.delete:hover{
    color:#b91c1c;
}

.empty{
    text-align:center;
    padding:60px;
    color:#6b7280;
}

.alert{
    padding:12px 15px;
    border-radius:10px;
    margin-bottom:18px;
    font-size:13px;
    font-weight:500;
}

.alert-success{
    background:#dcfce7;
    color:#166534;
    border:1px solid #bbf7d0;
}

.alert-error{
    background:#fee2e2;
    color:#991b1b;
    border:1px solid #fecaca;
}

.score-info{
    margin-bottom:18px;
    background:#f8fafc;
    border:1px solid #e5e7eb;
    border-radius:12px;
    padding:15px;
    color:#64748b;
    font-size:12px;
    line-height:1.6;
}

.score-info strong{
    color:#081b44;
}

.progress-container{
    margin-top:10px;
}

.progress-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:7px;
}

.progress-label{
    font-size:12px;
    color:#64748b;
}

.progress-count{
    font-size:12px;
    font-weight:700;
    color:#081b44;
}

.progress-bar{
    width:100%;
    height:8px;
    background:#e5e7eb;
    border-radius:20px;
    overflow:hidden;
}

.progress-fill{
    height:100%;
    background:#081b44;
    border-radius:20px;
}

.target-complete{
    margin-top:9px;
    color:#16a34a;
    font-size:11px;
    font-weight:600;
}

.target-warning{
    margin-top:9px;
    color:#ea580c;
    font-size:11px;
    font-weight:600;
}

@media(max-width:900px){

    .header{
        flex-direction:column;
    }

    .toolbar{
        flex-direction:column;
        align-items:stretch;
    }

    .toolbar-right{
        width:100%;
    }

    .action-btn{
        flex:1;
    }

    .question-search{
        width:100%;
    }

}

@media(max-width:600px){

    .content{
        padding:20px;
    }

    .title h1{
        font-size:25px;
    }

    .toolbar-right{
        flex-direction:column;
    }

    .table-wrapper{
        overflow-x:auto;
    }

    table{
        min-width:750px;
    }

}

</style>


@php

    $jumlahSoalSaatIni = $soal->count();

    $targetSoal = $kuis->jumlah_soal;

    $persentase = $targetSoal > 0
        ? ($jumlahSoalSaatIni / $targetSoal) * 100
        : 0;

    $sudahMencapaiTarget =
        $jumlahSoalSaatIni >= $targetSoal;

@endphp


<div class="content">


    {{-- ALERT SUCCESS --}}

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- ALERT ERROR --}}

    @if(session('error'))

        <div class="alert alert-error">
            {{ session('error') }}
        </div>

    @endif


    {{-- BACK --}}

    <div class="top-link">

        <a href="{{ route('kuis.index') }}">

            <i data-lucide="arrow-left"></i>

            Kembali ke Daftar Kuis

        </a>

    </div>


    {{-- BREADCRUMB --}}

    <div class="breadcrumb">

        KUIS /

        <span>
            DETAIL KUIS
        </span>

    </div>


    {{-- HEADER --}}

    <div class="header">

        <div class="title">

            <h1>
                {{ $kuis->judul }}
            </h1>

            <p>
                Kelola soal dan evaluasi kuis siswa.
            </p>

        </div>


        {{-- TAMBAH SOAL --}}

        @if(!$sudahMencapaiTarget)

            <a
                href="{{ route('soal.create', $kuis->id) }}"
                class="btn-add"
            >

                <i data-lucide="plus"></i>

                Tambah Soal

            </a>

        @else

            <span
                class="btn-add btn-disabled"
                title="Jumlah soal sudah mencapai target"
            >

                <i data-lucide="check-circle"></i>

                Target Tercapai

            </span>

        @endif

    </div>


    {{-- INFO NILAI + PROGRESS --}}

    <div class="score-info">

        <strong>Sistem Penilaian:</strong>

        Setiap soal memiliki bobot yang sama.
        Nilai akhir dihitung berdasarkan jumlah jawaban benar
        dengan skala nilai 0–100.

        <br>

        <strong>Rumus:</strong>

        (Jumlah Jawaban Benar ÷ Jumlah Soal) × 100


        <div class="progress-container">

            <div class="progress-header">

                <span class="progress-label">
                    Progress Pembuatan Soal
                </span>

                <span class="progress-count">

                    {{ $jumlahSoalSaatIni }}
                    /
                    {{ $targetSoal }}
                    Soal

                </span>

            </div>


            <div class="progress-bar">

                <div
                    class="progress-fill"
                    style="
                        width:{{ min($persentase, 100) }}%;
                    "
                ></div>

            </div>


            @if($sudahMencapaiTarget)

                <div class="target-complete">

                    ✓ Target jumlah soal sudah tercapai.

                </div>

            @else

                <div class="target-warning">

                    Masih perlu
                    {{ $targetSoal - $jumlahSoalSaatIni }}
                    soal lagi.

                </div>

            @endif

        </div>

    </div>


    {{-- TOOLBAR --}}

    <div class="toolbar">


        {{-- SEARCH --}}

        <div class="question-search">

            <i data-lucide="search"></i>

            <input
                type="text"
                id="searchQuestion"
                placeholder="Cari soal..."
            >

        </div>


        <div class="toolbar-right">


            {{-- PREVIEW --}}

            <a
                href="{{ route('kuis.preview', $kuis->id) }}"
                class="action-btn preview"
            >

                <i data-lucide="eye"></i>

                Preview

            </a>


            {{-- PUBLISH --}}

            @if($sudahMencapaiTarget)

                <form
                    action="{{ route('kuis.publish', $kuis->id) }}"
                    method="POST"
                    style="margin:0;"
                    onsubmit="return confirm('Apakah Anda yakin ingin mempublish kuis ini?');"
                >

                    @csrf

                    @method('PUT')

                    <button
                        type="submit"
                        class="action-btn publish"
                    >

                        <i data-lucide="send"></i>

                        Publish

                    </button>

                </form>

            @else

                <button
                    type="button"
                    class="action-btn publish-disabled"
                    title="Lengkapi jumlah soal terlebih dahulu"
                    onclick="alert('Kuis belum dapat dipublish. Lengkapi {{ $targetSoal - $jumlahSoalSaatIni }} soal lagi.');"
                >

                    <i data-lucide="lock"></i>

                    Publish

                </button>

            @endif

        </div>

    </div>


    {{-- TABLE --}}

    <div class="table-wrapper">

        <table id="questionTable">

            <thead>

                <tr>

                    <th width="60">
                        No
                    </th>

                    <th>
                        Pertanyaan
                    </th>

                    <th width="150">
                        Tingkat Kesulitan
                    </th>

                    <th width="130">
                        Jawaban
                    </th>

                    <th width="100">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>

            @forelse($soal as $index => $item)

                <tr class="question-row">


                    <td>
                        {{ $index + 1 }}
                    </td>


                    <td>

                        <div class="question">

                            {{ $item->pertanyaan }}

                        </div>

                    </td>


                    <td>

                        @if($item->kesulitan == 'Mudah')

                            <span class="badge easy">
                                Mudah
                            </span>

                        @elseif($item->kesulitan == 'Sedang')

                            <span class="badge medium">
                                Sedang
                            </span>

                        @elseif($item->kesulitan == 'Sulit')

                            <span class="badge hard">
                                Sulit
                            </span>

                        @else

                            <span class="badge default-badge">
                                Tidak ditentukan
                            </span>

                        @endif

                    </td>


                    <td>

                        <span class="answer">

                            {{ $item->jawaban_benar }}

                        </span>

                    </td>


                    <td>

                        <div class="action">


                            {{-- EDIT --}}

                            <a
                                href="{{ route('soal.edit', $item->id) }}"
                                title="Edit soal"
                            >

                                <i
                                    data-lucide="pencil"
                                    class="edit"
                                ></i>

                            </a>


                            {{-- DELETE --}}

                            <form
                                action="{{ route('soal.destroy', $item->id) }}"
                                method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus soal ini?');"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    title="Hapus soal"
                                >

                                    <i
                                        data-lucide="trash-2"
                                        class="delete"
                                    ></i>

                                </button>

                            </form>


                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="5"
                        class="empty"
                    >

                        Belum ada soal.

                        <br><br>

                        <a
                            href="{{ route('soal.create', $kuis->id) }}"
                            class="btn-add"
                            style="display:inline-flex;"
                        >

                            <i data-lucide="plus"></i>

                            Tambah Soal

                        </a>

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>


</div>


<script>

document.addEventListener(
    'DOMContentLoaded',
    function(){

        if(typeof lucide !== 'undefined'){

            lucide.createIcons();

        }


        const searchInput =
            document.getElementById('searchQuestion');

        const rows =
            document.querySelectorAll('.question-row');


        if(searchInput){

            searchInput.addEventListener(
                'keyup',
                function(){

                    const keyword =
                        this.value
                            .toLowerCase()
                            .trim();


                    rows.forEach(function(row){

                        const text =
                            row.innerText
                                .toLowerCase();


                        if(
                            text.includes(keyword)
                        ){

                            row.style.display = '';

                        }else{

                            row.style.display = 'none';

                        }

                    });

                }
            );

        }

    }
);

</script>

@endsection