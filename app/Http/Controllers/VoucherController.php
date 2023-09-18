<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = Voucher::query()->get();
        return view('admin.voucher.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.voucher.create');
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
            if (isset($request)) {
                $data = $request->except('_token');
                $data['admin_id'] = Admin::query()->find(auth()->user()->id)->id;
                Voucher::create($data);
                return redirect()->route('vouchers.index')->with('success', 'Successfully Created Vouchers');
            }
            return redirect()->back()->with('success', 'Not Successfully Created Vouchers');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
        $voucher = Voucher::query()->findOrFail($voucher->id);
        return view('admin.voucher.edit', compact('voucher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
    {
        $voucher = Voucher::query()->findOrFail($voucher->id);
        try {
            if (isset($request)) {
                $data = $request->except('_token');
                $data['admin_id'] = Admin::query()->find(auth()->user()->id)->id;
                $voucher->update($data);
                return redirect()->route('vouchers.index')->with('success', 'Successfully Updated Vouchers');
            }
            return redirect()->back()->with('success', 'Not Successfully Updated Vouchers');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->id) {
            Voucher::query()->findOrFail($request->id)->delete();
            return redirect()->back()->with('success', 'Successfully Deleted Voucher');
        }
        return redirect()->back()->with('error', 'Not Successfully Deleted Voucher');
    }
}
