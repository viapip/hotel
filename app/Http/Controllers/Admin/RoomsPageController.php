<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Images\Image;
use App\Http\Controllers\Controller;

use App\Models\RoomsPage;
use Illuminate\Http\Request;

class RoomsPageController extends Controller
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
            $roomspage = RoomsPage::where('title', 'LIKE', "%$keyword%")
                ->orWhere('banner', 'LIKE', "%$keyword%")
                ->orWhere('title_seo', 'LIKE', "%$keyword%")
                ->orWhere('description_seo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $roomspage = RoomsPage::latest()->paginate($perPage);
        }

        return view('admin.rooms-page.index', compact('roomspage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.rooms-page.create');
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

        RoomsPage::create($requestData);

        return redirect('/admin/rooms-page')->with('flash_message', 'RoomsPage added!');
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
        $roomspage = RoomsPage::findOrFail($id);

        return view('admin.rooms-page.show', compact('roomspage'));
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
        $roomspage = RoomsPage::findOrFail($id);

        return view('admin.rooms-page.edit', compact('roomspage'));
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

        $roomspage = RoomsPage::findOrFail($id);

        if ($request->hasFile('banner'))
            $requestData['banner'] = Image::uploadImage($requestData['banner'], $roomspage->banner);

        $roomspage->update($requestData);

        return redirect('/admin/rooms-page')->with('flash_message', 'RoomsPage updated!');
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
        $roomspage = RoomsPage::query()->findOrFail($id);

        if (isset($roomspage->banner))
            Image::delete($roomspage->banner);

        $roomspage->delete();

        return redirect('/admin/rooms-page')->with('flash_message', 'RoomsPage deleted!');
    }
}
