<?php

namespace App\Http\Controllers\Admin\Property;

use App\Models\Setting;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Settings"], ['name' => "Property Management"]
        ];
        $property = Property::all();
        return view('content.admin.property.index')->with(compact('property','breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Settings"], ['name' => "Create Property"]
        ];
        return view('content.admin.property.create')->with(compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $result= Property::create([
            'name' => $request->name,                       
            'location' => $request->location,
            'location_description' => $request->location_desc ? $request->location_desc: 'Not Set',
            'type' => $request->type,
            'location-map' => $request->location_map,
            'features' => json_encode($request->features),
        ]);

       if(config('settings.config')==null){
           Setting::Create([
            'default_business'=>$result->id,
           ]);
       }
        return redirect()->back()->withMessage('Property created successfully');
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
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Settings"], ['name' => "Edit Property"]
        ];
        $property=Property::find($id);
        return view('content.admin.property.edit')->with(compact('property','breadcrumbs'));
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
        Property::whereId($id)->update([
            'name' => $request->name,
            'location' => $request->county,
            'location_description' => $request->location_desc,
            'type' => $request->type,
            'location-map' => $request->location_map,
            'features' => json_encode($request->features),
        ]);
        return redirect()->back()->withMessage('Property created successfully');
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
