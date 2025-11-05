<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::latest()->get(); // ambil semua sertifikat terbaru
        return view('Admin.sertifikat', compact('certificates'));
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

        // Upload ke Cloudinary
        $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), [
            'folder' => 'certificates'
        ])->getSecurePath();

        // Simpan ke database
        Certificate::create([
            'title' => $request->title,
            'image' => $uploadedFileUrl,
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
        if ($certificate->image) {
            Storage::disk('public')->delete($certificate->image);
        }
        $certificate->delete();

        return redirect()->route('admin.sertifikat')->with('success', 'Sertifikat berhasil dihapus!');
    }

}