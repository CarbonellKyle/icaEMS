<?php

namespace App\Http\Controllers;

use App\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    public function index()
    {
        
        $equipment = DB::table('equipments')->get();
        return view('equipment.index',compact('equipment'))
            ->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        $equipment = DB::table('equipments')->select('*')->get();

        return view('/equipment.create', compact('equipment'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipment_name'=>'required',
            'date_added'=>'required',
        ]);

        Equipment::create($request->all());

        return redirect()->route('equipment.index')
            ->with('success','Equipment Successfully Added');
    }

    public function show(Equipment $equipment)
    {
        return view('equipment.show',compact('equipment'));
    }

    public function edit(Equipment $equipments)
    {
        return view('equipment.edit',compact('equipments'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        $request->validate([
        ]);

        $equipment->update($request->all());

        return redirect()->route('equipment.index')
            ->with('success','Updated Successfully.');
    }

    public function destroy(Equipment $equipments)
    {
        $equipments->delete();

        return redirect()->route('equipment.index')
            ->with('success','Removed Successfully.');
    }
}
