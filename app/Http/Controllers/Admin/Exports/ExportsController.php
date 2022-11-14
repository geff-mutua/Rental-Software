<?php

namespace App\Http\Controllers\Admin\Exports;

use App\Models\Rent;
use Illuminate\Http\Request;
use App\Exports\RentStatement;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportsController extends Controller
{
    public function exportStatement($month,$year){
        $business=config('settings.default_property')->id;

        $statements=Rent::where('year',$year)
        ->where('month',$month)->where('property_id',$business)->get();
        
        return Excel::download(new RentStatement($statements), 'statement.xlsx');
    }
}
