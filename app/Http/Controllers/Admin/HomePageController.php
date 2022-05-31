<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
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
            $homepage = HomePage::where('title', 'LIKE', "%$keyword%")
                ->orWhere('banner', 'LIKE', "%$keyword%")
                ->orWhere('about_title', 'LIKE', "%$keyword%")
                ->orWhere('about_subtitle', 'LIKE', "%$keyword%")
                ->orWhere('about_text', 'LIKE', "%$keyword%")
                ->orWhere('about_button', 'LIKE', "%$keyword%")
                ->orWhere('about_button_link', 'LIKE', "%$keyword%")
                ->orWhere('about_image', 'LIKE', "%$keyword%")
                ->orWhere('rooms_title', 'LIKE', "%$keyword%")
                ->orWhere('rooms_text', 'LIKE', "%$keyword%")
                ->orWhere('rooms_items', 'LIKE', "%$keyword%")
                ->orWhere('location_image', 'LIKE', "%$keyword%")
                ->orWhere('location_title', 'LIKE', "%$keyword%")
                ->orWhere('location_text', 'LIKE', "%$keyword%")
                ->orWhere('quality_title', 'LIKE', "%$keyword%")
                ->orWhere('quality_text', 'LIKE', "%$keyword%")
                ->orWhere('quality_button', 'LIKE', "%$keyword%")
                ->orWhere('quality_link', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $homepage = HomePage::latest()->paginate($perPage);
        }

        return view('admin.home-page.index', compact('homepage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.home-page.create');
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
        
        HomePage::create($requestData);

        return redirect('/admin/home-page')->with('flash_message', 'HomePage added!');
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
        $homepage = HomePage::findOrFail($id);

        return view('admin.home-page.show', compact('homepage'));
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
        $homepage = HomePage::findOrFail($id);

        return view('admin.home-page.edit', compact('homepage'));
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
        
        $homepage = HomePage::findOrFail($id);
        $homepage->update($requestData);

        return redirect('/admin/home-page')->with('flash_message', 'HomePage updated!');
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
        HomePage::destroy($id);

        return redirect('/admin/home-page')->with('flash_message', 'HomePage deleted!');
    }
}
