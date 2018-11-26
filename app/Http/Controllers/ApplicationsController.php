<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Counselor;
use Carbon\Carbon;
use App\Models\Office;
use App\Models\Employee;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Exception;

class ApplicationsController extends Controller
{

    public function __construct()
    {
        //if trying to access this controller without being authenticated, it will ask him for authentication
        $this->middleware('auth');

    }

    public function ApplicationByOfficeBtw2Dates()
    {

        $currentDate = Carbon::now();
        $selectedDate = $currentDate->toDateString();

        $offices = Office::all();
        return view('applications.byofficebtw2dates', compact('offices', 'selectedDate'));
    }

    public function showNewApplicationsByOfficeBtw2Dates(Request $request)
    {
        $selectedDate1 = $request->input('selecteddate1');
        $selectedDate2 = $request->input('selecteddate2');
        $offices = Office::all();
        return view('applications.listofofficesbtw2dates', compact('offices', 'selectedDate1', 'selectedDate2'));


    }

    public function ByOfficeByEmployeesBydates($officeid = null, $date1 = null, $date2 = null)
    {
        if ($officeid <> null && $date1 <> null && $date2 <> null) {
            $employees = Employee::where('office_id', '=', $officeid)->get();
            $selectedOffice = Office::where('id', '=', $officeid)->first();
            $offices = Office::pluck('office_name', 'id')->all();
            return view('applications.byemployeesbtwdates', compact('employees', 'offices', 'selectedOffice', 'date1', 'date2'));


        }


    }

    public function showNewAppsByEmployeesbtwdates(Request $request)
    {
        $date1 = $request->input('selecteddate1');
        $date2 = $request->input('selecteddate2');
        $office_id = $request->input('officeid');
        $employees = Employee::where('office_id', '=', $office_id)->get();
        return view('applications.listofappsbyemployeesbydates', compact('employees', 'date1', 'date2'));

    }

    public function listOfNewAppsByemp($employeeid, $date1, $date2 = null)
    {
        if ($date2 == null) {

            // to  be done

        } else {

            $applications = Application::where('employee_id', '=', $employeeid)->whereDate('applications.created_at', '>=', $date1)
                ->whereDate('applications.created_at', '<=', $date2)->paginate(5);
            $employee = Employee::where('id', '=', $employeeid)->first();
            $message = "List of new Applications by " . $employee->name . "  between date: " . $date1 . " and date :" . $date2;
            return view('applications.listofapplications', compact('applications', 'employee'))->with('successMsg', $message);

        }

    }

    public function bySources()
    {
        $currentDate = Carbon::now();
        $selectedDate = $currentDate->toDateString();
        return view('applications.bysources', compact('selectedDate'));


    }

    public function groupBySources(Request $request)
    {
        $date1 = $request->input('selecteddate1');
        $date2 = $request->input('selecteddate2');
        $countBysources = Application::whereDate('applications.created_at', '>=', $date1)
            ->whereDate('applications.created_at', '<=', $date2)
            ->select('source', DB::raw('count(*) as countsofapplications'))
            ->groupBy('source')
            ->get();

        return view('applications.listbysource', compact('countBysources', 'date1', 'date2'));
    }

    public function listOfNewAppsBySource($date1, $date2, $source = null)
    {
        $employee = null;
        if ($source == null) {

            $applications = Application::whereNull('source')->paginate(25);
            $message = "list of new applications obtained by undefined  advertising between date :" . $date1 . " and date:" . $date2;
            return view('applications.listofapplications', compact('applications', 'employee'))->with('successMsg', $message);

        } else {

            $applications = Application::where('source', '=', $source)->paginate(25);
            $message = "list of new applications obtained by " . $source . "  advertising between date :" . $date1 . " and date:" . $date2;
            return view('applications.listofapplications', compact('applications', 'employee'))->with('successMsg', $message);

        }

    }

    public function pendingApplication()
    {
        $applications = Application::where('status', '<>', 'converted')->where('status', '<>', 'cancelled')->where('status', '<>', 'closed')
            ->orWhereNull('status')->orderBy('updated_at', 'ASC')->paginate(25);
        $message = "list of pending applications  ";
        $employee = null;

        return view('applications.listofapplications', compact('applications', 'employee'))->with('successMsg', $message);
    }

    public function search()
    {
        return view('applications.search');
    }

    public function getSearchResult(Request $request)

    {
        $searchText = $request->input('searchText');
        $applications = Application::where('client_name', 'like', '%' . $searchText . '%')
            ->orWhere('zoho_id', 'like', '%' . $searchText . '%')
            ->orWhere('description', 'like', '%' . $searchText . '%')
            ->paginate(25);

        return view('applications.applications', compact('applications'));


    }


    public  function filter ()

    {
        $currentDate = Carbon::now();
        $selectedDate = $currentDate->toDateString();
        $statusList=['active','nactive','closed','cancelled','creation'];
       // dd($statusList);
        $admissions=Admission::all();
        $counsulors=Counselor::all();
        return view('applications.filter', compact('selectedDate' ,'statusList' ,'admissions' ,'counsulors'));

    }

    public function runFilteration (Request $request)
    {

        $selectedStatus = $request->input('selectedStatus');
        $selectedAdmission = $request->input('selectedAdmission');
        $selectedcounsulor = $request->input('selectedcounsulor');

        $applications = Application::where('status', '=',  $selectedStatus);

       if ($selectedAdmission <> 0) $applications=$applications->where('admission_id' ,'=' ,$selectedAdmission);
       if ($selectedcounsulor <> 0) $applications=$applications->where('counselor_id' ,'=' ,$selectedcounsulor);
        $applications=$applications->orderBy('created_at')->paginate(25);

        return view('applications.applications', compact('applications'));


    }
}


