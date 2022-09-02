<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\BookNow;
use Illuminate\Http\Request;

class BookNowController extends Controller
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
            $booknow = BookNow::where('link', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $booknow = BookNow::latest()->paginate($perPage);
        }

        return view('admin.book-now.index', compact('booknow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.book-now.create');
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
        
        BookNow::create($requestData);

        return redirect('/admin/book-now')->with('flash_message', 'BookNow added!');
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
        $booknow = BookNow::findOrFail($id);

        return view('admin.book-now.show', compact('booknow'));
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
        $booknow = BookNow::findOrFail($id);

        return view('admin.book-now.edit', compact('booknow'));
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
        
        $booknow = BookNow::findOrFail($id);
        $booknow->update($requestData);

        return redirect('/admin/book-now')->with('flash_message', 'BookNow updated!');
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
        BookNow::destroy($id);

        return redirect('/admin/book-now')->with('flash_message', 'BookNow deleted!');
    }
}
