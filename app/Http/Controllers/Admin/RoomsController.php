<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Images\Image;
use App\Http\Controllers\Controller;

use App\Models\Feature;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
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
            $rooms = Room::where('title', 'LIKE', "%$keyword%")
                ->orWhere('preview_image', 'LIKE', "%$keyword%")
                ->orWhere('images', 'LIKE', "%$keyword%")
                ->orWhere('meters', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('link', 'LIKE', "%$keyword%")
                ->orWhere('title_seo', 'LIKE', "%$keyword%")
                ->orWhere('description_seo', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $rooms = Room::latest()->paginate($perPage);
        }

        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $features = Feature::query()->pluck('title', 'id')->all();
        $rooms = Room::query()->pluck('title', 'id')->all();
        return view('admin.rooms.create', compact('features', 'rooms'));
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
        if ($request->hasFile('preview_image'))
            $requestData['preview_image'] = Image::uploadImage($requestData['preview_image']);

        $room = Room::create($requestData);
        $room->features()->sync($request->features);
        $room->others()->sync($request->other_rooms);

        return redirect('/admin/rooms')->with('flash_message', 'Room added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);

        return view('admin.rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $features = Feature::query()->pluck('title', 'id')->all();
        $rooms = Room::query()->where('id', '<>', $id)->pluck('title', 'id')->all();

        return view('admin.rooms.edit', compact('room', 'features', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $room = Room::findOrFail($id);

        if ($request->hasFile('preview_image'))
            $requestData['preview_image'] = Image::uploadImage($requestData['preview_image'], $room->preview_image);
        $room->features()->sync($request->features);
        $room->others()->sync($request->other_rooms);

        $room->update($requestData);

        return redirect('/admin/rooms')->with('flash_message', 'Room updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $room = Room::query()->findOrFail($id);

        if (isset($room->preview_image))
            Image::delete($room->preview_image);

        $room->features()->detach();
        $room->others()->detach();
        $room->parents()->detach();

        $room->delete();

        return redirect('/admin/rooms')->with('flash_message', 'Room deleted!');
    }
}
