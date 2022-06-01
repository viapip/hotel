<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Images\Image;
use App\Http\Controllers\Controller;

use App\Models\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
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
            $privacy = Privacy::where('title', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('title_seo', 'LIKE', "%$keyword%")
                ->orWhere('description_seo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $privacy = Privacy::latest()->paginate($perPage);
        }

        return view('admin.privacy.index', compact('privacy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.privacy.create');
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

        Privacy::create($requestData);

        return redirect('/admin/privacy')->with('flash_message', 'Privacy added!');
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
        $privacy = Privacy::findOrFail($id);

        return view('admin.privacy.show', compact('privacy'));
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
        $privacy = Privacy::findOrFail($id);

        return view('admin.privacy.edit', compact('privacy'));
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

        $privacy = Privacy::findOrFail($id);

        if ($request->hasFile('image'))
            $requestData['image'] = Image::uploadImage($requestData['image'], $privacy->image);

        $privacy->update($requestData);

        return redirect('/admin/privacy')->with('flash_message', 'Privacy updated!');
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
        $privacy = Privacy::query()->findOrFail($id);

        if (isset($privacy->image))
            Image::delete($privacy->image);

        $privacy->delete();

        return redirect('/admin/privacy')->with('flash_message', 'Privacy deleted!');
    }
}
