<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Images\Image;
use App\Http\Controllers\Controller;

use App\Models\LocationPage;
use Illuminate\Http\Request;

class LocationPageController extends Controller
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
            $locationpage = LocationPage::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('banner', 'LIKE', "%$keyword%")
                ->orWhere('title_seo', 'LIKE', "%$keyword%")
                ->orWhere('description_seo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $locationpage = LocationPage::latest()->paginate($perPage);
        }

        return view('admin.location-page.index', compact('locationpage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.location-page.create');
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

        if ($request->hasFile('banner'))
            $requestData['banner'] = Image::uploadImage($requestData['banner']);

        LocationPage::create($requestData);

        return redirect('/admin/location-page')->with('flash_message', 'LocationPage added!');
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
        $locationpage = LocationPage::findOrFail($id);

        return view('admin.location-page.show', compact('locationpage'));
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
        $locationpage = LocationPage::findOrFail($id);

        return view('admin.location-page.edit', compact('locationpage'));
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

        $locationpage = LocationPage::findOrFail($id);

        if ($request->hasFile('banner'))
            $requestData['banner'] = Image::uploadImage($requestData['banner'], $locationpage->banner);

        $locationpage->update($requestData);

        return redirect('/admin/location-page')->with('flash_message', 'LocationPage updated!');
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
        $locationpage = LocationPage::query()->findOrFail($id);

        if (isset($locationpage->banner))
            Image::delete($locationpage->banner);

        $locationpage->delete();

        return redirect('/admin/location-page')->with('flash_message', 'LocationPage deleted!');
    }
}
