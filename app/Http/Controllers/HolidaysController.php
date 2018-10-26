<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Holiday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use App\Http\Helpers\DateCalculation;

class HolidaysController extends Controller
{

    public function __construct()
    {
        //if trying to access this controller without being authenticated, it will ask him for authentication
        $this->middleware('auth');

    }


    /**
     * Display a listing of the holidays.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {

        $holidays = Holiday::with('office')->paginate(25);

        return view('holidays.index', compact('holidays'));
    }

    /**
     * Show the form for creating a new holiday.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $offices = Office::pluck('office_name', 'id')->all();

        return view('holidays.create', compact('offices'));
    }

    /**
     * Store a new holiday in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Holiday::create($data);

            return redirect()->route('holidays.holiday.index')
                ->with('success_message', 'Holiday was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified holiday.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $holiday = Holiday::with('office')->findOrFail($id);

        return view('holidays.show', compact('holiday'));
    }

    /**
     * Show the form for editing the specified holiday.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $holiday = Holiday::findOrFail($id);
        $offices = Office::pluck('office_name', 'id')->all();

        return view('holidays.edit', compact('holiday', 'offices'));
    }

    /**
     * Update the specified holiday in the storage.
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

            $holiday = Holiday::findOrFail($id);
            $holiday->update($data);

            return redirect()->route('holidays.holiday.index')
                ->with('success_message', 'Holiday was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified holiday from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $holiday = Holiday::findOrFail($id);
            $holiday->delete();

            return redirect()->route('holidays.holiday.index')
                ->with('success_message', 'Holiday was successfully deleted!');

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
            'name' => 'required|string|min:1|max:50',
            'office_id' => 'required',
            'date' => 'required',
            'year' => 'required|numeric|min:-2147483648|max:2147483647',

        ];


        $data = $request->validate($rules);


        return $data;
    }

}
