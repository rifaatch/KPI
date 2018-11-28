<?php

namespace App\Http\Controllers;


use App\Models\Application;
use App\Models\Office;
use App\Models\Admission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;

class AdmissionsController extends Controller
{

    public function __construct()
    {
        //if trying to access this controller without being authenticated, it will ask him for authentication
        $this->middleware('auth');

    }


    /**
     * Display a listing of the admissions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $admissions = Admission::paginate(25);

        return view('admissions.index', compact('admissions'));
    }

    /**
     * Show the form for creating a new admissions.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {

        $offices = Office::pluck('office_name','id')->all();
        return view('admissions.create', compact('offices'));
    }

    /**
     * Store a new admissions in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Admission::create($data);

            return redirect()->route('admissions.admissions.index')
                             ->with('success_message', 'Admissions was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified admissions.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $admission = Admission::with('zoho','office')->findOrFail($id);

        return view('admissions.show', compact('admission'));
    }

    /**
     * Show the form for editing the specified admissions.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $admission = Admission::findOrFail($id);

        $offices = Office::pluck('office_name','id')->all();

        return view('admissions.edit', compact('admission','offices'));
    }

    /**
     * Update the specified admissions in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request , $id);
            
            $admissions = Admission::findOrFail($id);
            $admissions->update($data);

            return redirect()->route('admissions.admissions.index')
                             ->with('success_message', 'Admissions was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified admissions from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $admissions = Admission::findOrFail($id);
            $admissions->delete();

            return redirect()->route('admissions.admissions.index')
                             ->with('success_message', 'Admissions was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    public function applicationByStatus ()
    {

        $currentDate = Carbon::now();
        $selectedDate = $currentDate->toDateString();
        $statusList=['active','nactive','closed','cancelled','creation'];
        // dd($statusList);
        $admissions=Admission::all();
        return view('admissions.applications-by-status', compact('selectedDate' ,'statusList' ,'admissions' ));

    }

    public function getDataApplication (Request $request)
    {

        $selectedStatus = $request->input('selectedStatus');
        $selectedAdmission = $request->input('selectedAdmission');


        $applications = Application::where('status', '=',  $selectedStatus);

        if ($selectedAdmission <> 0) $applications=$applications->where('admission_id' ,'=' ,$selectedAdmission);
        $applications=$applications->orderBy('created_at')->paginate(25);

        return view('applications.applications', compact('applications'));


    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request , $admission =null)
    {
        $rules = [
            'name' => 'required|string|min:1|max:100',
            'zoho_id' => 'sometimes|required|unique:admissions,zoho_id,'. $admission,
            'office_id' => 'required',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
