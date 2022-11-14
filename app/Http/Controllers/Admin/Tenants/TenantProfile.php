<?php

namespace App\Http\Controllers\Admin\Tenants;

use App\Models\Rent;
use App\Models\Room;
use App\Models\Tenant;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TenantProfile extends Controller
{
    public function index($id){
        $tenant=Tenant::where('id',$id)->first();
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Tenants"], ['name' => "Tenant Profile ".$tenant->name]
        ];
        $rent=Rent::where('tenant_id',$tenant->id)->get();
        $bf=Rent::where('tenant_id',$tenant->id)->orderBy('id','DESC')->take(1)->first();
        $room_details=Room::where('id',$tenant->room_id)->first();
        $current_month_rent=false;

        //check if theres rent for the current month
        
        $rent_current_month=Rent::where('tenant_id',$tenant->id)->where('month',date('F'))->where('year',date('Y'))->first();
        
        if(is_null($rent_current_month)){
            $current_month_rent=true;
        }
        $payments=Payment::where('tenant_id',$id)->get();
        
        return view('content.admin.tenants.profile.index')->with(compact('tenant','breadcrumbs','rent','current_month_rent','bf','room_details','payments'));
    }

    public function saveRent(Request $request){
        $request->validate([
            'rent'=>'required|numeric',
            'month'=>'required',   
        ]);
        $total=(float) $request->rent + (float) $request->bf;
        $results= Rent::create([
            'tenant_id'=>$request->tenant,
            'rent'=>$request->rent,
            'month'=>$request->month,
            'total'=>$total,
            'balance'=>$total,
            'year'=>date('Y'),
            'bf'=>$request->bf,
            'property_id'=>config('settings.default_property')->id,
        ]);
        if($results){
            Session::flash('success', 'Tenant rent has been recorded successfully'); 
            return redirect()->back();
        }else{
            Session::flash('error', 'Failed to record tenant rent. Please try again'); 
            return redirect()->back();
        }
    }

    //retutn the left tenants
    public function leftTenants()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Tenants"], ['name' => "Left Tenants"]
        ];
        $tenants=Tenant::with('room')->where('status',0)->get();
        return \view('content.admin.tenants.left-tenants')->with(compact('breadcrumbs','tenants'));
    }
    //upload tenant page
    public function tenantUpload()
    {
        
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Tenants"], ['name' => "Upload Tenants"]
        ];
       
        return \view('content.admin.tenants.upload')->with(compact('breadcrumbs'));
    }

    public function uploadTenants(Request $request){
        $request->validate([
            'file'=>'required|mimes:csv,txt'
         ]);
         
         $file=file($request->file->getRealPath());
         $data=array_slice($file,1);
         $parts=(array_chunk($data,200));
         foreach($parts as $index=> $part){
            $fileName=resource_path('pending-uploads/'.date('y-m-d-H-i-s').$index.'.csv');
            file_put_contents($fileName,$part);
         }
         $results=(new Tenant())->importToDB();
         Session::flash('message',$results);
         return redirect()->back();
    }
}
