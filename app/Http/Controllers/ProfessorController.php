<?php

namespace App\Http\Controllers;
use App\Professor;
use App\ProfessorDetail;
use App\Jobs\sendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professors = Professor::all();
        $result = [ ];
        
        foreach ($professors as  $professor) {
            $result [ ] = $this->ResultFormatter($professor);
        }
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //write here
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate ([
            'first_name'            =>  'required|max:20',
            'middle_name'       =>  'required|max:20',
            'last_name'             =>   'required|max:20',
            'gender'              	  =>   'required',
            'dob'                       =>   'required|date',
            'email'                    =>   'required',
            'phone_number'     =>   'required|max:12',
            'address'                 =>   'required|max:300'
        ]);
        
		$professor = new Professor;
		$professor->first_name =  Input::get('first_name');
		$professor->middle_name =  Input::get('middle_name');
        $professor->last_name =  Input::get('last_name');
		$professor->gender =  Input::get('gender');
		$professor->dob =  Input::get('dob');
		$professor->email =  Input::get('email');
		$professor->phone_number = Input::get('phone_number');
		$professor->address =  Input::get('address');
        $professor->save();

        return $professor;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	   $professor = Professor::findOrFail($id);
	   
	   return $this->ResultFormatter($professor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$professor = Professor::findOrFail($id);
		
		$this->validate ($request,  [
            'first_name'            =>  'required|max:20',
            'middle_name'       =>  'required|max:20',
            'last_name'             =>   'required|max:20',
            'gender'              	  =>   'required',
            'dob'                       =>   'required|date',
            'email'                    =>   'required',
            'phone_number'     =>   'required',
            'address'                 =>   'required|max:300'
        ]);
        
        $update = $professor->update($request->all());
        if($update)
            dispatch(new sendEmail());

        return ['message' => 'Professor Data Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $professor = Professor::findOrFail($id);
	   $professor->delete();

		return ['message' => 'Professor Deleted'];
    }

    public function sendEmail()
    {
        dispatch(new sendEmail());
        echo 'email sent';
    }

    /**
     * Give you the specific reponse from resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    protected function ResultFormatter($professor) {
		return [
			'Id'                      => $professor->id,
			'FirstName'       => $professor->first_name,
			'MiddleName'   => $professor->middle_name,
            'LastName'        => $professor->last_name,
			'RollNumber'     => $professor->roll_number,
			'Gender'             => $professor->gender,
			'DateofBirth'      => $professor->dob,
			'Email'                => $professor->email,
			'PhoneNumber'  => $professor->phone_number,
            'Address'            => $professor->address,
            'professorDetail' =>
                [ 
                        'Id' => $professor->professor_detail['id'],
                        'Role' => $professor->professor_detail['Role'],
                        'Salary' => $professor->professor_detail['salary'],
                        'IsActive' => $professor->professor_detail['is_active'],
                        'JoinedOn' => $professor->professor_detail['joined_on'],
                        'ResignedAt' => $professor->professor_detail['resigned_at']
                ]
		];
	}
}