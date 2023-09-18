<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectionsRequest;
use App\Models\Admin;
use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::query()->get();
        return view('admin.collection.index', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.collection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectionsRequest $request)
    {
        try {
            if (isset($request)) {
                $data = $request->except('_token');
                $data['admin_id'] = Admin::query()->find(auth()->user()->id)->id;
                Collection::create($data);
                return redirect()->route('collection.index')->with('success', 'Successfully Created Collections');
            }
            return redirect()->back()->with('error', 'Not Successfully Created Collections');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        $collection = Collection::query()->findOrFail($collection->id);
        return view('admin.collection.edit', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        try {
            $collection = Collection::query()->findOrFail($collection->id);
            if (isset($request)) {
                $data = $request->except('_token');
                $data['admin_id'] = Admin::query()->find(auth()->user()->id)->id;
                $collection->update($data);
                return redirect()->route('collection.index')->with('success', 'Successfully Created Collections');
            }
            return redirect()->back()->with('error', 'Not Successfully Created Collections');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->id) {
            Collection::query()->findOrFail($request->id)->delete();
            return redirect()->back()->with('success', 'Successfully Deleted Collection');
        }
        return redirect()->back()->with('error', 'Not Successfully Deleted Collection');
    }
}
