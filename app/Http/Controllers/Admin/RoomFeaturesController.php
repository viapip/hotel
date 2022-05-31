<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\RoomFeature;
use Illuminate\Http\Request;

class RoomFeaturesController extends Controller
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
            $roomfeatures = RoomFeature::where('title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $roomfeatures = RoomFeature::latest()->paginate($perPage);
        }

        return view('admin.room-features.index', compact('roomfeatures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.room-features.create');
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
        
        RoomFeature::create($requestData);

        return redirect('/admin/room-features')->with('flash_message', 'RoomFeature added!');
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
        $roomfeature = RoomFeature::findOrFail($id);

        return view('admin.room-features.show', compact('roomfeature'));
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
        $roomfeature = RoomFeature::findOrFail($id);

        return view('admin.room-features.edit', compact('roomfeature'));
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
        
        $roomfeature = RoomFeature::findOrFail($id);
        $roomfeature->update($requestData);

        return redirect('/admin/room-features')->with('flash_message', 'RoomFeature updated!');
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
        RoomFeature::destroy($id);

        return redirect('/admin/room-features')->with('flash_message', 'RoomFeature deleted!');
    }
}
