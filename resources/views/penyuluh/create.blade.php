@extends('layouts.sidebar')

@section('content')

<style>

/* =====================================================
   CONTAINER
===================================================== */

.create-container {
    padding: 28px;
    background: #f4f5f9;
    min-height: 100vh;
}


/* =====================================================
   HEADER
===================================================== */

.create-header {
    max-width: 900px;
    margin: 0 auto 24px auto;
}

.create-header h1 {
    font-size: 32px;
    font-weight: 700;
    color: #13234a;
    margin: 0 0 5px 0;
}

.create-header p {
    color: #6b7280;
    font-size: 14px;
    margin: 0;
}


/* =====================================================
   FORM CARD
===================================================== */

.form-card {
    background: #fff;
    border-radius: 20px;
    padding: 28px;
    border: 1px solid #ececf2;
    box-shadow: 0 8px 24px rgba(0, 0, 0, .05);

    /* Membuat card berada di tengah */
    max-width: 900px;
    width: 100%;
    margin: 0 auto;
}

.form-section-title {
    font-size: 18px;
    font-weight: 700;
    color: #13234a;
    margin-bottom: 20px;
}


/* =====================================================
   FORM GRID
===================================================== */

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
}


/* =====================================================
   FORM GROUP
===================================================== */

.form-group {
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.form-group.full {
    grid-column: 1 / -1;
}

.form-group label {
    font-size: 13px;
    font-weight: 600;
    color: #374151;
}

.required {
    color: #dc2626;
}


/* =====================================================
   INPUT & SELECT
===================================================== */

.form-group input,
.form-group select {
    width: 100%;
    height: 44px;
    border: 1px solid #dcdfe7;
    border-radius: 10px;
    padding: 0 13px;
    font-size: 13px;
    outline: none;
    background: #fff;
    color: #374151;
    transition: .2s;
}

.form-group input::placeholder {
    color: #9ca3af;
}

.form-group input:focus,
.form-group select:focus {
    border-color: #5B6CFF;
    box-shadow: 0 0 0 3px rgba(91, 108, 255, .1);
}


/* =====================================================
   INPUT ERROR
===================================================== */

.input-error {
    border-color: #ef4444 !important;
    background: #fffafa !important;
}

.error-text {
    color: #dc2626;
    font-size: 11px;
    margin-top: 1px;
}


/* =====================================================
   ERROR BOX
===================================================== */

.form-error-box {
    background: #fef2f2;
    border: 1px solid #fecaca;
    color: #b91c1c;
    border-radius: 10px;
    padding: 12px 14px;
    margin-bottom: 18px;
    font-size: 12px;
    line-height: 1.5;
}

.form-error-box strong {
    display: block;
    margin-bottom: 3px;
}


/* =====================================================
   INFO BOX
===================================================== */

.info-box {
    grid-column: 1 / -1;
    background: #eef2ff;
    border: 1px solid #dbe3ff;
    color: #374151;
    padding: 14px 16px;
    border-radius: 10px;
    font-size: 12px;
    line-height: 1.6;
}

.info-title {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #29356f;
    font-weight: 700;
    margin-bottom: 4px;
}

.info-title i {
    width: 17px;
    height: 17px;
}


/* =====================================================
   PASSWORD WRAPPER
===================================================== */

.password-wrapper {
    position: relative;
    width: 100%;
}

.password-wrapper input {
    padding-right: 45px;
}

.toggle-password {
    position: absolute;
    right: 8px;
    top: 50%;
    transform: translateY(-50%);

    width: 32px;
    height: 32px;

    border: none;
    background: transparent;

    display: flex;
    align-items: center;
    justify-content: center;

    cursor: pointer;
    color: #6b7280;

    border-radius: 7px;
    transition: .2s;
}

.toggle-password:hover {
    background: #f1f3f7;
    color: #13234a;
}

.toggle-password i {
    width: 17px;
    height: 17px;
}


/* =====================================================
   PASSWORD INFO
===================================================== */

.password-info {
    font-size: 10px;
    color: #9ca3af;
    margin-top: 1px;
}


/* =====================================================
   STATUS INFO
===================================================== */

.status-info {
    grid-column: 1 / -1;
    background: #f8fafc;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    padding: 13px 15px;
    font-size: 11px;
    color: #6b7280;
    line-height: 1.5;
}


/* =====================================================
   FORM ACTIONS
===================================================== */

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;

    margin-top: 25px;
    padding-top: 20px;

    border-top: 1px solid #ececf2;
}


/* =====================================================
   BUTTON
===================================================== */

.btn-cancel,
.btn-save {
    height: 42px;
    padding: 0 18px;

    border-radius: 10px;

    text-decoration: none;

    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    font-size: 13px;
    font-weight: 600;

    cursor: pointer;

    transition: .2s;
}


/* BATAL */

.btn-cancel {
    background: #eef0f5;
    color: #374151;
    border: none;
}

.btn-cancel:hover {
    background: #e2e5ec;
    color: #13234a;
}


/* SIMPAN */

.btn-save {
    border: none;
    background: #081b44;
    color: #fff;

    box-shadow: 0 4px 10px rgba(8, 27, 68, .15);
}

.btn-save:hover {
    background: #061532;
    transform: translateY(-1px);
}

.btn-cancel i,
.btn-save i {
    width: 16px;
    height: 16px;
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media (max-width: 700px) {

    .create-container {
        padding: 20px;
    }

    .create-header h1 {
        font-size: 27px;
    }

    .form-card {
        padding: 20px;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .form-group.full,
    .info-box,
    .status-info {
        grid-column: auto;
    }

    .form-actions {
        flex-direction: column;
    }

    .btn-cancel,
    .btn-save {
        width: 100%;
    }
}

</style>
    <div class="create-header">

        <h1>
            Tambah Penyuluh
        </h1>

        <p>
            Tambahkan data penyuluh sekaligus akun untuk login ke sistem EduKum.
        </p>

    </div>


    <!-- =================================================
         FORM CARD
    ================================================= -->

    <div class="form-card">

        <div class="form-section-title">
            Data Penyuluh
        </div>


        <!-- =================================================
             ERROR UMUM
        ================================================= -->

        @if ($errors->any())

            <div class="form-error-box">

                <strong>
                    Data belum dapat disimpan.
                </strong>

                Silakan periksa kembali data yang Anda masukkan.

            </div>

        @endif

        <form
            action="{{ route('penyuluh.store') }}"
            method="POST"
        >

            @csrf

            <div class="form-grid">
                        
            <div class="info-box">
                <div class="info-title">
                    <i data-lucide="info"></i>
                    <span>Informasi Login</span>
                </div>
                Gunakan email dan password atau akun Google untuk login.
            </div>

                <div class="form-group">

                    <label>
                        Nama Penyuluh
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama') }}"
                        placeholder="Masukkan nama penyuluh"
                        class="@error('nama') input-error @enderror"
                    >

                    @error('nama')

                        <span class="error-text">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <!-- =================================================
                     EMAIL
                ================================================= -->

                <div class="form-group">

                    <label>
                        Email Login
                        <span class="required">*</span>
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="contoh@email.com"
                        class="@error('email') input-error @enderror"
                    >

                    @error('email')

                        <span class="error-text">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <!-- =================================================
                     PASSWORD
                ================================================= -->

                <div class="form-group">

                    <label>
                        Password Login
                        <span class="required">*</span>
                    </label>

                    <div class="password-wrapper">

                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Minimal 6 karakter"
                            class="@error('password') input-error @enderror"
                        >

                        <button
                            type="button"
                            class="toggle-password"
                            onclick="togglePassword('password', 'eyePassword')"
                            title="Lihat password"
                        >

                            <i
                                data-lucide="eye"
                                id="eyePassword"
                            ></i>

                        </button>

                    </div>

                    <span class="password-info">
                        Password ini akan digunakan untuk login dengan email.
                    </span>

                    @error('password')

                        <span class="error-text">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <!-- =================================================
                     KONFIRMASI PASSWORD
                ================================================= -->

                <div class="form-group">

                    <label>
                        Konfirmasi Password
                        <span class="required">*</span>
                    </label>

                    <div class="password-wrapper">

                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            placeholder="Ulangi password"
                        >

                        <button
                            type="button"
                            class="toggle-password"
                            onclick="togglePassword('password_confirmation', 'eyeConfirmation')"
                            title="Lihat password"
                        >

                            <i
                                data-lucide="eye"
                                id="eyeConfirmation"
                            ></i>

                        </button>

                    </div>

                    <span class="password-info">
                        Masukkan password yang sama.
                    </span>

                </div>


                <!-- =================================================
                     NO HP
                ================================================= -->

                <div class="form-group">

                    <label>
                        Nomor Handphone
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        value="{{ old('no_hp') }}"
                        placeholder="08xxxxxxxxxx"
                        class="@error('no_hp') input-error @enderror"
                    >

                    @error('no_hp')

                        <span class="error-text">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <!-- =================================================
                     JABATAN
                ================================================= -->

                <div class="form-group">

                    <label>
                        Jabatan
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="jabatan"
                        value="{{ old('jabatan') }}"
                        placeholder="Masukkan jabatan"
                        class="@error('jabatan') input-error @enderror"
                    >

                    @error('jabatan')

                        <span class="error-text">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <!-- =================================================
                     INSTANSI
                ================================================= -->

                <div class="form-group">

                    <label>
                        Instansi
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="instansi"
                        value="{{ old('instansi') }}"
                        placeholder="Masukkan instansi"
                        class="@error('instansi') input-error @enderror"
                    >

                    @error('instansi')

                        <span class="error-text">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <!-- =================================================
                     STATUS
                ================================================= -->

                <div class="form-group">

                    <label>
                        Status Akses
                        <span class="required">*</span>
                    </label>

                    <select
                        name="status"
                        class="@error('status') input-error @enderror"
                    >

                        <option value="">
                            Pilih Status
                        </option>

                        <option
                            value="Aktif"
                            {{ old('status') == 'Aktif' ? 'selected' : '' }}
                        >
                            Aktif
                        </option>

                        <option
                            value="Pending"
                            {{ old('status') == 'Pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="Nonaktif"
                            {{ old('status') == 'Nonaktif' ? 'selected' : '' }}
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


                <!-- =================================================
                     STATUS INFO
                ================================================= -->

                <div class="status-info">

                    <strong>
                        Status akses:
                    </strong>

                    <br>

                    <b>Aktif</b> =
                    penyuluh dapat login ke sistem.

                    <br>

                    <b>Pending</b> =
                    akun belum dapat digunakan sampai disetujui admin.

                    <br>

                    <b>Nonaktif</b> =
                    akses penyuluh dinonaktifkan oleh admin.

                </div>


            </div>


            <!-- =================================================
                 ACTION
            ================================================= -->

            <div class="form-actions">


                <!-- BATAL -->

                <a
                    href="{{ route('penyuluh.index') }}"
                    class="btn-cancel"
                >

                    <i data-lucide="arrow-left"></i>

                    Batal

                </a>


                <!-- SIMPAN -->

                <button
                    type="submit"
                    class="btn-save"
                >

                    <i data-lucide="save"></i>

                    Simpan Penyuluh

                </button>


            </div>


        </form>

    </div>

</div>


<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

});


/* =====================================================
   TOGGLE PASSWORD
===================================================== */

function togglePassword(inputId, iconId) {

    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (!input || !icon) {
        return;
    }

    if (input.type === 'password') {

        input.type = 'text';

        icon.setAttribute('data-lucide', 'eye-off');

    } else {

        input.type = 'password';

        icon.setAttribute('data-lucide', 'eye');

    }

    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

}

</script>

@endsection