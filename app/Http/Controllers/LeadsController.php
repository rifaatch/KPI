<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Office;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LeadsController extends Controller
{

    public function __construct()
    {
        //if trying to access this controller without being authenticated, it will ask him for authentication
        $this->middleware('auth');

    }


    public function leadsByOffice()

    {
        $currentDate = Carbon::now();
        $selectedDate = $currentDate->toDateString();

        $offices = Office::all();
        return view('newleads.byoffice', compact('offices', 'selectedDate'));


    }


    public function leadsByOfficeByDate(Request $request)
    {


        $selectedDate = $request->input('selecteddate');
        $offices = Office::all();
        return view('newleads.listofoffices', compact('offices', 'selectedDate'));


    }

    public function leadsByOfficeByEmployees($officeid, $selectedDate)

    {

        $employees = Employee::where('office_id', '=', $officeid)->get();
        $office = Office::where('id', '=', $officeid)->first();
        return view('newleads.byemployees', compact('employees', 'office', 'selectedDate'));

    }


    public function leadsByOfficeBtw2Dates()
    {
        $currentDate = Carbon::now();
        $selectedDate = $currentDate->toDateString();

        $offices = Office::all();
        return view('newleads.byofficebtw2dates', compact('offices', 'selectedDate'));

    }

    public function showNewleadsByOfficeByw2Dates(Request $request)
    {

        $selectedDate1 = $request->input('selecteddate1');
        $selectedDate2 = $request->input('selecteddate2');
        $offices = Office::all();
        return view('newleads.listofofficesbtw2dates', compact('offices', 'selectedDate1', 'selectedDate2'));


    }

    public function leadsByOfficeByEmployeesBydates($officeid = null, $date1 = null, $date2 = null)

    {
        if ($officeid <> null && $date1 <> null && $date2 <> null) {
            $employees = Employee::where('office_id', '=', $officeid)->get();
            $selectedOffice = Office::where('id', '=', $officeid)->first();
            $offices = Office::pluck('office_name', 'id')->all();
            return view('newleads.byemployeesbtwdates', compact('employees', 'offices', 'selectedOffice', 'date1', 'date2'));


        }
    }

    public function showNewleadsByEmployeesbtwdates(Request $request)
    {

        $date1 = $request->input('selecteddate1');
        $date2 = $request->input('selecteddate2');
        $office_id = $request->input('officeid');
        $employees = Employee::where('office_id', '=', $office_id)->get();
        return view('newleads.listofleadsbyemployeesbydates', compact('employees', 'date1', 'date2'));
    }

    public function listOfNewLeadsByemp($employeeid, $date1, $date2 = null)
    {
        if ($date2 == null) {

            $leads = Lead::where('employee_id', '=', $employeeid)->whereDate('leads.created_at', '=', $date1)->paginate(25);
            $employee = Employee::where('id', '=', $employeeid)->first();
            $message = "list of new leads by " . $employee->name . "  on: " . $date1;
            return view('newleads.listofleads', compact('leads', 'employee'))->with('successMsg', $message);

        } else {

            $leads = Lead::where('employee_id', '=', $employeeid)->whereDate('leads.created_at', '>=', $date1)
                ->whereDate('leads.created_at', '<=', $date2)->paginate(25);
            $employee = Employee::where('id', '=', $employeeid)->first();
            $message = "List of new leads by " . $employee->name . "  between date: " . $date1 . " and date :" . $date2;
            return view('newleads.listofleads', compact('leads', 'employee'))->with('successMsg', $message);

        }

    }

    public function search()
    {
        return view('newleads.search');
    }

    public function getSearchResult(Request $request)

    {
        $searchText = $request->input('searchText');
        $leads = Lead::where('client_name', 'like', '%' . $searchText . '%')
            ->orWhere('zoho_id', 'like', '%' . $searchText . '%')
            ->orWhere('description', 'like', '%' . $searchText . '%')
            ->paginate(25);


        return view('newleads.leads', compact('leads'));


    }

    public function bySources()
    {
        $currentDate = Carbon::now();
        $selectedDate = $currentDate->toDateString();
        return view('newleads.bysources', compact('selectedDate'));

    }


    public function groupBySources(Request $request)
    {

        $date1 = $request->input('selecteddate1');
        $date2 = $request->input('selecteddate2');
        $countBysources = Lead::whereDate('leads.created_at', '>=', $date1)
            ->whereDate('leads.created_at', '<=', $date2)
            ->select('source', DB::raw('count(*) as countsofleads'))
            ->groupBy('source')
            ->get();

        return view('newleads.listbysource', compact('countBysources', 'date1', 'date2'));

    }

    public function listOfNewLeadsBySource($date1, $date2, $source = null)
    {
        $employee = null;
        if ($source == null) {

            $leads = Lead::whereNull('source')->paginate(25);
            $message = "list of new leads obtained by undefined  advertising between date :" . $date1 . " and date:" . $date2;
            return view('newleads.listofleads', compact('leads', 'employee'))->with('successMsg', $message);

        } else {

            $leads = Lead::where('source', '=', $source)->paginate(25);
            $message = "list of new leads obtained by " . $source . "  advertising between date :" . $date1 . " and date:" . $date2;
            return view('newleads.listofleads', compact('leads', 'employee'))->with('successMsg', $message);

        }

    }

    public function pendingLeads()
    {
        $leads = Lead::where('status', '<>', 'converted')->where('status', '<>', 'cancelled')->where('status', '<>', 'closed')
            ->orWhereNull('status')->orderBy('updated_at', 'ASC')->paginate(25);
        $message = "list of pending leads  ";
        $employee = null;

        return view('newleads.listofleads', compact('leads', 'employee'))->with('successMsg', $message);
    }


}
