<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use App\Models\Withdrawal_account;
use Illuminate\Http\Request;
use App\Trait\ChangeValue;

class WithdrawalAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Withdrawal_account::query()->get();
        return view('admin.accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accounts.create');
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
            $data = $request->except('_token');
            if ($data) {
                $data['default'] = ChangeValue::Change($data['default']);
                $data['admin_id'] = auth()->user()->id;
                Withdrawal_account::query()->create($data);
                return redirect()->route('accounts.index')->with('success', 'Successfully Created Create Withdrawal Account');
            }
            return redirect()->route('accounts.index')->with('error', 'Not Successfully Created Create Withdrawal Account');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Withdrawal_account  $withdrawal_account
     * @return \Illuminate\Http\Response
     */
    public function show(Withdrawal_account $withdrawal_account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdrawal_account  $withdrawal_account
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $withdrawal_account = Withdrawal_account::query()->findOrFail($id);
        return view('admin.accounts.edit', compact('withdrawal_account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Withdrawal_account  $withdrawal_account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->except('_token');
            $withdrawal_account = Withdrawal_account::query()->findOrFail($id);
            if ($data) {
                $data['default'] = ChangeValue::Change($data['default']);
                $data['admin_id'] = auth()->user()->id;
                $withdrawal_account->update($data);
                return redirect()->route('accounts.index')->with('success', 'Successfully Created Create Withdrawal Account');
            }
            return redirect()->route('accounts.index')->with('error', 'Not Successfully Created Create Withdrawal Account');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdrawal_account  $withdrawal_account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (isset($request->id)) {
            Withdrawal_account::query()->findOrFail($request->id)->delete();
            return redirect()->back()->with('success', 'Successfully Deleted Withdrawal Account');
        }
        return redirect()->back()->with('error', 'Not Successfully Deleted Withdrawal Account');
    }
}
