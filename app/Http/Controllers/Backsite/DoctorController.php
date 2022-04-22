<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

// use library here 
use illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//request 
use App\Http\Request\Specialist\StoreDoctorRequest;
use App\Http\Request\Specialist\UpdateDoctorRequest;


// use everything here 
//use gate;
use Auth;

//use model here 
use App\Models\Operational\Doctor;
use App\Models\MasterData\Specialist;

//thirdparty package

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this-> middleware('auth');
    }

    public function index()
    {   
        //for table grid
        $doctor = Doctor::orderBy('created_at','desc')->get();

        //for select 2 = ascending a to z
        $specialist = Specialist::orderBy('name','asc')->get();

        return view('pages.backsite.operational.doctor.index',compact('doctor','specialist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
         // get all request from frontsite
         $data = $request->all();

         //store to database
         $doctor = Doctor::create($data);
 
         alert()->success('Success Message', 'Doctor created successfully');
         return redirect()->route('backsite.doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('pages.backsite.operational.doctor.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //for select 2 = ascending a to z
        $specialist = Specialist::orderBy('name','asc')->get();

        return view('pages.backsite.operational.doctor.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
          // get all request from frontsite
          $data = $request->all();

          // update to database
          $doctor->update($data);
  
          alert()->success('Success Message', 'Successfully updated doctor');
          return redirect()->route('backsite.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor = forceDelete();
 
         alert()->success('Success Message', 'Doctor deleted successfully');
         return back(); 
    }
}
