<?php

namespace App\Http\Controllers;


use App\Models\Employee;
use App\Models\Application;

use Illuminate\Http\Request;
use App\Models\ApplicationEvent;
use Carbon\Carbon;
use App\Models\Office;
use App\Http\Controllers\Controller;
use Exception;

class ApplicationEventsController extends Controller
{

    public function __construct()
    {
        //if trying to access this controller without being authenticated, it will ask him for authentication
        $this->middleware('auth');

    }

    public function AppEvents($app_id)
    {


        $appEvents = ApplicationEvent::where('application_id', '=', $app_id)->orderBy('created_at', 'desc')->paginate(25);
        //   dd($leadevents->total());
        $application = Application::where('id', '=', $app_id)->first();

        return view('application_events.eventslist', compact('application', 'appEvents'));


    }

    public function appEventsBtw2dates()


    {
        $currentDate = Carbon::now();
        $selectedDate = $currentDate->toDateString();
        return view('application_events.eventsbtw2dates', compact('selectedDate'));

    }

    public function appEventsBtw2datesByOffices(Request $request)
    {
        $selectedDate1 = $request->input('selecteddate1');
        $selectedDate2 = $request->input('selecteddate2');
        $offices = Office::all();
        return view('application_events.eventlistbtwdatesbyoffices', compact('offices', 'selectedDate1', 'selectedDate2'));

    }

    public function listOfEventsByemp($office_id, $date1, $date2 = null)
    {
        if ($date2 == null) {

        } else {

            $offices = Office::pluck('office_name', 'id')->all();
            $selectedOffice = Office::where('id', '=', $office_id)->first();
            $message = "List of Application events done at " . "  between date: " . $date1 . " and date :" . $date2;
            return view('application_events.byemployeesbtwdates', compact('selectedOffice', 'offices', 'date1', 'date2'))->with('successMsg', $message);

        }

    }

    public function appEventsBtw2datesByEmployee(Request $request)
    {
        $date1 = $request->input('selecteddate1');
        $date2 = $request->input('selecteddate2');
        $office_id = $request->input('officeid');
        $employees = Employee::where('office_id', '=', $office_id)->get();
        return view('application_events.listofeventbyemployeesbydates', compact('employees', 'date1', 'date2'));


    }

    public function eventsDetailsByemployeeByDates($employee_id, $date1, $date2 = null)

    {
        if ($date2 == null) {


        } else {

            $employees = Employee::pluck('name', 'id')->all();
            $selectedEmployee = Employee::where('id', '=', $employee_id)->first();
            //  $message="List of lead events done by " . "  between date: " .$date1 . " and date :" . $date2;
            $applicationEvents = $selectedEmployee->applicationEvents()
                ->whereDate('application_events.created_at', '>=', $date1)
                ->whereDate('application_events.created_at', '<=', $date2)->paginate(25);
            return view('application_events.eventdetailsbyemployeebydates', compact('selectedEmployee', 'employees', 'applicationEvents', 'date1', 'date2'));

        }
    }


    public function ListeventsByemployeeByDates(Request $request)
    {
        $date1 = $request->input('selecteddate1');
        $date2 = $request->input('selecteddate2');
        $employee_id = $request->input('employeeid');
        $filterby = $request->input('filterby');

        if (strlen($filterby) == 0) {

            $applicationEvents = ApplicationEvent::where('employee_id', '=', $employee_id)->whereDate('application_events.created_at', '>=', $date1)
                ->whereDate('application_events.created_at', '<=', $date2)->paginate(25);
        } else {
            $applicationEvents = ApplicationEvent::where('employee_id', '=', $employee_id)->whereDate('application_events.created_at', '>=', $date1)
                ->whereDate('application_events.created_at', '<=', $date2)->where('action_name', 'like', '%' . $filterby . '%')->paginate(25);

        }
        return view('application_events.listofevents', compact('applicationEvents'));


    }

}
