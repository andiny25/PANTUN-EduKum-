
@extends('layouts.sidebar')

@section('content')

<style>
.hasil-content {
    width: 100%;
    padding: 0;
    background: #F5F6F8;
}

.page-header {
    margin-bottom: 24px;
}

.header-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
}

.header-title h1 {
    font-size: 36px;
    font-weight: 700;
    color: #13234a;
    margin: 0 0 6px;
}

.header-title p {
    color: #777A80;
    font-size: 14px;
    margin: 0;
}

.header-action {
    display: flex;
    align-items: center;
    gap: 10px;
}

.download-btn {
    height: 42px;
    padding: 0 17px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    background: #2B3056;
    color: white;
    border: 1px solid #2B3056;
    transition: .2s;
    white-space: nowrap;
}

.download-btn:hover {
    background: #101943;
    color: white;
}

.download-btn i {
    width: 16px;
    height: 16px;
}

.cards {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 18px;
    margin-bottom: 22px;
}

.stat-card {
    position: relative;
    min-height: 155px;
    padding: 22px;
    border-radius: 18px;
    color: white;
    overflow: hidden;
    box-shadow: 0 5px 18px rgba(0, 6, 51, .10);
    transition: .2s;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 6, 51, .14);
}

.stat-card:nth-child(1) {
    background: linear-gradient(135deg, #434F94, #101943);
}

.stat-card:nth-child(2) {
    background: linear-gradient(135deg, #FFD82B, #FFAA00);
}

.stat-card:nth-child(3) {
    background: linear-gradient(135deg, #4DBB80, #16865B);
}

.stat-card:nth-child(4) {
    background: linear-gradient(135deg, #434F94, #101943);
}

.card-title {
    font-size: 13px;
    color: rgba(255,255,255,.9);
    margin-bottom: 10px;
}

.card-value {
    font-size: 32px;
    font-weight: 700;
    color: white;
    margin-bottom: 8px;
    line-height: 1.2;
}

.card-growth {
    font-size: 12px;
    color: rgba(255,255,255,.9);
}

.card-icon {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 46px;
    height: 46px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255,255,255,.15);
    border: 1px solid rgba(255,255,255,.16);
}

.card-icon i {
    width: 23px;
    height: 23px;
}

.chart-grid {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 2fr);
    gap: 20px;
    margin-bottom: 22px;
    align-items: stretch;
}

.chart-box {
    background: white;
    border-radius: 18px;
    padding: 22px;
    border: 1px solid #ECECF2;
    box-shadow: 0 5px 18px rgba(0,0,0,.035);
    min-width: 0;
}

.chart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    margin-bottom: 18px;
}

.chart-header h3 {
    color: #000633;
    font-size: 16px;
    font-weight: 700;
    margin: 0;
}

.chart-filter {
    color: #777A80;
    font-size: 11px;
    white-space: nowrap;
}

.chart-container {
    position: relative;
    width: 100%;
    height: 260px;
}

.table-box {
    background: white;
    border-radius: 18px;
    overflow: hidden;
    border: 1px solid #ECECF2;
    box-shadow: 0 5px 18px rgba(0,0,0,.035);
}

.table-header {
    padding: 20px 22px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 18px;
    border-bottom: 1px solid #ECECF2;
}

.table-title {
    font-size: 18px;
    color: #000633;
    font-weight: 700;
}

.table-sub {
    color: #777A80;
    margin-top: 4px;
    font-size: 12px;
}

.table-tools {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 10px;
    flex-wrap: wrap;
}

.search-wrap {
    position: relative;
}

.search-wrap i {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    width: 15px;
    height: 15px;
    color: #8A8F9D;
    pointer-events: none;
}

.search {
    width: 225px;
    height: 40px;
    border-radius: 10px;
    border: 1px solid #dcdfe7;
    padding: 0 12px 0 36px;
    outline: none;
    font-size: 12px;
    background: white;
}

.search:focus {
    border-color: #2B3056;
    box-shadow: 0 0 0 3px rgba(43,48,86,.07);
}

.status-filter {
    display: flex;
    gap: 5px;
    flex-wrap: wrap;
}

.status-filter button {
    border: none;
    background: #f3f4f6;
    color: #4b5563;
    padding: 9px 12px;
    border-radius: 9px;
    cursor: pointer;
    font-size: 11px;
    transition: .2s;
}

.status-filter button:hover {
    background: #e5e7eb;
}

.status-filter button.active {
    background: #2B3056;
    color: white;
}

.table-wrapper {
    width: 100%;
    overflow-x: auto;
}

#hasilTable {
    width: 100%;
    border-collapse: collapse;
}

#hasilTable thead {
    background: #FAFAFC;
}

#hasilTable th {
    padding: 15px 18px;
    text-align: left;
    font-size: 10px;
    font-weight: 700;
    color: #777A80;
    border-bottom: 1px solid #ECECF2;
    white-space: nowrap;
}

#hasilTable td {
    padding: 15px 18px;
    border-bottom: 1px solid #ECECF2;
    font-size: 12px;
    color: #111827;
    vertical-align: middle;
}

#hasilTable tbody tr {
    transition: background .2s;
}

#hasilTable tbody tr:hover {
    background: #fafbfc;
}

.user {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 160px;
}

.avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #E9EBF7;
    color: #2B3056;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 700;
    flex-shrink: 0;
    text-transform: uppercase;
}

.name {
    font-weight: 700;
    color: #000633;
    font-size: 12px;
}

.school {
    font-size: 10px;
    color: #777A80;
    margin-top: 3px;
}

.score {
    font-size: 13px;
    font-weight: 700;
    color: #13234a;
}

.badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 6px 11px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 600;
    white-space: nowrap;
}

.lulus {
    background: #EEF9E9;
    color: #16865B;
}

.remedial {
    background: #FFF4E6;
    color: #D96F00;
}

.belum {
    background: #FFFBEA;
    color: #B39200;
}

.empty-state {
    text-align: center;
    padding: 42px 20px !important;
    color: #777A80 !important;
}

.empty-state i {
    width: 32px;
    height: 32px;
    color: #B7BBC8;
    margin-bottom: 10px;
}

.empty-state div {
    margin-top: 8px;
}

.pagination-wrapper {
    padding: 16px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    background: #FAFAFA;
    flex-wrap: wrap;
}

.pagination-info {
    color: #777A80;
    font-size: 11px;
}

.pagination-wrapper nav p {
    margin: 0;
}

.pagination-wrapper nav svg {
    width: 16px;
    height: 16px;
}

.pagination-wrapper nav a,
.pagination-wrapper nav span {
    font-size: 12px;
}

.pagination-wrapper nav > div {
    display: flex;
    align-items: center;
    gap: 4px;
}

.no-filter-result {
    display: none;
    text-align: center;
    padding: 25px;
    color: #777A80;
    font-size: 12px;
}

@media(max-width: 1100px) {
    .cards {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .chart-grid {
        grid-template-columns: 1fr;
    }
}

@media(max-width: 800px) {
    .header-top {
        flex-direction: column;
        align-items: flex-start;
    }

    .header-action {
        width: 100%;
    }

    .cards {
        grid-template-columns: 1fr;
    }

    .table-header {
        flex-direction: column;
        align-items: stretch;
    }

    .table-tools {
        justify-content: flex-start;
    }

    .search-wrap,
    .search {
        width: 100%;
    }

    .chart-box {
        padding: 16px;
    }

    .chart-container {
        height: 240px;
    }

    .header-title h1 {
        font-size: 29px;
    }

    .pagination-wrapper {
        align-items: flex-start;
        flex-direction: column;
    }
}
</style>
    {{-- HEADER --}}
    <div class="page-header">
        <div class="header-top">
            <div class="header-title">
                <h1>Hasil Kuis</h1>
                <p>
                    Pantau hasil dan perkembangan pemahaman siswa
                    melalui kuis literasi hukum.
                </p>
            </div>

            {{-- EXPORT PDF DIHAPUS --}}
            <div class="header-action">
                <a href="{{ route('hasil-kuis.excel') }}"
                   class="download-btn">
                    <i data-lucide="download"></i>
                    Export Excel
                </a>
            </div>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="cards">

        <div class="stat-card">
            <div class="card-title">Total Peserta</div>
            <div class="card-value">
                {{ number_format($totalPeserta ?? 0, 0, ',', '.') }}
            </div>
            <div class="card-growth">Siswa mengikuti kuis</div>
            <div class="card-icon">
                <i data-lucide="users"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="card-title">Rata-rata Nilai</div>
            <div class="card-value">
                {{ number_format((float) ($rataRata ?? 0), 1, ',', '.') }}
            </div>
            <div class="card-growth">Rata-rata skor pengerjaan</div>
            <div class="card-icon">
                <i data-lucide="trending-up"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="card-title">Nilai Tertinggi</div>
            <div class="card-value">
                {{ number_format((float) ($nilaiTertinggi ?? 0), 1, ',', '.') }}
            </div>
            <div class="card-growth">Skor tertinggi yang diperoleh</div>
            <div class="card-icon">
                <i data-lucide="award"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="card-title">Tingkat Kelulusan</div>
            <div class="card-value">
                {{ number_format((float) ($kelulusan ?? 0), 1, ',', '.') }}%
            </div>
            <div class="card-growth">
                {{ number_format($jumlahLulus ?? 0, 0, ',', '.') }}
                hasil lulus
            </div>
            <div class="card-icon">
                <i data-lucide="badge-check"></i>
            </div>
        </div>

    </div>

    {{-- GRAFIK --}}
    <div class="chart-grid">

        <div class="chart-box">
            <div class="chart-header">
                <h3>Distribusi Hasil Kuis</h3>
                <span class="chart-filter">Semua Hasil</span>
            </div>
            <div class="chart-container">
                <canvas id="statusChart"></canvas>
            </div>
        </div>

        <div class="chart-box">
            <div class="chart-header">
                <h3>Perkembangan Nilai</h3>
                <span class="chart-filter">Rata-rata per Bulan</span>
            </div>
            <div class="chart-container">
                <canvas id="nilaiChart"></canvas>
            </div>
        </div>

    </div>

    {{-- TABEL HASIL --}}
    <div class="table-box">

        <div class="table-header">
            <div>
                <div class="table-title">Daftar Hasil Kuis</div>
                <div class="table-sub">
                    Hasil pengerjaan kuis yang tersimpan di database
                </div>
            </div>

            <div class="table-tools">

                <div class="search-wrap">
                    <i data-lucide="search"></i>
                    <input type="text"
                           class="search"
                           id="searchInput"
                           placeholder="Cari nama siswa atau kuis..."
                           autocomplete="off">
                </div>

                <div class="status-filter">
                    <button type="button"
                            class="active"
                            data-filter="Semua">
                        Semua
                    </button>

                    <button type="button"
                            data-filter="Lulus">
                        Lulus
                    </button>

                    <button type="button"
                            data-filter="Remedial">
                        Remedial
                    </button>

                    <button type="button"
                            data-filter="Belum">
                        Belum
                    </button>
                </div>

            </div>
        </div>

        <div class="table-wrapper">
            <table id="hasilTable">
                <thead>
                    <tr>
                        <th>PESERTA</th>
                        <th>KUIS</th>
                        <th>SKOR</th>
                        <th>STATUS</th>
                        <th>TANGGAL PENGERJAAN</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($data as $item)
                        @php
                            $nama = $item->nama_siswa ?? 'Siswa';
                            $status = ucfirst(
                                strtolower($item->status ?? 'Belum')
                            );

                            if (!in_array($status, ['Lulus', 'Remedial', 'Belum'])) {
                                $status = 'Belum';
                            }

                            $tanggal = $item->created_at ?? null;
                        @endphp

                        <tr data-status="{{ $status }}">
                            <td>
                                <div class="user">
                                    <div class="avatar">
                                        {{ mb_strtoupper(
                                            mb_substr($nama, 0, 1)
                                        ) }}
                                    </div>

                                    <div>
                                        <div class="name">
                                            {{ $nama }}
                                        </div>
                                        <div class="school">
                                                {{ $item->sekolah ?? 'Peserta Kuis' }}
                                            </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                {{ $item->kuis ?? '-' }}
                            </td>

                            <td>
                                <span class="score">
                                    {{ is_numeric($item->skor ?? null)
                                        ? number_format((float) $item->skor, 1, ',', '.')
                                        : '0' }}
                                </span>
                            </td>

                            <td>
                                @if($status === 'Lulus')
                                    <span class="badge lulus">Lulus</span>
                                @elseif($status === 'Remedial')
                                    <span class="badge remedial">Remedial</span>
                                @else
                                    <span class="badge belum">Belum</span>
                                @endif
                            </td>

                            <td>
                                @if($tanggal)
                                    {{ \Illuminate\Support\Carbon::parse($tanggal)->format('d M Y, H:i') }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-state">
                                <i data-lucide="clipboard-list"></i>
                                <div>Belum ada hasil kuis.</div>
                                <div>
                                    Hasil akan muncul setelah siswa
                                    menyelesaikan kuis di aplikasi mobile
                                    dan datanya tersimpan.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="no-filter-result" id="noFilterResult">
            Tidak ada hasil yang cocok dengan pencarian atau filter.
        </div>

        @if($data instanceof \Illuminate\Contracts\Pagination\Paginator
            || $data instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)

            @if($data->count() > 0)
                <div class="pagination-wrapper">
                    <div class="pagination-info">
                        Menampilkan {{ $data->firstItem() }}
                        – {{ $data->lastItem() }}
                        dari {{ $data->total() }} hasil
                    </div>

                    <div>
                        {{ $data->links() }}
                    </div>
                </div>
            @endif
        @endif

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/lucide@latest"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    if (window.lucide) {
        window.lucide.createIcons();
    }

    // PENCARIAN DAN FILTER DIGABUNG
    const searchInput = document.getElementById('searchInput');
    const filterButtons = document.querySelectorAll(
        '.status-filter button'
    );
    const rows = document.querySelectorAll(
        '#hasilTable tbody tr[data-status]'
    );
    const noResult = document.getElementById('noFilterResult');

    let activeStatus = 'Semua';

    function applyFilters() {
        const keyword = (searchInput?.value || '')
            .toLocaleLowerCase('id-ID')
            .trim();

        let visibleCount = 0;

        rows.forEach(function (row) {
            const text = row.innerText.toLocaleLowerCase('id-ID');
            const status = row.dataset.status;

            const matchesKeyword = text.includes(keyword);
            const matchesStatus =
                activeStatus === 'Semua' || status === activeStatus;

            const visible = matchesKeyword && matchesStatus;

            row.style.display = visible ? '' : 'none';

            if (visible) {
                visibleCount++;
            }
        });

        if (noResult) {
            noResult.style.display =
                rows.length > 0 && visibleCount === 0 ? 'block' : 'none';
        }
    }

    searchInput?.addEventListener('input', applyFilters);

    filterButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            activeStatus = this.dataset.filter;

            filterButtons.forEach(function (item) {
                item.classList.toggle('active', item === button);
            });

            applyFilters();
        });
    });

    // DISTRIBUSI STATUS DARI CONTROLLER
    const statusCanvas = document.getElementById('statusChart');

    if (statusCanvas && window.Chart) {
        const pieData = @json($pieChart ?? [0, 0, 0]);

        new Chart(statusCanvas, {
            type: 'doughnut',
            data: {
                labels: ['Lulus', 'Remedial', 'Belum'],
                datasets: [{
                    data: pieData,
                    backgroundColor: ['#16865B', '#D96F00', '#FFD82B'],
                    borderWidth: 0,
                    hoverOffset: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '68%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 18,
                            usePointStyle: true,
                            font: { size: 11 }
                        }
                    }
                }
            }
        });
    }

    // RATA-RATA NILAI PER BULAN DARI CONTROLLER
    const nilaiCanvas = document.getElementById('nilaiChart');

    if (nilaiCanvas && window.Chart) {
        const bulanData = @json($bulan ?? []);
        const nilaiData = @json($nilai ?? []);

        new Chart(nilaiCanvas, {
            type: 'line',
            data: {
                labels: bulanData,
                datasets: [{
                    label: 'Rata-rata Nilai',
                    data: nilaiData,
                    borderColor: '#2B3056',
                    backgroundColor: 'rgba(43,48,86,.08)',
                    borderWidth: 3,
                    fill: true,
                    tension: .35,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    pointBackgroundColor: '#FFD82B',
                    pointBorderColor: '#2B3056',
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            font: { size: 10 },
                            color: '#777A80'
                        },
                        grid: { color: '#EEF0F4' }
                    },
                    x: {
                        ticks: {
                            font: { size: 10 },
                            color: '#777A80'
                        },
                        grid: { display: false }
                    }
                }
            }
        });
    }

});
</script>

@endsection
