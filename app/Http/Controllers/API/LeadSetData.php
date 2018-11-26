<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;
use App\Models\LeadEvent;
use App\Models\Employee;
use Carbon\Carbon;
use App\Models\Counselor;
use App\Models\Admission;


class LeadSetData extends Controller
{

    public function addData()
    {
        try {

            $today = date("Ymd");
            $data = array();
            $request = Request::capture();

            $data['leadid'] = Input::get('leadid'); //it is Zoho lead id
            $data['clientName'] = Input::get('clientname'); // optional
            $data['employId'] = Input::get('employid');
            $data['counselor_id'] = Input::get('counselorid'); //optional it an id from zoho
            $data['admission_id'] = Input::get('admissionid'); //optional it an id from zoho
            $data['status'] = Input::get('status');
            $data['description'] = Input::get('description'); //optional
            $data['action'] = Input::get('action');
            $data['action_id'] = Input::get('action_id');// it is zoho id for the event / action
            $data['source'] = Input::get('source');
            $data['source_details'] = Input::get('sourcedetails');//optional
            $validator = $this->validation($data);
            if ($validator->fails()) {

                $messages = $validator->errors()->first();
                $responce = $this->renderErrorResponse($messages);

                return json_encode($responce);
            } else {
                $employee = $this->getEmployee($data['employId']);
                $consullore =$this->getCounselor($data['counselor_id']);
                $addmission=$this->getAdmission($data['admission_id']);

                if (!$employee) {
                    $responce = $this->renderResponse("the  employee not exist", 101);

                    return json_encode($responce);
                }
                else if ( !$consullore  )
                {
                    $responce = $this->renderResponse("the  consullore not exist", 101);
                    return json_encode($responce);
                }
                else if ( !$addmission )
                {
                    $responce = $this->renderResponse("the  addmission not exist", 101);
                    return json_encode($responce);

                }

                else {


                    $lead = Lead::where('zoho_id', '=', $data['leadid'])->first();
                    if ($lead) {
                        // add a new lead event and change the status of the lead
                        // todo double check this part
                        $lead->updated_at = carbon::now()->toDateTimeString();
                        $lead->status = $data['status'];
                        $lead->save();


                        $leadEvent = LeadEvent::where('action_id', '=', $data['action_id'])->first();
                        if (!$leadEvent) {
                            $leadEvent = LeadEvent::create([

                                'lead_id' => $lead->id,
                                'zoho_id' => $data['leadid'],
                                'employee_id' => $employee->id,
                                'counselor_id' => $consullore->id,
                                'admission_id' => $addmission->id,
                                'action_name' => $data['action'],
                                'status' => $data['status'],
                                'action_id' => $data['action_id'],
                                'description' => $data['description'],


                            ]);

                        } else {
                            $responce = $this->renderResponse("this lead event is already exist", 101);

                            return json_encode($responce);
                        }
                    } else {

                        // create a  new lead

                        $lead = Lead::create([
                            'zoho_id' => $data['leadid'],
                            'client_name' => $data['clientName'],
                            'description' => $data['description'],
                            'action' => $data['action'],
                            'status' => $data['status'],
                            'employee_id' => $employee->id,
                            'counselor_id' => $consullore->id,
                            'admission_id' => $addmission->id,
                            'source_details' => $data['source_details'],
                            'source' => $data['source']
                        ]);

                        $leadEvent = LeadEvent::create([

                            'lead_id' => $lead->id,
                            'zoho_id' => $data['leadid'],
                            'employee_id' => $employee->id,
                            'counselor_id' => $consullore->id,
                            'admission_id' => $addmission->id,

                            'action_name' => $data['action'],
                            'status' => $data['status'],
                            'action_id' => $data['action_id'],
                            'description' => $data['description'],
                            'updated_at' => carbon::now()->toDateTimeString()  // todo check the date when we go live .
                        ]);
                    }

                }
                $responce = $this->renderResponse("Successfully added/updated", 1);

                return json_encode($responce);


            }
        } catch (Exception $e) {


        }
    }



    protected function getEmployee($employeeZohoId)
    {
        $employee = Employee::where('zoho_id', '=', $employeeZohoId)->first();

        return $employee;

    }

    protected function getCounselor($counselorZohoId)
    {
        $counselor = Counselor::where('zoho_id', '=', $counselorZohoId)->first();
        return $counselor;

    }

    protected function getAdmission($admissionZohoId)
    {
        $admission = Admission::where('zoho_id', '=', $admissionZohoId)->first();
        return $admission;

    }

    protected function validation(array $data)
    {
        return Validator::make(
            $data,
            [
                'leadid' => 'required|numeric',
                'clientName' => 'nullable|string',
                'employId' => 'required|exists:employees,zoho_id',
                'status' => 'required|in:active,nactive,closed,converted,cancelled,creation',
                'description' => 'nullable|string',
                'action' => 'required|string',
                'source' => 'nullable|string',
                'action_id' => 'required|numeric'

            ], $this->messagevalidation()
        );


    }


    private function messagevalidation()
    {

        return $messages = array(

            'leadid.required' => '101:the leadid is missing.',
            'leadid.numeric' => '101:the leadid must be a number.',
            'remember_token.exists' => '101: user not exist',


            'employId.required' => '101:employId is missing.',
            'employId.exists' => '101: employId not exist on table employees.',

            'action.required' => '101:action is missing',

            'status.required' => '101:status is missing',
            'status.in' => '101: the selected status is not valid , it should be :active,nactive,closed,converted,cancelled,creation ',

            'action_id.required' => '101:the action_id is missing.',
            'action_id.numeric' => '101:the action_id must be a number.',

            'admission_id'=>'nullable|numeric',
            'source_details'=>'nullable|string',

        );


    }

    private function renderErrorResponse($message)
    {
        $data = array();
        $errorid = substr($message, 0, 3);

        $errortext = substr($message, 4);
        $response = array();
        $response['status'] = $errorid;
        $response['message'] = $errortext;

        //  $response['data']=$data;
        return $response;


    }

    private function renderResponse($message, $code)
    {
        $response = array();
        $response['status'] = $code;
        $response['message'] = $message;

        return $response;

    }

}