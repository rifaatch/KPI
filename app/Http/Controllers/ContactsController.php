<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Office;
use Exception;

class ContactsController extends Controller
{
    public function __construct()
    {
        //if trying to access this controller without being authenticated, it will ask him for authentication
        $this->middleware('auth');

    }

    public function ContactByOfficeBtw2Dates ()
    {
        $currentDate = Carbon::now();
        $selectedDate = $currentDate->toDateString();

        $offices = Office::all();
        return view('contacts.byofficebtw2dates', compact('offices', 'selectedDate'));
    }
    public function  showNewContactsByOfficeBtw2Dates (Request $request)
        {
            $selectedDate1 = $request->input('selecteddate1');
            $selectedDate2 = $request->input('selecteddate2');
            $offices = Office::all();
            return view('contacts.listofofficesbtw2dates', compact('offices', 'selectedDate1', 'selectedDate2'));


        }

    public function ByOfficeByEmployeesBydates($officeid = null, $date1 = null, $date2 = null)
    {
        if ($officeid <> null && $date1 <> null && $date2 <> null) {
            $employees = Employee::where('office_id', '=', $officeid)->get();
            $selectedOffice = Office::where('id', '=', $officeid)->first();
            $offices = Office::pluck('office_name', 'id')->all();
            return view('contacts.byemployeesbtwdates', compact('employees', 'offices', 'selectedOffice', 'date1', 'date2'));


        }
    }


    public function showNewContactsByEmployeesbtwdates (Request $request)
    {
        $date1 = $request->input('selecteddate1');
        $date2 = $request->input('selecteddate2');
        $office_id = $request->input('officeid');
        $employees = Employee::where('office_id', '=', $office_id)->get();
        return view('contacts.listofcontactsbyemployeesbydates', compact('employees', 'date1', 'date2'));

    }

    public function listOfNewContactsByemp ($employeeid, $date1, $date2 = null)
    {
        if ($date2 == null) {

            // to  be done

        } else {

            $contacts = Contact::where('employee_id', '=', $employeeid)->whereDate('contacts.created_at', '>=', $date1)
                ->whereDate('contacts.created_at', '<=', $date2)->paginate(5);
            $employee = Employee::where('id', '=', $employeeid)->first();
            $message = "List of new Contacts by " . $employee->name . "  between date: " . $date1 . " and date :" . $date2;
            return view('contacts.listofcontacts', compact('contacts', 'employee'))->with('successMsg', $message);

        }

    }

    public function search()
    {
        return view('contacts.search');
    }

    public function getSearchResult(Request $request)

    {
        $searchText = $request->input('searchText');
        $contacts = Contact::where('client_name', 'like', '%' . $searchText . '%')
            ->orWhere('zoho_id', 'like', '%' . $searchText . '%')
            ->orWhere('description', 'like', '%' . $searchText . '%')
            ->paginate(25);


        return view('contacts.contacts', compact('contacts'));


    }




}
