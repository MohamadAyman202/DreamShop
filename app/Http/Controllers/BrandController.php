<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandsRequest;
use App\Models\Admin;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Trait\FileUpload;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::query()->get();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandsRequest $request)
    {
        try {
            if ($request->hasFile('images')) {
                $data = $request->except('_token');
                $data['images'] = FileUpload::file('storage/brands/', $request->file('images'));
                $data['admin_id'] = Admin::query()->find(auth()->user()->id)->id;
                Brand::create($data);
                return redirect()->back()->with('success', 'Successfully Created Brand');
            }
            return redirect()->back()->with('error', 'Not Successfully Created Brand');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $brand = Brand::query()->findOrFail($brand->id);
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandsRequest $request, Brand $brand)
    {
        try {
            $brand = Brand::query()->findOrFail($brand->id);
            if ($request->hasFile('images')) {
                $data = $request->except('_token');
                $data['images'] = FileUpload::file('storage/brands/', $request->file('images'));
                FileUpload::delete($brand->images);
                $data['admin_id'] = Admin::query()->find(auth()->user()->id)->id;
                $brand->update($data);
                return redirect()->route('brands.index')->with('success', 'Successfully Updated Brand');
            }
            return redirect()->back()->with('error', 'Not Successfully Updated Brand');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->id) {
            $brand = Brand::query()->find($request->id);
            $brand->delete();
            FileUpload::delete($brand->images);
            return redirect()->back()->with('success', 'Successfully Deleted Brand');
        }
        return redirect()->back()->with('error', 'Not Successfully Deleted Brand');
    }
}
