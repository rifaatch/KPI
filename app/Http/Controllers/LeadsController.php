<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Office;
use App\Models\Zoho;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Carbon\Carbon;

class LeadsController extends Controller
{

    public function leadsByOffice ()

    {
        $currentDate = Carbon::now();
        $selectedDate= $currentDate->toDateString();

        $offices=Office::all();
        return view('newleads.byoffice' , compact('offices' , 'selectedDate'));


    }


    public function leadsByOfficeByDate ( Request $request ) {


        $selectedDate=$request->input('selecteddate');
        $offices=Office::all();
        return view('newleads.listofoffices' , compact('offices' , 'selectedDate'));



    }

    public function leadsByOfficeByEmployees ( $officeid , $selectedDate  )

    {

        $employees=Employee::where( 'office_id' , '=' , $officeid )->get() ;
        $office=Office::where('id', '=' ,$officeid)->first();
        return view ('newleads.byemployees' , compact('employees' , 'office','selectedDate'));

    }


    public function leadsByOfficeBtw2Dates (){
        $currentDate = Carbon::now();
        $selectedDate= $currentDate->toDateString();

        $offices=Office::all();
        return view('newleads.byofficebtw2dates' , compact('offices' , 'selectedDate'));

    }

}
