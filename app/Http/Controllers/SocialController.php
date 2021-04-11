<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the social.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $socialQuery = Social::query();
        $socialQuery->where('title', 'like', '%'.$request->get('q').'%');
        $socialQuery->orderBy('title');
        $socials = $socialQuery->paginate(25);

        return view('socials.index', compact('socials'));
    }

    /**
     * Show the form for creating a new social.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Social);

        return view('socials.create');
    }

    /**
     * Store a newly created social in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Social);

        $newSocial = $request->validate([
            'title'       => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newSocial['creator_id'] = auth()->id();

        $social = Social::create($newSocial);

        return redirect()->route('socials.show', $social);
    }

    /**
     * Display the specified social.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\View\View
     */
    public function show(Social $social)
    {
        return view('socials.show', compact('social'));
    }

    /**
     * Show the form for editing the specified social.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\View\View
     */
    public function edit(Social $social)
    {
        $this->authorize('update', $social);

        return view('socials.edit', compact('social'));
    }

    /**
     * Update the specified social in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Social $social)
    {
        $this->authorize('update', $social);

        $socialData = $request->validate([
            'title'       => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $social->update($socialData);

        return redirect()->route('socials.show', $social);
    }

    /**
     * Remove the specified social from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Social $social)
    {
        $this->authorize('delete', $social);

        $request->validate(['social_id' => 'required']);

        if ($request->get('social_id') == $social->id && $social->delete()) {
            return redirect()->route('socials.index');
        }

        return back();
    }
}
