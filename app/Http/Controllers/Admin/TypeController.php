<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// models
use App\Models\Type;



class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:64',

        ]);
        $data['slug'] = str()->slug($data['name']);
        $type = Type::create($data);


        return redirect()->route('admin.types.show', ['type' => $type->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type = Type::findOrFail($id);
        return view('admin.types.show', compact('types'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type = Type::findOrFail($id);
        return view('admin.types.edit', compact('types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|max:64',

        ]);
        $data['slug'] = str()->slug($data['name']);
        $type = Type::findOrFail($id);
        $type = Type::update($data);


        return redirect()->route('admin.types.show', ['type' => $type->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Type::findOrFail($id);
        $type->delete();
        return redirect()->route('admin.types.index');
    }
}
