<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SystemUserController extends Controller
{
    public function searchUser(Request $request)
    {
         $user = $request->user;
         $notDistinctSystemUserData = DB::table('logs as l')
         ->select(['l.equipment_id','l.Borrower_name','e.equipment_name'])
         ->join('equipments as e','e.equipment_id','=','l.equipment_id')
         ->where('Borrower_name', $user)
         ->get();
         if(count($notDistinctSystemUserData) > 0)
         {
            $users = DB::table('role_user as r')
            ->select(['u.id','u.name','u.email','r.user_type'])
            ->join('users as u','u.id','=','r.user_id')
            ->where('u.name',$user)
            ->get();
    
           return view('admin.user.users',['users'=>$users]);
         }
         else{
            return redirect()->back()->with('warning','Opps!  '.$user.'  has no records!');
         }

         

    }
    public function getSystemUser()
    {
        
         $users = DB::table('role_user as r')
        ->select(['u.id','u.name','u.email','r.user_type'])
        ->join('users as u','u.id','=','r.user_id')
        ->where('r.role_id',3)
        ->get();

        //return count($users);
       return view('admin.user.users',['users'=>$users]);
    }

    public function getSystemUserDetails($name)
    {
         $notDistinctSystemUserData = DB::table('logs as l')
        ->select(['l.equipment_id','l.Borrower_name','e.equipment_name'])
        ->join('equipments as e','e.equipment_id','=','l.equipment_id')
        ->where('Borrower_name',$name)
        ->get();

        $distinctSystemUserData = DB::table('logs as l')
        ->select(['l.equipment_id','l.Borrower_name','e.equipment_name'])
        ->join('equipments as e','e.equipment_id','=','l.equipment_id')
        ->where('Borrower_name',$name)
        ->distinct()
        ->get();

        $idCounter;
        if(count($notDistinctSystemUserData) > 0)
            {
                $alternativeRecordDistictSelection;
            for($i =0; $i < count($distinctSystemUserData); $i++)
            {
                $counter =0;
                $idHolder = $distinctSystemUserData[$i]->equipment_id;
                for($j = 0; $j < count($notDistinctSystemUserData); $j++)
                {
                    if($idHolder == $notDistinctSystemUserData[$j]->equipment_id)
                    {
                        $counter++;
                    }
                }
                $idCounter[$i] = $counter;
            }
            $items = array($distinctSystemUserData,$idCounter);

            return view('admin.user.systemUserDetails',['items'=>$items, 'name'=>$name]);
           
        }else{
            return redirect()->back()->with('warning','Opps!  '.$name.'  has no records!');
        }
    }

    public function getSystemUserDetailsReport($id, $name)
    {

            $userBorrwedReport = DB::table('equipments as e')
            ->select(['e.equipment_id','e.equipment_name','l.datetime_borrowed','l.datetime_returned'])
            ->join('logs as l','e.equipment_id','=','l.equipment_id')
            ->where('l.equipment_id',$id)
            ->where('l.borrower_name',$name)
            ->get();
            return view('admin.user.systemUserDetailsReport',['items'=>$userBorrwedReport,'name'=>$name]);
    }
}
