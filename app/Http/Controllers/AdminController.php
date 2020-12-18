<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    public function index()
    {
        $admin = Log::all();
        return view('admin.index',compact('admin'))
            ->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
    $admin = Log::all();

    return view('/admin.create', compact('admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'borrower_name'=>'required',
            'equipment_name'=>'required',
            'datetime_borrowed'=>'required',
            'datetime_returned'=>'nullable',
        ]);

        Log::create($request->all());

        return redirect()->route('admin.index')
            ->with('success',' Recorded.');
    }

    public function show(Log $admin)
    {
        return view('admin.show',compact('admin'));
    }
    public function edit(Log $admin)
    {
        return view('admin.edit',compact('admin'));
    }

    public function update(Request $request, Log $admin)
    {
        $request->validate([
        ]);

        $admin->update($request->all());

        return redirect()->route('admin.index')
            ->with('success','Updated successfully.');
    }

    public function destroy(Log $admin)
    {
        $admin->delete();

        return redirect()->route('admin.index')
            ->with('success','Deleted successfully.');
    }
}