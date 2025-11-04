<?php

namespace App\Http\Controllers;

use Log;

use App\Models\Project;
use App\Mail\ContactMail;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $totalProjects = Project::count();
            $totalCertificates = Certificate::count();

            return view('Admin.index', compact( 'totalProjects', 'totalCertificates'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        try {
            Mail::to('adlyramdhani@gmail.com')->send(new ContactMail($data));

            return back()->with('success', 'Pesan Anda berhasil dikirim!');
        } catch (\Exception $e) {
            Log::error('Contact form email error: ' . $e->getMessage());
            return back()->with('error', 'Gagal mengirim pesan. Silakan coba beberapa saat lagi.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
