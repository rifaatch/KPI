<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Zoho;
use App\Models\Employee;
use App\Models\LeadEvent;
use App\Models\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Exception;
use Carbon\Carbon;

class LeadEventsController extends Controller
{

    public function __construct()
    {
        //if trying to access this controller without being authenticated, it will ask him for authentication
        $this->middleware('auth');

    }

    public  function  leadEvents ($lead_id)
    {

        $leadevents=LeadEvent::where('lead_id' ,'=' ,$lead_id ) ->orderBy('created_at', 'desc')->paginate(25);
     //   dd($leadevents->total());
        $lead=Lead::where('id','=' , $lead_id)->first();

        return view('leadevents.eventslist' , compact('leadevents', 'lead'));




    }

    public function leadEventsBtw2dates ()

    {
        $currentDate = Carbon::now();
        $selectedDate = $currentDate->toDateString();
        return view ('leadevents.eventsbtw2dates' , compact('selectedDate')) ;

    }


    public function leadEventsBtw2datesByOffices (Request $request)
    {
        $selectedDate1 = $request->input('selecteddate1');
        $selectedDate2 = $request->input('selecteddate2');
        $offices = Office::all();
        return view('leadevents.eventlistbtwdatesbyoffices', compact('offices', 'selectedDate1', 'selectedDate2'));

    }

    public  function  leadEventsBtw2datesByEmployee ( Request $request )
     {
         $date1 = $request->input('selecteddate1');
         $date2 = $request->input('selecteddate2');
         $office_id=$request->input('officeid');
         $employees = Employee::where ('office_id' , '=' , $office_id)->get();
         return view('leadevents.byemployeesbtwdates', compact('employees', 'date1', 'date2'));



    }

    public function listOfEventsByemp($office_id , $date1 , $date2=null)
    {
        if ( $date2 == null  ) {


        }
        else {

         //   $events=LeadEvent::where ( 'employee_id' ,  '=' , $employeeid) ->whereDate('lead_events.created_at', '>=', $date1)
           //     ->whereDate('lead_events.created_at', '<=', $date2)->paginate(25);

            $office=Office::where('id', '=',$office_id)->first();
            $message="List of lead events done by " . "  between date: " .$date1 . " and date :" . $date2;
            return view('leadevents.byemployeesbtwdates' , compact('events' ,'office') )->with('successMsg',$message);

        }



    }

}
