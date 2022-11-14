<?php

namespace App\Http\Controllers\Admin\Tenants;

use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Tenants"], ['name' => "Tenants Management"]
        ];
        $property= config( 'settings.default_property')->id;
        $tenants=Tenant::where('property_id',$property)->whereStatus('1')->get();
        return \view('content.admin.tenants.index')->with(compact('breadcrumbs','tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Tenants"], ['name' => "Create Tenant"]
        ];

        // dd(config('setti/ngs.default_property'));
        $rooms=Room::where('property_id',config('settings.default_property')->id)->whereStatus('Vacant')->get();
        // dd($rooms);
        return \view('content.admin.tenants.create')->with(compact('breadcrumbs','rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name' =>'required|min:3',
            'room' =>'required',
            'gender' =>'required',
            'mobile'=>'required'
        ]);

        $results=Tenant::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'naid'=>$request->naid,
            'gender'=>$request->gender,
            'status'=>true, //tenant in or out
            'room_id'=>$request->room,
            'property_id'=>config('settings.default_property')->id
        ]);
        if($results){
            // update room 
            Room::whereId($results->room_id)->update([
                'status'=>'Occupied'
            ]);
            return redirect()->back()->withMessage('Tenant Created Successfully');
        }
       
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tenant=Tenant::with('room')->find($id);
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Tenants"], ['name' => "Edit ".$tenant->name]
        ];
        $rooms=Room::where('property_id',config('settings.default_property')->id)->whereStatus('Vacant')->get();
        return \view('content.admin.tenants.edit')->with(compact('breadcrumbs','tenant','rooms'));
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
        $request->validate([
            'name' =>'required|min:3',
            'status'=>'required',
            'gender' =>'required',
            'mobile'=>'required'
        ]);

        $tenant=Tenant::find($id);

        if($request->room != $tenant->room_id){
            // update room 
            Room::whereId($tenant->room_id)->update([
                'status'=>'Vacant'
            ]);
            
        }
      
        if($request->status=='0'){
           
            Room::whereId($tenant->room_id)->update([
                'status'=>'Vacant'
            ]);
            $tenant->update([
                'status'=>false, 
                'room_id'=>null
            ]);

        }else{
            $tenant->room_id=$request->room;
            $tenant->status=true;
            $tenant->save();

            Room::whereId($request->room)->update([
                'status'=>'Occupied'
            ]);
           
        }

        $tenant->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'naid'=>$request->naid,
            'gender'=>$request->gender,
        ]);
        if($tenant){
            return redirect()->back()->withMessage('Tenant details updated successfully');
        }else{
            return redirect()->back()->withMessage('Update Failed');
        }
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
