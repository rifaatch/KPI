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




class LeadSetData extends Controller
{

    public function addData ()
    {
        try
        {

            $today = date ("Ymd");
            $data = array();
            $request = Request::capture ();

            $data['leadid'] = Input::get ('leadid'); //it is Zoho lead id
            $data['clientName'] = Input::get ('clientname'); // optional
            $data['employId'] = Input::get ('employid');
            $data['status'] = Input::get ('status');
            $data['description']=Input::get('description'); //optional
            $data['action'] = Input::get ('action');
            $data['action_id'] = Input::get ('action_id');
            $data['source'] = Input::get ('source');
            $validator = $this->validation ($data);
            if ( $validator->fails () ) {

                $messages = $validator->errors ()->first ();
                $responce = $this->renderErrorResponse($messages);
                return json_encode ($responce);
            }
            else
                {
                    $employee=$this->getEmployee( $data['employId']) ;

                    if (!$employee)
                    {
                        $responce = $this->renderResponse("the  employee not exist", 101);
                        return json_encode($responce);
                    }
                    else
                        {


                $lead=Lead::where('zoho_id','=',$data['leadid'])->first();
                if ( $lead ) {
                    // add a new lead event and change the status of the lead
                    // todo double check this part
                    $lead->updated_at=carbon::now()->toDateTimeString();
                    $lead->status=$data['status'];
                    $lead->save();


                    $leadEvent=LeadEvent::where('action_id' , '=' ,$data['action_id'])->first();
                    if ( !$leadEvent  ) {
                    $leadEvent=LeadEvent::create([

                        'lead_id' => $lead->id,
                        'zoho_id' => $data['leadid'],
                        'employee_id' => $employee->id,
                        'action_name'=>$data['action'],
                        'action_id'=>$data['action_id'],
                        'description'=>$data['description'],



                    ]);

                    }
                    else {
                        $responce = $this->renderResponse ( "this lead event is already exist" ,101);
                        return json_encode ($responce);
                    }
                }
                else {

                    // create a  new lead

                    $lead = Lead::create ([
                        'zoho_id' => $data['leadid'],
                        'client_name' => $data['clientName'],
                        'description' => $data['description'],
                        'action' => $data['action'],
                        'employee_id' => $employee->id,
                        'source'=> $data['source']
                    ]);

                    $leadEvent=LeadEvent::create([

                        'lead_id' => $lead->id,
                        'zoho_id' => $data['leadid'],
                        'employee_id' => $employee->id,
                        'action_name'=>$data['action'],
                        'action_id'=>$data['action_id'],
                        'description' => $data['description'],
                        'updated_at'=>carbon::now()->toDateTimeString()  // todo check the date when we go live .
                    ]);
                }

            }
            $responce = $this->renderResponse ( "Successfully added/updated" ,1);
            return json_encode ($responce);



        }
        }

        catch (Exception $e)
        {


        }
    }


    protected function  getEmployee ($employeeZohoId)
    {
        $employee=Employee::where('zoho_id', '=',$employeeZohoId)->first();
        return $employee;

    }

    protected function validation (array $data)
    {
        return Validator::make (
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

            ], $this->messagevalidation ()
        );


    }


    private function messagevalidation ()
    {

        return $messages = array(

            'leadid.required' => '101:the leadid is missing.',
            'leadid.numeric' => '101:the leadid must be a number.',
            'remember_token.exists' =>'101: user not exist',


            'employId.required' => '101:employId is missing.',
            'employId.exists' => '101: employId not exist on table employees.',

            'action.required' => '101:action is missing',

            'status.required' => '101:status is missing',
            'status.in' => '101: the selected status is not valid , it should be :active,nactive,closed,converted,cancelled,creation ',

            'action_id.required' => '101:the action_id is missing.',
            'action_id.numeric' => '101:the action_id must be a number.',

        );


    }

    private function renderErrorResponse($message)

    {
        $data=array();
        $errorid=substr($message, 0, 3);
     //   dd($errorid);
        $errortext=substr($message, 4);
        $response=array();
        $response['status']=$errorid;
        $response['message']=$errortext;
      //  $response['data']=$data;
        return $response;


    }

    private function renderResponse ( $message , $code)

    {
        $response = array();
        $response['status'] = $code;
        $response['message'] = $message;

        return $response;

    }

}