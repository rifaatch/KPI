<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use App\Models\Employee;
use Carbon\Carbon;
use App\Models\Office;
use App\Models\ContactEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class ContactEventsController extends Controller
{
    public function __construct()
    {
        //if trying to access this controller without being authenticated, it will ask him for authentication
        $this->middleware('auth');

    }

    public function contactEvents($contact_id)
    {
        $contactEvents = ContactEvent::where('contact_id', '=', $contact_id)->orderBy('created_at', 'desc')->paginate(25);
        //   dd($leadevents->total());
        $contact = Contact::where('id', '=', $contact_id)->first();

        return view('contact_events.eventslist', compact('contact', 'contactEvents'));



    }

    public function contactEventsBtw2dates ()
    {
        $currentDate = Carbon::now();
        $selectedDate = $currentDate->toDateString();
        return view('contact_events.eventsbtw2dates', compact('selectedDate'));
    }

    public function contactEventsBtw2datesByOffices (Request $request)
    {
        $selectedDate1 = $request->input('selecteddate1');
        $selectedDate2 = $request->input('selecteddate2');
        $offices = Office::all();
        return view('contact_events.eventlistbtwdatesbyoffices', compact('offices', 'selectedDate1', 'selectedDate2'));

    }

    public function listOfEventsByemp($office_id, $date1, $date2 = null)
    {
        if ($date2 == null) {

        } else {

            $offices = Office::pluck('office_name', 'id')->all();
            $selectedOffice = Office::where('id', '=', $office_id)->first();
            $message = "List of Contact events done at " . "  between date: " . $date1 . " and date :" . $date2;
            return view('contact_events.byemployeesbtwdates', compact('selectedOffice', 'offices', 'date1', 'date2'))->with('successMsg', $message);

        }

    }

    public function contactEventsBtw2datesByEmployee (Request $request)
    {

        $date1 = $request->input('selecteddate1');
        $date2 = $request->input('selecteddate2');
        $office_id = $request->input('officeid');
        $employees = Employee::where('office_id', '=', $office_id)->get();
        return view('contact_events.listofeventbyemployeesbydates', compact('employees', 'date1', 'date2'));


    }

    public function eventsDetailsByemployeeByDates($employee_id, $date1, $date2 = null)

    {
        if ($date2 == null) {


        } else {

            $employees = Employee::pluck('name', 'id')->all();
            $selectedEmployee = Employee::where('id', '=', $employee_id)->first();
            //  $message="List of lead events done by " . "  between date: " .$date1 . " and date :" . $date2;
            $contactEvents = $selectedEmployee->contactEvents()
                ->whereDate('contact_events.created_at', '>=', $date1)
                ->whereDate('contact_events.created_at', '<=', $date2)->paginate(25);
            return view('contact_events.eventdetailsbyemployeebydates', compact('selectedEmployee', 'employees', 'contactEvents', 'date1', 'date2'));

        }
    }

    public function ListeventsByemployeeByDates(Request $request)
    {
        $date1 = $request->input('selecteddate1');
        $date2 = $request->input('selecteddate2');
        $employee_id = $request->input('employeeid');
        $filterby = $request->input('filterby');

        if (strlen($filterby) == 0) {

            $contactEvents = ContactEvent::where('employee_id', '=', $employee_id)->whereDate('contact_events.created_at', '>=', $date1)
                ->whereDate('contact_events.created_at', '<=', $date2)->paginate(25);
        } else {
            $contactEvents = ContactEvent::where('employee_id', '=', $employee_id)->whereDate('contact_events.created_at', '>=', $date1)
                ->whereDate('contact_events.created_at', '<=', $date2)->where('action_name', 'like', '%' . $filterby . '%')->paginate(25);

        }
        return view('contact_events.listofevents', compact('contactEvents'));


    }

}
