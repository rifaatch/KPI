<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class OfficesController extends Controller
{

    public function __construct()
    {
        //if trying to access this controller without being authenticated, it will ask him for authentication
        $this->middleware('auth');

    }

    /**
     * Display a listing of the offices.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $offices = Office::paginate(25);

        return view('offices.index', compact('offices'));
    }

    /**
     * Show the form for creating a new office.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('offices.create');
    }

    /**
     * Store a new office in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Office::create($data);

            return redirect()->route('offices.office.index')
                ->with('success_message', 'Office was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified office.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $office = Office::findOrFail($id);

        return view('offices.show', compact('office'));
    }

    /**
     * Show the form for editing the specified office.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $office = Office::findOrFail($id);


        return view('offices.edit', compact('office'));
    }

    /**
     * Update the specified office in the storage.
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

            $office = Office::findOrFail($id);
            $office->update($data);

            return redirect()->route('offices.office.index')
                ->with('success_message', 'Office was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified office from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $office = Office::findOrFail($id);
            $office->delete();

            return redirect()->route('offices.office.index')
                ->with('success_message', 'Office was successfully deleted!');

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
    protected function getData(Request $request)
    {
        $rules = [
            'office_name' => 'required|string|min:1|max:100',

        ];


        $data = $request->validate($rules);


        return $data;
    }

}
