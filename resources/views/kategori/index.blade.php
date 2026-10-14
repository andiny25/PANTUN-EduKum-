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
    padding:26px 22px;
    background:#f3f4f8;
    min-height:100vh;
}

.page-header{
    margin-bottom:24px;
}

.header-top{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
}

.header-title h1{
    font-size:40px;
    font-weight:700;
    color:#13234a;
    margin-bottom:4px;
}

.header-title p{
    color:#6b7280;
    font-size:14px;
}

.btn{
    background:#2d3165;
    color:white;
    border:none;
    height:44px;
    padding:0 18px;
    border-radius:10px;
    font-size:13px;
    font-weight:600;
    cursor:pointer;
    display:flex;
    align-items:center;
    gap:8px;
    text-decoration:none;
    box-shadow:0 4px 10px rgba(45,49,101,0.15);
}

.btn:hover{
    background:#252957;
    color:white;
}

.btn i{
    width:16px;
    height:16px;
}

.table-box{
    background:white;
    border-radius:18px;
    overflow:hidden;
    border:1px solid #ececf2;
}

.table-header{
    padding:20px;
    border-bottom:1px solid #ececf2;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.table-header h3{
    color:#13234a;
    font-size:17px;
    font-weight:700;
    margin:0;
}

.total-data{
    font-size:12px;
    color:#6b7280;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    padding:15px 20px;
    text-align:left;
    font-size:11px;
    color:#6b7280;
    border-bottom:1px solid #ececf2;
    font-weight:700;
}

td{
    padding:16px 20px;
    border-bottom:1px solid #f1f2f6;
    font-size:13px;
    color:#111827;
    vertical-align:middle;
}

tr:last-child td{
    border-bottom:none;
}

.category-name{
    display:flex;
    align-items:center;
    gap:10px;
    font-weight:600;
    color:#14224a;
}

.category-icon{
    width:34px;
    height:34px;
    border-radius:10px;
    background:#eef0ff;
    color:#2d3165;
    display:flex;
    align-items:center;
    justify-content:center;
}

.category-icon i{
    width:17px;
    height:17px;
}

.count-badge{
    background:#f3f4f6;
    color:#4b5563;
    padding:5px 10px;
    border-radius:20px;
    font-size:11px;
    font-weight:600;
}

.action{
    display:flex;
    align-items:center;
    gap:8px;
}

.action-btn{
    width:32px;
    height:32px;
    border:none;
    border-radius:8px;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
}

.action-btn i{
    width:15px;
    height:15px;
}

.edit-btn{
    background:#eef0ff;
    color:#2d3165;
}

.delete-btn{
    background:#fee2e2;
    color:#dc2626;
}

.empty-state{
    text-align:center;
    padding:55px 20px;
}

.empty-state i{
    width:45px;
    height:45px;
    color:#9ca3af;
    margin-bottom:12px;
}

.empty-state h4{
    color:#374151;
    font-size:15px;
    margin-bottom:5px;
}

.empty-state p{
    color:#9ca3af;
    font-size:12px;
}

.alert-success{
    border:none;
    border-radius:10px;
    font-size:13px;
    margin-bottom:18px;
}

@media(max-width:800px){

    .header-top{
        flex-direction:column;
        gap:15px;
    }

    .table-box{
        overflow-x:auto;
    }

    table{
        min-width:750px;
    }

}

</style>

{{-- HEADER --}}
<div class="page-header">

    <div class="header-top">

        <div class="header-title">
            <h1>Kelola Kategori</h1>

            <p>
                Kelola kategori yang digunakan untuk mengelompokkan materi dan kuis.
            </p>
        </div>

        <a href="{{ route('kategori.create') }}" class="btn">
            <i data-lucide="plus"></i>
            Tambah Kategori
        </a>

    </div>

</div>


{{-- SUCCESS MESSAGE --}}
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">

        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- TABLE --}}
<div class="table-box">

    <div class="table-header">

        <h3>Daftar Kategori</h3>

        <span class="total-data">
            Total {{ $kategoris->count() }} kategori
        </span>

    </div>


    @if($kategoris->count() > 0)

        <table>

            <thead>

                <tr>
                    <th width="60">NO</th>
                    <th>NAMA KATEGORI</th>
                    <th>DESKRIPSI</th>
                    <th>MATERI</th>
                    <th>KUIS</th>
                    <th width="130">AKSI</th>
                </tr>

            </thead>

            <tbody>

                @foreach($kategoris as $kategori)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>


                        <td>

                            <div class="category-name">

                                <div class="category-icon">
                                    <i data-lucide="tags"></i>
                                </div>

                                {{ $kategori->nama_kategori }}

                            </div>

                        </td>


                        <td>

                            {{ $kategori->deskripsi ?: '-' }}

                        </td>


                        <td>

                            <span class="count-badge">
                                {{ $kategori->materi_count }} Materi
                            </span>

                        </td>


                        <td>

                            <span class="count-badge">
                                {{ $kategori->kuis_count }} Kuis
                            </span>

                        </td>


                        <td>

                            <div class="action">

                                <a
                                    href="{{ route('kategori.edit', $kategori->id) }}"
                                    class="action-btn edit-btn"
                                    title="Edit"
                                >

                                    <i data-lucide="pencil"></i>

                                </a>


                                <form
                                    action="{{ route('kategori.destroy', $kategori->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kategori ini?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="action-btn delete-btn"
                                        title="Hapus"
                                    >

                                        <i data-lucide="trash-2"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <div class="empty-state">

            <i data-lucide="tags"></i>

            <h4>Belum ada kategori</h4>

            <p>
                Silakan tambahkan kategori terlebih dahulu.
            </p>

        </div>

    @endif

</div>


</div>

<script>
    lucide.createIcons();
</script>

@endsection
