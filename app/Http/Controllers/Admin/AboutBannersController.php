<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Images\Image;
use App\Http\Controllers\Controller;

use App\Models\AboutBanner;
use Illuminate\Http\Request;

class AboutBannersController extends Controller
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
            $aboutbanners = AboutBanner::where('title', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $aboutbanners = AboutBanner::latest()->paginate($perPage);
        }

        return view('admin.about-banners.index', compact('aboutbanners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.about-banners.create');
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

        AboutBanner::create($requestData);

        return redirect('/admin/about-banners')->with('flash_message', 'AboutBanner added!');
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
        $aboutbanner = AboutBanner::findOrFail($id);

        return view('admin.about-banners.show', compact('aboutbanner'));
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
        $aboutbanner = AboutBanner::findOrFail($id);

        return view('admin.about-banners.edit', compact('aboutbanner'));
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

        $aboutbanner = AboutBanner::findOrFail($id);

        if ($request->hasFile('image'))
            $requestData['image'] = Image::uploadImage($requestData['image'], $aboutbanner->image);

        $aboutbanner->update($requestData);

        return redirect('/admin/about-banners')->with('flash_message', 'AboutBanner updated!');
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
        $aboutbanner = AboutBanner::query()->findOrFail($id);

        if (isset($aboutbanner->image))
            Image::delete($aboutbanner->image);

        $aboutbanner->delete();

        return redirect('/admin/about-banners')->with('flash_message', 'AboutBanner deleted!');
    }
}
