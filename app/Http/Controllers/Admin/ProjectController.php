<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\{
    Type,
    Project,
};

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:64',
            'price' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
            'type_id' => 'nullable|exists:types,id',
        ]);

        $data['slug'] = str()->slug($data['title']);
        $project = Project::create($data);

        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }



    /**
     * Display the specified resource.
     */
    public function show(project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|max:64',
            'price' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
            'type_id' => 'nullable|exists:types,id',
        ]);

        $data['slug'] = str()->slug($data['title']);
        $project->update($data);

        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
