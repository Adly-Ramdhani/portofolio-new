<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Project;
use App\Models\Certificate;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $certificates = Certificate::latest('id')->get();
            $projects = Project::latest('id')->get();

            return view('dashboard', compact('certificates', 'projects'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function show($id)
    {
        try {
            $projects = Project::findOrFail($id);
            return view('user.show', compact('projects'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
