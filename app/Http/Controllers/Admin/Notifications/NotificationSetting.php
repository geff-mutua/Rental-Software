<?php

namespace App\Http\Controllers\Admin\Notifications;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SystemNotificationSetting;

class NotificationSetting extends Controller
{
    public function index(){
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Notification Settings"]
        ];

        $data=SystemNotificationSetting::first();
        
        $settings=[
            'sms_date'=>$data ? $data->sms_date : '',
            'invoice_date'=>$data? $data->invoice_date:'',
            'when_api_payment_received'=>$data ?$data->when_api_payment_received:'',
            'when_invoices_created'=>$data? $data->when_invoices_created:'',
            'when_mapping_failed'=>$data?$data->when_mapping_failed:''
        ];

      
        return \view('content.admin.notifications.index')->with(compact('breadcrumbs','settings'));
    }

    public function update(Request $request){
        
        SystemNotificationSetting::updateOrCreate(['id'=>1],[
            'sms_date'=>$request->sms_date,
            'invoice_date'=>$request->invoice_date,
            'when_api_payment_received'=>$request->when_api_payment_received?1:0,
            'when_invoices_created'=>$request->when_invoices_created?1:0,
            'when_mapping_failed'=>$request->when_mapping_failed?1:0

        ]);

        return redirect()->back();
    }
}
