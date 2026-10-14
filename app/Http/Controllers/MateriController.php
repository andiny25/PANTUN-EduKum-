<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Kategori;
use App\Models\PaketPenyuluhan;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    /* =====================================================
       LIST
    ===================================================== */

    public function index()
    {
        $materi = Materi::with('kategori')
            ->latest()
            ->get();

        return view('materi.index', compact('materi'));
    }


    /* =====================================================
       CREATE
    ===================================================== */

    public function create()
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();

        return view('materi.create', compact('kategoris'));
    }


    /* =====================================================
       STORE
    ===================================================== */

    public function store(Request $request)
    {
        $request->validate([

            'judul' => 'required|string|max:255',

            'kategori_id' => 'required|exists:kategoris,id',

            'penulis' => 'nullable|string|max:255',

            'deskripsi' => 'nullable|string',

            'status' => 'required|string|max:50',

            'file' => [
                'required',
                'file',
                'mimes:pdf,ppt,pptx,jpg,jpeg,png,webp,jfif,mp4,avi,mov,mkv,webm'
            ],

        ]);


        /* =================================================
           SIMPAN FILE
        ================================================= */

        $file = $request->file('file');

        $extension = strtolower(
            $file->getClientOriginalExtension()
        );


        /* =================================================
           TENTUKAN TIPE
        ================================================= */

        $tipe = $this->getTipeFile($extension);


        /* =================================================
           SIMPAN FILE ASLI
        ================================================= */

        $fileName = $file->store(
            'materi',
            'public'
        );


        /* =================================================
           SIMPAN DATA MATERI
        ================================================= */

        $materi = Materi::create([

            'judul' => $request->judul,

            'kategori_id' => $request->kategori_id,

            'tipe' => $tipe,

            'penulis' => $request->penulis,

            'deskripsi' => $request->deskripsi,

            'status' => $request->status,

            'file' => $fileName,

        ]);


        /* =================================================
           BUAT PREVIEW MATERI
        ================================================= */

        $this->generateMaterialPreview(
            $materi
        );


        /* =================================================
           CARI / BUAT PAKET
        ================================================= */

        $paket = PaketPenyuluhan::firstOrCreate([

            'kategori_id' => $materi->kategori_id

        ]);


        /* =================================================
           BUAT COVER PAKET
        ================================================= */

        if (
            !$paket->thumbnail
        ) {

            $preview = $this->getMaterialPreview(
                $materi
            );

            if ($preview) {

                $paket->update([
                    'thumbnail' => $preview
                ]);

            }
        }


        return redirect('/materi')
            ->with(
                'success',
                'Materi berhasil ditambahkan.'
            );
    }


    /* =====================================================
       EDIT
    ===================================================== */

    public function edit($id)
    {
        $materi = Materi::findOrFail($id);

        $kategoris = Kategori::orderBy(
            'nama_kategori'
        )->get();

        return view(
            'materi.edit',
            compact(
                'materi',
                'kategoris'
            )
        );
    }


    /* =====================================================
       UPDATE
    ===================================================== */

    public function update(
        Request $request,
        $id
    ) {

        $request->validate([

            'judul' => 'required|string|max:255',

            'kategori_id' => 'required|exists:kategoris,id',

            'penulis' => 'nullable|string|max:255',

            'deskripsi' => 'nullable|string',

            'status' => 'required|string|max:50',

            'file' => [
                'nullable',
                'file',
                'mimes:pdf,ppt,pptx,jpg,jpeg,png,webp,jfif,mp4,avi,mov,mkv,webm'
            ],

        ]);


        $materi = Materi::findOrFail($id);


        /* =================================================
           FILE LAMA
        ================================================= */

        $fileName = $materi->file;

        $tipe = $materi->tipe;


        /* =================================================
           JIKA UPLOAD FILE BARU
        ================================================= */

        if ($request->hasFile('file')) {

            /*
             * Hapus file asli lama
             */

            if (
                $materi->file &&
                Storage::disk('public')->exists(
                    $materi->file
                )
            ) {

                Storage::disk('public')->delete(
                    $materi->file
                );
            }


            /*
             * Hapus preview lama
             */

            $this->deleteMaterialPreview(
                $materi->id
            );


            /*
             * File baru
             */

            $file = $request->file('file');

            $extension = strtolower(
                $file->getClientOriginalExtension()
            );


            /*
             * Tipe baru
             */

            $tipe = $this->getTipeFile(
                $extension
            );


            /*
             * Simpan file
             */

            $fileName = $file->store(
                'materi',
                'public'
            );
        }


        /* =================================================
           UPDATE DATA
        ================================================= */

        $materi->update([

            'judul' => $request->judul,

            'kategori_id' => $request->kategori_id,

            'tipe' => $tipe,

            'penulis' => $request->penulis,

            'deskripsi' => $request->deskripsi,

            'status' => $request->status,

            'file' => $fileName,

        ]);


        /* =================================================
           BUAT PREVIEW BARU
        ================================================= */

        if ($request->hasFile('file')) {

            $this->generateMaterialPreview(
                $materi
            );
        }


        /* =================================================
           CARI / BUAT PAKET
        ================================================= */

        $paket = PaketPenyuluhan::firstOrCreate([

            'kategori_id' => $materi->kategori_id

        ]);


        /* =================================================
           JIKA PAKET BELUM PUNYA COVER
        ================================================= */

        if (!$paket->thumbnail) {

            $preview = $this->getMaterialPreview(
                $materi
            );

            if ($preview) {

                $paket->update([
                    'thumbnail' => $preview
                ]);

            }
        }


        return redirect('/materi')
            ->with(
                'success',
                'Materi berhasil diupdate.'
            );
    }


    /* =====================================================
       DELETE
    ===================================================== */

    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);


        /*
         * Hapus file asli
         */

        if (
            $materi->file &&
            Storage::disk('public')->exists(
                $materi->file
            )
        ) {

            Storage::disk('public')->delete(
                $materi->file
            );
        }


        /*
         * Hapus preview
         */

        $this->deleteMaterialPreview(
            $materi->id
        );


        /*
         * Hapus data
         */

        $materi->delete();


        return redirect('/materi')
            ->with(
                'success',
                'Materi berhasil dihapus.'
            );
    }


    /* =====================================================
       TIPE FILE
    ===================================================== */

    private function getTipeFile(
        $extension
    ) {

        $extension = strtolower(
            $extension
        );


        if ($extension === 'pdf') {

            return 'PDF';
        }


        if (
            in_array(
                $extension,
                ['ppt', 'pptx']
            )
        ) {

            return 'PPT';
        }


        if (
            in_array(
                $extension,
                ['jpg', 'jpeg', 'jfif']
            )
        ) {

            return 'JPG';
        }


        if ($extension === 'png') {

            return 'PNG';
        }


        if ($extension === 'webp') {

            return 'Gambar';
        }


        if (
            in_array(
                $extension,
                [
                    'mp4',
                    'avi',
                    'mov',
                    'mkv',
                    'webm'
                ]
            )
        ) {

            return 'Video';
        }


        return 'File';
    }


    /* =====================================================
       GENERATE PREVIEW MATERI
    ===================================================== */

    private function generateMaterialPreview(
        $materi
    ) {

        if (
            !$materi->file
        ) {

            return null;
        }


        $fullPath = storage_path(
            'app/public/' .
            $materi->file
        );


        if (
            !file_exists($fullPath)
        ) {

            return null;
        }


        $extension = strtolower(
            pathinfo(
                $fullPath,
                PATHINFO_EXTENSION
            )
        );


        /*
         * Folder preview
         */

        $previewFolder =
            storage_path(
                'app/public/materi_preview'
            );


        if (
            !is_dir($previewFolder)
        ) {

            mkdir(
                $previewFolder,
                0777,
                true
            );
        }


        /*
         * Nama preview berdasarkan ID materi
         */

        $previewName =
            'materi_' .
            $materi->id .
            '.jpg';


        $previewFullPath =
            $previewFolder .
            DIRECTORY_SEPARATOR .
            $previewName;


        /* =================================================
           GAMBAR
        ================================================= */

        if (
            in_array(
                $extension,
                [
                    'jpg',
                    'jpeg',
                    'jfif',
                    'png',
                    'webp'
                ]
            )
        ) {

            /*
             * Kalau Imagick tersedia
             */

            if (
                class_exists(
                    \Imagick::class
                )
            ) {

                try {

                    $image =
                        new \Imagick(
                            $fullPath
                        );

                    $image->setIteratorIndex(0);

                    $image->setImageFormat(
                        'jpg'
                    );

                    $image->thumbnailImage(
                        800,
                        500,
                        true
                    );

                    $image->writeImage(
                        $previewFullPath
                    );

                    $image->clear();

                    $image->destroy();


                    return 'materi_preview/' .
                        $previewName;

                } catch (\Exception $e) {

                    return null;
                }
            }


            /*
             * Jika tidak ada Imagick
             */

            copy(
                $fullPath,
                $previewFullPath
            );


            return 'materi_preview/' .
                $previewName;
        }


        /* =================================================
           PDF
        ================================================= */

        if (
            $extension === 'pdf'
        ) {

            return $this->generatePreviewFromPdf(
                $fullPath,
                $previewFullPath,
                $previewName
            );
        }


        /* =================================================
           POWERPOINT
        ================================================= */

        if (
            in_array(
                $extension,
                [
                    'ppt',
                    'pptx'
                ]
            )
        ) {

            return $this->generatePreviewFromPowerPoint(
                $fullPath,
                $previewFullPath,
                $previewName
            );
        }


        /* =================================================
           VIDEO
        ================================================= */

        if (
            in_array(
                $extension,
                [
                    'mp4',
                    'avi',
                    'mov',
                    'mkv',
                    'webm'
                ]
            )
        ) {

            return $this->generatePreviewFromVideo(
                $fullPath,
                $previewFullPath,
                $previewName
            );
        }


        return null;
    }


    /* =====================================================
       PDF → JPG
    ===================================================== */

    private function generatePreviewFromPdf(
        $fullPath,
        $previewFullPath,
        $previewName
    ) {

        /*
         * PDF membutuhkan Imagick
         */

        if (
            !class_exists(
                \Imagick::class
            )
        ) {

            return null;
        }


        try {

            $pdf = new \Imagick();


            /*
             * Resolusi
             */

            $pdf->setResolution(
                150,
                150
            );


            /*
             * AMBIL HALAMAN PERTAMA PDF
             */

            $pdf->readImage(
                $fullPath . '[0]'
            );


            /*
             * Pastikan hanya halaman pertama
             */

            $pdf->setIteratorIndex(0);


            /*
             * Convert menjadi JPG
             */

            $pdf->setImageFormat(
                'jpg'
            );


            /*
             * Ukuran preview
             */

            $pdf->thumbnailImage(
                1000,
                600,
                true
            );


            /*
             * Simpan
             */

            $pdf->writeImage(
                $previewFullPath
            );


            $pdf->clear();

            $pdf->destroy();


            /*
             * Pastikan file benar-benar ada
             */

            if (
                file_exists(
                    $previewFullPath
                )
            ) {

                return 'materi_preview/' .
                    $previewName;
            }

        } catch (\Exception $e) {

            return null;
        }


        return null;
    }


    /* =====================================================
       POWERPOINT → PDF → JPG
    ===================================================== */

    private function generatePreviewFromPowerPoint(
        $fullPath,
        $previewFullPath,
        $previewName
    ) {

        /*
         * Lokasi LibreOffice
         */

        $libreOfficePath =
            'C:\Program Files\LibreOffice\program\soffice.exe';


        /*
         * Cek LibreOffice
         */

        if (
            !file_exists(
                $libreOfficePath
            )
        ) {

            /*
             * Coba lokasi alternatif
             */

            $libreOfficePath =
                'C:\Program Files (x86)\LibreOffice\program\soffice.exe';
        }


        if (
            !file_exists(
                $libreOfficePath
            )
        ) {

            return null;
        }


        /*
         * Folder temporary
         */

        $tempFolder =
            storage_path(
                'app/public/ppt_temp'
            );


        if (
            !is_dir($tempFolder)
        ) {

            mkdir(
                $tempFolder,
                0777,
                true
            );
        }


        /*
         * Nama file dasar
         */

        $baseName =
            pathinfo(
                $fullPath,
                PATHINFO_FILENAME
            );


        /*
         * Convert PPT/PPTX ke PDF
         */

        $command =
            '"' .
            $libreOfficePath .
            '"' .
            ' --headless ' .
            '--convert-to pdf ' .
            escapeshellarg(
                $fullPath
            ) .
            ' --outdir ' .
            escapeshellarg(
                $tempFolder
            );


        shell_exec(
            $command
        );


        /*
         * Lokasi PDF hasil convert
         */

        $pdfPath =
            $tempFolder .
            DIRECTORY_SEPARATOR .
            $baseName .
            '.pdf';


        /*
         * Cek PDF
         */

        if (
            !file_exists(
                $pdfPath
            )
        ) {

            return null;
        }


        /*
         * Ambil halaman / slide pertama
         */

        $result =
            $this->generatePreviewFromPdf(
                $pdfPath,
                $previewFullPath,
                $previewName
            );


        /*
         * Hapus PDF temporary
         */

        if (
            file_exists(
                $pdfPath
            )
        ) {

            unlink(
                $pdfPath
            );
        }


        return $result;
    }


    /* =====================================================
       VIDEO → FRAME
    ===================================================== */

    private function generatePreviewFromVideo(
        $fullPath,
        $previewFullPath,
        $previewName
    ) {

        /*
         * Lokasi FFmpeg
         */

        $ffmpegPath =
            'C:\ffmpeg\bin\ffmpeg.exe';


        if (
            !file_exists(
                $ffmpegPath
            )
        ) {

            return null;
        }


        /*
         * Ambil frame detik pertama
         */

        $command =
            '"' .
            $ffmpegPath .
            '"' .
            ' -ss 00:00:01 ' .
            ' -i ' .
            escapeshellarg(
                $fullPath
            ) .
            ' -frames:v 1 ' .
            '-vf "scale=1000:-1" ' .
            escapeshellarg(
                $previewFullPath
            ) .
            ' -y';


        shell_exec(
            $command
        );


        if (
            file_exists(
                $previewFullPath
            )
        ) {

            return 'materi_preview/' .
                $previewName;
        }


        return null;
    }


    /* =====================================================
       GET PREVIEW
    ===================================================== */

    private function getMaterialPreview(
        $materi
    ) {

        $previewPath =
            storage_path(
                'app/public/materi_preview/materi_' .
                $materi->id .
                '.jpg'
            );


        if (
            file_exists(
                $previewPath
            )
        ) {

            return 'materi_preview/materi_' .
                $materi->id .
                '.jpg';
        }


        /*
         * Kalau preview belum ada,
         * coba generate ulang.
         */

        return $this->generateMaterialPreview(
            $materi
        );
    }


    /* =====================================================
       DELETE PREVIEW
    ===================================================== */

    private function deleteMaterialPreview(
        $materiId
    ) {

        $previewPath =
            'materi_preview/materi_' .
            $materiId .
            '.jpg';


        if (
            Storage::disk('public')->exists(
                $previewPath
            )
        ) {

            Storage::disk('public')->delete(
                $previewPath
            );
        }
    }
}