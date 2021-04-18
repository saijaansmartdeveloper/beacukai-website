<?php

namespace App\Http\Controllers;

use App\Models\Direktori;
use Illuminate\Http\Request;

class DirektoriController extends Controller
{
    /**
     * Display a listing of the direktori.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $direktoriQuery = Direktori::query();
        $direktoriQuery->where('title', 'like', '%'.$request->get('q').'%');
        $direktoriQuery->orderBy('title');
        $direktoris = $direktoriQuery->paginate(25);

        return view('direktoris.index', compact('direktoris'));
    }

    /**
     * Show the form for creating a new direktori.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Direktori);

        return view('direktoris.create');
    }

    /**
     * Store a newly created direktori in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Direktori);

        $newDirektori = $request->validate([
            'title'       => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newDirektori['creator_id'] = auth()->id();

        $direktori = Direktori::create($newDirektori);

        return redirect()->route('direktoris.show', $direktori);
    }

    /**
     * Display the specified direktori.
     *
     * @param  \App\Models\Direktori  $direktori
     * @return \Illuminate\View\View
     */
    public function show(Direktori $direktori)
    {
        return view('direktoris.show', compact('direktori'));
    }

    /**
     * Show the form for editing the specified direktori.
     *
     * @param  \App\Models\Direktori  $direktori
     * @return \Illuminate\View\View
     */
    public function edit(Direktori $direktori)
    {
        $this->authorize('update', $direktori);

        return view('direktoris.edit', compact('direktori'));
    }

    /**
     * Update the specified direktori in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Direktori  $direktori
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Direktori $direktori)
    {
        $this->authorize('update', $direktori);

        $direktoriData = $request->validate([
            'title'       => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $direktori->update($direktoriData);

        return redirect()->route('direktoris.show', $direktori);
    }

    /**
     * Remove the specified direktori from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Direktori  $direktori
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Direktori $direktori)
    {
        $this->authorize('delete', $direktori);

        $request->validate(['direktori_id' => 'required']);

        if ($request->get('direktori_id') == $direktori->id && $direktori->delete()) {
            return redirect()->route('direktoris.index');
        }

        return back();
    }
}
