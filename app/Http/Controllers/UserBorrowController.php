<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserBorrowController extends Controller
{
    //
    public function indexBorrow()
    {
         $items = DB::table('equipments')->get();
      
         return view('user.borrow.borrow',['items'=>$items]);
    }
    public function errorHandler()
    {
        return view('user.borrow.errorHandler');
    }

    public function borrowSubmit(Request $request)
    {
        $item_id = $request->borrowed_item;
        $date_returned = $request->date_returned;
        
        $date = Carbon::now();
        $date->toDateTimeString();
        $date_barrowed = $date->toDateString();
        $user = Auth::user()->name;

        DB::table('logs')->insert([
            'borrower_name' => $user,
            'equipment_id' => $item_id,
            'datetime_borrowed' => $date_barrowed,
            'datetime_returned' => $date_returned,
        ]);
        return redirect()->back()->with('message','Thanks! Equipment has been borrowed.');
    }

    public function borrowHistory()
    {
        // to get the current logged in user in the system
        $user = Auth::user()->name;
        // select the all records of the authenticated user according to current logged in user name
        $notDistinctHistoryData = DB::table('equipments as e')
        ->select(['e.equipment_id','e.equipment_name','l.borrower_name','l.datetime_borrowed','l.datetime_returned'])
        ->join('logs as l','e.equipment_id','=','l.equipment_id')
        ->where('l.borrower_name',$user)
        ->get();
        // select the distinct records of the authenticated user according to current logged in user name
        
         $distinctBorrowHistoryData = DB::table('logs as l')
        ->select(['l.equipment_id','l.Borrower_name','e.equipment_name'])
        ->join('equipments as e','e.equipment_id','=','l.equipment_id')
        ->where('Borrower_name',$user)
        ->distinct()
        ->get();
        //  $distinctBorrowHistoryData = DB::table('equipments as e')
        // ->select(['e.equipment_id','e.equipment_name','l.borrower_name','l.datetime_borrowed','l.datetime_returned'])
        // ->join('logs as l','e.equipment_id','=','l.equipment_id')
        // ->where('l.borrower_name',$user)
        // ->distinct()
        // ->get();
       
        // $idCounter is a counter array for evry occurence of of a distinct id in all records in logs
        // according to current user logged in name
        $idCounter;
        if(count($notDistinctHistoryData) > 0)
            {
                $alternativeRecordDistictSelection;
            // the outer for loop holds the distict id of every equipements that the current user is borrowed
            for($i =0; $i < count($distinctBorrowHistoryData); $i++)
            {
                $counter =0;
                $idHolder = $distinctBorrowHistoryData[$i]->equipment_id;
            // the inner for loop holds the not distict id of every equipements that the current user is borrowed
                for($j = 0; $j < count($notDistinctHistoryData); $j++)
                {
                    // examine if distict id of current logged user is duplicated, if it is, the count the number of accurance
                    if($idHolder == $notDistinctHistoryData[$j]->equipment_id)
                    {
                        //count the number of occurance of a distinct id in the logs table according to current logged user
                        $counter++;
                    }
                }
                // store to the array the number of occurance of every id of the current logged user.
                $idCounter[$i] = $counter;
            }
            //return  $alternativeRecordDistictSelection;;
            // merge the distinct id and its corresonding occurance according to the current logged user
            $items;
            //return $idCounter;
                $items = array($distinctBorrowHistoryData,$idCounter);
            //this is how to output the items array;
            // echo $items[0][0]->equipment_id;
            // echo $items[1][0];


 return view('user.borrow.borrow_history',['items'=> $items ]);
           
 //return redirect()->route('borrow.history'); // this methos is to redirect to the name route
        }else{
            return redirect()->route('history.error');
        }
    }
    
    public function borrowHistoryDetails($id)
    {
        $user = Auth::user()->name;
        // if the equipemts name has 2 occurance in the borrowed Hidtory table in the user ui, then this is the method
        //  to find out those two occurance details
        
            $items = DB::table('equipments as e')
            ->select(['e.equipment_id','e.equipment_name','l.datetime_borrowed','l.datetime_returned'])
            ->join('logs as l','e.equipment_id','l.equipment_id')
            ->where('l.borrower_name',$user)
            ->where('l.equipment_id',$id)
            ->get();

            return view('user.borrow.borrowDetails',['items'=>$items]);
    }
   
}
