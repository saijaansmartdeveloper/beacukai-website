<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $pageQuery = Page::query();
        $pageQuery->where('name_page', 'like', '%'.$request->get('q').'%');
        $pageQuery->orderBy('name_page');
        $pages = $pageQuery->paginate(25);

        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new page.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Page);

        return view('pages.create');
    }

    /**
     * Store a newly created page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Page);

        $newPage = $request->validate([
            'name_page'         => 'required|max:60',
            'description_page'  => 'nullable|max:255',
            'content_page'      => 'nullable'
        ]);

        $newPage['slug']       = Str::slug($request->name_page);
        $newPage['creator_id'] = auth()->id();

        if ($request->hasFile('image_page')) {
            $filename = time() . '.' . $request->file('image_page')->extension();
            $newPage['image_page'] = $request->file('image_page')->storeAs('pages', $filename, 'public');
        }

        $page = Page::create($newPage);

        return redirect()->route('pages.show', $page);
    }

    /**
     * Display the specified page.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\View\View
     */
    public function show(Page $page)
    {
        return view('pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified page.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\View\View
     */
    public function edit(Page $page)
    {
        $this->authorize('update', $page);

        return view('pages.edit', compact('page'));
    }

    /**
     * Update the specified page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Page $page)
    {
        $this->authorize('update', $page);

        $pageData = $request->validate([
            'name_page'         => 'required|max:60',
            'description_page'  => 'nullable|max:255',
            'content_page'      => 'nullable'
        ]);

        $pageData['slug']       = Str::slug($request->name_page);

        if ($request->hasFile('image_page')) {
            $filename               = time() . '.' . $request->file('image_page')->extension();
            $pageData['image_page'] = $request->file('image_page')->storeAs('pages', $filename, 'public');
        }

        $page->update($pageData);

        return redirect()->route('pages.show', $page);
    }

    /**
     * Remove the specified page from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Page $page)
    {
        $this->authorize('delete', $page);

        $request->validate(['page_id' => 'required']);

        @unlink('storage/' . $page->image_page);

        if ($request->get('page_id') == $page->id && $page->delete()) {
            return redirect()->route('pages.index');
        }

        return back();
    }

    public function single($slug)
    {
        $data = [
            'banners'   => Banner::orderBy('priority_banner', 'asc')->where('is_active_banner', '1')->get() ?? [],
            'profil'    => Page::where('name_page', 'TENTANG BC KOTABARU')->first() ?? [],
            'siring'    => Siring::orderBy('is_priority', 'asc')->get() ?? [],
            'survey'    => Survey::where('is_active_survey', 1)->first(),
            'media'     => KotabaruLink::get() ?? [],
            'testimonis' => Testimoni::get() ?? [],
            'posts'     => Post::orderBy('created_at', 'desc')->take(3)->get(),
            'page' => Page::where('slug', $slug)->first()
        ];

        return view('single', $data);
    }
}
