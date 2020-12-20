<?php

namespace App\Http\Controllers;

use App\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    // add equipment to the equipments table 
    public function addEquipment(Request $request)
    {
        $dates = Carbon::now();
        $dates->toDateTimeString();
        $newEquipment =  $request->equipment;
        $dateAdded = $dates->toDateString();  
        $equipment = DB::table('equipments')
        ->insert([
            'equipment_name' => $newEquipment,
            'date_added' =>  $dateAdded, 
        ]);
        return redirect()->back()->with('success','Thanks! '.$newEquipment. ' is Added');
    }

    // to show the equipments info to update
    public function updateEquipment($id)
    {
         $id = DB::table('equipments')
        ->where('equipment_id',$id)
        ->get();

       return view('equipment.edit',['items'=>$id]);
    }

    // this function is to submit only to update the equipment's name and the data added is current
    public function submitUpdate(Request $request,$id)
    {
        $dates = Carbon::now();
        $dates->toDateTimeString();
        $dateAdded = $dates->toDateString(); 

        $oldData = DB::table('equipments')
        ->where('equipment_id',$id)
       ->get();
        $oldName = $oldData[0]->equipment_name;

        $update = DB::table('equipments')
        ->where('equipment_id', $id)
        ->update([
            'equipment_name' => $request->equipment,
            'date_added' =>  $dateAdded,
        ]);
        return redirect()->back()->with('success','Success! '.$oldName.' is updated ');
    }

    public function removeEquipments($id, $name)
    {
        DB::table('equipments')->where('equipment_id',$id)->delete();
        return redirect()->back()->with('remove',' Removing Complete! '.$name.' has been deleted!');
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

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'equipment_name'=>'required',
    //         'date_added'=>'required',
    //     ]);

    //     Equipment::create($request->all());

    //     return redirect()->route('equipment.index')
    //         ->with('success','Equipment Successfully Added');
    // }

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
