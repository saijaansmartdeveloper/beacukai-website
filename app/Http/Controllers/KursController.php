<?php

namespace App\Http\Controllers;

use App\Models\Kurs;
use Illuminate\Http\Request;

class KursController extends Controller
{
    /**
     * Display a listing of the kurs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $kursQuery = Kurs::query();
        $kursQuery->where('nama_mata_uang', 'like', '%'.$request->get('q').'%');
        $kursQuery->orderBy('nama_mata_uang');
        $kurs = $kursQuery->paginate(25);

        return view('kurs.index', compact('kurs'));
    }

    /**
     * Show the form for creating a new kurs.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Kurs);

        return view('kurs.create');
    }

    /**
     * Store a newly created kurs in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Kurs);

        $newKurs = $request->validate([
            'nama_mata_uang' => 'required|max:60',
            'nilai' => 'nullable|max:255',
            'perubahan' => 'nullable|max:255',
            'status' => 'nullable|max:255',
            'tanggal_berlaku' => 'nullable|max:255',
        ]);
        $newKurs['creator_id'] = auth()->id();

        $kurs = Kurs::create($newKurs);

        return redirect()->route('kurs.index');
    }

    /**
     * Display the specified kurs.
     *
     * @param  \App\Models\Kurs  $kurs
     * @return \Illuminate\View\View
     */
    public function show(Kurs $kurs)
    {
        return view('kurs.show', compact('kurs'));
    }

    /**
     * Show the form for editing the specified kurs.
     *
     * @param  \App\Models\Kurs  $kurs
     * @return \Illuminate\View\View
     */
    public function edit(Kurs $kur)
    {
        $this->authorize('update', $kur);

        return view('kurs.edit', compact('kur'));
    }

    /**
     * Update the specified kurs in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kurs  $kurs
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Kurs $kur)
    {
        $this->authorize('update', $kur);

        $kursData = $request->validate([
            'nama_mata_uang' => 'required|max:60',
            'nilai' => 'nullable|max:255',
            'perubahan' => 'nullable|max:255',
            'status' => 'nullable|max:255',
            'tanggal_berlaku' => 'nullable|max:255',
        ]);
        $kur->update($kursData);

        return redirect()->route('kurs.index');
    }

    /**
     * Remove the specified kurs from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kurs  $kurs
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Kurs $kur)
    {
        $this->authorize('delete', $kur);

        $request->validate(['kurs_id' => 'required']);

        if ($request->get('kurs_id') == $kur->id && $kur->delete()) {
            return redirect()->route('kurs.index');
        }

        return back();
    }
}
