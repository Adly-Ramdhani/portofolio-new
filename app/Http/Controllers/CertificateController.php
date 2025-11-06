<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Container\Attributes\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::latest()->get(); // ambil semua sertifikat terbaru
        return view('admin.sertifikat', compact('certificates'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // ✅ Upload file ke folder Cloudinary
        $upload = (new UploadApi())->upload(
            $request->file('image')->getRealPath(),
            ['folder' => 'portfolio_certificates']
        );

        // ✅ Ambil URL aman
        $imageUrl = $upload['secure_url'];

        // Simpan ke database
        Certificate::create([
            'title' => $request->title,
            'image' => $imageUrl,
        ]);

        return back()->with('success', 'Sertifikat berhasil diupload!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        try {
            if ($certificate->image) {
                // 🔍 Ambil public_id dari URL Cloudinary
                // Contoh URL:
                // https://res.cloudinary.com/dgg5rpo0j/image/upload/v1734567890/portfolio_certificates/abcd1234.jpg
                $urlPath = parse_url($certificate->image, PHP_URL_PATH);
                $filename = pathinfo($urlPath, PATHINFO_FILENAME); // abcd1234
                $publicId = 'portfolio_certificates/' . $filename;

                // 🗑️ Hapus dari Cloudinary
                (new UploadApi())->destroy($publicId);
            }

            // 🗃️ Hapus data dari database
            $certificate->delete();

            return redirect()->route('admin.sertifikat')
                ->with('success', 'Sertifikat berhasil dihapus!');
        } catch (\Exception $e) {
            \Log::error('Gagal menghapus sertifikat: ' . $e->getMessage());
            return redirect()->route('admin.sertifikat')
                ->with('error', 'Terjadi kesalahan saat menghapus sertifikat.');
        }
    }


}