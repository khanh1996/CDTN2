<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Researchs;
use App\Rules\Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class ResearchsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $researchs  = Researchs::all();
        $data['researchList'] = $researchs;

        return view('backend.research.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.research.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        /*$all = $request->all();
        dd($all);*/

        $research = new Researchs();
        $research->name = $request->name;
        if (!empty($request->status)){
            $research->status = $request->status;
        }
        else{
            $research->status = 0;
        }
        $time = $request->time;
        $period = CarbonPeriod::create('2018-06-14', '2018-06-20');

        foreach ($period as $date) {
            echo $date->format('Y-m-d');
        }

// Convert the period to an array of dates
        $dates = $period->toArray();
        dd($dates);


        $time = Carbon::createFromFormat('d/m/Y - d/m/Y',$time)->timestamp;
        $research->starttime = $time;
        $research->quantily = $request->quanlity;
        $research->content = $request->description;
        $research->users_id = \Auth::user()->id;

        $research->save();
        return back()->with('flash_success','Đã thêm mới thành công!!! thích quá <3');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $research = Researchs::find($id);
        $data['research'] = $research;
        return view('backend.modal.showResearch',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('backend.research.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
