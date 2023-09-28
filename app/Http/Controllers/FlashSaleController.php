<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Flash_sale;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlashSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flash_sales = Flash_sale::query()->get();
        return view('admin.flash_sale.index', compact('flash_sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::query()->get();
        return view('admin.flash_sale.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token', 'product_id', 'price');
        try {
            if ($data) {

                $data['admin_id'] = Admin::query()->find(auth()->user()->id)->id;

                $flash_sales = Flash_sale::query()->create($data);

                $product = [];

                foreach ($request->product_id as $key => $value) {
                    $product[$value] = [
                        'admin_id' => $data['admin_id'],
                        'price' => $request->price[$key]
                    ];
                }

                $flash_sales->products()->sync($product);

                return redirect()->back()->with('success', 'Successfully Created Flash Sales');
            }
            return redirect()->back()->with('error', 'Not Successfully Created Flash Sales');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flash_sale  $flash_sale
     * @return \Illuminate\Http\Response
     */
    public function show(Flash_sale $flash_sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flash_sale  $flash_sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Flash_sale $flash_sale)
    {
        $products = Product::query()->get();
        $flash_product = DB::table('flash_sale_product')->where('flash_sale_id', '=', $flash_sale->id)
            ->select('price')->get();
        return view('admin.flash_sale.edit', compact('flash_sale', 'products', 'flash_product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flash_sale  $flash_sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flash_sale $flash_sale)
    {
        $data = $request->except('_token', 'product_id', 'price');
        $flash_sale = Flash_sale::query()->findOrFail($flash_sale->id);
        try {
            if ($data) {

                $data['admin_id'] = Admin::query()->find(auth()->user()->id)->id;

                $flash_sale->update($data);

                $product = [];

                foreach ($request->product_id as $key => $value) {
                    $product[$value] = [
                        'admin_id' => $data['admin_id'],
                        'price' => $request->price[$key]
                    ];
                }

                $flash_sale->products()->sync($product);

                return redirect()->back()->with('success', 'Successfully Updated Flash Sales');
            }
            return redirect()->back()->with('error', 'Not Successfully Updated Flash Sales');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flash_sale  $flash_sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (isset($request->id)) {
            Flash_sale::query()->findOrFail($request->id)->delete();
            return redirect()->back()->with('success', 'Successfully Deleted Flash Sales');
        }
        return redirect()->back()->with('error', 'Not Successfully Deleted Flash Sales');
    }
}
