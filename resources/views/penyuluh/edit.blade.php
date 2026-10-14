@extends('layouts.sidebar')

@section('content')

<style>

.edit-container{
    padding:28px;
    background:#f4f5f9;
    min-height:100vh;
}

.edit-header{
    margin-bottom:24px;
}

.edit-header h1{
    font-size:32px;
    font-weight:700;
    color:#13234a;
    margin-bottom:5px;
}

.edit-header p{
    color:#6b7280;
    font-size:14px;
}

.form-card{
    background:#fff;
    border-radius:20px;
    padding:28px;
    border:1px solid #ececf2;
    box-shadow:0 8px 24px rgba(0,0,0,.05);
    max-width:900px;
}

.form-section-title{
    font-size:18px;
    font-weight:700;
    color:#13234a;
    margin-bottom:20px;
}

.form-grid{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:18px;
}

.form-group{
    display:flex;
    flex-direction:column;
    gap:7px;
}

.form-group label{
    font-size:13px;
    font-weight:600;
    color:#374151;
}

.form-group input,
.form-group select{
    height:44px;
    border:1px solid #dcdfe7;
    border-radius:10px;
    padding:0 13px;
    font-size:13px;
    outline:none;
    background:#fff;
}

.form-group input:focus,
.form-group select:focus{
    border-color:#5B6CFF;
    box-shadow:0 0 0 3px rgba(91,108,255,.1);
}

.error-text{
    color:#dc2626;
    font-size:11px;
}

.info-box{
    grid-column:1/-1;
    background:#eef2ff;
    border:1px solid #dbe3ff;
    color:#374151;
    padding:13px 15px;
    border-radius:10px;
    font-size:12px;
    line-height:1.5;
}

.form-actions{
    display:flex;
    justify-content:flex-end;
    gap:10px;
    margin-top:25px;
    padding-top:20px;
    border-top:1px solid #ececf2;
}

.btn-cancel,
.btn-save{
    height:42px;
    padding:0 18px;
    border-radius:10px;
    text-decoration:none;
    display:flex;
    align-items:center;
    gap:8px;
    font-size:13px;
    font-weight:600;
    cursor:pointer;
}

.btn-cancel{
    background:#eef0f5;
    color:#374151;
}

.btn-save{
    border:none;
    background:#081b44;
    color:#fff;
}

.btn-save:hover{
    background:#061532;
}

.btn-cancel i,
.btn-save i{
    width:16px;
    height:16px;
}

@media(max-width:700px){

    .edit-container{
        padding:20px;
    }

    .form-grid{
        grid-template-columns:1fr;
    }

    .info-box{
        grid-column:auto;
    }

    .form-actions{
        flex-direction:column;
    }

    .btn-cancel,
    .btn-save{
        justify-content:center;
    }

}

</style>


<div class="edit-container">

    <div class="edit-header">

        <h1>
            Edit Penyuluh
        </h1>

        <p>
            Perbarui data penyuluh dan akun login.
        </p>

    </div>


    <div class="form-card">

        <div class="form-section-title">
            Data Penyuluh
        </div>


        <form
            action="{{ route('penyuluh.update', $penyuluh->id) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="form-grid">


                <div class="info-box">

                    <strong>Akun Login</strong><br>

                    Email di bawah merupakan email yang digunakan
                    untuk login email/password maupun login Google.

                    <br><br>

                    Password boleh dikosongkan jika tidak ingin
                    mengubah password lama.

                </div>


                <!-- NAMA -->

                <div class="form-group">

                    <label>
                        Nama Penyuluh
                    </label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama', $penyuluh->nama) }}"
                    >

                    @error('nama')
                        <span class="error-text">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                <!-- EMAIL -->

                <div class="form-group">

                    <label>
                        Email Login
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $penyuluh->email) }}"
                    >

                    @error('email')
                        <span class="error-text">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                <!-- PASSWORD -->

                <div class="form-group">

                    <label>
                        Password Baru
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Kosongkan jika tidak diubah"
                    >

                    @error('password')
                        <span class="error-text">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                <!-- KONFIRMASI PASSWORD -->

                <div class="form-group">

                    <label>
                        Konfirmasi Password Baru
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi password baru"
                    >

                </div>


                <!-- NO HP -->

                <div class="form-group">

                    <label>
                        Nomor Handphone
                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        value="{{ old('no_hp', $penyuluh->no_hp) }}"
                    >

                    @error('no_hp')
                        <span class="error-text">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                <!-- JABATAN -->

                <div class="form-group">

                    <label>
                        Jabatan
                    </label>

                    <input
                        type="text"
                        name="jabatan"
                        value="{{ old('jabatan', $penyuluh->jabatan) }}"
                    >

                    @error('jabatan')
                        <span class="error-text">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                <!-- INSTANSI -->

                <div class="form-group">

                    <label>
                        Instansi
                    </label>

                    <input
                        type="text"
                        name="instansi"
                        value="{{ old('instansi', $penyuluh->instansi) }}"
                    >

                    @error('instansi')
                        <span class="error-text">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                <!-- STATUS -->

                <div class="form-group">

                    <label>
                        Status Akses
                    </label>

                    <select name="status">

                        <option
                            value="Aktif"
                            {{ old('status', $penyuluh->status) == 'Aktif' ? 'selected' : '' }}
                        >
                            Aktif
                        </option>

                        <option
                            value="Pending"
                            {{ old('status', $penyuluh->status) == 'Pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="Nonaktif"
                            {{ old('status', $penyuluh->status) == 'Nonaktif' ? 'selected' : '' }}
                        >
                            Nonaktif
                        </option>

                    </select>

                    @error('status')
                        <span class="error-text">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


            </div>


            <div class="form-actions">

                <a
                    href="{{ route('penyuluh.index') }}"
                    class="btn-cancel"
                >

                    <i data-lucide="arrow-left"></i>

                    Batal

                </a>


                <button
                    type="submit"
                    class="btn-save"
                >

                    <i data-lucide="save"></i>

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>


<script>

document.addEventListener(
    'DOMContentLoaded',
    function(){

        if(typeof lucide !== 'undefined'){
            lucide.createIcons();
        }

    }
);

</script>

@endsection