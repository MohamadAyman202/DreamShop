<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategoryRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\trait\FileUpload;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = SubCategory::query()->get();
        return view('admin.sub_category.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::query()->get();
        return view('admin.sub_category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        try {
            if ($request->hasFile('images')) {
                $data = $request->except('_token');
                $data['images'] = FileUpload::file('storage/sub-category/', $request->file('images'));
                $data['admin_id'] = Admin::query()->find(auth()->user()->id)->id;
                SubCategory::create($data);
                return redirect()->back()->with('success', 'Successfully Created Sub Category');
            }
            return redirect()->back()->with('success', 'Not Successfully Created Sub Category');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $sub_category = SubCategory::query()->findOrFail($subCategory->id);
        $categories = Category::query()->where('id', '!=', $sub_category->category->id)->get();

        return view('admin.sub_category.edit', compact('sub_category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryRequest $request, SubCategory $subCategory)
    {
        try {
            $subCategory = SubCategory::query()->findOrFail($subCategory->id);
            if ($request->has('images')) {
                $data = $request->except('_token');
                $data['images'] = FileUpload::file('storage/sub-category/', $request->file('images'));
                FileUpload::delete($subCategory->images);
                $data['admin_id'] = Admin::query()->findOrFail(auth()->user()->id)->id;
                $subCategory->update($data);
                return redirect()->route('sub-category.index')->with('success', 'Successfully Updated Sub Category');
            }
            return redirect()->back()->with('error', 'Not Successfully Updated Sub Category');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $sub_category = SubCategory::query()->findOrFail($request->id);
        if ($request->id) {
            FileUpload::delete($sub_category->images);
            $sub_category->delete();
            return redirect()->back()->with('success', 'Successfully Deleted Sub Category');
        }
        return redirect()->back()->with('error', 'Not Successfully Deleted Sub Category');
    }
}
