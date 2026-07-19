@extends('layouts.sidebar')

@section('content')

<style>

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
    font-size:42px;
    font-weight:700;
    color:#13234a;
    margin-bottom:4px;
}

.header-title p{
    color:#6b7280;
    font-size:15px;
}

/* ================= CONTAINER ================= */

.wrapper{

    background:#fff;
    border-radius:22px;
    padding:26px;
    border:1px solid #ececf2;
    box-shadow:0 8px 24px rgba(0,0,0,.05);

}

/* ================= SEARCH ================= */

.search-box{

    width:280px;
    height:44px;
    border-radius:30px;
    background:#f5f5f5;

    display:flex;
    align-items:center;
    padding:0 18px;
    margin-bottom:28px;

}

.search-box i{

    color:#9ca3af;
    width:18px;
    height:18px;

}

.search-box input{

    border:none;
    background:transparent;
    margin-left:10px;
    width:100%;
    outline:none;
    font-size:14px;

}

/* ================= GRID ================= */

.card-grid{

    display:grid;

    grid-template-columns:
    repeat(auto-fill,minmax(240px,1fr));

    gap:22px;

}

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

.cover{

    height:145px;

    overflow:hidden;

}

.cover img{

    width:100%;
    height:100%;
    object-fit:cover;

}

.card-body{

    padding:14px;

}

.category{

    color:#5B6CFF;

    font-size:12px;

    font-weight:700;

    text-transform:uppercase;

    margin-bottom:8px;

}

.title{

    font-size:15px;

    font-weight:700;

    color:#222;

    line-height:1.45;

    min-height:48px;

}

.meta{

    margin-top:12px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    color:#9ca3af;

    font-size:12px;

}

.meta-left{

    display:flex;

    gap:12px;

}

.action{

    display:flex;

    align-items:center;

    gap:10px;

}

.action a{

    color:#9ca3af;

}

.action a:hover{

    color:#EAB308;

}

@media(max-width:900px){

.card-grid{

grid-template-columns:repeat(2,1fr);

}

}

@media(max-width:600px){

.card-grid{

grid-template-columns:1fr;

}

.search-box{

width:100%;

}

}

</style>

<div class="content">

    <div class="page-header">

        <div class="header-title">

            <h1>Paket Penyuluhan</h1>

            <p>Daftar pengelompokan materi dan kuis.</p>

        </div>

    </div>

    <div class="wrapper">

        <div class="search-box">

            <i data-lucide="search"></i>

            <input
                type="text"
                placeholder="Search Paket Penyuluhan..."
            >

        </div>

        <div class="card-grid">
        @forelse($paket as $item)

<div class="paket-card">

    <!-- COVER -->

    <div class="cover">

        @if($item->thumbnail)

            <img
                src="{{ asset('storage/'.$item->thumbnail) }}"
                alt="{{ $item->judul }}">

        @else

            <img
                src="https://placehold.co/400x250/FDE68A/1F2937?text=EduKum"
                alt="Thumbnail">

        @endif

    </div>

    <!-- BODY -->

    <div class="card-body">

        <!-- KATEGORI -->

        <div class="category">

            {{ strtoupper($item->kategori) }}

        </div>

        <!-- JUDUL -->

        <div class="title">

            {{ $item->judul }}

        </div>

        <!-- META -->

        <div class="meta">

            <div class="meta-left">

                <span>

                    <i data-lucide="file-text"
                       style="width:13px;height:13px"></i>

                    {{ $item->jumlah_halaman ?? 8 }} Pages

                </span>

                <span>

                    <i data-lucide="eye"
                       style="width:13px;height:13px"></i>

                    {{ $item->views ?? 20 }} Views

                </span>

            </div>

            <div class="action">

                <!-- EDIT -->

                <a href="{{ route('paket.edit',$item->id) }}">

                    <i data-lucide="square-pen"
                       style="width:16px;height:16px"></i>

                </a>

                <!-- MENU -->

                <a href="#">

                    <i data-lucide="ellipsis-vertical"
                       style="width:16px;height:16px"></i>

                </a>

            </div>

        </div>

    </div>

</div>

@empty

<div
style="
grid-column:1/-1;
padding:60px;
text-align:center;
color:#9ca3af;
">

<i
data-lucide="book-open"
style="
width:55px;
height:55px;
margin-bottom:15px;
">
</i>

<h3
style="
margin-bottom:10px;
color:#374151;
">

Belum Ada Paket Penyuluhan

</h3>

<p>

Silakan tambahkan paket penyuluhan terlebih dahulu.

</p>

</div>

@endforelse

</div>

</div>

</div>

<script>

lucide.createIcons();

</script>

@endsection