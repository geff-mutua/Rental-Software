<?php

namespace App\Http\Controllers\Admin\Unmapped;

use App\Models\Tenant;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\UnmappedPayment;
use App\Http\Controllers\Controller;

class UnmappedApiPayments extends Controller
{
   public function index(){
    $unmapped=UnmappedPayment::whereMapped('0')->get();
    $tenants=Tenant::whereStatus('1')->get();
    
    $breadcrumbs = [
        ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Unmapped Payment"]
    ];

    return view('content.admin.unmapped.index')->with(compact('breadcrumbs','unmapped','tenants'));
   }
   public function map(Request $request){
    
    $tenant=Tenant::find($request->tenant);
    $transaction=UnmappedPayment::find($request->transaction);
    $rent=$tenant->rent()->latest()->first();
    if($rent == null){
        session()->flash('message','The selected Tenant doesn`t have any rent bill thus the transaction could not be mapped');
        return;
    }
    $paid= $rent->paid ?  ( int ) $rent->paid: 0;
    $balance=$rent->balance ? ( int ) $rent->balance:0;
    $total_paid=( int ) $transaction->transaction_amount + (int) $paid;
    $total_balance= (int) $balance - (int) $transaction->transaction_amount;

    $create=Payment::create( [
        'tenant_id'=>$tenant->id,
        'amount'   =>(int) $transaction->transaction_amount,
        'reference'=>$transaction->transaction_id,
        'mode'     =>'Mpesa',
        'date'=>Carbon::now(),
        'year'     =>date('Y'),
        'month'    =>date('F'),
        'property_id' =>$tenant->room->property_id
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

    $transaction->mapped=1;
    $transaction->save();
    return redirect()->route('payments.unmapped');
    
}
}
