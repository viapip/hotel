<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Images\Image;
use App\Http\Controllers\Controller;

use App\Models\GalleryPage;
use Illuminate\Http\Request;

class GalleryPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $gallerypage = GalleryPage::where('title', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('title_seo', 'LIKE', "%$keyword%")
                ->orWhere('description_seo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $gallerypage = GalleryPage::latest()->paginate($perPage);
        }

        return view('admin.gallery-page.index', compact('gallerypage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.gallery-page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        if ($request->hasFile('image'))
            $requestData['image'] = Image::uploadImage($requestData['image']);

        GalleryPage::create($requestData);

        return redirect('/admin/gallery-page')->with('flash_message', 'GalleryPage added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $gallerypage = GalleryPage::findOrFail($id);

        return view('admin.gallery-page.show', compact('gallerypage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $gallerypage = GalleryPage::findOrFail($id);

        return view('admin.gallery-page.edit', compact('gallerypage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $gallerypage = GalleryPage::findOrFail($id);

        if ($request->hasFile('image'))
            $requestData['image'] = Image::uploadImage($requestData['image'], $gallerypage->image);

        $gallerypage->update($requestData);

        return redirect('/admin/gallery-page')->with('flash_message', 'GalleryPage updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $gallerypage = GalleryPage::query()->findOrFail($id);

        if (isset($gallerypage->image))
            Image::delete($gallerypage->image);

        $gallerypage->delete();

        return redirect('/admin/gallery-page')->with('flash_message', 'GalleryPage deleted!');
    }
}
