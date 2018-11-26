<?php

namespace App\Http\Controllers;


use App\Models\Office;
use App\Models\Counselor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class CounselorsController extends Controller
{

    /**
     * Display a listing of the counselors.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $counselors = Counselor::paginate(25);

        return view('counselors.index', compact('counselors'));
    }

    /**
     * Show the form for creating a new counselor.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {

$offices = Office::pluck('office_name','id')->all();
        
        return view('counselors.create', compact('zohos','offices'));
    }

    /**
     * Store a new counselor in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Counselor::create($data);

            return redirect()->route('counselors.counselor.index')
                             ->with('success_message', 'Counselor was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified counselor.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $counselor = Counselor::findOrFail($id);

        return view('counselors.show', compact('counselor'));
    }

    /**
     * Show the form for editing the specified counselor.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $counselor = Counselor::findOrFail($id);

$offices = Office::pluck('office_name','id')->all();

        return view('counselors.edit', compact('counselor','offices'));
    }

    /**
     * Update the specified counselor in the storage.
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
            
            $counselor = Counselor::findOrFail($id);
            $counselor->update($data);

            return redirect()->route('counselors.counselor.index')
                             ->with('success_message', 'Counselor was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified counselor from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $counselor = Counselor::findOrFail($id);
            $counselor->delete();

            return redirect()->route('counselors.counselor.index')
                             ->with('success_message', 'Counselor was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request , $counselor_id=null)
    {
        $rules = [
            'name' => 'required|string|min:1|max:100',
            'zoho_id' => 'sometimes|required|unique:counselors,zoho_id,'. $counselor_id,
            'office_id' => 'required',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
