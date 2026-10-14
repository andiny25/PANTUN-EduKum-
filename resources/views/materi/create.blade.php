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

body{
    background:#f3f4f8;
}

/* ================= CONTENT ================= */

.content{
    padding:26px 22px;
}

/* ================= FORM CARD ================= */

.table-box{
    border-radius:14px;
}

.form-card{
    max-width:750px;
    margin:auto;
    padding:25px;
    background:white;
    border-radius:18px;
    border:1px solid #ececf2;
}

/* ================= HEADER ================= */

.form-title{
    color:#13234a;
    font-size:24px;
    font-weight:700;
}

.form-subtitle{
    color:#6b7280;
    font-size:13px;
    margin-top:4px;
}

/* ================= FORM ================= */

.form-row{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
    margin-bottom:20px;
}

.form-group{
    display:flex;
    flex-direction:column;
}

.form-group.full{
    grid-column:1 / 3;
}

.form-group label{
    font-size:12px;
    font-weight:700;
    margin-bottom:8px;
    color:#374151;
}

.form-group input,
.form-group select,
.form-group textarea{
    width:100%;
    border:1px solid #e5e7eb;
    border-radius:10px;
    padding:12px;
    font-size:14px;
    outline:none;
    background:white;
    color:#374151;
    transition:0.2s;
}

.form-group input,
.form-group select{
    height:44px;
}

.form-group textarea{
    resize:vertical;
    min-height:120px;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus{
    border-color:#2d3165;
    box-shadow:0 0 0 3px rgba(45,49,101,0.08);
}

/* ================= UPLOAD ================= */

.upload-box{
    border:2px dashed #d1d5db;
    border-radius:12px;
    padding:22px;
    background:#fafafa;
    text-align:center;
    transition:0.2s;
}

.upload-box:hover{
    border-color:#2d3165;
    background:#f8f9fc;
}

.upload-box i{
    width:40px;
    height:40px;
    color:#2d3165;
}

.upload-box h4{
    margin-top:10px;
    color:#13234a;
    font-size:14px;
}

.upload-box p{
    color:#6b7280;
    font-size:12px;
    margin:8px 0 14px;
}

.upload-box input[type="file"]{
    width:100%;
    border:none;
    padding:10px;
    background:transparent;
    font-size:13px;
    color:#374151;
}

/* ================= FILE INFO ================= */

.file-preview{
    display:none;
    margin-top:15px;
    padding:12px 14px;
    background:#f1f3f8;
    border-radius:10px;
    text-align:left;
}

.file-preview.show{
    display:block;
}

.file-preview-row{
    display:flex;
    align-items:center;
    gap:10px;
}

.file-preview-icon{
    width:36px;
    height:36px;
    border-radius:8px;
    background:#e5e7eb;
    color:#2d3165;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
}

.file-preview-icon i{
    width:19px;
    height:19px;
}

.file-preview-info{
    min-width:0;
    flex:1;
}

.file-preview-name{
    font-size:12px;
    font-weight:600;
    color:#13234a;
    word-break:break-word;
}

.file-preview-size{
    margin-top:3px;
    font-size:11px;
    color:#6b7280;
}

.file-preview-type{
    margin-top:2px;
    font-size:11px;
    color:#2d3165;
    font-weight:600;
}

.file-info{
    margin-top:10px;
    font-size:11px;
    color:#6b7280;
    line-height:1.5;
}

/* ================= ERROR ================= */

.error-message{
    color:#dc2626;
    font-size:11px;
    margin-top:5px;
}

/* ================= BUTTON ================= */

.form-action{
    margin-top:25px;
    display:flex;
    justify-content:flex-end;
    gap:10px;
}

.btn{
    height:44px;
    padding:0 18px;
    border:none;
    border-radius:10px;
    font-size:13px;
    font-weight:600;
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    transition:0.2s;
}

.btn i{
    width:16px;
    height:16px;
}

.btn-primary{
    background:#2d3165;
    color:white;
    box-shadow:0 4px 10px rgba(45,49,101,0.15);
}

.btn-primary:hover{
    background:#252957;
}

.btn-secondary{
    background:#eef0f5;
    color:#374151;
    text-decoration:none;
}

.btn-secondary:hover{
    background:#e4e7ef;
}

/* ================= RESPONSIVE ================= */

@media(max-width:900px){

    .form-row{
        grid-template-columns:1fr;
        gap:20px;
    }

    .form-group.full{
        grid-column:auto;
    }

    .form-card{
        padding:22px;
    }

}

</style>


<!-- ================= FORM CARD ================= -->

<div class="table-box form-card">

    <!-- ================= HEADER ================= -->

    <div style="margin-bottom:25px;">

        <h2 class="form-title">
            Tambah Materi Baru
        </h2>

        <p class="form-subtitle">
            Unggah dan lengkapi detail materi untuk dipublikasikan
        </p>

    </div>


    <!-- ================= FORM ================= -->

    <form
        action="{{ route('materi.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf


        <!-- ================= JUDUL & KATEGORI ================= -->

        <div class="form-row">

            <!-- JUDUL -->

            <div class="form-group">

                <label>
                    JUDUL MATERI
                </label>

                <input
                    type="text"
                    name="judul"
                    value="{{ old('judul') }}"
                    placeholder="Contoh: Kesadaran Hukum Sejak Dini"
                    required
                >

                @error('judul')

                    <span class="error-message">
                        {{ $message }}
                    </span>

                @enderror

            </div>


            <!-- KATEGORI -->

            <div class="form-group">

                <label>
                    KATEGORI
                </label>

                <select
                    name="kategori_id"
                    required
                >

                    <option value="">
                        Pilih Kategori
                    </option>

                    @foreach($kategoris as $kategori)

                        <option
                            value="{{ $kategori->id }}"
                            {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}
                        >

                            {{ $kategori->nama_kategori }}

                        </option>

                    @endforeach

                </select>

                @error('kategori_id')

                    <span class="error-message">
                        {{ $message }}
                    </span>

                @enderror

            </div>

        </div>


        <!-- ================= PENULIS ================= -->

        <div class="form-row">

            <div class="form-group">

                <label>
                    PENULIS
                </label>

                <input
                    type="text"
                    name="penulis"
                    value="{{ old('penulis') }}"
                    placeholder="Nama Penulis"
                >

                @error('penulis')

                    <span class="error-message">
                        {{ $message }}
                    </span>

                @enderror

            </div>

        </div>


        <!-- ================= UPLOAD MATERI ================= -->

        <div class="form-group">

            <label>
                UNGGAH MATERI
            </label>

            <div class="upload-box">

                <i data-lucide="upload-cloud"></i>

                <h4>
                    Pilih file materi
                </h4>

                <p>
                    PDF, PPT, PPTX, JPG, PNG, MP4, AVI, MOV, MKV, WEBM
                </p>


                <!-- FILE INPUT -->

                <input
                    type="file"
                    name="file"
                    id="file"
                    accept=".pdf,.ppt,.pptx,.jpg,.jpeg,.jfif,.png,.mp4,.avi,.mov,.mkv,.webm"
                >


                <!-- ================= FILE PREVIEW ================= -->

                <div
                    id="file-preview"
                    class="file-preview"
                >

                    <div class="file-preview-row">

                        <div
                            class="file-preview-icon"
                            id="file-preview-icon"
                        >

                            <i data-lucide="file"></i>

                        </div>


                        <div class="file-preview-info">

                            <div
                                id="file-preview-name"
                                class="file-preview-name"
                            >
                            </div>

                            <div
                                id="file-preview-size"
                                class="file-preview-size"
                            >
                            </div>

                            <div
                                id="file-preview-type"
                                class="file-preview-type"
                            >
                            </div>

                        </div>

                    </div>

                </div>

                @error('file')

                    <span class="error-message">
                        {{ $message }}
                    </span>

                @enderror

            </div>

        </div>


        <!-- ================= DESKRIPSI ================= -->

        <div
            class="form-group"
            style="margin-top:20px;"
        >

            <label>
                DESKRIPSI
            </label>

            <textarea
                rows="5"
                name="deskripsi"
                placeholder="Tuliskan ringkasan materi atau petunjuk penggunaan..."
            >{{ old('deskripsi') }}</textarea>

            @error('deskripsi')

                <span class="error-message">
                    {{ $message }}
                </span>

            @enderror

        </div>


        <!-- ================= STATUS ================= -->

        <div
            class="form-group"
            style="margin-top:20px;"
        >

            <label>
                STATUS
            </label>

            <select
                name="status"
                required
            >

                <option
                    value="Diterbitkan"
                    {{ old('status', 'Diterbitkan') == 'Diterbitkan' ? 'selected' : '' }}
                >
                    Diterbitkan
                </option>

                <option
                    value="Draft"
                    {{ old('status') == 'Draft' ? 'selected' : '' }}
                >
                    Draft
                </option>

            </select>

            @error('status')

                <span class="error-message">
                    {{ $message }}
                </span>

            @enderror

        </div>


        <!-- ================= BUTTON ================= -->

        <div class="form-action">

            <a
                href="{{ route('materi.index') }}"
                class="btn btn-secondary"
            >

                <i data-lucide="arrow-left"></i>

                Kembali

            </a>


            <button
                type="submit"
                class="btn btn-primary"
            >

                <i data-lucide="plus"></i>

                Tambah Materi

            </button>

        </div>

    </form>

</div>


<script>

/* ================= LUCIDE ================= */

lucide.createIcons();


/* ================= FILE INFORMATION ================= */

const fileInput = document.getElementById('file');

const filePreview = document.getElementById('file-preview');

const filePreviewName =
    document.getElementById('file-preview-name');

const filePreviewSize =
    document.getElementById('file-preview-size');

const filePreviewType =
    document.getElementById('file-preview-type');

const filePreviewIcon =
    document.getElementById('file-preview-icon');


/* ================= FORMAT UKURAN ================= */

function formatFileSize(bytes){

    if(bytes === 0){
        return '0 Bytes';
    }

    const units = [
        'Bytes',
        'KB',
        'MB',
        'GB'
    ];

    const i = Math.floor(
        Math.log(bytes) / Math.log(1024)
    );

    const size =
        bytes / Math.pow(1024, i);

    return size.toFixed(2) + ' ' + units[i];
}


/* ================= TENTUKAN TIPE ================= */

function getFileType(extension){

    extension = extension.toLowerCase();

    if(extension === 'pdf'){

        return 'PDF';

    }

    if(
        extension === 'ppt' ||
        extension === 'pptx'
    ){

        return 'PPT';

    }

    if(
        extension === 'mp4' ||
        extension === 'avi' ||
        extension === 'mov' ||
        extension === 'mkv' ||
        extension === 'webm'
    ){

        return 'Video';

    }

    if(
        extension === 'jpg' ||
        extension === 'jpeg' ||
        extension === 'jfif'
    ){

        return 'JPG';

    }

    if(extension === 'png'){

        return 'PNG';

    }

    return 'Artikel';
}


/* ================= ICON ================= */

function getFileIcon(type){

    if(type === 'PDF'){
        return 'file-text';
    }

    if(type === 'PPT'){
        return 'presentation';
    }

    if(type === 'Video'){
        return 'play-circle';
    }

    if(
        type === 'JPG' ||
        type === 'PNG'
    ){
        return 'image';
    }

    return 'file';
}


/* ================= FILE CHANGE ================= */

if(fileInput){

    fileInput.addEventListener('change', function(){

        if(this.files.length === 0){

            filePreview.classList.remove('show');

            return;
        }


        const file = this.files[0];


        /* ================= NAMA FILE ================= */

        filePreviewName.textContent =
            file.name;


        /* ================= UKURAN ASLI ================= */

        filePreviewSize.textContent =
            'Ukuran: ' +
            formatFileSize(file.size);


        /* ================= EXTENSION ================= */

        const extension =
            file.name
                .split('.')
                .pop()
                .toLowerCase();


        /* ================= TIPE ================= */

        const type =
            getFileType(extension);


        filePreviewType.textContent =
            'Tipe: ' + type;


        /* ================= ICON ================= */

        filePreviewIcon.innerHTML =
            '<i data-lucide="' +
            getFileIcon(type) +
            '"></i>';


        /* ================= TAMPILKAN ================= */

        filePreview.classList.add('show');


        /* Render ulang Lucide */

        lucide.createIcons();

    });

}

</script>

@endsection