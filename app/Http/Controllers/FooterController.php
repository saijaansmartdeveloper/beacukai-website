<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the footer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $footerQuery = Footer::query();
        $footerQuery->where('nama_instansi', 'like', '%'.$request->get('q').'%');
        $footerQuery->orderBy('nama_instansi');
        $footers = $footerQuery->paginate(25);

        return view('footers.index', compact('footers'));
    }

    /**
     * Show the form for creating a new footer.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Footer);

        return view('footers.create');
    }

    /**
     * Store a newly created footer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Footer);

        $newFooter = $request->validate([
            'nama_instansi'         => 'required|max:60',
            'deskripsi_instansi'    => 'nullable',
            'email_instansi'        => 'nullable',
            'web_instansi'          => 'nullable',
            'telp_instansi'         => 'nullable',
            'alamat_instansi'       => 'nullable',
            'maps_instansi'         => 'nullable',
            'jam_kerja_instansi'    => 'nullable',
        ]);

        $newFooter['creator_id'] = auth()->id();

        $footer = Footer::create($newFooter);

        return redirect()->route('footers.show', $footer);
    }

    /**
     * Display the specified footer.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\View\View
     */
    public function show(Footer $footer)
    {
        return view('footers.show', compact('footer'));
    }

    /**
     * Show the form for editing the specified footer.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\View\View
     */
    public function edit(Footer $footer)
    {
        $this->authorize('update', $footer);

        return view('footers.edit', compact('footer'));
    }

    /**
     * Update the specified footer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Footer $footer)
    {
        $this->authorize('update', $footer);

        $footerData = $request->validate([
            'nama_instansi'         => 'required|max:60',
            'deskripsi_instansi'    => 'nullable',
            'email_instansi'        => 'nullable',
            'web_instansi'          => 'nullable',
            'telp_instansi'         => 'nullable',
            'alamat_instansi'       => 'nullable',
            'maps_instansi'         => 'nullable',
            'jam_kerja_instansi'    => 'nullable',
        ]);
        $footer->update($footerData);

        return redirect()->route('footers.show', $footer);
    }

    /**
     * Remove the specified footer from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Footer $footer)
    {
        $this->authorize('delete', $footer);

        $request->validate(['footer_id' => 'required']);

        if ($request->get('footer_id') == $footer->id && $footer->delete()) {
            return redirect()->route('footers.index');
        }

        return back();
    }
}
