<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeRequest;
use App\Models\Admin;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::query()->get();
        return view('admin.attribute.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        try {
            if ($request->values) {
                $admin_id = Admin::query()->findOrFail(Auth::user()->id)->id;
                $attr = Attribute::create(['title' => $request->title, 'admin_id' => $admin_id]);
                foreach ($request->values as $key => $value) {
                    AttributeValue::create([
                        'title' => $value,
                        'attribute_id' => $attr->id,
                        'admin_id' => $admin_id,
                    ]);
                }
                return redirect()->back()->with('success', 'Successfully Created Attributes');
            }
            return redirect()->back()->with('error', 'Not Successfully Created Attributes');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error', $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        $attribute = Attribute::query()->find($attribute->id);
        return view('admin.attribute.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, Attribute $attribute)
    {
        try {
            if ($request->values) {
                $admin_id = Admin::query()->findOrFail(Auth::user()->id)->id;
                $attr = Attribute::query()->findOrFail($attribute->id);
                $val = AttributeValue::query()->where('attribute_id', $attr->id)->get();
                $attr->update(['title' => $request->title, 'admin_id' => $admin_id]);
                foreach ($val as $keys => $val) {
                    foreach ($request->values as $key => $value) {
                        if ($keys == $key) {
                            $val->update([
                                'title' => $value,
                                'attribute_id' => $attr->id,
                                'admin_id' => $admin_id,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);
                        }
                    }
                }

                return redirect()->route('attribute.index')->with('success', 'Successfully Created Attributes');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->id) {
            Attribute::query()->find($request->id)->delete();
            return redirect()->back()->with('success', 'Successfully Deleted Attribute');
        }
        return redirect()->back()->with('error', 'Not Successfully Deleted Attribute');
    }
}
