<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Home_slider;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Trait\FileUpload;
use Mockery\Undefined;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home_sliders = Home_slider::query()->get();
        return view('admin.home_slider.index', compact('home_sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::query()->select('title', 'id')->get();
        $brands = Brand::query()->select('title', 'id')->get();
        $products = Product::query()->select('title')->get();
        $sub_categories = SubCategory::query()->get();

        return view('admin.home_slider.create', compact('categories', 'brands', 'products', 'sub_categories'));
    }

    public function create2()
    {
        $categories = Category::query()->select('title', 'id')->get();
        $brands = Brand::query()->select('title', 'id')->get();
        $products = Product::query()->select('title')->get();
        $sub_categories = SubCategory::query()->get();

        return view('admin.home_slider.create2', compact('categories', 'brands', 'products', 'sub_categories'));
    }

    public function create3()
    {
        $categories = Category::query()->select('title', 'id')->get();
        $brands = Brand::query()->select('title', 'id')->get();
        $products = Product::query()->select('title')->get();
        $sub_categories = SubCategory::query()->get();

        return view('admin.home_slider.create3', compact('categories', 'brands', 'products', 'sub_categories'));
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
            $data = $request->except('_token', 'category_id', 'brand_id', 'product_id', 'sub_categories_id');
            if ($data) {

                if ($request->hasFile('images')) {
                    $data['images'] = FileUpload::File('storage/pages/', $data['images']);
                }

                $data['admin_id'] = auth()->user()->id;
                $home_slider =  Home_slider::query()->create($data);

                if ($data['source_type'] == 1) {
                    $home_slider->categories()->sync($request->category_id);
                } elseif ($data['source_type'] == 2) {
                    $home_slider->brands()->sync($request->brand_id);
                } elseif ($data['source_type'] == 3) {
                    $home_slider->products()->sync($request->product_id);
                } else {
                    $home_slider->sub_categories()->sync($request->sub_category_id);
                }
                return redirect()->back()->with('success', 'Successfully Created Home Slider');
            }
            return redirect()->back()->with('error', 'Not Successfully Created Home Slider');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home_slider  $home_slider
     * @return \Illuminate\Http\Response
     */
    public function show(Home_slider $home_slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home_slider  $home_slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Home_slider $home_slider)
    {
        $categories = Category::query()->select('title', 'id')->get();
        $brands = Brand::query()->select('title', 'id')->get();
        $products = Product::query()->select('title', 'id')->get();
        $sub_categories = SubCategory::query()->select('title', 'id')->get();
        return view('admin.home_slider.edit', compact('home_slider', 'categories', 'brands', 'products', 'sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home_slider  $home_slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home_slider $home_slider)
    {
        try {
            $data = $request->except('_token', 'category_id', 'brand_id', 'product_id', 'sub_categories_id');
            if ($data) {
                if ($request->hasFile('images')) {
                    $data['images'] = FileUpload::File('storage/pages/', $data['images']);
                }

                $data['admin_id'] = auth()->user()->id;
                $home_slider->update($data);

                if ($data['source_type'] == 1) {
                    $home_slider->categories()->sync($request->category_id);
                } elseif ($data['source_type'] == 2) {
                    $home_slider->brands()->sync($request->brand_id);
                } elseif ($data['source_type'] == 3) {
                    $home_slider->products()->sync($request->product_id);
                } else {
                    $home_slider->sub_categories()->sync($request->sub_category_id);
                }
                return redirect()->route('home_sliders.index')->with('success', 'Successfully Created Home Slider');
            }
            return redirect()->back()->with('error', 'Not Successfully Updated Home Slider');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home_slider  $home_slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->id) {
            Home_slider::query()->findOrFail($request->id)->delete();
            return redirect()->back()->with('success', 'Successfully Deleted Silder Image');
        }
        return redirect()->back()->with('error', 'Not Successfully Deleted Silder Image');
    }
}
