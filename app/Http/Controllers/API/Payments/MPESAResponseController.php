<?php

namespace App\Http\Controllers\API\Payments;

use App\Models\Room;
use App\Models\Tenant;
use App\Models\Company;
use App\Models\Payment;
use App\Mail\EndpointMail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\MappingFailedMail;
use App\Models\UnmappedPayment;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\SystemNotificationSetting;

class MPESAResponseController extends Controller
{
    public function validation(Request $request){

        Log::info('validation endpoint has been hit');
     
        return [
            "ResultCode"=> "0",
            "ResultDesc"=> "Accepted"
        ];
        
    }
    public function confirmation(Request $request){
       
        Log::info('confirmation endpoint has been hit');
        $middleName='-';
        $firstName='-';
        $lastName='-';

        # Save the transaction
        $result=$request->all();
        if(array_key_exists('FirstName',$result)){
            $firstName=$result['FirstName'];
        }elseif(array_key_exists('MiddleName',$result)){
            $middleName=$result['MiddleName'];
        }elseif(array_key_exists('LastName',$result)){
            $middleName=$result['LastName'];
        }

        Log::info($result);

        $data=UnmappedPayment::create([
            'transaction_type'=>$result['TransactionType'],
            'transaction_id'=>$result['TransID'],
            'transaction_time'=>$result['TransTime'],
            'transaction_amount'=>$result['TransAmount'],
            'business_shortcode'=>$result['BusinessShortCode'],
            'bill_ref_number'=>$result['BillRefNumber'],
            'invoice_number'=>$result['InvoiceNumber'],
            'third_party_transid'=>$result['ThirdPartyTransID'],
            'msisdn'=>$result['MSISDN'],
            'first_name'=>$firstName,
            'middle_name'=>$middleName,
            'last_name'=>$lastName
        ]);


        
        # Get Room
       $room=Room::whereName($data->bill_ref_number)->first();

        if(!is_null($room)){

            #Get Tenant
            $tenant=Tenant::where('room_id',$room->id)->where('status','1')->first();

            # Get Rent
            $rent=$tenant->rent()->latest()->first();
 
            $paid= $rent->paid ?  ( int ) $rent->paid: 0;
            $balance=$rent->balance ? ( int ) $rent->balance:0;
            $total_paid=( int ) $data->transaction_amount + (int) $paid;
            $total_balance= (int) $balance - (int) $data->transaction_amount;
            
            $create=Payment::create( [
                'tenant_id'=>$tenant->id,
                'amount'   =>(int) $data->transaction_amount,
                'reference'=>$data->transaction_id,
                'mode'     =>'Mpesa',
                'date'=>Carbon::now(),
                'year'     =>date('Y'),
                'month'    =>date('F'),
                'property_id' =>$room->property_id
            ]);

            if($create){
                # Update the tenant balances
                $rent['balance']=$total_balance;
                $rent['paid']=$total_paid;
                if($total_balance > 0){
                    $rent->status = 'Partially Paid';
                }elseif($total_balance=='0'){
                    $rent->status = 'Paid';
                }else{
                    $rent->status = 'OverPaid';
                }
                $rent->save();

            }

            $data->mapped=1;
            $data->save();

        }else{
             #Payment Could not be Mapped
            $notification=SystemNotificationSetting::first();
            $company=Company::first();
            if($notification !=null){
                if($notification->when_mapping_failed !=null){
                    if($notification->when_mapping_failed==1){
                        Mail::to($company->email)->send(new MappingFailedMail($data));
                    }
                }
            }
        }
        #Check Send Emails if they are enabled from the system settings 
        $notification=SystemNotificationSetting::first();
        $company=Company::first();
        if($notification !=null){
            if($notification->when_api_payment_received !=null){
                if($notification->when_api_payment_received==1){
                    Mail::to($company->email)->send(new EndpointMail($data));
                }
            }
        }
    }
}
