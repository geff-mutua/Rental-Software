<?php

namespace App\Http\Controllers\Admin\Sms;

use App\Models\SmsSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SmsController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "System Settings"], ['name' => 'Sms Configurations']
        ];
        $sms=SmsSetting::first();
        $settings=[
            'sender_id'=>$sms?$sms->sender_id:null,
            'secret_key'=>$sms?$sms->secret_key:null,
            'app_key'=>$sms?$sms->app_key:null,
            'gateway'=>$sms?$sms->gateway:null
        ];
        
        return \view('content.admin.sms.index')->with(compact('breadcrumbs','settings'));
    }

    public function update(Request $request){
        $request->validate([
            'sender_id'=>'required',
            'secret_key'=>'required',
            'app_key'=>'required',
            'gateway'=>'required'
        ]);

        SmsSetting::updateOrCreate(['sender_id'=>$request->sender_id],[
            'sender_id'=>$request->sender_id,
            'secret_key'=>$request->secret_key,
            'app_key'=>$request->app_key,
            'gateway'=>$request->gateway,

        ]);

        return redirect()->route('sms.index');
    }
}
