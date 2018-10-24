<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24/10/2018
 * Time: 03:34 م
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationEvent;
use App\Models\Contact;
use App\Models\ContactEvent;
use App\Models\Employee;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;




class ContactsChangeOwner
{
    public function change()
    {
        try
        {
            $data = array();

            $data['contactid'] = Input::get ('contactid'); //it is Zoho contact id
            $data['old_employee_id'] = Input::get ('old-employee-id');
            $data['new_employee_id'] = Input::get ('new-employee-id');
            $data['description']=Input::get('description'); //optional
            $data['action'] = Input::get ('action');  // it should be change-employee
            $data['action_id'] = Input::get ('action_id'); // zoho action id

            $validator = $this->validation ($data);
            if ( $validator->fails () ) {

                $messages = $validator->errors ()->first ();
                $responce = $this->renderErrorResponse($messages);
                return json_encode ($responce);
            }


            else {
                $newEmployee = $this->getEmployee($data['new_employee_id']);
                $oldEmployee = $this->getEmployee($data['old_employee_id']);

                if (!$newEmployee) {
                    $responce = $this->renderResponse("the new employee not exist", 101);
                    return json_encode($responce);

                } else

                {

                    if (!$oldEmployee) {
                        $responce = $this->renderResponse("the new employee not exist", 101);
                        return json_encode($responce);

                    } else {



                        $contact = Contact::where('zoho_id', '=', $data['contactid'])->first();
                        if ($contact) {
                            // change the owner id and in answer a new applicationid event .

                            if ( $contact->employee_id <> $oldEmployee->id )
                            {

                                $responce = $this->renderResponse("the old  employee not match with current employee", 101);
                                return json_encode($responce);
                            }
                            else {


                                $contactEvent = ContactEvent::where('action_id', '=', $data['action_id'])->first();
                                if (!$contactEvent) {
                                    $contactEvent = ContactEvent::create([

                                        'contact_id' => $contact->id,
                                        'zoho_id' => $data['contactid'],
                                        'employee_id' => $newEmployee->id,
                                        'old_employee_id' => $oldEmployee->id,
                                        'action_name' => $data['action'],
                                        'action_id' => $data['action_id'],
                                        'description' => $data['description']


                                    ]);

                                    $contact->employee_id = $newEmployee->id;
                                    $contact->save();

                                    $responce = $this->renderResponse ( "The contact Successfully updated" ,1);
                                    return json_encode ($responce);
                                }

                                else {
                                    $responce = $this->renderResponse("this contact event is already exist", 101);
                                    return json_encode($responce);
                                }
                            }
                        } else {

                            // contact not exist .
                            $responce = $this->renderResponse("invalid contact ", 101);
                            return json_encode($responce);

                        }
                    }

                }
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
                'contactid' => 'required|numeric',
                'old_employee_id'=>'required|exists:employees,zoho_id',
                'new_employee_id' => 'required|exists:employees,zoho_id',
                'description' => 'nullable|string',
                'action' => 'required|in:change-employee',
                'action_id' => 'required|numeric'

            ], $this->messagevalidation ()
        );


    }




    private function messagevalidation ()
    {

        return $messages = array(

            'contactid.required' => '101:the contactid is missing.',
            'contactid.numeric' => '101:the contactid must be a number.',

            'old_employee_id.required' => '101:old_employee_id is missing.',
            'old_employee_id.exists' => '101: old_employee_id not exist on table employees.',

            'new_employee_id.required' => '101:new_employee_id is missing.',
            'new_employee_id.exists' => '101: new_employee_id not exist on table employees.',

            'action.required' => '101:action is missing',
            'action.in' => '101: the selected status is not valid , it should be : change-employee',

            'action_id.required' => '101:the action_id is missing.',
            'action_id.numeric' => '101:the action_id must be a number.',

        );


    }

    private function renderErrorResponse($message)

    {
        $data=array();
        $errorid=substr($message, 0, 3);

        $errortext=substr($message, 4);
        $response=array();
        $response['status']=$errorid;
        $response['message']=$errortext;

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