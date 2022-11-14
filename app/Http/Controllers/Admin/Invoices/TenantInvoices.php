<?php

namespace App\Http\Controllers\Admin\Invoices;

use App\Models\Rent;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use App\Http\Controllers\Controller;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class TenantInvoices extends Controller
{
    public function index(){
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "System Invoices"]
        ];
       
        $year=config('settings.year');
        $month=config('settings.month');
        
        $business=config('settings.default_property')->id;

        $invoices=Rent::where('year',$year)
        ->where('month',$month)->where('property_id',$business)->get();

        return \view('content.admin.invoices.index')->with(compact('breadcrumbs','invoices'));
    }

    public function printInvoice($id){
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "System Invoices"]
        ];
        $invoice=Rent::with('tenant')->find($id);
        return \view('content.admin.invoices.view')->with(compact('breadcrumbs','invoice'));
    
    }

    public function getPdf($id){
        $invoice=Rent::with('tenant')->find($id);
        return \view('content.admin.invoices.print')->with(compact('invoice'));
    }
}
