<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    public function index()
    {
        // $admin = Log::all();
        // return view('admin.index',compact('admin'))
        //     ->with('i',(request()->input('page',1)-1)*5);

         $logsData = DB::table('logs as l')
        ->select(['l.Id','l.borrower_name','e.equipment_name','l.datetime_borrowed','l.datetime_returned'])
        ->join('equipments as e','e.equipment_id','=','l.equipment_id')
        ->orderby('l.Id','asc')
        ->get();

        return view('admin.index',['items'=>$logsData]);
        // return $logsData[1]->Id;

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
            ->with('success',' Recorded');
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
            ->with('success','User record has been successfully deleted!.');
    }

    public function profile()
    {
        return view('admin.profile');
    }
}