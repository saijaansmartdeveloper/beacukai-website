<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the layanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $layananQuery = Layanan::query();
        $layananQuery->where('nama_layanan', 'like', '%'.$request->get('q').'%');
        $layananQuery->orderBy('id');
        $layanans = $layananQuery->paginate(25);

        return view('layanans.index', compact('layanans'));
    }

    /**
     * Show the form for creating a new layanan.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Layanan);

        return view('layanans.create');
    }

    /**
     * Store a newly created layanan in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Layanan);

        $newLayanan = $request->validate([
            'nama_layanan'       => 'required|max:60',
            'jenis_layanan'      => 'nullable|max:255',
            'estimasi_layanan'   => 'nullable|max:255',
            'waktu_layanan'      => 'nullable|max:255',
            'biaya_layanan'      => 'nullable|max:255',
        ]);

        $newLayanan['creator_id'] = auth()->id();

        $layanan = Layanan::create($newLayanan);

        return redirect()->route('layanans.index');
    }

    /**
     * Display the specified layanan.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\View\View
     */
    public function show(Layanan $layanan)
    {
        return view('layanans.show', compact('layanan'));
    }

    /**
     * Show the form for editing the specified layanan.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\View\View
     */
    public function edit(Layanan $layanan)
    {
        $this->authorize('update', $layanan);

        return view('layanans.edit', compact('layanan'));
    }

    /**
     * Update the specified layanan in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Layanan $layanan)
    {
        $this->authorize('update', $layanan);

        $layananData = $request->validate([
            'nama_layanan'       => 'required|max:60',
            'jenis_layanan'      => 'nullable|max:255',
            'estimasi_layanan'   => 'nullable|max:255',
            'waktu_layanan'      => 'nullable|max:255',
            'biaya_layanan'      => 'nullable|max:255',
        ]);
        $layanan->update($layananData);

        return redirect()->route('layanans.index', $layanan);
    }

    /**
     * Remove the specified layanan from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Layanan $layanan)
    {
        $this->authorize('delete', $layanan);

        $request->validate(['layanan_id' => 'required']);

        if ($request->get('layanan_id') == $layanan->id && $layanan->delete()) {
            return redirect()->route('layanans.index');
        }

        return back();
    }
}
