<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function getError()
    {
        return view('summary.errorHandler');
    }
    public function container()
    {
        return view('summary.container');
    }

    public function index()
    {
        $count = DB::table('equipments')->count();
        $content = DB::table('equipments')->distinct()->get();
        $name = DB::table('equipments')->select('equipment_name')->distinct()->get();
        $names = $name->pluck('equipment_name');
      
        // //to get all the data in the database table
       
        $data;
        $TimesBorrowed;
        for($i=0; $i < $count; $i++)
        {
            // to know how many times the equipments is borrowed
            $TimesBorrowed[$i] = DB::table('equipments as e')
           ->select(['e.equipment_id','e.equipment_name as fullname'])
            ->join('logs as l', 'l.equipment_id', '=', 'e.equipment_id')->where('e.equipment_name', $names[$i])->count();
            $id[$i] = DB::table('equipments')->select('equipment_id')->where('equipment_name',$names[$i])->distinct()->get();
            $ids = $id[$i]->pluck('equipment_id');
            $data[$i] = array($ids[0],$names[$i],$TimesBorrowed[$i]);
        }
      
       return view('summary.index', ['equipments'=>$data]);
    }

    public function getReports( Request $request)
    {
       // kaning month ug year mao ni ang gigamit para sa result sa imohang pag search sa mga records in a month and year
       // gi convert and month sa in ana nga process para e compare sa month sa any table nga naka date ang format
       // if january and month then after e execute ni nga process, January becomes 01, pero string type ra gihapon
        $month = date('m',strtotime($request->pickMonth));
        // kaning year, interger man sya sa default, gi convert sya force into "string" gamit and type casting nga method
        // which is (string)
         $year = (string)$request->pickYear;
      
        $testMonth = date('M', strtotime('January')); //Jan
        $testYear = date('Y', strtotime('2021')); // 2020

        // select all sata in the logs table 
        $logsData = DB::table('logs')->get();
        
      
        // testing
        $data;// this variable kai mahimong syang holder sa query sa sulod sa foreach loop
        foreach( $logsData as $item)
        {
            // to get all the data in particular month in a year
            $data = DB::table('equipments as e')
                    ->select(['e.equipment_id','e.equipment_name'])
                    ->join('logs as l','l.equipment_id','=','e.equipment_id')
                    ->whereYear('datetime_borrowed',$year)
                    ->whereMonth('datetime_borrowed',$month)
                    ->distinct()
                    ->get();
           
                    // to get the number of borrows each item
            $data1 = DB::table('equipments as e')
                    ->join('logs as l','e.equipment_id','=','l.equipment_id')
                    ->where('l.equipment_id','2001')
                    ->whereYear('l.datetime_borrowed',$year)
                    ->whereMonth('l.datetime_borrowed',$month)
                    ->distinct()
                    ->count();
                    
                    // method to get the item id every items in the select month and year
                    //return $data[0]->equipment_id;

               
        }        
        if($data->isEmpty())
        {
            return view('summary.errorHandler');
            //return redirect()->back()->with('alert',"Sorry! no records found");
        }
       
 // -------------------------------------------------------------final code -------------------------------------------------//


        // used to select all not distict records in a particular month and year
        // and purpose ani kai e select nita and kada line sa row nga under sa given month and year
        $notDistictRowForSelectedData = DB::table('equipments as e')
                    ->select(['e.equipment_id','e.equipment_name'])
                    ->join('logs as l','l.equipment_id','=','e.equipment_id')
                    ->whereYear('datetime_borrowed',$year)
                    ->whereMonth('datetime_borrowed',$month)
                    ->get();

        $arrayForid; // this variable kai mahimo syang array holder sulod sa for loop

        // for loop
        // ang outer loop, hold niya and distict equipment_id sa nga data sa given nga month, ug naka reference ang iyahang 
        // condition sa babaw, see the foreac loop naay data nga variable nga naka distict and selection
        for($i = 0; $i < count($data); $i++)
        {
            $counter =0; // this variable serves as the counter everytime naay mo true sa "if statement"
            
             $idHolder = $data[$i]->equipment_id; // return the id of every object or every row in particular month in a year

           // return  $data[$i]->equipment_id; // e return ani ang first object nga equipment_id

           // kaning inner loop, and condition niya kai naka base sa $notDistictRowForSelectedData nga variable
           // naa sa babaw ang explaination

            for($j = 0; $j < count($notDistictRowForSelectedData); $j++)
            {

                // e check niya if ang $idHolder ba kai naay reference sa table nga logs. dili niya sya distict nga 
                // pagka select sa table nga logs

                if($idHolder == $notDistictRowForSelectedData[$j]->equipment_id)
                {
                    $counter++;
                }
            }

            // gi store ang total nga occurence sa isa ka equipment_id sa tanan records sa logs
           $arrayForid[$i]=$counter;
        }
        
        // gi isa or gi sulod sa array and result sa $data and $arrayForid nga variable para ma isa sila. 

          $var = array($data, $arrayForid,[$month,$year]);
        // echo $var[2][0];
        // echo $var[2][1];
        return view('summary.data',['items'=>$var]);

        // ------------------------------------------------------------------this is the final 
        // ------------------------------------------------------------------another testing assets

        // method to output properly the $var array
        // for($i = 0; $i < 5; $i++)
        // {
        //     echo $var[0][$i]->equipment_name.' = '.$var[1][$i]."<br/>";;
        // }

        // used to return the length of the $var[0]
        // return count($var[0]);

        // ------------------------------------------------------------------another testing assets

      
    }

    // ang e return ani kai ang mga details sa kana nga particular id ex. if mo e click nimo ang 
    // details button sa summary mao ni iyahang method
    // mao ni iyahang process Friends... 
    public function getDetails($id)
    {

        $data = DB::table('equipments as e')
        ->select(['e.equipment_id','e.equipment_name','l.borrower_name','l.datetime_borrowed','l.datetime_returned'])
        ->join('logs as l','e.equipment_id','=','l.equipment_id')
        ->where('l.equipment_id',$id)
        ->get();
        return view('summary.record-details',['items'=>$data]);
    }

    // method ni para sa pag kuha nimo sa details after nimo na search ang month ug ang year
    // ex. nag search ka ug month nga January with year 2021
    // pag gawas sa result after sa pag search nimo, mo gawas ang mga data according sa imong gi search nga month ug year
    // with the details button in every row. pag click nimo sa details button. mo result sya sa specific 
    // details sa certain row nga imong gi click.
    // mao ni iyahang process Friends... 
    public function getDataDetails($id,$month, $year)
    {
        $data = DB::table('equipments as e')
        ->select(['e.equipment_id','e.equipment_name','l.borrower_name','l.datetime_borrowed','l.datetime_returned'])
        ->join('logs as l','e.equipment_id','=','l.equipment_id')
        ->where('l.equipment_id',$id)
        ->whereMonth('l.datetime_borrowed',$month)
        ->whereYear('l.datetime_borrowed',$year)
        ->get();
        return view('summary.record-details',['items'=>$data]);
    }
}
