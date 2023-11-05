<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Trait\FileUpload;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::query()->get();
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        $categories = Category::query()->select('title', 'id')->get();
        $brands = Brand::query()->select('title', 'id')->get();
        $products = Product::query()->select('title')->get();
        $sub_categories = SubCategory::query()->get();
        return view('admin.banner.edit', compact('banner','categories', 'brands', 'products', 'sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        try {
            $data = $request->except('_token', 'category_id', 'brand_id', 'product_id', 'sub_categories_id');
            if ($data) {

                if ($request->hasFile('images')) {
                    $data['images'] = FileUpload::File('storage/pages/', $data['images']);
                }

                $data['admin_id'] = auth()->user()->id;
                $home_slider =  Banner::query()->create($data);

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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
