<?php
namespace App\Helpers;
use App\Models\Rent;
use App\Models\Tenant;
use Illuminate\Support\Carbon;
use App\Models\SystemNotificationSetting;

class InvoiceService
{
    public function generate_invoices(){
        $notification=SystemNotificationSetting::first();
        if($notification !=null){
            $day =  Carbon::parse($notification->invoice_date)->format('d');
            $now=Carbon::now()->format('d');
            // Create the crone Job and change the logic
           if($now >= $day){
                $year=config('settings.year');
                $month=config('settings.month');
                $property = config('settings.default_property')->id;
                $this->create_invoices($year,$month,$property);
           }
        }
    }
private function create_invoices($year,$month,$property){
    
    $exists=Rent::where('month',$month)->where('year',$year)->where('property_id',$property)->first();
    if(is_null($exists)) {
        // dd($exists);
        
        $tenant_data=Tenant::with('room')->where( 'status' , 1 )->where('property_id',$property)->get();
        
       
        foreach( $tenant_data as $value ) {
            
            $previous=Rent::where('tenant_id',$value->id)->orderBy('id','DESC')->take(1)->value('balance');
    
               
                $total=(float) $value->room->rent + (float) $previous;
                $rent=$value->room->rent;
               
                $results= Rent::create([
                    'tenant_id'=>$value->id,
                    'rent'=>$rent,
                    'month'=>$month,
                    'total'=>$total,
                    'balance'=>$total,
                    'year'=>$year,
                    'bf'=>$previous,
                    'status'=>'Pending',
                    'property_id'=>$value->property_id,
                ]);
            
            }
        }
    
    }
}
