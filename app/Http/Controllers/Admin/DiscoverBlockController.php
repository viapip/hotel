<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\DiscoverBlock;
use Illuminate\Http\Request;

class DiscoverBlockController extends Controller
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
            $discoverblock = DiscoverBlock::where('under_title', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $discoverblock = DiscoverBlock::latest()->paginate($perPage);
        }

        return view('admin.discover-block.index', compact('discoverblock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.discover-block.create');
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
        
        DiscoverBlock::create($requestData);

        return redirect('/admin/discover-block')->with('flash_message', 'DiscoverBlock added!');
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
        $discoverblock = DiscoverBlock::findOrFail($id);

        return view('admin.discover-block.show', compact('discoverblock'));
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
        $discoverblock = DiscoverBlock::findOrFail($id);

        return view('admin.discover-block.edit', compact('discoverblock'));
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
        
        $discoverblock = DiscoverBlock::findOrFail($id);
        $discoverblock->update($requestData);

        return redirect('/admin/discover-block')->with('flash_message', 'DiscoverBlock updated!');
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
        DiscoverBlock::destroy($id);

        return redirect('/admin/discover-block')->with('flash_message', 'DiscoverBlock deleted!');
    }
}
