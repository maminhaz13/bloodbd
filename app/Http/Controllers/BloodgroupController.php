<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Bloodgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloodgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bloodgroup.bloodgroup_index', [
            'bds' => Bloodgroup::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bloodgroup.bloodgroup_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bd_title' => 'required|unique:bloodgroups,bd_title'|'string',
            'bd' => 'required|unique:bloodgroups,bd'|'string',
        ],

        $messages = [
            'bd_title.unique' => 'Blood group title should be unique.',
            'bd_title.required' => 'You must insert blood group title.',
            'bd.required' => 'You must insert blood group.',
            'bd.unique' => 'Blood group should be unique.',
            'bd.string' => 'Blood group should be a string.',
            'bd_title.string' => 'Blood group title should be string.',

        ]);

        Bloodgroup::insert([
            'bd' => $request->bd,
            'bd_title' => $request->bd_title,
            'added_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('bloodgroup.bloodgroup.index')->with('bd_added', 'Congratulation, you have added '.$request->bd_title.' as a blood group..');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bloodgroup  $bloodgroup
     * @return \Illuminate\Http\Response
     */
    public function show(Bloodgroup $bloodgroup)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bloodgroup  $bloodgroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Bloodgroup $bloodgroup, Request $request)
    {
        return view('admin.bloodgroup.bloodgroup_show', [
            'bd' => $bloodgroup,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'bd_title' => 'required|unique:bloodgroups,bd_title'|'string',
            'bd' => 'required|unique:bloodgroups,bd'|'string',
        ],

        $messages = [
            'bd_title.unique' => 'Blood group title should be unique.',
            'bd_title.required' => 'You must insert blood group title.',
            'bd.required' => 'You must insert blood group.',
            'bd.unique' => 'Blood group should be unique.',
            'bd.string' => 'Blood group should be a string.',
            'bd_title.string' => 'Blood group title should be string.',
        ]);

        Bloodgroup::findOrFail($request->id)->update([
            'bd' => $request->bd,
            'bd_title' => $request->bd_title,
            'added_by' => Auth::id(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('bloodgroup.bloodgroup.index')->with('bd_edited', 'Congratulation, you have edited '.$request->bd_title.' as a blood group..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bloodgroup  $bloodgroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Bloodgroup::findOrFail($id)->forcedelete();
        return redirect()->route('bloodgroup.bloodgroup.index')->with('bd_deleted', 'You have deleted a blood group..');
    }
}
