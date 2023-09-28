<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Trait\FileUpload;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::query()->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            if ($request->hasFile('images')) {
                $data = $request->except('_token');
                $data['images'] = FileUpload::file('storage/category/', $request->file('images'));
                $data['admin_id'] = Admin::query()->find(auth()->user()->id)->id;
                Category::create($data);
                return redirect()->back()->with('success', 'Successfully Created Category');
            }
            return redirect()->back()->with('error', 'Not Successfully Created Category');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error', $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category = Category::query()->find($category->id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category = Category::query()->findOrFail($category->id);
            if ($request->hasFile('images')) {
                $data = $request->except('_token',);
                $data['images'] = FileUpload::file('storage/category/', $request->file('images'));
                FileUpload::delete($category->images);
                $data['admin_id'] = Admin::query()->find(auth()->user()->id)->id;
                $category->update($data);
                return redirect()->route('category.index')->with('success', 'Successfully Updated Category');
            }
            return redirect()->back()->with('error', 'Not Successfully Updated Category');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error', $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->id) {
            $category =  Category::query()->findOrFail($request->id);
            FileUpload::delete($category->images);
            $category->delete();
            return redirect()->back()->with('success', 'Successfully Deleted Category');
        } else {
            return redirect()->back()->with('error', 'Not Successfully Deleted Category');
        }
    }
}
