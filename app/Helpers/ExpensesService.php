<?php 
namespace App\Helpers;

use Config;
use App\Models\Expense;
use Illuminate\Support\Str;

class ExpensesService{
    public function dashboard(){
        $month=config( 'settings.month' );

        $last_month=config( 'settings.last_month' );

        $year=config( 'settings.year' );

        $business=config('settings.default_property')->id;

        $expenses=Expense::with('category')->where('property_id',$business)->where('month',$month)->where('year',$year)->get();
        $total=Expense::where('property_id',$business)->where('month',$month)->where('year',$year)->sum('amount');

        return $expenses=['expenses'=>$expenses,'total'=>$total];
    }   
}