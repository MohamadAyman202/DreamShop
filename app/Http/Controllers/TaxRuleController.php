<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaxRulesRequest;
use App\Models\Admin;
use App\Models\TaxRule;
use Illuminate\Http\Request;

class TaxRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rules = TaxRule::query()->get();
        return view('admin.tax_rule.index', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tax_rule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaxRulesRequest $request)
    {
        try {
            if (isset($request)) {
                $data = $request->except('_token');
                $data['admin_id'] = Admin::query()->find(auth()->user()->id)->id;
                TaxRule::create($data);
                return redirect()->route('tax-rule.index')->with('success', 'Successfully Created Tax Rules');
            }
            return redirect()->back()->with('success', 'Not Successfully Created Tax Rules');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaxRule  $taxRule
     * @return \Illuminate\Http\Response
     */
    public function show(TaxRule $taxRule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaxRule  $taxRule
     * @return \Illuminate\Http\Response
     */
    public function edit(TaxRule $taxRule)
    {
        $rule = TaxRule::query()->findOrFail($taxRule->id);
        return view('admin.tax_rule.edit', compact('rule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaxRule  $taxRule
     * @return \Illuminate\Http\Response
     */
    public function update(TaxRulesRequest $request, TaxRule $taxRule)
    {
        try {
            $rule = TaxRule::query()->findOrFail($taxRule->id);
            if (isset($request)) {
                $data = $request->except('_token');
                $data['admin_id'] = Admin::query()->find(auth()->user()->id)->id;
                $rule->update($data);
                return redirect()->route('tax-rule.index')->with('success', 'Successfully Updated Tax Rules');
            }
            return redirect()->back()->with('success', 'Not Successfully Updated Tax Rules');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaxRule  $taxRule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->id) {
            TaxRule::query()->findOrFail($request->id)->delete();
            return redirect()->back()->with('success', 'Successfully Deleted Tax Rule');
        }
        return redirect()->back()->with('error', 'Not Successfully Deleted Tax Rule');
    }
}
