@extends('layouts.sidebar')

@section('content')

<style>

/* ================= CONTENT ================= */

.content{
    padding:26px;
    background:#f5f6fa;
    min-height:100vh;
    width:100%;
}

/* ================= TOP ================= */

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

.breadcrumb{
    font-size:11px;
    color:#9ca3af;
    margin-bottom:18px;
    font-weight:600;
}

.breadcrumb span{
    color:#081b44;
}

/* ================= HEADER ================= */

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
    margin-bottom:4px;
}

.title p{
    font-size:13px;
    color:#6b7280;
}

/* ================= BUTTON ================= */

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
}

.btn-add i{
    width:16px;
    height:16px;
}

/* ================= TOOLBAR ================= */

.toolbar{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:18px;
    width:100%;
}

/* 🔥 FIX SEARCH FULL */
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

.question-search input{
    border:none;
    outline:none;
    width:100%;
    font-size:13px;
    background:transparent;
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
    gap:8px;
    cursor:pointer;
    white-space:nowrap;
}

.preview{
    background:#eef2ff;
    color:#081b44;
}

.publish{
    background:#f7d77c;
    color:#081b44;
}

/* ================= TABLE ================= */

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

/* ================= QUESTION ================= */

.question{
    font-weight:600;
    line-height:1.5;
    color:#1f2937;
}

/* ================= BADGE ================= */

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

/* ================= ACTION ================= */

.action{
    display:flex;
    gap:10px;
}

.action i{
    width:15px;
    height:15px;
    cursor:pointer;
}

.edit{
    color:#081b44;
}

.delete{
    color:#dc2626;
}

/* ================= EMPTY ================= */

.empty{
    text-align:center;
    padding:60px;
    color:#6b7280;
}

/* ================= RESPONSIVE ================= */

@media(max-width:900px){

    .header{
        flex-direction:column;
    }

    .toolbar{
        flex-direction:column;
    }

    .toolbar-right{
        width:100%;
    }

    .question-search{
        width:100%;
    }

}

</style>

<div class="content">

    <!-- BACK -->
    <div class="top-link">
        <a href="{{ route('kuis.index') }}">
            <i data-lucide="arrow-left"></i>
            Kembali ke Daftar Kuis
        </a>
    </div>

    <!-- BREADCRUMB -->
    <div class="breadcrumb">
        KUIS / <span>DETAIL KUIS</span>
    </div>

    <!-- HEADER -->
    <div class="header">

        <div class="title">
            <h1>{{ $kuis->judul }}</h1>
            <p>Kelola soal dan evaluasi kuis siswa.</p>
        </div>

        <a href="{{ route('soal.create', $kuis->id) }}" style="text-decoration:none;">
            <button class="btn-add">
                <i data-lucide="plus"></i>
                Tambah Soal
            </button>
        </a>

    </div>

    <!-- TOOLBAR -->
    <div class="toolbar">

        <div class="question-search">
            <i data-lucide="search"></i>
            <input type="text" placeholder="Cari soal...">
        </div>

        <div class="toolbar-right">
            <button class="action-btn preview">
                <i data-lucide="eye"></i>
                Preview
            </button>

            <button class="action-btn publish">
                <i data-lucide="send"></i>
                Publish
            </button>
        </div>

    </div>

    <!-- TABLE -->
    <div class="table-wrapper">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Pertanyaan</th>
                    <th>Kesulitan</th>
                    <th>Poin</th>
                    <th>Jawaban</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            @forelse($soal as $index => $item)

                <tr>

                    <td>{{ $index + 1 }}</td>

                    <td>
                        <div class="question">
                            {{ $item->pertanyaan }}
                        </div>
                    </td>

                    <td>
                        @if($item->kesulitan == 'Mudah')
                            <span class="badge easy">MUDAH</span>
                        @elseif($item->kesulitan == 'Sedang')
                            <span class="badge medium">SEDANG</span>
                        @else
                            <span class="badge hard">SULIT</span>
                        @endif
                    </td>

                    <td>{{ $item->poin }}</td>

                    <td>{{ $item->jawaban_benar }}</td>

                    <td>
                        <div class="action">
                            <i data-lucide="pencil" class="edit"></i>
                            <i data-lucide="trash-2" class="delete"></i>
                        </div>
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="empty">
                        Belum ada soal
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

<script>
lucide.createIcons();
</script>

@endsection