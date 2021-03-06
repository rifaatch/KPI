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

    public function leadEvents($lead_id)
    {

        $leadevents = LeadEvent::where('lead_id', '=', $lead_id)->orderBy('created_at', 'desc')->paginate(25);
        //   dd($leadevents->total());
        $lead = Lead::where('id', '=', $lead_id)->first();

        return view('leadevents.eventslist', compact('leadevents', 'lead'));


    }

    public function leadEventsBtw2dates()

    {
        $currentDate = Carbon::now();
        $selectedDate = $currentDate->toDateString();
        return view('leadevents.eventsbtw2dates', compact('selectedDate'));

    }


    public function leadEventsBtw2datesByOffices(Request $request)
    {
        $selectedDate1 = $request->input('selecteddate1');
        $selectedDate2 = $request->input('selecteddate2');
        $offices = Office::all();
        return view('leadevents.eventlistbtwdatesbyoffices', compact('offices', 'selectedDate1', 'selectedDate2'));

    }

    public function leadEventsBtw2datesByEmployee(Request $request)
    {
        $date1 = $request->input('selecteddate1');
        $date2 = $request->input('selecteddate2');
        $office_id = $request->input('officeid');
        $employees = Employee::where('office_id', '=', $office_id)->get();
        return view('leadevents.listofeventbyemployeesbydates', compact('employees', 'date1', 'date2'));


    }

    public function listOfEventsByemp($office_id, $date1, $date2 = null)
    {
        if ($date2 == null) {

        } else {

            $offices = Office::pluck('office_name', 'id')->all();
            $selectedOffice = Office::where('id', '=', $office_id)->first();
            $message = "List of lead events done by " . "  between date: " . $date1 . " and date :" . $date2;
            return view('leadevents.byemployeesbtwdates', compact('selectedOffice', 'offices', 'date1', 'date2'))->with('successMsg', $message);

        }

    }

    public function eventsDetailsByemployeeByDates($employee_id, $date1, $date2 = null)

    {
        if ($date2 == null) {


        } else {

            $employees = Employee::pluck('name', 'id')->all();

            $selectedEmployee = Employee::where('id', '=', $employee_id)->first();
            //  $message="List of lead events done by " . "  between date: " .$date1 . " and date :" . $date2;
            $leadevents = $selectedEmployee->leadEvent()
                ->whereDate('lead_events.created_at', '>=', $date1)
                ->whereDate('lead_events.created_at', '<=', $date2)->paginate(25);
            return view('leadevents.eventdetailsbyemployeebydates', compact('selectedEmployee', 'employees', 'leadevents', 'date1', 'date2'));

        }
    }


    public function ListeventsByemployeeByDates(Request $request)
    {
        $date1 = $request->input('selecteddate1');
        $date2 = $request->input('selecteddate2');
        $employee_id = $request->input('employeeid');
        $filterby = $request->input('filterby');

        if (strlen($filterby) == 0) {

            $leadevents = LeadEvent::where('employee_id', '=', $employee_id)->whereDate('lead_events.created_at', '>=', $date1)
                ->whereDate('lead_events.created_at', '<=', $date2)->paginate(25);
        } else {
            $leadevents = LeadEvent::where('employee_id', '=', $employee_id)->whereDate('lead_events.created_at', '>=', $date1)
                ->whereDate('lead_events.created_at', '<=', $date2)->where('action_name', 'like', '%' . $filterby . '%')->paginate(25);

        }
        return view('leadevents.listofevents', compact('leadevents'));


    }


}
