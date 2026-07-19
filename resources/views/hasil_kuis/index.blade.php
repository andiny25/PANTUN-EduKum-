@extends('layouts.sidebar')

@section('content')

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Inter',sans-serif;
}

.content{
    padding:28px;
    background:#f5f7fb;
    min-height:100vh;
}

/* ===========================
HEADER
=========================== */

.page-header{
    margin-bottom:28px;
}

.header-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
}

.header-title h1{

    font-size:38px;
    color:#081B44;
    font-weight:700;
    margin-bottom:5px;

}

.header-title p{

    color:#6b7280;
    font-size:15px;

}

.header-action{

    display:flex;
    gap:12px;

}

.export-btn{

    height:42px;
    padding:0 18px;
    border-radius:12px;
    background:white;
    border:1px solid #e5e7eb;
    display:flex;
    align-items:center;
    gap:8px;
    cursor:pointer;
    font-size:13px;
    font-weight:600;
    transition:.25s;

}

.export-btn:hover{

    background:#081B44;
    color:white;

}

.download-btn{

    height:42px;
    padding:0 18px;
    border:none;
    border-radius:12px;
    background:#081B44;
    color:white;
    display:flex;
    align-items:center;
    gap:8px;
    cursor:pointer;
    font-size:13px;
    font-weight:600;
    box-shadow:0 8px 20px rgba(8,27,68,.18);

}

/* ===========================
STAT CARD
=========================== */

.cards{

    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    margin-bottom:28px;

}

.card{

    background:white;
    border-radius:22px;
    padding:24px;
    position:relative;
    overflow:hidden;
    border:1px solid #edf0f5;
    box-shadow:0 8px 25px rgba(0,0,0,.05);

}

.card-title{

    font-size:13px;
    color:#64748B;
    margin-bottom:12px;

}

.card-value{

    font-size:34px;
    font-weight:700;
    color:#081B44;
    margin-bottom:8px;

}

.card-growth{

    font-size:13px;
    color:#16A34A;
    font-weight:600;

}

.card-icon{

    position:absolute;
    top:22px;
    right:22px;
    width:55px;
    height:55px;
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;

}

.icon-blue{

    background:#EEF4FF;
    color:#2563EB;

}

.icon-green{

    background:#ECFDF5;
    color:#16A34A;

}

.icon-yellow{

    background:#FFF7ED;
    color:#EA580C;

}
.export-btn,
.download-btn{
    text-decoration:none;
}

.export-btn{
    height:42px;
    padding:0 18px;
    border-radius:12px;
    background:white;
    border:1px solid #e5e7eb;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    cursor:pointer;
    font-size:13px;
    font-weight:600;
    transition:.25s;
    color:#444;
}

.export-btn:hover{
    background:#EAB308;
    color:white;
    border-color:#EAB308;
}

.download-btn{
    height:42px;
    padding:0 18px;
    border-radius:12px;
    background:#EAB308;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    font-size:13px;
    font-weight:600;
    transition:.25s;
}

.download-btn:hover{
    background:#CA8A04;
}

.icon-purple{

    background:#F5F3FF;
    color:#7C3AED;

}

.card-icon i{

    width:26px;
    height:26px;

}

/* ===========================
CHART
=========================== */

.chart-grid{

    display:grid;
    grid-template-columns:1fr 2fr;
    gap:22px;
    margin-bottom:30px;

}

.chart-box{

    background:white;
    border-radius:22px;
    padding:24px;
    border:1px solid #edf0f5;
    box-shadow:0 8px 20px rgba(0,0,0,.04);

}

.chart-header{

    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;

}

.chart-header h3{

    color:#081B44;
    font-size:18px;

}

.chart-filter{

    font-size:13px;
    color:#64748B;

}

/* ===========================
TABLE
=========================== */

.table-box{

    background:white;
    border-radius:22px;
    overflow:hidden;
    border:1px solid #edf0f5;
    box-shadow:0 8px 20px rgba(0,0,0,.04);

}

.table-header{

    padding:22px 24px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    border-bottom:1px solid #eef2f7;

}

.table-title{

    font-size:20px;
    color:#081B44;
    font-weight:700;

}

.table-sub{

    color:#6B7280;
    margin-top:4px;
    font-size:13px;

}

.table-tools{

    display:flex;
    gap:12px;
    align-items:center;

}

.search{

    width:250px;
    height:42px;
    border-radius:12px;
    border:1px solid #e5e7eb;
    padding:0 15px;
    outline:none;

}

.status-filter{

    display:flex;
    gap:10px;

}

.status-filter button{

    border:none;
    background:#F3F4F6;
    padding:8px 16px;
    border-radius:10px;
    cursor:pointer;
    font-size:13px;
    transition:.2s;

}

.status-filter button.active{

    background:#081B44;
    color:white;

}

table{

    width:100%;
    border-collapse:collapse;

}

thead{

    background:#F9FAFB;

}

th{

    padding:18px;
    font-size:12px;
    color:#64748B;
    text-align:left;

}

td{

    padding:18px;
    border-top:1px solid #EEF2F7;
    font-size:14px;

}

tbody tr{

    transition:.2s;

}

tbody tr:hover{

    background:#F8FAFC;

}

.user{

    display:flex;
    align-items:center;
    gap:12px;

}

.avatar{

    width:45px;
    height:45px;
    border-radius:50%;
    background:#DBEAFE;
    color:#081B44;
    display:flex;
    justify-content:center;
    align-items:center;
    font-weight:700;

}

.name{

    font-weight:700;
    color:#081B44;

}

.school{

    font-size:12px;
    color:#6B7280;
    margin-top:3px;

}

.badge{

    padding:7px 14px;
    border-radius:30px;
    font-size:12px;
    font-weight:600;

}

.lulus{

    background:#DCFCE7;
    color:#16A34A;

}

.remedial{

    background:#FEE2E2;
    color:#DC2626;

}

.detail-btn{

    background:#081B44;
    color:white;
    border:none;
    padding:9px 16px;
    border-radius:10px;
    cursor:pointer;

}
</style>

<div class="content">

   <!-- ================= HEADER ================= -->

<div class="page-header">

    <div class="header-top">

        <div class="header-title">

            <h1>Hasil Kuis</h1>

            <p>
                Monitoring hasil evaluasi kuis siswa secara real-time.
            </p>

        </div>

        <div class="header-action">

            <!-- Export PDF -->
            <a href="{{ route('hasil-kuis.pdf') }}" class="export-btn">
                <i data-lucide="file-text"></i>
                Export PDF
            </a>

            <!-- Download Rekap -->
            <a href="{{ route('hasil-kuis.download') }}" class="download-btn">
                <i data-lucide="download"></i>
                Download Rekap
            </a>

        </div>

    </div>

</div>



    <!-- ================= CARD ================= -->

    <div class="cards">

        <div class="card">

            <div class="card-title">

                Total Peserta

            </div>

            <div class="card-value">

                1.520

            </div>

            <div class="card-growth">

                ↑ 12% dibanding bulan lalu

            </div>

            <div class="card-icon icon-blue">

                <i data-lucide="users"></i>

            </div>

        </div>


        <div class="card">

            <div class="card-title">

                Rata-rata Nilai

            </div>

            <div class="card-value">

                84

            </div>

            <div class="card-growth">

                ↑ 5%

            </div>

            <div class="card-icon icon-green">

                <i data-lucide="graduation-cap"></i>

            </div>

        </div>


        <div class="card">

            <div class="card-title">

                Nilai Tertinggi

            </div>

            <div class="card-value">

                100

            </div>

            <div class="card-growth">

                Sangat Baik

            </div>

            <div class="card-icon icon-yellow">

                <i data-lucide="trophy"></i>

            </div>

        </div>


        <div class="card">

            <div class="card-title">

                Tingkat Kelulusan

            </div>

            <div class="card-value">

                92%

            </div>

            <div class="card-growth">

                Target tercapai

            </div>

            <div class="card-icon icon-purple">

                <i data-lucide="badge-check"></i>

            </div>

        </div>

    </div>



    <!-- ================= CHART ================= -->

    <div class="chart-grid">

        <div class="chart-box">

            <div class="chart-header">

                <h3>Distribusi Nilai</h3>

                <span class="chart-filter">

                    Semester Genap

                </span>

            </div>

            <canvas id="pieChart" height="260"></canvas>

        </div>



        <div class="chart-box">

            <div class="chart-header">

                <h3>Perkembangan Hasil</h3>

                <span class="chart-filter">

                    6 Bulan Terakhir

                </span>

            </div>

            <canvas id="lineChart" height="120"></canvas>

        </div>

    </div>



    <!-- ================= TABLE ================= -->

    <div class="table-box">

        <div class="table-header">

            <div>

                <div class="table-title">

                    Detail Hasil Kuis Siswa

                </div>

                <div class="table-sub">

                    Daftar hasil pengerjaan kuis seluruh siswa.

                </div>

            </div>



            <div class="table-tools">

                <input
                    class="search"
                    type="text"
                    placeholder="Cari siswa..."
                >

                <div class="status-filter">

                    <button class="active">

                        Semua

                    </button>

                    <button>

                        Lulus

                    </button>

                    <button>

                        Remedial

                    </button>

                </div>

            </div>

        </div>



        <table>

            <thead>

            <tr>

                <th>Nama</th>

                <th>Kuis</th>

                <th>Nilai</th>

                <th>Status</th>

                <th>Tanggal</th>

                <th>Aksi</th>

            </tr>

            </thead>



            <tbody>

            <tr>

                <td>

                    <div class="user">

                        <div class="avatar">

                            AM

                        </div>

                        <div>

                            <div class="name">

                                Arya Mahendra

                            </div>

                            <div class="school">

                                MAN 1 Pekanbaru

                            </div>

                        </div>

                    </div>

                </td>

                <td>

                    Anti Bullying

                </td>

                <td>

                    <b>95</b>

                </td>

                <td>

                    <span class="badge lulus">

                        Lulus

                    </span>

                </td>

                <td>

                    03 Jul 2026

                </td>

                <td>

                    <button class="detail-btn">

                        Detail

                    </button>

                </td>

            </tr>



            <tr>

                <td>

                    <div class="user">

                        <div class="avatar">

                            BP

                        </div>

                        <div>

                            <div class="name">

                                Bima Pratama

                            </div>

                            <div class="school">

                                SMAN 5 Pekanbaru

                            </div>

                        </div>

                    </div>

                </td>

                <td>

                    Perbankan

                </td>

                <td>

                    <b>68</b>

                </td>

                <td>

                    <span class="badge remedial">

                        Remedial

                    </span>

                </td>

                <td>

                    03 Jul 2026

                </td>

                <td>

                    <button class="detail-btn">

                        Detail

                    </button>

                </td>

            </tr>

            <tr>

                <td>

                    <div class="user">

                        <div class="avatar">

                            SN

                        </div>

                        <div>

                            <div class="name">

                                Siti Nurhaliza

                            </div>

                            <div class="school">

                                SMAN 2 Pekanbaru

                            </div>

                        </div>

                    </div>

                </td>

                <td>

                    Kekerasan Seksual

                </td>

                <td>

                    <b>88</b>

                </td>

                <td>

                    <span class="badge lulus">

                        Lulus

                    </span>

                </td>

                <td>

                    02 Jul 2026

                </td>

                <td>

                    <button class="detail-btn">

                        Detail

                    </button>

                </td>

            </tr>

            </tbody>

        </table>
                <!-- ================= PAGINATION ================= -->

        <div class="pagination">

            <div class="pagination-info">

                Menampilkan <b>1-10</b> dari <b>1.520</b> hasil kuis

            </div>

            <div class="pagination-page">

                <button class="page-btn">
                    <i data-lucide="chevron-left"></i>
                </button>

                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn">4</button>

                <span>...</span>

                <button class="page-btn">152</button>

                <button class="page-btn">
                    <i data-lucide="chevron-right"></i>
                </button>

            </div>

        </div>

    </div>

</div>

<style>

.pagination{

    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:22px 25px;
    border-top:1px solid #edf0f5;
    background:white;

}

.pagination-info{

    font-size:14px;
    color:#6B7280;

}

.pagination-page{

    display:flex;
    align-items:center;
    gap:10px;

}

.page-btn{

    width:38px;
    height:38px;
    border-radius:10px;
    border:1px solid #E5E7EB;
    background:white;
    cursor:pointer;
    transition:.25s;

}

.page-btn:hover{

    background:#EEF4FF;

}

.page-btn.active{

    background:#081B44;
    color:white;
    border-color:#081B44;

}

.page-btn i{

    width:18px;
    height:18px;

}

@media(max-width:1200px){

.cards{

grid-template-columns:repeat(2,1fr);

}

.chart-grid{

grid-template-columns:1fr;

}

.table-header{

flex-direction:column;
align-items:flex-start;
gap:15px;

}

.table-tools{

width:100%;
flex-wrap:wrap;

}

.search{

width:100%;

}

}

@media(max-width:768px){

.cards{

grid-template-columns:1fr;

}

.header-top{

flex-direction:column;
align-items:flex-start;

}

.header-action{

width:100%;
flex-wrap:wrap;

}

.export-btn,
.download-btn{

width:100%;
justify-content:center;

}

.table-box{

overflow-x:auto;

}

table{

min-width:900px;

}

}

</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

lucide.createIcons();

/* ================= PIE ================= */

new Chart(document.getElementById("pieChart"),{

type:"doughnut",

data:{

labels:[

"Lulus",

"Remedial",

"Belum Mengerjakan"

],

datasets:[{

data:[68,22,10],

backgroundColor:[

"#22C55E",

"#EF4444",

"#CBD5E1"

],

borderWidth:0

}]

},

options:{

plugins:{

legend:{

position:"bottom"

}

},

cutout:"70%"

}

});


/* ================= LINE ================= */

new Chart(document.getElementById("lineChart"),{

type:"line",

data:{

labels:[

"Jan",

"Feb",

"Mar",

"Apr",

"Mei",

"Jun",

"Jul"

],

datasets:[{

label:"Nilai Rata-rata",

data:[72,76,79,82,85,87,91],

borderColor:"#081B44",

backgroundColor:"rgba(8,27,68,.08)",

fill:true,

borderWidth:3,

pointRadius:5,

pointBackgroundColor:"#081B44",

tension:.4

}]

},

options:{

responsive:true,

plugins:{

legend:{

display:false

}

},

scales:{

y:{

beginAtZero:false,

min:60,

max:100,

grid:{

color:"#EEF2F7"

}

},

x:{

grid:{

display:false

}

}

}

}

});

</script>

@endsection