<?php

namespace App\Http\Controllers;

use App\Models\KotabaruLink;
use Illuminate\Http\Request;

class KotabaruLinkController extends Controller
{
    /**
     * Display a listing of the kotabaruLink.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $kotabaruLinkQuery = KotabaruLink::query();
        $kotabaruLinkQuery->where('title_link', 'like', '%'.$request->get('q').'%');
        $kotabaruLinkQuery->orderBy('title_link');
        $kotabaruLinks = $kotabaruLinkQuery->paginate(25);

        return view('kotabaru_links.index', compact('kotabaruLinks'));
    }

    /**
     * Show the form for creating a new kotabaruLink.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new KotabaruLink);

        return view('kotabaru_links.create');
    }

    /**
     * Store a newly created kotabaruLink in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new KotabaruLink);

        $newKotabaruLink = $request->validate([
            'title_link'       => 'required|max:60',
            'description_link' => 'nullable|max:255',
            'external_link'     => 'nullable'
        ]);

        $newKotabaruLink['creator_id'] = auth()->id();

        if ($request->hasFile('image_link')) {
            $filename = time() . '.' . $request->file('image_link')->extension();
            $newKotabaruLink['image_link'] = $request->file('image_link')->storeAs('link', $filename, 'public');
        }
        $kotabaruLink = KotabaruLink::create($newKotabaruLink);

        return redirect()->route('kotabaru_links.show', $kotabaruLink);
    }

    /**
     * Display the specified kotabaruLink.
     *
     * @param  \App\Models\KotabaruLink  $kotabaruLink
     * @return \Illuminate\View\View
     */
    public function show(KotabaruLink $kotabaruLink)
    {
        return view('kotabaru_links.show', compact('kotabaruLink'));
    }

    /**
     * Show the form for editing the specified kotabaruLink.
     *
     * @param  \App\Models\KotabaruLink  $kotabaruLink
     * @return \Illuminate\View\View
     */
    public function edit(KotabaruLink $kotabaruLink)
    {
        $this->authorize('update', $kotabaruLink);

        return view('kotabaru_links.edit', compact('kotabaruLink'));
    }

    /**
     * Update the specified kotabaruLink in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KotabaruLink  $kotabaruLink
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, KotabaruLink $kotabaruLink)
    {
        $this->authorize('update', $kotabaruLink);

        $kotabaruLinkData = $request->validate([
            'title_link'       => 'required|max:60',
            'description_link' => 'nullable|max:255',
            'external_link'     => 'nullable'
        ]);

        if ($request->hasFile('image_link')) {
            $filename = time() . '.' . $request->file('image_link')->extension();
            $kotabaruLinkData['image_link'] = $request->file('image_link')->storeAs('link', $filename, 'public');
        }
        $kotabaruLink->update($kotabaruLinkData);

        return redirect()->route('kotabaru_links.show', $kotabaruLink);
    }

    /**
     * Remove the specified kotabaruLink from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KotabaruLink  $kotabaruLink
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, KotabaruLink $kotabaruLink)
    {
        $this->authorize('delete', $kotabaruLink);

        $request->validate(['kotabaru_link_id' => 'required']);

        if ($request->get('kotabaru_link_id') == $kotabaruLink->id && $kotabaruLink->delete()) {
            return redirect()->route('kotabaru_links.index');
        }

        return back();
    }
}
