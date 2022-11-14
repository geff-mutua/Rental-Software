<?php

namespace App\Http\Controllers\Admin\Room;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Settings"], ['name' => "Room Management"]
        ];
        $rooms=Room::with('property')->where('property_id',config('settings.default_property')->id)->get();
        return view('content.admin.rooms.index')->with(compact('rooms','breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' =>'required|unique:rooms,name',
        ]);
           
        
        Room::create([
            'name'=>$request->name,
            'rent'=>$request->rent,
            'status'=>$request->status,
            'property_id'=>$request->property,
        ]);

        return redirect()->back()->withMessage('Room Created Successfully');
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
        //
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
            'name' =>'required',
        ]);
           
        
        Room::whereId($id)->update([
            'name'=>$request->name,
            'rent'=>$request->rent,
            'status'=>$request->status,
            'property_id'=>$request->property,
        ]);

        return redirect()->back()->withMessage('Room Updated Successfully');
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
