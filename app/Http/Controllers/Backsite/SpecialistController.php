<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

// use library here 
use illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//request 
use App\Http\Request\Specialist\StoreSpecialistRequest;
use App\Http\Request\Specialist\UpdateSpecialistRequest;


// use everything here 
//use gate;
use Auth;

//use model here 
use App\Models\MasterData\Specialist;

//thirdparty package


class SpecialistController extends Controller
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
        $specialist = Specialist::orderBy('created_at','desc')->get();

        return view('pages.backsite.master-data.specialist.index',compact('specialist'));
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
    public function store(StoreSpecialistRequest $request)
    {
        // get all request from frontsite
        $data = $request->all();

        //store to database
        $specialist = Specialist::create($data);

        alert()->success('Success Message', 'Specialist created successfully');
        return redirect()->route('backsite.specialist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Specialist $specialist)
    {   
        return view('pages.backsite.master-data.specialist.show', compact('specialist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialist $specialist)
    {
        return view('pages.backsite.master-data.specialist.edit', compact('specialist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialistRequest $request, Specialist $specialist)
    {
         // get all request from frontsite
         $data = $request->all();

         //update to database
         $specialist = update($data);
 
         alert()->success('Success Message', 'Specialist updated successfully');
         return redirect()->route('backsite.specialist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialist $specialist)
    {
       
         $specialist = forceDelete();
 
         alert()->success('Success Message', 'Specialist deleted successfully');
         return back(); 
    }
}
