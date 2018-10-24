<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24/10/2018
 * Time: 01:24 م
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationEvent;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use Carbon\Carbon;

class ApplicationSetData
{

    public function addData ()
    {
        try
        {

            $today = date ("Ymd");
            $data = array();
            $request = Request::capture ();

            $data['applicationid'] = Input::get ('applicationid'); //it is Zoho applicationid id
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


                    $application=Application::where('zoho_id','=',$data['applicationid'])->first();
                    if ( $application ) {
                        // add a new aplication event and change the status of the application
                        // todo double check this part
                        $application->updated_at=carbon::now()->toDateTimeString();
                        $application->status=$data['status'];
                        $application->save();


                        $applicationEvent=ApplicationEvent::where('action_id' , '=' ,$data['action_id'])->first();
                        if ( !$applicationEvent  ) {
                            $applicationEvent=ApplicationEvent::create([

                                'application_id' => $application->id,
                                'zoho_id' => $data['applicationid'],
                                'employee_id' => $employee->id,
                                'action_name'=>$data['action'],
                                'action_id'=>$data['action_id'],
                                'description'=>$data['description'],



                            ]);

                        }
                        else {
                            $responce = $this->renderResponse ( "this Application event is already exist" ,101);
                            return json_encode ($responce);
                        }
                    }
                    else {

                        // create a  new application

                        $application = Application::create ([
                            'zoho_id' => $data['applicationid'],
                            'client_name' => $data['clientName'],
                            'description' => $data['description'],
                            'action' => $data['action'],
                            'employee_id' =>$employee->id,
                            'source'=> $data['source']
                        ]);

                        $applicationEvent=ApplicationEvent::create([

                            'application_id' => $application->id,
                            'zoho_id' => $data['applicationid'],
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
                'applicationid' => 'required|numeric',
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

            'applicationid.required' => '101:the applicationid is missing.',
            'applicationid.numeric' => '101:the applicationid must be a number.',

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