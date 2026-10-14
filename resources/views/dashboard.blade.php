
@extends('layouts.sidebar')

@section('content')

@php
    $totalMateri = $totalMateri ?? 0;
    $totalPaket = $totalPaket ?? 0;
    $totalKuis = $totalKuis ?? 0;
    $totalUser = $totalUser ?? 0;
    $totalPenyuluh = $totalPenyuluh ?? 0;
    $rataRataNilai = $rataRataNilai ?? 0;
    $tahun = $tahun ?? now()->year;
    $pesertaBulanan = $pesertaBulanan ?? [];
    $kategoriMateri = collect($kategoriMateri ?? []);
    $recentMateri = $recentMateri ?? collect();
    $hasilKuisTerbaru = $hasilKuisTerbaru ?? collect();

    $warnaKategori = [
        '#363E79',
        '#FFD82B',
        '#55BE24',
        '#FF9500',
        '#45B9FF',
        '#9B59B6',
        '#E76F51',
        '#20B2AA',
        '#E84393',
        '#6C5CE7',
        '#A3CB38',
        '#F368E0',
        '#576574',
        '#01A3A4',
        '#EE5253'
    ];

    // Jangan menyaring kategori yang jumlah materinya nol.
    $kategoriMateri = $kategoriMateri->map(function ($item) {
        $item->nama_kategori = data_get(
            $item,
            'nama_kategori',
            'Tanpa kategori'
        );

        $item->total = (int) (
            data_get($item, 'total')
            ?? data_get($item, 'jumlah_materi')
            ?? data_get($item, 'materi_count')
            ?? 0
        );

        return $item;
    })->values();

    $jumlahKategoriMateri = $kategoriMateri->sum('total');
@endphp

<style>
.dashboard-page {
    width: 100%;
    min-width: 0;
    color: var(--text, #202544);
}

.dashboard-page * {
    box-sizing: border-box;
}

.dashboard-page .hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 18px;
    margin-bottom: 18px;
    padding: 24px;
    color: #fff;
    background: linear-gradient(135deg, #4C538B, #2A3062 55%, #101943);
    border-radius: 16px;
    box-shadow: 0 5px 15px rgba(0,6,51,.08);
}

.dashboard-page .hero h2 {
    margin: 0;
    font-size: 22px;
    font-weight: 700;
}

.dashboard-page .hero p {
    margin: 6px 0 12px;
    font-size: 13px;
    line-height: 1.6;
    opacity: .85;
}

.dashboard-page .hero small {
    flex-shrink: 0;
    font-size: 11px;
    opacity: .8;
}

.dashboard-page .btns {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.dashboard-page .btns a {
    display: inline-block;
    padding: 9px 13px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: .2s;
}

.dashboard-page .btns a:hover {
    transform: translateY(-2px);
}

.dashboard-page .btn-yellow {
    color: #101943;
    background: linear-gradient(135deg, #FFE76B, #FFD000);
}

.dashboard-page .btn-dark {
    color: white;
    background: rgba(255,255,255,.10);
    border: 1px solid rgba(255,255,255,.2);
}

.dashboard-page .stats {
    display: grid;
    grid-template-columns: repeat(6, minmax(0, 1fr));
    gap: 12px;
}

.dashboard-page .stat-card {
    position: relative;
    min-width: 0;
    min-height: 108px;
    padding: 14px;
    overflow: hidden;
    color: white;
    border-radius: 11px;
    box-shadow: 0 4px 10px rgba(0,6,51,.10);
    transition: transform .2s;
}

.dashboard-page .stat-card:hover {
    transform: translateY(-2px);
}

.dashboard-page .stat-card:nth-child(1),
.dashboard-page .stat-card:nth-child(4),
.dashboard-page .stat-card:nth-child(6) {
    background: linear-gradient(135deg, #434F94, #101943);
}

.dashboard-page .stat-card:nth-child(2) {
    background: linear-gradient(135deg, #FFD82B, #FFAA00);
}

.dashboard-page .stat-card:nth-child(3) {
    background: linear-gradient(135deg, #4DBB80, #16865B);
}

.dashboard-page .stat-card:nth-child(5) {
    background: linear-gradient(135deg, #FFB84D, #E47700);
}

.dashboard-page .stat-card small {
    display: block;
    max-width: 120px;
    font-size: 11px;
    line-height: 1.5;
    color: rgba(255,255,255,.92);
}

.dashboard-page .stat-card h3 {
    margin: 10px 0 5px;
    color: white;
    font-size: 25px;
    line-height: 1.1;
    font-weight: 700;
    overflow-wrap: anywhere;
}

.dashboard-page .stat-card .trend {
    font-size: 10px;
    line-height: 1.4;
    color: rgba(255,255,255,.85);
}

.dashboard-page .stat-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    display: grid;
    place-items: center;
    width: 29px;
    height: 29px;
    font-size: 15px;
    background: rgba(255,255,255,.15);
    border-radius: 8px;
}

.dashboard-page .main-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.75fr) minmax(300px, .9fr);
    align-items: stretch;
    gap: 15px;
    margin-top: 18px;
}

.dashboard-page .lower-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 15px;
    margin-top: 15px;
}

.dashboard-page .panel {
    min-width: 0;
    padding: 20px;
    background: white;
    border: 1px solid #F0F1F5;
    border-radius: 15px;
    box-shadow: 0 3px 12px rgba(0,6,51,.035);
}

.dashboard-page .panel-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 10px;
    margin-bottom: 12px;
}

.dashboard-page .panel-header h4 {
    margin: 0;
    color: var(--text, #202544);
    font-size: 15px;
    line-height: 1.45;
    font-weight: 700;
}

.dashboard-page .panel-header p {
    margin: 5px 0 0;
    color: var(--muted, #777B91);
    font-size: 11px;
    line-height: 1.5;
}

.dashboard-page .year-label {
    flex-shrink: 0;
    font-size: 11px;
    color: var(--muted, #777B91);
}

.dashboard-page .panel-link {
    flex-shrink: 0;
    color: var(--primary, #363E79);
    font-size: 11px;
    text-decoration: none;
}

.dashboard-page .panel-link:hover {
    text-decoration: underline;
}

/* GRAFIK BULANAN */
.dashboard-page .bars {
    display: flex;
    align-items: stretch;
    justify-content: space-around;
    gap: 9px;
    height: 220px;
    padding: 15px 2px 0;
}

.dashboard-page .bar-item {
    display: flex;
    flex: 1;
    flex-direction: column;
    align-items: center;
    min-width: 0;
    height: 100%;
}

.dashboard-page .bar-space {
    display: flex;
    flex: 1;
    align-items: flex-end;
    justify-content: center;
    width: 100%;
    min-height: 0;
}

.dashboard-page .bar {
    position: relative;
    width: 100%;
    max-width: 34px;
    min-height: 3px;
    background: #A4A6B5;
    border-radius: 5px 5px 2px 2px;
    transition: height .3s;
}

.dashboard-page .bar.active {
    background: linear-gradient(to bottom, #FFD82B, #FF9500);
}

.dashboard-page .bar-value {
    position: absolute;
    top: -18px;
    left: 50%;
    transform: translateX(-50%);
    color: var(--primary, #363E79);
    font-size: 10px;
    white-space: nowrap;
}

.dashboard-page .bar-month {
    margin-top: 8px;
    color: var(--muted, #777B91);
    font-size: 10px;
}

/* KATEGORI MATERI */
.dashboard-page .category-content {
    display: grid;
    grid-template-columns: 112px minmax(0, 1fr);
    align-items: center;
    gap: 22px;
    margin-top: 18px;
}

.dashboard-page .donut {
    position: relative;
    display: grid;
    place-items: center;
    width: 112px;
    height: 112px;
    border-radius: 50%;
    background: #E8E9ED;
    transition: background .25s ease;
}

.dashboard-page .donut::before {
    position: absolute;
    width: 76px;
    height: 76px;
    content: "";
    background: white;
    border-radius: 50%;
}

.dashboard-page .donut-center {
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.dashboard-page .donut-center strong {
    color: var(--text, #202544);
    font-size: 21px;
    line-height: 1.2;
    font-weight: 700;
}

.dashboard-page .donut-center span {
    margin-top: 4px;
    color: var(--muted, #777B91);
    font-size: 10px;
}

.dashboard-page .legend {
    display: flex;
    flex-direction: column;
    gap: 11px;
    min-width: 0;
}

.dashboard-page .legend-item {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    min-width: 0;
    color: var(--muted, #777B91);
    font-size: 11px;
    line-height: 1.45;
}

.dashboard-page .legend-dot {
    display: block;
    flex: 0 0 9px;
    width: 9px;
    height: 9px;
    margin-top: 4px;
    border-radius: 50%;
}

.dashboard-page .legend-label {
    min-width: 0;
    overflow-wrap: anywhere;
}

.dashboard-page .empty-data {
    padding: 22px 8px;
    color: var(--muted, #777B91);
    font-size: 12px;
    line-height: 1.6;
    text-align: center;
}

/* DAFTAR HASIL DAN MATERI */
.dashboard-page .list-item {
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 11px 0;
    border-bottom: 1px solid #E8E9ED;
}

.dashboard-page .list-item:last-child {
    border-bottom: none;
}

.dashboard-page .item-icon {
    display: grid;
    flex: 0 0 34px;
    place-items: center;
    width: 34px;
    height: 34px;
    color: var(--primary, #363E79);
    font-size: 13px;
    font-weight: 700;
    background: #EEF0FA;
    border-radius: 9px;
}

.dashboard-page .item-content {
    display: flex;
    flex: 1;
    flex-direction: column;
    gap: 4px;
    min-width: 0;
}

.dashboard-page .item-content strong {
    color: var(--text, #202544);
    font-size: 12px;
    line-height: 1.45;
    overflow-wrap: anywhere;
}

.dashboard-page .item-content small {
    color: var(--muted, #777B91);
    font-size: 11px;
    line-height: 1.5;
    overflow-wrap: anywhere;
}

/* RESPONSIVE */
@media (max-width: 1350px) {
    .dashboard-page .stats {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .dashboard-page .main-grid {
        grid-template-columns: minmax(0, 1.5fr) minmax(280px, 1fr);
    }

    .dashboard-page .category-content {
        grid-template-columns: 96px minmax(0, 1fr);
        gap: 14px;
    }

    .dashboard-page .donut {
        width: 96px;
        height: 96px;
    }

    .dashboard-page .donut::before {
        width: 66px;
        height: 66px;
    }

    .dashboard-page .donut-center strong {
        font-size: 18px;
    }

    .dashboard-page .legend {
        gap: 9px;
    }
}

@media (max-width: 950px) {
    .dashboard-page .main-grid,
    .dashboard-page .lower-grid {
        grid-template-columns: minmax(0, 1fr);
    }

    .dashboard-page .category-content {
        grid-template-columns: 112px minmax(0, 1fr);
        gap: 22px;
    }

    .dashboard-page .donut {
        width: 112px;
        height: 112px;
    }

    .dashboard-page .donut::before {
        width: 76px;
        height: 76px;
    }

    .dashboard-page .donut-center strong {
        font-size: 21px;
    }
}

@media (max-width: 600px) {
    .dashboard-page .hero {
        align-items: flex-start;
        flex-direction: column;
        padding: 19px;
    }

    .dashboard-page .hero h2 {
        font-size: 18px;
    }

    .dashboard-page .stats {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 9px;
    }

    .dashboard-page .stat-card {
        min-height: 102px;
        padding: 11px;
    }

    .dashboard-page .stat-card h3 {
        font-size: 22px;
    }

    .dashboard-page .stat-icon {
        width: 25px;
        height: 25px;
        font-size: 13px;
    }

    .dashboard-page .panel {
        padding: 15px;
    }

    .dashboard-page .bars {
        gap: 5px;
        height: 190px;
    }

    .dashboard-page .bar-month {
        font-size: 9px;
    }

    .dashboard-page .category-content {
        grid-template-columns: 88px minmax(0, 1fr);
        gap: 15px;
    }

    .dashboard-page .donut {
        width: 88px;
        height: 88px;
    }

    .dashboard-page .donut::before {
        width: 60px;
        height: 60px;
    }

    .dashboard-page .donut-center strong {
        font-size: 18px;
    }

    .dashboard-page .donut-center span {
        font-size: 9px;
    }

    .dashboard-page .legend {
        gap: 9px;
    }

    .dashboard-page .legend-item {
        font-size: 10px;
    }
}

@media (max-width: 360px) {
    .dashboard-page .stats {
        grid-template-columns: minmax(0, 1fr);
    }

    .dashboard-page .category-content {
        grid-template-columns: 75px minmax(0, 1fr);
        gap: 10px;
    }

    .dashboard-page .donut {
        width: 75px;
        height: 75px;
    }

    .dashboard-page .donut::before {
        width: 51px;
        height: 51px;
    }
}
</style>

<div class="dashboard-page">

    {{-- HEADER --}}
    <div class="hero">
        <div>
            <h2>Selamat Datang di Dashboard PANTUN</h2>
            <p>Sistem Pengelolaan &amp; Penyajian Materi Literasi Hukum Terpadu</p>

            <div class="btns">
                <a href="{{ route('materi.create') }}" class="btn-yellow">
                    + Tambah Materi
                </a>

                <a href="{{ route('paket-penyuluhan.index') }}" class="btn-dark">
                    Lihat Paket
                </a>

                <a href="{{ route('kuis.create') }}" class="btn-dark">
                    Buat Kuis
                </a>
            </div>
        </div>

        <small id="dashboardUpdatedAt">Data dari database</small>
    </div>

    {{-- STATISTIK --}}
    <div class="stats">
        <div class="stat-card">
            <div class="stat-icon">▤</div>
            <small>Total Materi</small>
            <h3 id="totalMateri">{{ $totalMateri }}</h3>
            <div class="trend">Jumlah materi tersimpan</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">▣</div>
            <small>Paket Penyuluhan</small>
            <h3 id="totalPaket">{{ $totalPaket }}</h3>
            <div class="trend">Jumlah paket tersimpan</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">✓</div>
            <small>Total Kuis</small>
            <h3 id="totalKuis">{{ $totalKuis }}</h3>
            <div class="trend">Jumlah kuis tersimpan</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">♙</div>
            <small>Total Pengguna</small>
            <h3 id="totalUser">{{ $totalUser }}</h3>
            <div class="trend">Akun pengguna terdaftar</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">♧</div>
            <small>Total Penyuluh</small>
            <h3 id="totalPenyuluh">{{ $totalPenyuluh }}</h3>
            <div class="trend">Data penyuluh terdaftar</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">★</div>
            <small>Rata-rata Nilai</small>
            <h3 id="rataRataNilai">{{ $rataRataNilai }}</h3>
            <div class="trend">Berdasarkan hasil kuis</div>
        </div>
    </div>

    {{-- GRAFIK DAN KATEGORI --}}
    <div class="main-grid">

        <div class="panel">
            <div class="panel-header">
                <div>
                    <h4>Jumlah Peserta Penyuluhan per Bulan</h4>
                    <p>Jumlah catatan hasil kuis berdasarkan tanggal pengerjaan</p>
                </div>

                <span class="year-label" id="dashboardYear">{{ $tahun }}</span>
            </div>

            <div class="bars" id="dashboardBars">
                @php
                    $maxBulanan = max(
                        1,
                        collect($pesertaBulanan)->max('total') ?? 0
                    );
                @endphp

                @foreach($pesertaBulanan as $index => $bulan)
                    @php
                        $nilaiBulan = (int) ($bulan['total'] ?? 0);
                        $tinggi = $nilaiBulan > 0
                            ? max(5, ($nilaiBulan / $maxBulanan) * 150)
                            : 3;
                    @endphp

                    <div class="bar-item">
                        <div class="bar-space">
                            <div
                                class="bar {{ now()->month === ($index + 1) ? 'active' : '' }}"
                                style="height: {{ $tinggi }}px"
                            >
                                <span class="bar-value">{{ $nilaiBulan }}</span>
                            </div>
                        </div>

                        <span class="bar-month">{{ $bulan['bulan'] ?? '' }}</span>
                    </div>
                @endforeach

                @if(count($pesertaBulanan) === 0)
                    <div class="empty-data">Belum ada data hasil kuis.</div>
                @endif
            </div>
        </div>

        {{-- SEMUA KATEGORI MATERI --}}
        <div class="panel">
            <div class="panel-header">
                <div>
                    <h4>Kategori Materi</h4>
                    <p>Semua kategori beserta jumlah materinya</p>
                </div>
            </div>

            <div class="category-content">
                <div class="donut" id="dashboardDonut">
                    <div class="donut-center">
                        <strong id="kategoriTotal">{{ $jumlahKategoriMateri }}</strong>
                        <span>Total Materi</span>
                    </div>
                </div>

                <div class="legend" id="dashboardLegend">
                    @forelse($kategoriMateri as $index => $kategori)
                        <div class="legend-item">
                            <span
                                class="legend-dot"
                                style="background-color: {{ $warnaKategori[$index % count($warnaKategori)] }}"
                            ></span>

                            <span class="legend-label">
                                {{ $kategori->nama_kategori }}
                                ({{ $kategori->total }})
                            </span>
                        </div>
                    @empty
                        <div class="empty-data">
                            Belum ada kategori yang terdaftar.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- DAFTAR TERBARU --}}
    <div class="lower-grid">

        <div class="panel">
            <div class="panel-header">
                <div>
                    <h4>Hasil Kuis Terbaru</h4>
                    <p>Data pengerjaan kuis yang tersimpan</p>
                </div>

                <a href="{{ route('hasil-kuis.index') }}" class="panel-link">
                    Lihat semua
                </a>
            </div>

            <div id="dashboardResults">
                @forelse($hasilKuisTerbaru as $hasil)
                    <div class="list-item">
                        <div class="item-icon">✓</div>

                        <div class="item-content">
                            <strong>{{ $hasil->nama_siswa ?? 'Siswa' }}</strong>
                            <small>
                                {{ $hasil->kuis ?? 'Kuis' }}
                                · Nilai {{ $hasil->skor ?? 0 }}
                                · {{ $hasil->status ?? 'Belum ada status' }}
                            </small>
                        </div>
                    </div>
                @empty
                    <div class="empty-data">Belum ada hasil kuis.</div>
                @endforelse
            </div>
        </div>

        <div class="panel">
            <div class="panel-header">
                <div>
                    <h4>Materi Terbaru</h4>
                    <p>Materi yang terakhir ditambahkan</p>
                </div>

                <a href="{{ route('materi.index') }}" class="panel-link">
                    Lihat semua
                </a>
            </div>

            <div id="dashboardMaterials">
                @forelse($recentMateri as $materi)
                    <div class="list-item">
                        <div class="item-icon">▤</div>

                        <div class="item-content">
                            <strong>{{ $materi->judul ?? 'Materi tanpa judul' }}</strong>
                            <small>
                                {{ $materi->tipe ?? 'Materi' }}
                                · {{ $materi->status ?? 'Status tidak tersedia' }}
                            </small>
                        </div>
                    </div>
                @empty
                    <div class="empty-data">Belum ada materi.</div>
                @endforelse
            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const endpoint = @json(route('dashboard.data'));

    const colors = [
        '#363E79',
        '#FFD82B',
        '#55BE24',
        '#FF9500',
        '#45B9FF',
        '#9B59B6',
        '#E76F51',
        '#20B2AA',
        '#E84393',
        '#6C5CE7',
        '#A3CB38',
        '#F368E0',
        '#576574',
        '#01A3A4',
        '#EE5253'
    ];

    const setText = (id, value) => {
        const element = document.getElementById(id);
        if (element) element.textContent = value ?? 0;
    };

    const escapeHtml = (value) => String(value ?? '').replace(/[&<>"']/g, char => ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    })[char]);

    function renderBars(items) {
        const container = document.getElementById('dashboardBars');
        if (!container || !Array.isArray(items)) return;

        const max = Math.max(1, ...items.map(item => Number(item.total) || 0));
        const currentMonth = new Date().getMonth();

        if (items.length === 0) {
            container.innerHTML =
                '<div class="empty-data">Belum ada data hasil kuis.</div>';
            return;
        }

        container.innerHTML = items.map((item, index) => {
            const total = Number(item.total) || 0;
            const height = total > 0 ? Math.max(5, total / max * 150) : 3;

            return `
                <div class="bar-item">
                    <div class="bar-space">
                        <div class="bar ${index === currentMonth ? 'active' : ''}"
                             style="height:${height}px">
                            <span class="bar-value">${total}</span>
                        </div>
                    </div>
                    <span class="bar-month">${escapeHtml(item.bulan)}</span>
                </div>
            `;
        }).join('');
    }

    // Semua kategori tetap masuk ke legenda.
    // Hanya kategori dengan total > 0 yang membentuk irisan pie.
    function renderCategories(categories) {
        const legend = document.getElementById('dashboardLegend');
        const donut = document.getElementById('dashboardDonut');

        if (!legend || !donut || !Array.isArray(categories)) {
            console.error('Data kategori tidak valid:', categories);
            return;
        }

        const items = categories.map(item => ({
            name: item.nama_kategori || item.kategori || 'Tanpa kategori',
            total: Math.max(0, Number(
                item.total ??
                item.jumlah_materi ??
                item.materi_count ??
                0
            ) || 0)
        }));

        const totalMateriKategori = items.reduce(
            (sum, item) => sum + item.total,
            0
        );

        setText('kategoriTotal', totalMateriKategori);

        const kategoriBerisiMateri = items.filter(item => item.total > 0);
        let angle = 0;

        const gradient = kategoriBerisiMateri.map(item => {
            const start = angle;
            angle += (item.total / totalMateriKategori) * 360;

            const end = angle;
            const color = colors[
                items.findIndex(category => category === item) % colors.length
            ];

            return `${color} ${start}deg ${end}deg`;
        });

        donut.style.background = gradient.length > 0
            ? `conic-gradient(${gradient.join(', ')})`
            : '#E8E9ED';

        legend.innerHTML = items.length > 0
            ? items.map((item, index) => `
                <div class="legend-item">
                    <span class="legend-dot"
                          style="background-color:${colors[index % colors.length]}"></span>
                    <span class="legend-label">
                        ${escapeHtml(item.name)} (${item.total})
                    </span>
                </div>
            `).join('')
            : '<div class="empty-data">Belum ada kategori yang terdaftar.</div>';
    }

    function renderResults(items) {
        const container = document.getElementById('dashboardResults');
        if (!container || !Array.isArray(items)) return;

        container.innerHTML = items.length
            ? items.map(item => `
                <div class="list-item">
                    <div class="item-icon">✓</div>
                    <div class="item-content">
                        <strong>${escapeHtml(item.nama_siswa || 'Siswa')}</strong>
                        <small>
                            ${escapeHtml(item.kuis || 'Kuis')}
                            · Nilai ${escapeHtml(item.skor ?? 0)}
                            · ${escapeHtml(item.status || 'Belum ada status')}
                        </small>
                    </div>
                </div>
            `).join('')
            : '<div class="empty-data">Belum ada hasil kuis.</div>';
    }

    function renderMaterials(items) {
        const container = document.getElementById('dashboardMaterials');
        if (!container || !Array.isArray(items)) return;

        container.innerHTML = items.length
            ? items.map(item => `
                <div class="list-item">
                    <div class="item-icon">▤</div>
                    <div class="item-content">
                        <strong>${escapeHtml(item.judul || 'Materi tanpa judul')}</strong>
                        <small>
                            ${escapeHtml(item.tipe || 'Materi')}
                            · ${escapeHtml(item.status || 'Status tidak tersedia')}
                        </small>
                    </div>
                </div>
            `).join('')
            : '<div class="empty-data">Belum ada materi.</div>';
    }

    let loading = false;

    async function updateDashboard() {
        if (loading) return;
        loading = true;

        try {
            const response = await fetch(endpoint, {
                method: 'GET',
                credentials: 'same-origin',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                cache: 'no-store'
            });

            if (response.status === 401) {
                setText('dashboardUpdatedAt', 'Sesi login perlu diperiksa');
                return;
            }

            if (!response.ok) {
                throw new Error('HTTP ' + response.status);
            }

            const result = await response.json();

            if (!result.success || !result.data) {
                throw new Error(
                    result.message || 'Data dashboard tidak tersedia'
                );
            }

            const data = result.data;

            setText('totalMateri', data.totalMateri);
            setText('totalPaket', data.totalPaket);
            setText('totalKuis', data.totalKuis);
            setText('totalUser', data.totalUser);
            setText('totalPenyuluh', data.totalPenyuluh);
            setText('rataRataNilai', data.rataRataNilai);
            setText('dashboardYear', data.tahun);

            // Endpoint harus mengirim semua kategori, termasuk total = 0.
            renderBars(data.pesertaBulanan);
            renderCategories(data.kategoriMateri);
            renderResults(data.hasilKuisTerbaru);
            renderMaterials(data.recentMateri);

            setText(
                'dashboardUpdatedAt',
                'Diperbarui pukul ' + (result.updated_at || '--:--:--')
            );
        } catch (error) {
            console.error('Pembaruan dashboard gagal:', error);
            setText('dashboardUpdatedAt', 'Data belum berhasil diperbarui');
        } finally {
            loading = false;
        }
    }

    // Tampilkan data awal dari Blade sebelum permintaan AJAX selesai.
    renderCategories(@json($kategoriMateri->map(fn ($item) => [
        'nama_kategori' => $item->nama_kategori,
        'total' => $item->total
    ])->values()));

    updateDashboard();
    setInterval(updateDashboard, 10000);
});
</script>

@endsection
