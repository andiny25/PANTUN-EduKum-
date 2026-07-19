@extends('layouts.sidebar')

@section('content')

<style>
.page-wrapper{
    padding: 25px;
    background: #f5f7fb;
    min-height: 100vh;
}

/* HEADER HERO */
.hero{
    background: linear-gradient(135deg, #1f2a44, #3b4a6b);
    color: white;
    padding: 25px;
    border-radius: 18px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.hero h2{
    font-size: 22px;
    font-weight: 700;
}

.hero p{
    font-size: 13px;
    opacity: .8;
    margin-top: 5px;
}

.hero .btns button{
    border: none;
    padding: 10px 14px;
    border-radius: 10px;
    margin-right: 8px;
    cursor: pointer;
    font-size: 13px;
}

.btn-yellow{
    background: #ffcc66;
    color: #000;
}
.btn-dark{
    background: #2d3a55;
    color: #fff;
    border: 1px solid rgba(255,255,255,.2);
}

/* STAT CARDS */
.stats{
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 12px;
    margin-top: 15px;
}

.card{
    background: #fff;
    padding: 15px;
    border-radius: 14px;
    box-shadow: 0 4px 12px rgba(0,0,0,.05);
}

.card h3{
    font-size: 18px;
    margin-top: 5px;
}

.card small{
    color: green;
    font-weight: 600;
}

/* MAIN GRID */
.grid{
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 15px;
    margin-top: 20px;
}

/* CHART */
.chart-box{
    background: #fff;
    padding: 20px;
    border-radius: 14px;
}

.bars{
    display: flex;
    align-items: flex-end;
    gap: 10px;
    height: 180px;
    margin-top: 15px;
}

.bar{
    width: 100%;
    background: #cfd6e4;
    border-radius: 8px;
}

.bar.active{
    background: #ffcc66;
}

/* CATEGORY */
.circle{
    width: 140px;
    height: 140px;
    border-radius: 50%;
    border: 10px solid #e8edf7;
    border-top: 10px solid #4e73df;
    margin: 20px auto;
}

/* LOWER GRID */
.grid-2{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 15px;
    margin-top: 15px;
}

.list{
    background: #fff;
    padding: 15px;
    border-radius: 14px;
}

.item{
    font-size: 13px;
    margin-bottom: 10px;
    border-bottom: 1px solid #eee;
    padding-bottom: 8px;
}

</style>

<div class="page-wrapper">

    <!-- HERO -->
    <div class="hero">
        <div>
            <h2>Selamat Datang di Dashboard EduKum</h2>
            <p>Sistem Pengelolaan & Penyajian Materi Literasi Hukum Terpadu</p>
            <div class="btns" style="margin-top:10px;">
                <button class="btn-yellow">+ Tambah Materi</button>
                <button class="btn-dark">Buat Paket</button>
                <button class="btn-dark">Buat Kuis</button>
            </div>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats">
        <div class="card">
            <small>Total Materi</small>
            <h3>124</h3>
        </div>
        <div class="card">
            <small>Paket Penyuluhan</small>
            <h3>48</h3>
        </div>
        <div class="card">
            <small>Total Kuis</small>
            <h3>86</h3>
        </div>
        <div class="card">
            <small>Total Siswa</small>
            <h3>1.2k</h3>
        </div>
        <div class="card">
            <small>Penyuluhan</small>
            <h3>12</h3>
        </div>
        <div class="card">
            <small>Rata-rata Nilai</small>
            <h3>88</h3>
        </div>
    </div>

    <!-- CHART + CATEGORY -->
    <div class="grid">

        <!-- CHART -->
        <div class="chart-box">
            <h4>Aktivitas Penyuluhan per Bulan</h4>

            <div class="bars">
                <div class="bar" style="height:40px;"></div>
                <div class="bar" style="height:60px;"></div>
                <div class="bar" style="height:50px;"></div>
                <div class="bar" style="height:80px;"></div>
                <div class="bar" style="height:70px;"></div>
                <div class="bar active" style="height:110px;"></div>
                <div class="bar" style="height:90px;"></div>
                <div class="bar" style="height:120px;"></div>
                <div class="bar" style="height:60px;"></div>
                <div class="bar" style="height:80px;"></div>
            </div>
        </div>

        <!-- CATEGORY -->
        <div class="chart-box" style="text-align:center;">
            <h4>Kategori Materi</h4>
            <div class="circle"></div>
            <small>Bully | Lalu Lintas | Narkoba | Posbankum</small>
        </div>

    </div>

    <!-- LOWER SECTION -->
    <div class="grid-2">

        <div class="list">
            <h4>Jadwal Penyuluhan</h4>
            <div class="item">12 Okt - SMAN 1 Pekanbaru</div>
            <div class="item">15 Okt - SMPN 3 Pekanbaru</div>
            <div class="item">20 Okt - SMKN 2 Pekanbaru</div>
        </div>

        <div class="list">
            <h4>Aktivitas Terkini</h4>
            <div class="item">Admin menambahkan materi baru</div>
            <div class="item">User menyelesaikan kuis</div>
            <div class="item">Paket penyuluhan dibuat</div>
        </div>

        <div class="list">
            <h4>Materi Populer</h4>
            <div class="item">Bantuan Hukum Masyarakat</div>
            <div class="item">UU ITE & Digital Era</div>
            <div class="item">Etika Bermedia Sosial</div>
        </div>

    </div>

</div>

@endsection