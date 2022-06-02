<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Images\Image;
use App\Http\Controllers\Controller;

use App\Models\LocationHome;
use Illuminate\Http\Request;

class LocationHomeController extends Controller
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
            $locationhome = LocationHome::where('title', 'LIKE', "%$keyword%")
                ->orWhere('text', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $locationhome = LocationHome::latest()->paginate($perPage);
        }

        return view('admin.location-home.index', compact('locationhome'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.location-home.create');
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

        LocationHome::create($requestData);

        return redirect('/admin/location-home')->with('flash_message', 'LocationHome added!');
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
        $locationhome = LocationHome::findOrFail($id);

        return view('admin.location-home.show', compact('locationhome'));
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
        $locationhome = LocationHome::findOrFail($id);

        return view('admin.location-home.edit', compact('locationhome'));
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

        $locationhome = LocationHome::findOrFail($id);

        if ($request->hasFile('image'))
            $requestData['image'] = Image::uploadImage($requestData['image'], $locationhome->image);


        $locationhome->update($requestData);

        return redirect('/admin/location-home')->with('flash_message', 'LocationHome updated!');
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
        $locationhome = LocationHome::query()->findOrFail($id);

        if (isset($locationhome->image))
            Image::delete($locationhome->image);

        $locationhome->delete();

        return redirect('/admin/location-home')->with('flash_message', 'LocationHome deleted!');
    }
}
