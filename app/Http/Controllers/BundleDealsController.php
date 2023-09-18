<?php

namespace App\Http\Controllers;

use App\Http\Requests\BundleDealsRequest;
use App\Models\Admin;
use App\Models\BundleDeals;
use Illuminate\Http\Request;

class BundleDealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bundles = BundleDeals::query()->get();
        return view('admin.bundle_deals.index', compact('bundles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bundle_deals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BundleDealsRequest $request)
    {
        try {
            if (isset($request)) {
                $data = $request->except('_token');
                $data['admin_id'] = Admin::query()->findOrFail(auth()->user()->id)->id;
                BundleDeals::create($data);
                return redirect()->route('bundle_deals.index')->with('success', 'Successfully Created Bundle Deals');
            }
            return redirect()->back()->with('error', 'Not Successfully Created Bundle Deals');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BundleDeals  $bundleDeals
     * @return \Illuminate\Http\Response
     */
    public function show(BundleDeals $bundleDeals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BundleDeals  $bundleDeals
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bundle = BundleDeals::query()->findOrFail($id);
        return view('admin.bundle_deals.edit', compact('bundle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BundleDeals  $bundleDeals
     * @return \Illuminate\Http\Response
     */
    public function update(BundleDealsRequest $request, $id)
    {
        try {
            $bundle = BundleDeals::query()->findOrFail($id);
            if (isset($request)) {
                $data = $request->except('_token');
                $data['admin_id'] = Admin::query()->findOrFail(auth()->user()->id)->id;
                $bundle->update($data);
                return redirect()->route('bundle_deals.index')->with('success', 'Successfully Updated Bundle Deals');
            }
            return redirect()->back()->with('error', 'Not Successfully Updated Bundle Deals');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BundleDeals  $bundleDeals
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (isset($request->id)) {

            BundleDeals::query()->findOrFail($request->id)->delete();
            return redirect()->back()->with('success', 'Successfully Deleted Bundle Deals');
        }
        return redirect()->back()->with('error', 'Not Successfully Deleted Bundle Deals');
    }
}
