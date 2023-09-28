<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::query()->get();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->except('_token');
            if ($data) {
                $data['admin_id'] = auth()->user()->id;
                Page::query()->create($data);
                return redirect()->back()->with('success', "Successfully Created {$data['title']} Page");
            }
            return redirect()->back()->with('error', "Not Successfully Created {$data['title']} Page");
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        try {
            $data = $request->except('_token');
            if ($data) {
                $data['admin_id'] = auth()->user()->id;
                $page->update($data);
                return redirect()->route('pages.index')->with('success', "Successfully Updated {$data['title']} Page");
            }
            return redirect()->back()->with('error', "Not Successfully Updated {$data['title']} Page");
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->id) {
            Page::query()->findOrFail($request->id)->delete();
            return redirect()->back()->with('success', "Successfully Deleted Page");
        }
        return redirect()->back()->with('error', "Not Successfully Deleted Page");
    }
}
