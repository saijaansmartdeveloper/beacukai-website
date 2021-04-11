<?php

namespace App\Http\Controllers;

use App\Models\Siring;
use Illuminate\Http\Request;

class SiringController extends Controller
{
    /**
     * Display a listing of the siring.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $siringQuery = Siring::query();
        $siringQuery->where('name_siring', 'like', '%'.$request->get('q').'%');
        $siringQuery->orderBy('name_siring');
        $sirings = $siringQuery->paginate(25);

        return view('sirings.index', compact('sirings'));
    }

    /**
     * Show the form for creating a new siring.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Siring);

        return view('sirings.create');
    }

    /**
     * Store a newly created siring in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Siring);

        $newSiring = $request->validate([
            'name_siring'       => 'required|max:60',
            'description_siring' => 'nullable|max:255',
            'link_siring'   => 'nullable',
            'icon_siring'   => 'nullable',
            'is_priority'   => 'nullable'
        ]);

        $newSiring['creator_id'] = auth()->id();

        $siring = Siring::create($newSiring);

        return redirect()->route('sirings.show', $siring);
    }

    /**
     * Display the specified siring.
     *
     * @param  \App\Models\Siring  $siring
     * @return \Illuminate\View\View
     */
    public function show(Siring $siring)
    {
        return view('sirings.show', compact('siring'));
    }

    /**
     * Show the form for editing the specified siring.
     *
     * @param  \App\Models\Siring  $siring
     * @return \Illuminate\View\View
     */
    public function edit(Siring $siring)
    {
        $this->authorize('update', $siring);

        return view('sirings.edit', compact('siring'));
    }

    /**
     * Update the specified siring in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siring  $siring
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Siring $siring)
    {
        $this->authorize('update', $siring);

        $siringData = $request->validate([
            'name_siring'       => 'required|max:60',
            'description_siring' => 'nullable|max:255',
            'link_siring'   => 'nullable',
            'icon_siring'   => 'nullable',
            'is_priority'   => 'nullable'
        ]);
        $siring->update($siringData);

        return redirect()->route('sirings.show', $siring);
    }

    /**
     * Remove the specified siring from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siring  $siring
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Siring $siring)
    {
        $this->authorize('delete', $siring);

        $request->validate(['siring_id' => 'required']);

        if ($request->get('siring_id') == $siring->id && $siring->delete()) {
            return redirect()->route('sirings.index');
        }

        return back();
    }
}
