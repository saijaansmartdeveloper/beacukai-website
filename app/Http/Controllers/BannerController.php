<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the banner.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $bannerQuery = Banner::query();
        $bannerQuery->where('title_banner', 'like', '%'.$request->get('q').'%');
        $bannerQuery->orderBy('priority_banner', 'asc');
        $bannerQuery->orderBy('created_at', 'desc');
        $banners = $bannerQuery->paginate(25);

        return view('banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new banner.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Banner);

        return view('banners.create');
    }

    /**
     * Store a newly created banner in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Banner);

        $newBanner = $request->validate([
            'title_banner'          => 'required|max:60',
            'description_banner'    => 'nullable|max:255',
            'priority_banner'       => 'numeric',
            'is_active_banner'      => 'boolean'
        ]);

        $newBanner['creator_id'] = auth()->id();

        if ($request->hasFile('image_banner')) {
            $filename = time() . '.' . $request->file('image_banner')->extension();
            $newBanner['image_banner'] = $request->file('image_banner')->storeAs('banners', $filename, 'public');
        }

        $banner = Banner::create($newBanner);
        return redirect()->route('banners.show', $banner);
    }

    /**
     * Display the specified banner.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\View\View
     */
    public function show(Banner $banner)
    {
        return view('banners.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified banner.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\View\View
     */
    public function edit(Banner $banner)
    {
        $this->authorize('update', $banner);

        return view('banners.edit', compact('banner'));
    }

    /**
     * Update the specified banner in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Banner $banner)
    {
        $this->authorize('update', $banner);

        $bannerData = $request->validate([
            'title_banner'          => 'required|max:60',
            'description_banner'    => 'nullable|max:255',
            'priority_banner'       => 'numeric',
            'is_active_banner'      => 'boolean'
        ]);

        if ($request->hasFile('image_banner')) {
            @unlink($banner->image_banner);
            $filename = time() . '.' . $request->file('image_banner')->extension();
            $bannerData['image_banner'] = $request->file('image_banner')->storeAs('banners', $filename, 'public');
        }

        $banner->update($bannerData);

        return redirect()->route('banners.show', $banner);
    }

    /**
     * Remove the specified banner from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Banner $banner)
    {
        $this->authorize('delete', $banner);

        $request->validate(['banner_id' => 'required']);

        @unlink('storage/' . $banner->image_banner);

        if ($request->get('banner_id') == $banner->id && $banner->delete()) {
            return redirect()->route('banners.index');
        }

        return back();
    }
}
