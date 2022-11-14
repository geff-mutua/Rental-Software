<?php

namespace App\Http\Controllers\Admin\Statement;

use PDF;
use App\Models\Rent;
use App\Helpers\PrintPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class StatementController extends Controller
{
    public function index()
    {
        $year=config('settings.year');
        $month=config('settings.month');
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "System Settings"], ['name' => 'Tenant Statements'],['name' => $month. '-'.$year]
        ];
        
       
        $business=config('settings.default_property')->id;

        $statements=Rent::where('year',$year)
        ->where('month',$month)->where('property_id',$business)->get();
        return \view('content.admin.statement.index')->with(compact('breadcrumbs','statements','month','year'));
    }
    public function filter(Request $request)
    {
        $year=$request->year;
        $month=$request->month;
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "System Settings"], ['name' => 'Tenant Statements'],['name' => $month. '-'.$year]
        ];
        
       
        $business=config('settings.default_property')->id;

        $statements=Rent::where('year',$year)
        ->where('month',$month)->where('property_id',$business)->get();
        return \view('content.admin.statement.index')->with(compact('breadcrumbs','statements','month','year'));
    }
    public function printStatement(PrintPDF $pdf,$month,$year){
        $pdf->header();
        // add a page
        PDF::AddPage();
       
        PDF::SetFont('helvetica', 'B', 11);
        PDF::Ln(20);
        PDF::Cell(60,6,'INCOME STATEMENT REPORT',0,1,'C');
        PDF::SetFont('helvetica', '', 10);
        PDF::Cell(130,6,'Property Name: '.config('settings.default_property')->name ,0,0,'L',0);
        PDF::Cell(10,6,'Document Date:',0,0,'L',0);
        PDF::Ln(8);
        PDF::Cell(130,6,'Month of '.$month. '-'.$year,0,0,'L',0);
        PDF::Cell(10,6,Carbon::now(),0,0,'L',0);
        PDF::Ln(10);
        PDF::SetFillColor(180,235,255);
        PDF::Cell(20,6,'Serial No',0,0,'C',2);
        PDF::Cell(50,6,'Tenant Name',0,0,'L',1);
        PDF::Cell(30,6,'Rent Amount',0,0,'C',1);
        PDF::Cell(20,6,'Arrears B/F',0,0,'C',1);
        PDF::Cell(20,6,'Total',0,0,'C',1);
        PDF::Cell(20,6,'Paid',0,0,'C',1);
        PDF::Cell(20,6,'Balance',0,0,'C',1);
        PDF::Ln(7);
        $year=config('settings.year');
        $month=config('settings.month');
        $business=config('settings.default_property')->id ;
        $statement=Rent::with('tenant')->where('year',$year)->where('month',$month)->where('property_id',$business)->get();
        PDF::SetFillColor(247, 247, 247);
        PDF::SetFont('helvetica', '', 9);
       $total_rent=0;
       $total_bf=0;
       $total=0;
       $paid=0;
       $balance=0;
       $key=0;
        foreach ($statement as $key => $value) {
         
            PDF::Cell(20,6,$key+=1,0,0,'C',1);
            PDF::Cell(50,6,$value->tenant->name,0,0,'L',1);
            PDF::Cell(30,6,number_format($value->rent),0,0,'C',1);
            PDF::Cell(20,6,$value->bf==''?'0.00' : number_format($value->bf),0,0,'C',1);
            PDF::Cell(20,6,$value->total==''?'0.00' : number_format($value->total),0,0,'C',1);
            PDF::Cell(20,6,$value->paid==''?'0.00' : number_format($value->paid),0,0,'C',1);
            PDF::Cell(20,6,number_format($value->balance),0,0,'V',1);
            PDF::Ln(7);
               $total_rent=$total_rent +(float)$value->rent;
               $total_bf=$total_bf +(float)$value->bf;
               $total=$total +(float)$value->total;
               $paid=$paid +(float)$value->paid;
               $balance=$balance +(float)$value->balance;
               $key+=1;

               if($key==26){
                PDF::AddPage();
                PDF::SetFont('helvetica', 'B', 11);
                PDF::Ln(20);
                PDF::Cell(60,6,'INCOME STATEMENT REPORT',0,1,'C');
                PDF::SetFont('helvetica', '', 10);
                PDF::Cell(130,6,'Property Name: '.config('settings.default_property')->name ,0,0,'L',0);
                PDF::Cell(10,6,'Document Date:',0,0,'L',0);
                PDF::Ln(8);
                PDF::Cell(130,6,'Month of '.config('settings.month'). '-'.config('settings.year'),0,0,'L',0);
                PDF::Cell(10,6,Carbon::now(),0,0,'L',0);
                PDF::Ln(10);
                PDF::SetFillColor(224,235,255);
                PDF::Cell(20,6,'Serial No',1,0,'C',2);
                PDF::Cell(50,6,'Tenant Name',1,0,'C',1);
                PDF::Cell(30,6,'Rent Amount',1,0,'C',1);
                PDF::Cell(20,6,'Arrears B/F',1,0,'C',1);
                PDF::Cell(20,6,'Total',1,0,'C',1);
                PDF::Cell(20,6,'Paid',1,0,'C',1);
                PDF::Cell(20,6,'Balance',1,0,'C',1);
                PDF::Ln(7);
                PDF::SetFillColor(247, 247, 247);
                PDF::SetFont('helvetica', '', 9);
               }
        }
        PDF::SetFont('helvetica', 'B', 9);
        PDF::Cell(20,6,'',0,0,'C',0);
        PDF::Cell(50,6,'TOTAL',0,0,'C',0);
        PDF::Cell(30,6,number_format($total_rent),0,0,'C',0);
        PDF::Cell(20,6,number_format($total_bf),0,0,'C',0);
        PDF::Cell(20,6,number_format($total),0,0,'C',0);
        PDF::Cell(20,6,number_format($paid),0,0,'C',0);
        PDF::Cell(20,6,number_format($balance),0,0,'L',0);
        
        PDF::Ln(20);
        PDF::Cell(189,6,'NOTE: The figures displayed are set in '. config('settings.currency').' currency code',0,0,'L',0);
        PDF::setFooterCallback(function($pdf) {
            $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    
        });

        PDF::Output('statement.pdf', 'I');
    }
}
