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
        $footerQuery->where('title', 'like', '%'.$request->get('q').'%');
        $footerQuery->orderBy('title');
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
            'title'       => 'required|max:60',
            'description' => 'nullable|max:255',
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
            'title'       => 'required|max:60',
            'description' => 'nullable|max:255',
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
