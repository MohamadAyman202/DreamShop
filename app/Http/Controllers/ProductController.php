<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\BundleDeals;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\TaxRule;
use Illuminate\Http\Request;
use App\trait\FileUpload;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query()->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::query()->get();
        $sub_categories = SubCategory::query()->get();
        $brands = Brand::query()->get();
        $tax_rules = TaxRule::query()->get();
        $bundles = BundleDeals::query()->get();
        $collections = Collection::query()->get();
        return view('admin.product.create', compact('categories', 'sub_categories', 'brands', 'tax_rules', 'bundles', 'collections'));
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
            $data = $request->except('_token', 'collection_id');
            if ($data) {
                $images = [];
                foreach ($request->file('images') as $key => $value) {
                    if ($request->hasFile('images')) {
                        $values_images = FileUpload::file('storage/products/images/', $request->images[$key]);
                        array_push($images, $values_images);
                    }
                    $data['images'] = $images;
                }


                if ($request->hasFile('video')) {
                    $data['video'] = FileUpload::file('storage/products/videos/', $request->file('video'));
                }

                $data['admin_id'] = Admin::query()->find(auth()->user()->id)->id;

                $product = Product::query()->create($data);

                $product->collection()->sync($request->collection_id);

                return redirect()->back()->with('success', 'Successfully Created Product');
            }
            return redirect()->back()->with('error', 'Not Successfully Created Product');

            return $data;
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::query()->get();
        $sub_categories = SubCategory::query()->get();
        $brands = Brand::query()->get();
        $tax_rules = TaxRule::query()->get();
        $bundles = BundleDeals::query()->get();
        $collections = Collection::query()->get();
        $product = Product::query()->findOrFail($product->id);
        return view('admin.product.edit', compact('product', 'categories', 'sub_categories', 'brands', 'tax_rules', 'bundles', 'collections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateProductRequest $request, Product $product)
    {
        // dd($product->images);
        try {
            $data = $request->except('_token', 'collection_id',);
            $product = Product::query()->findOrFail($product->id);
            if ($data) {
                $images = [];
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $key => $value) {
                        foreach ($product->images as $keys => $values) {
                            FileUpload::Delete($values);
                        }
                        $values_images = FileUpload::file('storage/products/images/', $request->images[$key]);
                        array_push($images, $values_images);
                    }
                    $data['images'] = $images;
                }

                if ($request->hasFile('video')) {
                    FileUpload::Delete($product->video);
                    $data['video'] = FileUpload::file('storage/products/videos/', $request->file('video'));
                }

                $data['admin_id'] = Admin::query()->find(auth()->user()->id)->id;

                $product->update($data);

                $product->collection()->sync($request->collection_id);

                return redirect()->back()->with('success', 'Successfully Updated Product');
            }
            return redirect()->back()->with('error', 'Not Successfully Updated Product');

            return $data;
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (isset($request->id)) {
            $product = Product::query()->findOrFail($request->id);
            foreach ($product->images as $key => $value) {
                FileUpload::Delete($value);
            }
            FileUpload::Delete("$product->video");
            $product->delete();
            return redirect()->back()->with('success', 'Successfully Deleted Product');
        }
        return redirect()->back()->with('error', 'Not Successfully Deleted Product');
    }
}
