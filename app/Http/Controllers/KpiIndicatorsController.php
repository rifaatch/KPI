<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Holiday;
use App\Models\Office;
use Illuminate\Http\Request;
use App\Models\KpiIndicator;
use App\Http\Controllers\Controller;
use Exception;
use Carbon\Carbon;
use App\Http\Helpers\DateCalculation;

class KpiIndicatorsController extends Controller
{
    public function __construct()
    {
        //if trying to access this controller without being authenticated, it will ask him for authentication
        $this->middleware('auth');

    }


    /**
     * Display a listing of the kpi indicators.
     *
     * @return Illuminate\View\View
     */


    public function index()
    {
        $kpiIndicators = KpiIndicator::with('employee')->paginate(15);

        return view('kpi_indicators.index', compact('kpiIndicators'));
    }

    /**
     * Show the form for creating a new kpi indicator.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $employees = Employee::pluck('name', 'id')->all();

        return view('kpi_indicators.create', compact('employees'));
    }

    /**
     * Store a new kpi indicator in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);
            $user_kpi = KpiIndicator::where('employee_id', '=', $data['employee_id'])->first();
            if ($user_kpi) {
                return back()->withInput()
                    ->withErrors(['unexpected_error' => 'this user has already a KPI indicator']);


            } else {

                KpiIndicator::create($data);

                return redirect()->route('kpi_indicators.kpi_indicator.index')
                    ->with('success_message', 'Kpi Indicator was successfully added!');
            }

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified kpi indicator.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $kpiIndicator = KpiIndicator::with('employee')->findOrFail($id);

        return view('kpi_indicators.show', compact('kpiIndicator'));
    }

    /**
     * Show the form for editing the specified kpi indicator.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $kpiIndicator = KpiIndicator::findOrFail($id);
        $employees = Employee::pluck('name', 'id')->all();

        return view('kpi_indicators.edit', compact('kpiIndicator', 'employees'));
    }

    /**
     * Update the specified kpi indicator in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);


            $kpiIndicator = KpiIndicator::findOrFail($id);
            $kpiIndicator->update($data);

            return redirect()->route('kpi_indicators.kpi_indicator.index')
                ->with('success_message', 'Kpi Indicator was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified kpi indicator from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $kpiIndicator = KpiIndicator::findOrFail($id);
            $kpiIndicator->delete();

            return redirect()->route('kpi_indicators.kpi_indicator.index')
                ->with('success_message', 'Kpi Indicator was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    public function LeadsBtwDates ()
    {
        $currentDate = Carbon::now();
        $selectedDate = $currentDate->toDateString();

        return view ('newleads.kpiindicator' , compact('selectedDate'));
    }


    public function resultLeadsBtwDates (Request $request   )
    {
        $date1 = $request->input('selecteddate1');
        $date2 = $request->input('selecteddate2');
        $dateCalculation=New DateCalculation ;

        $offices=Office::all();
        foreach ( $offices as $office )
        {
            $workingdays=$dateCalculation->workingKays($date1 ,$date2 );
            $countofhollidays=Holiday::where('office_id','=',$office->id)->whereDate('date', '>=', $date1)->whereDate('date', '<=', $date2)->get()->count();
            $newleads=$office->leads()->whereDate('leads.created_at', '>=', $date1)->whereDate('leads.created_at', '<=', $date2)->count();
            $events=$office->events()->whereDate('Lead_events.created_at', '>=', $date1)->whereDate('Lead_events.created_at', '<=', $date2)->count();
            $workingdays=$workingdays-$countofhollidays;
            $office['workingdays']=  $workingdays ;
            $office['newleads']=  $newleads ;
            $office['events']=  $events ;

    }

                  //dd($offices);

         return view ('newleads.kpiindicatorresult' , compact('offices' , 'date1' , 'date2'));
    }

    public function  byEmployeesBydates ($officeid , $date1 , $date2)
       {
           $offices = Office::pluck('office_name', 'id')->all();
           $selectedoffice=Office::where('id', '=',$officeid)->first();
           $dateCalculation=New DateCalculation ;
           $workingdays=$dateCalculation->workingKays($date1 ,$date2 );
           $countofhollidays=Holiday::where('office_id','=',$selectedoffice->id)->whereDate('date', '>=', $date1)
               ->whereDate('date', '<=', $date2)->get()->count();
           $workingdays=$workingdays-$countofhollidays;


          return view ('newleads.kpiindicatorbyemployees', compact('offices' , 'selectedoffice' , 'date1' , 'date2' ,'workingdays'));



    }


    public function  resultbyEmployeesBydates (Request $request)

    {
        $date1 = $request->input('selecteddate1');
        $date2 = $request->input('selecteddate2');
        $officeid=$request->input('officeid');
              $selectedoffice=Office::where('id', '=',$officeid)->first();
        $dateCalculation=New DateCalculation ;
        $workingdays=$dateCalculation->workingKays($date1 ,$date2 );
        $countofhollidays=Holiday::where('office_id','=',$selectedoffice->id)->whereDate('date', '>=', $date1)
            ->whereDate('date', '<=', $date2)->get()->count();
        $workingdays=$workingdays-$countofhollidays;

       return view ('newleads.kpiindicatorresultbyemployee', compact( 'selectedoffice' , 'date1' , 'date2' ,'workingdays'));



    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\sxRequest\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'employee_id' => 'required',
            'action' => 'required|numeric|min:-2147483648|max:2147483647',
            'newlead' => 'required|numeric|min:-2147483648|max:2147483647',

        ];


        $data = $request->validate($rules);


        return $data;
    }

}
