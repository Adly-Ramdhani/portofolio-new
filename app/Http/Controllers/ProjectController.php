<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Certificate;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $projects = Project::latest()->get();
            $totalProjects = Project::count();
            $totalCertificates = Certificate::count();

            return view('admin.projects.index', compact('projects', 'totalProjects', 'totalCertificates'));
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
        try {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tech_stack' => 'nullable|array',
            'key_features' => 'nullable|array',
            'github_link'  => 'nullable|url',
        ]);

        $path = $request->hasFile('image')
            ? $request->file('image')->store('projects', 'public')
            : null;

        Project::create([
            'title' => $request->title,
            'role' => $request->role,
            'description' => $request->description,
            'image' => $path,
            'tech_stack' => $request->tech_stack,
            'key_features' => $request->key_features,
            'github_link' => $request->github_link
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menambahkan project.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('user.show', compact('project'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $project = Project::findOrFail($id);
            return view('admin.projects.edit', compact('project'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $project = Project::findOrFail($id);

            $request->validate([
                'title' => 'required|string|max:255',
                'role' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'tech_stack' => 'nullable|array',
                'key_features' => 'nullable|array',
                'github_link'  => 'nullable|url',
            ]);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('projects', 'public');
                $project->image = $path;
            }

            $project->title = $request->title;
            $project->role = $request->role;
            $project->description = $request->description;
            $project->tech_stack = $request->tech_stack;
            $project->key_features = $request->key_features;
            $project->github_link = $request->github_link;
            $project->save();

            return redirect()->route('admin.projek')->with('success', 'Projek berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui projek: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
      try {
            $project->delete();
            return to_route('admin.projek')->with('success', 'Projek berhasil dihapus.');
        } catch (\Exception $e) {
            return to_route('admin.projek')->with('error', 'Gagal menghapus projek: ' . $e->getMessage());
        }

    }
}
