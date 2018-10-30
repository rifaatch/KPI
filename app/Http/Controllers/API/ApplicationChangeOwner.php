<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationEvent;
use App\Models\Employee;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ApplicationChangeOwner
{
    public function change()
    {
        try {
            $data = array();

            $data['applicationid'] = Input::get('applicationid'); //it is Zoho applicationid id
            $data['old_employee_id'] = Input::get('old-employee-id');
            $data['new_employee_id'] = Input::get('new-employee-id');
            $data['description'] = Input::get('description'); //optional
            $data['action'] = Input::get('action');  // it should be change-employee
            $data['action_id'] = Input::get('action_id'); // zoho action id

            $validator = $this->validation($data);
            if ($validator->fails()) {

                $messages = $validator->errors()->first();
                $responce = $this->renderErrorResponse($messages);
                return json_encode($responce);
            } else {
                $newEmployee = $this->getEmployee($data['new_employee_id']);
                $oldEmployee = $this->getEmployee($data['old_employee_id']);

                if (!$newEmployee) {
                    $responce = $this->renderResponse("the new employee not exist", 101);
                    return json_encode($responce);

                } else {

                    if (!$oldEmployee) {
                        $responce = $this->renderResponse("the new employee not exist", 101);
                        return json_encode($responce);

                    } else {


                        $application = Application::where('zoho_id', '=', $data['applicationid'])->first();
                        if ($application) {
                            // change the owner id and in answer a new applicationid event .

                            if ($application->employee_id <> $oldEmployee->id) {

                                $responce = $this->renderResponse("the old  employee not match with current employee", 101);
                                return json_encode($responce);
                            } else {


                                $applicationEvent = ApplicationEvent::where('action_id', '=', $data['action_id'])->first();
                                if (!$applicationEvent) {
                                    $applicationEvent = ApplicationEvent::create([

                                        'application_id' => $application->id,
                                        'zoho_id' => $data['applicationid'],
                                        'employee_id' => $newEmployee->id,
                                        'old_employee_id' => $oldEmployee->id,
                                        'action_name' => $data['action'],
                                        'action_id' => $data['action_id'],
                                        'description' => $data['description']


                                    ]);

                                    $application->employee_id = $newEmployee->id;
                                    $application->save();

                                    $responce = $this->renderResponse("The application Successfully updated", 1);
                                    return json_encode($responce);
                                } else {
                                    $responce = $this->renderResponse("this application event is already exist", 101);
                                    return json_encode($responce);
                                }
                            }
                        } else {

                            // application not exist .
                            $responce = $this->renderResponse("invalid application ", 101);
                            return json_encode($responce);

                        }
                    }

                }
            }


        } catch (Exception $e) {


        }
    }

    protected function getEmployee($employeeZohoId)
    {
        $employee = Employee::where('zoho_id', '=', $employeeZohoId)->first();
        return $employee;

    }

    protected function validation(array $data)
    {
        return Validator::make(
            $data,
            [
                'applicationid' => 'required|numeric',
                'old_employee_id' => 'required|exists:employees,zoho_id',
                'new_employee_id' => 'required|exists:employees,zoho_id',
                'description' => 'nullable|string',
                'action' => 'required|in:change-employee',
                'action_id' => 'required|numeric'

            ], $this->messagevalidation()
        );


    }


    private function messagevalidation()
    {

        return $messages = array(

            'applicationid.required' => '101:the applicationid is missing.',
            'applicationid.numeric' => '101:the applicationid must be a number.',

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
        $data = array();
        $errorid = substr($message, 0, 3);

        $errortext = substr($message, 4);
        $response = array();
        $response['status'] = $errorid;
        $response['message'] = $errortext;

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