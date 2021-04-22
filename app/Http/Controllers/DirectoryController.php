<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the directory.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = $request->type ?? 'tentang_peraturan';
        $directoryQuery = Directory::query();
        $directoryQuery->where($search, 'like', '%'.$request->get('q').'%');
        $directoryQuery->orderBy('jenis_peraturan');
        $directories = $directoryQuery->paginate(25);

        return view('directories.index', compact('directories'));
    }

    /**
     * Show the form for creating a new directory.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Directory);

        $jenis = Directory::select('jenis_peraturan')->distinct()->get() ?? [];

        return view('directories.create', compact('jenis'));
    }

    /**
     * Store a newly created directory in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Directory);

        $newDirectory = $request->validate([
            'jenis_peraturan' => 'required|max:60',
            'nomor_peraturan' => 'nullable|max:255',
            'tentang_peraturan' => 'nullable|max:255',
            'tahun_peraturan' => 'nullable|max:255'
        ]);

        if ($request->hasFile('file_peraturan')) {
            $filename = preg_replace("/[^a-zA-Z0-9]/", "", $request->nomor_peraturan) . '_' . time() . '.' . $request->file('file_peraturan')->extension();
            $newDirectory['file_peraturan'] = $request->file('file_peraturan')->storeAs('file_peraturan', $filename, 'public');
        }

        $newDirectory['creator_id'] = auth()->id();

        $directory = Directory::create($newDirectory);

        return redirect()->route('directories.show', $directory);
    }

    /**
     * Display the specified directory.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\View\View
     */
    public function show(Directory $directory)
    {
        return view('directories.show', compact('directory'));
    }

    /**
     * Show the form for editing the specified directory.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\View\View
     */
    public function edit(Directory $directory)
    {
        $this->authorize('update', $directory);

        return view('directories.edit', compact('directory'));
    }

    /**
     * Update the specified directory in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Directory $directory)
    {
        $this->authorize('update', $directory);

        $directoryData = $request->validate([
            'title'       => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $directory->update($directoryData);

        return redirect()->route('directories.show', $directory);
    }

    /**
     * Remove the specified directory from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Directory $directory)
    {
        $this->authorize('delete', $directory);

        $request->validate(['directory_id' => 'required']);

        if ($request->get('directory_id') == $directory->id && $directory->delete()) {
            return redirect()->route('directories.index');
        }

        return back();
    }
}
