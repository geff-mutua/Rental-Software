<?php

namespace App\Helpers;

use App\Models\Rent;
use App\Models\Room;
use App\Models\Tenant;
use App\Models\Expense;
use App\Models\Property;
use App\Models\UnmappedPayment;

class HomeService 
{
    public function homeService($month,$year)
    {

        $data=[];
        $month=$month;

        $last_month=config( 'settings.last_month' );

        $year=$year;

        $business= config( 'settings.default_property') ? config( 'settings.default_property')->id:1;

        # Property Rooms
        $rooms=Room::where('property_id',$business)->count();
       
        //Performance onf monetary value
        $expected=Rent::where('property_id',$business)->where('month',$month)->sum('total');
        $paid=Rent::where('property_id',$business)->where('month',$month)->sum('paid');
        $balance=Rent::where('property_id',$business)->where('month',$month)->sum('balance');
        $arrears=Rent::where('property_id',$business)->where('month',$month)->sum('bf');

        //Secord Cars on Admin Index
        $tenants=Tenant::where('property_id',$business)->where('status',1)->count();//get the tenants present
        $properties=Property::count();//Managed Properties

        //get property earning
        $property_earning=Rent::where('property_id',$business)->where('month',$month)->where('year',$year)->sum('paid');
        $property_earning_expected=Rent::where('property_id',$business)->where('month',$month)->where('year',$year)->sum('total');
        $property_expense=Expense::where('property_id',$business)->where('month',$month)->where('year',$year)->sum('amount');
        
        
        # Get the percentate incomes cumulatively & Expenditure
        $income_per=0;
        $per_expense=0;
        if($property_earning_expected !=0){
            $income_per=(int) $property_earning / $property_earning_expected *100;
            if($property_expense==0){
                $per_expense=0;
            }else{

                $per_expense=(int) $property_expense / $property_earning *100;
            }
        }

        //get the recents payments received
        $recents=Rent::where('property_id',$business)->where('month',$month)->where('year',$year)->orderBy('created_at','DESC')->get();
        
        //Get Months for the current year populated in the system 
        $chat_months=null;
        $chat_incomes=null;
        $chat_expenses=null;
        $rentMonts=Rent::select('month')->where('property_id',$business)->where('year',$year)->distinct()->get();
        foreach ($rentMonts as $value) {
            # code...
            $chat_months.=",'".$value['month']."'";
            
            $chat_incomes.=",'".Rent::where('property_id',$business)->where('month',$value['month'])->where('year',$year)->sum('paid')."'";
            $chat_expenses.=",'".Expense::where('property_id',$business)->where('month',$value['month'])->where('year',$year)->sum('amount')."'";
        }

        #unmapped Payments
        $unmapped=UnmappedPayment::whereMapped("0")->get();

        #Vacant Rooms
        $occupied=Room::where('property_id',$business)->where('status','Occupied')->count();
        $vacant=Room::where('property_id',$business)->where('status','Vacant')->count();

        return [
            'total_rooms'=>$rooms,
            'expected'=>$expected,
            'paid'=>$paid,
            'balance'=>$balance,
            'arrears'=>$arrears,
            'tenants'=>$tenants,
            'properties'=>$properties,
            'property_earning'=>$property_earning,
            'per_income'=>number_format($income_per),
            'per_expense'=>$per_expense,
            'per_tax'=>'0',
            'recents'=>$recents,
            'chat_months'=>substr($chat_months,1),
            'chat_incomes'=>substr($chat_incomes,1),
            'chat_expenses'=>substr($chat_expenses,1),
            'unmapped'=>$unmapped,
            'vacant'=>$vacant,
            'occupied'=>$occupied,
        ];
    }
}
