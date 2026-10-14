<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyuluh;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PenyuluhController extends Controller
{
    /**
     * =====================================================
     * DAFTAR PENYULUH
     * =====================================================
     */
    public function index()
    {
        $penyuluh = Penyuluh::latest()->get();

        // Ambil akun users berdasarkan email penyuluh
        $users = User::whereIn(
            'email',
            $penyuluh->pluck('email')
        )
        ->get()
        ->keyBy('email');

        return view(
            'penyuluh.index',
            compact('penyuluh', 'users')
        );
    }


    /**
     * =====================================================
     * FORM TAMBAH PENYULUH
     * =====================================================
     */
    public function create()
    {
        return view('penyuluh.create');
    }


    /**
     * =====================================================
     * SIMPAN PENYULUH + AKUN LOGIN
     * =====================================================
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:penyuluhs,email',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed',
            ],

            'no_hp' => 'required|string|max:20',

            'jabatan' => 'required|string|max:255',

            'instansi' => 'required|string|max:255',

            'status' => 'required|in:Aktif,Pending,Nonaktif',
        ], [
            'nama.required' =>
                'Nama wajib diisi.',

            'email.required' =>
                'Email wajib diisi.',

            'email.email' =>
                'Format email tidak valid.',

            'email.unique' =>
                'Email sudah digunakan.',

            'password.required' =>
                'Password wajib diisi.',

            'password.min' =>
                'Password minimal 6 karakter.',

            'password.confirmed' =>
                'Konfirmasi password tidak sesuai.',

            'no_hp.required' =>
                'Nomor handphone wajib diisi.',

            'jabatan.required' =>
                'Jabatan wajib diisi.',

            'instansi.required' =>
                'Instansi wajib diisi.',

            'status.required' =>
                'Status wajib dipilih.',

            'status.in' =>
                'Status tidak valid.',
        ]);


        DB::transaction(function () use ($request) {

            $email = strtolower(
                trim($request->email)
            );


            /**
             * =================================================
             * 1. BUAT DATA PENYULUH
             * =================================================
             */

            Penyuluh::create([
                'nama' => $request->nama,

                'email' => $email,

                'no_hp' => $request->no_hp,

                'jabatan' => $request->jabatan,

                'instansi' => $request->instansi,

                'status' => $request->status,
            ]);


            /**
             * =================================================
             * 2. BUAT AKUN LOGIN
             * =================================================
             */

            User::create([
                'name' => $request->nama,

                'email' => $email,

                'password' => Hash::make(
                    $request->password
                ),
            ]);
        });


        return redirect()
            ->route('penyuluh.index')
            ->with(
                'success',
                'Data penyuluh dan akun login berhasil dibuat.'
            );
    }


    /**
     * =====================================================
     * FORM EDIT PENYULUH
     * =====================================================
     */
    public function edit($id)
    {
        $penyuluh = Penyuluh::findOrFail($id);

        $user = User::where(
            'email',
            strtolower(
                trim($penyuluh->email)
            )
        )->first();

        return view(
            'penyuluh.edit',
            compact(
                'penyuluh',
                'user'
            )
        );
    }


    /**
     * =====================================================
     * UPDATE PENYULUH + AKUN LOGIN
     * =====================================================
     */
    public function update(
        Request $request,
        $id
    ) {
        $penyuluh = Penyuluh::findOrFail($id);

        $emailLama = strtolower(
            trim($penyuluh->email)
        );


        $user = User::where(
            'email',
            $emailLama
        )->first();


        $request->validate([
            'nama' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:penyuluhs,email,' . $id,
                'unique:users,email,' .
                    ($user ? $user->id : 'NULL'),
            ],

            'password' => [
                'nullable',
                'string',
                'min:6',
                'confirmed',
            ],

            'no_hp' => 'required|string|max:20',

            'jabatan' => 'required|string|max:255',

            'instansi' => 'required|string|max:255',

            'status' => 'required|in:Aktif,Pending,Nonaktif',
        ], [
            'nama.required' =>
                'Nama wajib diisi.',

            'email.required' =>
                'Email wajib diisi.',

            'email.email' =>
                'Format email tidak valid.',

            'email.unique' =>
                'Email sudah digunakan.',

            'password.min' =>
                'Password minimal 6 karakter.',

            'password.confirmed' =>
                'Konfirmasi password tidak sesuai.',

            'no_hp.required' =>
                'Nomor handphone wajib diisi.',

            'jabatan.required' =>
                'Jabatan wajib diisi.',

            'instansi.required' =>
                'Instansi wajib diisi.',

            'status.required' =>
                'Status wajib dipilih.',

            'status.in' =>
                'Status tidak valid.',
        ]);


        DB::transaction(function () use (
            $request,
            $penyuluh,
            $user
        ) {

            $emailBaru = strtolower(
                trim($request->email)
            );


            /**
             * =================================================
             * 1. UPDATE DATA PENYULUH
             * =================================================
             */

            $penyuluh->update([
                'nama' => $request->nama,

                'email' => $emailBaru,

                'no_hp' => $request->no_hp,

                'jabatan' => $request->jabatan,

                'instansi' => $request->instansi,

                'status' => $request->status,
            ]);


            /**
             * =================================================
             * 2. UPDATE AKUN USER
             * =================================================
             */

            if ($user) {

                $dataUser = [
                    'name' => $request->nama,

                    'email' => $emailBaru,
                ];


                /**
                 * Kalau password diisi,
                 * password ikut diperbarui.
                 */

                if (
                    $request->filled('password')
                ) {

                    $dataUser['password'] =
                        Hash::make(
                            $request->password
                        );
                }


                $user->update(
                    $dataUser
                );
            }


            /**
             * =================================================
             * 3. JIKA AKUN BELUM ADA
             * =================================================
             *
             * Misalnya data penyuluh lama belum
             * mempunyai akun users.
             */

            else {

                User::create([
                    'name' =>
                        $request->nama,

                    'email' =>
                        $emailBaru,

                    'password' =>
                        Hash::make(
                            $request->password
                                ?: '12345678'
                        ),
                ]);
            }
        });


        return redirect()
            ->route('penyuluh.index')
            ->with(
                'success',
                'Data penyuluh dan akun login berhasil diperbarui.'
            );
    }


    /**
     * =====================================================
     * HAPUS PENYULUH + AKUN LOGIN
     * =====================================================
     */
    public function destroy($id)
    {
        $penyuluh =
            Penyuluh::findOrFail($id);


        $email =
            strtolower(
                trim($penyuluh->email)
            );


        DB::transaction(function () use (
            $penyuluh,
            $email
        ) {

            /**
             * Hapus akun login
             */

            User::where(
                'email',
                $email
            )->delete();


            /**
             * Hapus data penyuluh
             */

            $penyuluh->delete();
        });


        return redirect()
            ->route('penyuluh.index')
            ->with(
                'success',
                'Data penyuluh dan akun login berhasil dihapus.'
            );
    }
}