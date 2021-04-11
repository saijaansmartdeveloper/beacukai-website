<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the testimoni.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $testimoniQuery = Testimoni::query();
        $testimoniQuery->where('name_testimoni', 'like', '%'.$request->get('q').'%');
        $testimoniQuery->orderBy('created_at', 'desc');
        $testimonis = $testimoniQuery->paginate(25);

        return view('testimonis.index', compact('testimonis'));
    }

    /**
     * Show the form for creating a new testimoni.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Testimoni);

        return view('testimonis.create');
    }

    /**
     * Store a newly created testimoni in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Testimoni);

        $newTestimoni = $request->validate([
            'name_testimoni'        => 'required|max:60',
            'company_testimoni'     => 'nullable|max:255',
            'testimoni'             => 'required'
        ]);

        $newTestimoni['creator_id'] = auth()->id();

        $testimoni = Testimoni::create($newTestimoni);

        return redirect()->route('testimonis.show', $testimoni);
    }

    /**
     * Display the specified testimoni.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\View\View
     */
    public function show(Testimoni $testimoni)
    {
        return view('testimonis.show', compact('testimoni'));
    }

    /**
     * Show the form for editing the specified testimoni.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\View\View
     */
    public function edit(Testimoni $testimoni)
    {
        $this->authorize('update', $testimoni);

        return view('testimonis.edit', compact('testimoni'));
    }

    /**
     * Update the specified testimoni in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        $this->authorize('update', $testimoni);

        $testimoniData = $request->validate([
            'name_testimoni'        => 'required|max:60',
            'company_testimoni'     => 'nullable|max:255',
            'testimoni'             => 'required'
        ]);

        $testimoni->update($testimoniData);

        return redirect()->route('testimonis.show', $testimoni);
    }

    /**
     * Remove the specified testimoni from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Testimoni $testimoni)
    {
        $this->authorize('delete', $testimoni);

        $request->validate(['testimoni_id' => 'required']);

        if ($request->get('testimoni_id') == $testimoni->id && $testimoni->delete()) {
            return redirect()->route('testimonis.index');
        }

        return back();
    }
}
