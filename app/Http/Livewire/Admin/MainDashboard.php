<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;
use App\Helpers\HomeService;
use App\Helpers\InvoiceService;

class MainDashboard extends Component
{
    public $data;
    public $month,$year;
    public $pageConfigs=[],$breadcrumbs=[];
    public function mount(InvoiceService $invoice){
        $invoice->generate_invoices(); 
        $this->month=date('F');  
        $this->year=date('Y');
    }
    public function render()
    {
        $homeService=new HomeService();

        $this->data=$homeService->homeService($this->month,$this->year);

        $this->pageConfigs = ['pageHeader' => false];

        $this->breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['name' => auth()->user()->role],
        ];
        
        return view('livewire.admin.main-dashboard')->extends('layouts.contentLayoutMaster');
    }

    public function switch_biz($id=null){
        Setting::where('id',1)->update(['default_business'=>$id]); // there will only be one Business
        
        return redirect()->back();
    }
}
