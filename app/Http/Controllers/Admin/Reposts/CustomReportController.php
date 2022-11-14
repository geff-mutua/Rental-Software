<?php

namespace App\Http\Controllers\Admin\Reposts;

use PDF;
use App\Models\Rent;
use App\Models\Expense;
use App\Helpers\PrintPDF;
use App\Helpers\HomeService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Helpers\ExpensesService;
use App\Http\Controllers\Controller;

class CustomReportController extends Controller
{
    public function index(HomeService $homeservice, ExpensesService $service){
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Reports"]
        ];
        $default = [];
        $default['expenses']=$service->dashboard();
        $default['incomes']=$homeservice->homeService(config('settings.month'),config('settings.year'));
        $default['type']='default';
        $default['duration']='Showing report for the month of '.config('settings.month').' - '.config('settings.year');
        // dd($default);
        return \view('content.admin.reports.index')->with(compact('breadcrumbs','default'));
    }

    public function byYear(Request $request){
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Reports"]
        ];
        $business=config('settings.default_property')->id;
        $default = [];
    
        $default['type']='year';
        $default['year']=$request->year;
        $expected=Rent::where('year',$request->year)->where('property_id',$business)->sum('total');
        $paid=Rent::where('year',$request->year)->where('property_id',$business)->sum('paid');
        $total_rooms=Rent::where('year',$request->year)->where('property_id',$business)->distinct()->count('tenant_id');
        $incomes=[
            'expected'=>$expected,
            'total_rooms'=>$total_rooms,
            'paid'=>$paid,
        ];
        $expenses=Expense::with('category')->where('year',$request->year)->where('property_id',$business)->get();
        $total=Expense::with('category')->where('year',$request->year)->where('property_id',$business)->sum('amount');
        $expenses=[
            'expenses'=>$expenses,
            'total'=>$total,
        ];
       
        $default['incomes']=$incomes;
        $default['expenses']=$expenses;
        $default['duration']='Showing report for '.$request->year;
        return \view('content.admin.reports.index')->with(compact('breadcrumbs','default'));
    }

    public function printYear($year,PrintPDF $pdf){
        $business=config('settings.default_property')->id;
        $default = [];
    
        $default['type']='date';
        $expected=Rent::where('year',$year)->where('property_id',$business)->sum('total');
        $paid=Rent::where('year',$year)->where('property_id',$business)->sum('paid');
        $total_rooms=Rent::where('year',$year)->where('property_id',$business)->distinct()->count('tenant_id');
        $incomes=[
            'expected'=>$expected,
            'total_rooms'=>$total_rooms,
            'paid'=>$paid,
        ];
        $expenses=Expense::with('category')->where('year',$year)->where('property_id',$business)->get();
        $total=Expense::with('category')->where('year',$year)->where('property_id',$business)->sum('amount');
        $expenses=[
            'expenses'=>$expenses,
            'total'=>$total,
        ];
       
        $default['incomes']=$incomes;
        $default['expenses']=$expenses;
        $default['duration']='Showing report for '.$year;

        $pdf->header();
        // add a page
        PDF::AddPage();
        PDF::SetFont('helvetica', 'B', 11);
        PDF::Ln(20);
        PDF::Cell(43,6,'REPORT STATEMENT',0,1,'C');
        PDF::SetFont('helvetica', '', 10);
        PDF::Cell(130,6,'Property Name: '.strtoupper(config('settings.default_property')->name ),0,0,'L',0);
        PDF::Cell(10,6,'Document Date:',0,0,'L',0);
        PDF::Ln(8);
        PDF::Cell(130,6,'Summary report for '.$year,0,0,'L',0);
        PDF::Cell(10,6,Carbon::now(),0,0,'L',0);
        PDF::Ln(10);
        PDF::SetFont('helvetica', 'B', 10);
        PDF::SetFillColor(224,235,255);
        PDF::Cell(100,6,'OPERATING INCOME',0,0,'L',2);
        PDF::Cell(80,6,'AMOUNT',0,0,'L',2);
        PDF::SetFont('helvetica', '',9);
        PDF::Ln(7);
        PDF::Cell(100,6,'Number Of Registered Units',0,0,'L',0);
        PDF::Cell(80,6,$default['incomes']['total_rooms'],0,0,'L',0);
        PDF::Ln(7);
        PDF::Cell(100,6,'Expected Rent Income',0,0,'L',0);
        PDF::Cell(80,6,number_format($default['incomes']['expected']),0,0,'L',0);
        PDF::Ln(7);
        PDF::Cell(100,6,'Income Received',0,0,'L',0);
        PDF::Cell(80,6,number_format($default['incomes']['paid']),0,0,'L',0);
        PDF::Ln(7);
        PDF::Cell(100,6,'Total Property Expenses',0,0,'L',0);
        PDF::Cell(80,6,number_format($default['expenses']['total']),0,0,'L',0);
        PDF::Ln(5);
        PDF::Cell(189,0,'-------------------------------------------------------------------------------------------------------------------------------------------------------------------------',0,0,'L',0);
        PDF::Ln(5);
        PDF::SetFont('helvetica', 'B', 10);
        PDF::Cell(100,6,'Gross Operating Income',0,0,'L',0);
        PDF::Cell(80,6,number_format(((float) $default['incomes']['paid'])-((float) $default['expenses']['total'])),0,0,'L',0);
        PDF::SetFont('helvetica', '', 10);
        PDF::Ln(7);
        PDF::Cell(189,0,'---------------------------------------------------------------------------------------------------------------------------------------------------------',0,0,'L',0);
        PDF::Ln(10);
        PDF::SetFont('helvetica', 'B', 11);
        PDF::Cell(40,6,'OPERATING EXPENSES',0,1,'L');
        PDF::Ln(7);
        PDF::SetFont('helvetica', '', 10);
        PDF::SetFillColor(224,235,255);
        PDF::Cell(20,6,'#',0,0,'C',2);
        PDF::SetFont('helvetica', 'B', 10);
        PDF::Cell(100,6,'EXPENSE DESCRIPTION',0,0,'L',2);
        PDF::Cell(60,6,'AMOUNT',0,0,'L',2);
        PDF::SetFont('helvetica', '', 9);
        PDF::Ln(10);
        PDF::SetFillColor(247, 247, 247);
        PDF::SetFont('helvetica', '', 9);;
        foreach ($default['expenses']['expenses'] as $key => $value) {
         
            PDF::Cell(20,6,$key+=1,0,0,'C',1);
            PDF::Cell(100,6,$value->category->description,0,0,'L',1);
            PDF::Cell(60,6,number_format($value->amount),0,0,'L',1);
            PDF::Ln(7);
        }
        PDF::SetFont('helvetica', 'B', 10);
        PDF::Cell(20,6,'',0,0,'C',0);
        PDF::Cell(100,6,'Total Expenses',0,0,'C',0);
        PDF::Cell(60,6,number_format($default['expenses']['total']),0,0,'L',0);
        PDF::Ln(7);
        PDF::SetFont('helvetica', 'B', 9);
        PDF::Cell(20,6,'',0,0,'C',0);
  

        // PDF::Cell(30,6,number_format($total),0,0,'C',0);

        // PDF::SetTextColor(255,255,255);
        PDF::Ln(20);
        PDF::Cell(189,6,'NOTE: The figures displayed are set in '. config('settings.currency').' currency code',0,0,'L',0);
        PDF::setFooterCallback(function($pdf) {
            $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    
        });

        //Close and output PDF document
        PDF::Output('Report.pdf', 'I');
    }

    public function byDate(Request $request){
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Reports"]
        ];
        $business=config('settings.default_property')->id;
        $default = [];
    
        $default['type']='date';
        $default['start_date']=$request->start_date;
        $default['end_date']=$request->end_date;
        $expected=Rent::whereBetween('created_at',[$request->start_date,$request->end_date])->where('property_id',$business)->sum('total');
        $paid=Rent::whereBetween('created_at',[$request->start_date,$request->end_date])->where('property_id',$business)->sum('paid');
        $total_rooms=Rent::whereBetween('created_at',[$request->start_date,$request->end_date])->where('property_id',$business)->distinct()->count('tenant_id');
        $incomes=[
            'expected'=>$expected,
            'total_rooms'=>$total_rooms,
            'paid'=>$paid,
        ];
        $expenses=Expense::with('category')->whereBetween('created_at',[$request->start_date,$request->end_date])->where('property_id',$business)->get();
        $total=Expense::with('category')->whereBetween('created_at',[$request->start_date,$request->end_date])->where('property_id',$business)->sum('amount');
        $expenses=[
            'expenses'=>$expenses,
            'total'=>$total,
        ];
       
        $default['incomes']=$incomes;
        $default['expenses']=$expenses;
        $default['duration']='Showing report as from '.$request->start_date.' to '.$request->end_date;
        return \view('content.admin.reports.index')->with(compact('breadcrumbs','default'));
       
        
    }
    public function printDate($start_date,$end_date,PrintPDF $pdf){
        $business=config('settings.default_property')->id;
        $default = [];
    
        $default['type']='date';
        $default['start_date']=$start_date;
        $default['end_date']=$end_date;
        $expected=Rent::whereBetween('created_at',[$start_date,$end_date])->where('property_id',$business)->sum('total');
        $paid=Rent::whereBetween('created_at',[$start_date,$end_date])->where('property_id',$business)->sum('paid');
        $total_rooms=Rent::whereBetween('created_at',[$start_date,$end_date])->where('property_id',$business)->distinct()->count('tenant_id');
        $incomes=[
            'expected'=>$expected,
            'total_rooms'=>$total_rooms,
            'paid'=>$paid,
        ];
        $expenses=Expense::with('category')->whereBetween('created_at',[$start_date,$end_date])->where('property_id',$business)->get();
        $total=Expense::with('category')->whereBetween('created_at',[$start_date,$end_date])->where('property_id',$business)->sum('amount');
        $expenses=[
            'expenses'=>$expenses,
            'total'=>$total,
        ];
       
        $default['incomes']=$incomes;
        $default['expenses']=$expenses;
        $default['duration']='Showing report as from '.$start_date.' to '.$end_date;

        $pdf->header();
        // add a page
        PDF::AddPage();
        PDF::SetFont('helvetica', 'B', 11);
        PDF::Ln(20);
        PDF::Cell(43,6,'REPORT STATEMENT',0,1,'C');
        PDF::SetFont('helvetica', '', 10);
        PDF::Cell(130,6,'Property Name: '.strtoupper(config('settings.default_property')->name ),0,0,'L',0);
        PDF::Cell(10,6,'Document Date:',0,0,'L',0);
        PDF::Ln(8);
        PDF::Cell(130,6,'Summary report between '.$start_date .' and '.$end_date,0,0,'L',0);
        PDF::Cell(10,6,Carbon::now(),0,0,'L',0);
        PDF::Ln(10);
        PDF::SetFillColor(224,235,255);
        PDF::Cell(100,6,'MONTHLY OPERATING INCOME',1,0,'C',2);
        PDF::Cell(80,6,'AMOUNT',1,0,'L',2);
        PDF::Ln(7);
        PDF::Cell(100,6,'Number Of Registered Units',0,0,'L',0);
        PDF::Cell(80,6,$default['incomes']['total_rooms'],0,0,'L',0);
        PDF::Ln(7);
        PDF::Cell(100,6,'Expected Rent Income',0,0,'L',0);
        PDF::Cell(80,6,number_format($default['incomes']['expected']),0,0,'L',0);
        PDF::Ln(7);
        PDF::Cell(100,6,'Income Received',0,0,'L',0);
        PDF::Cell(80,6,number_format($default['incomes']['paid']),0,0,'L',0);
        PDF::Ln(7);
        PDF::Cell(100,6,'Total Property Expenses',0,0,'L',0);
        PDF::Cell(80,6,number_format($default['expenses']['total']),0,0,'L',0);
        PDF::Ln(5);
        PDF::Cell(189,0,'---------------------------------------------------------------------------------------------------------------------------------------------------------',0,0,'L',0);
        PDF::Ln(5);
        PDF::SetFont('helvetica', 'B', 10);
        PDF::Cell(100,6,'Gross Monthly Operating Income',0,0,'L',0);
        PDF::Cell(80,6,number_format(((float) $default['incomes']['paid'])-((float) $default['expenses']['total'])),0,0,'L',0);
        PDF::SetFont('helvetica', '', 10);
        PDF::Ln(7);
        PDF::Cell(189,0,'---------------------------------------------------------------------------------------------------------------------------------------------------------',0,0,'L',0);
        PDF::Ln(10);
        PDF::SetFont('helvetica', 'B', 11);
        PDF::Cell(40,6,'OPERATING EXPENSES',0,1,'L');
        PDF::Ln(7);
        PDF::SetFont('helvetica', '', 10);
        PDF::SetFillColor(224,235,255);
        PDF::Cell(20,6,'#',1,0,'C',2);
        PDF::Cell(100,6,'EXPENSE DESCRIPTION',1,0,'L',2);
        PDF::Cell(60,6,'AMOUNT',1,0,'L',2);
        PDF::Ln(10);
        PDF::SetFillColor(247, 247, 247);
        PDF::SetFont('helvetica', '', 9);;
        foreach ($default['expenses']['expenses'] as $key => $value) {
         
            PDF::Cell(20,6,$key+=1,0,0,'C',1);
            PDF::Cell(100,6,$value->category->description,0,0,'L',1);
            PDF::Cell(60,6,number_format($value->amount),0,0,'L',1);
            PDF::Ln(7);
        }
        PDF::SetFont('helvetica', 'B', 10);
        PDF::Cell(20,6,'',0,0,'C',0);
        PDF::Cell(100,6,'Total Expenses',0,0,'C',0);
        PDF::Cell(60,6,number_format($default['expenses']['total']),0,0,'L',0);
        PDF::Ln(7);
        PDF::SetFont('helvetica', 'B', 9);
        PDF::Cell(20,6,'',0,0,'C',0);
  

        // PDF::Cell(30,6,number_format($total),0,0,'C',0);

        // PDF::SetTextColor(255,255,255);
        PDF::Ln(20);
        PDF::Cell(189,6,'NOTE: The figures displayed are set in '. config('settings.currency').' currency code',0,0,'L',0);
        PDF::setFooterCallback(function($pdf) {
            $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    
        });

        //Close and output PDF document
        PDF::Output('Report.pdf', 'I');
    }

    public function byMonth(Request $request){
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Reports"]
        ];
        $business=config('settings.default_property')->id;
        $default = [];
        $default['month']=$request->month;
        $default['year']=$request->year;
        $default['type']='month';
        $expected=Rent::where('month',$request->month)->where('year',$request->year)->where('property_id',$business)->sum('total');
        $paid=Rent::where('month',$request->month)->where('year',$request->year)->where('property_id',$business)->sum('paid');
        $total_rooms=Rent::where('month',$request->month)->where('year',$request->year)->where('property_id',$business)->distinct()->count('tenant_id');
        $incomes=[
            'expected'=>$expected,
            'total_rooms'=>$total_rooms,
            'paid'=>$paid,
        ];
        $expenses=Expense::with('category')->where('month',$request->month)->where('year',$request->year)->where('property_id',$business)->get();
        $total=Expense::with('category')->where('month',$request->month)->where('year',$request->year)->where('property_id',$business)->sum('amount');
        $expenses=[
            'expenses'=>$expenses,
            'total'=>$total,
        ];
       
        $default['incomes']=$incomes;
        $default['expenses']=$expenses;
        $default['duration']='Showing report for '.$request->month.' - '.$request->year;
        return \view('content.admin.reports.index')->with(compact('breadcrumbs','default'));
       
        
    }
    public function printMonth($month,$year,PrintPDF $pdf){
        $business=config('settings.default_property')->id;
        $default = [];
    
        $default['type']='date';
        $expected=Rent::where('month',$month)->where('year',$year)->where('property_id',$business)->sum('total');
        $paid=Rent::where('month',$month)->where('year',$year)->where('property_id',$business)->sum('paid');
        $total_rooms=Rent::where('month',$month)->where('year',$year)->where('property_id',$business)->distinct()->count('tenant_id');
        $incomes=[
            'expected'=>$expected,
            'total_rooms'=>$total_rooms,
            'paid'=>$paid,
        ];
        $expenses=Expense::with('category')->where('month',$month)->where('year',$year)->where('property_id',$business)->get();
        $total=Expense::with('category')->where('month',$month)->where('year',$year)->where('property_id',$business)->sum('amount');
        $expenses=[
            'expenses'=>$expenses,
            'total'=>$total,
        ];
       
        $default['incomes']=$incomes;
        $default['expenses']=$expenses;
        $default['duration']='Showing report for '.$month.' - '.$year;

        $pdf->header();
        // add a page
        PDF::AddPage();
        PDF::SetFont('helvetica', 'B', 11);
        PDF::Ln(20);
        PDF::Cell(43,6,'REPORT STATEMENT',0,1,'C');
        PDF::SetFont('helvetica', '', 10);
        PDF::Cell(130,6,'Property Name: '.strtoupper(config('settings.default_property')->name ),0,0,'L',0);
        PDF::Cell(10,6,'Document Date:',0,0,'L',0);
        PDF::Ln(8);
        PDF::Cell(130,6,'Summary report for '.$month .' - '.$year,0,0,'L',0);
        PDF::Cell(10,6,Carbon::now(),0,0,'L',0);
        PDF::Ln(10);
        PDF::SetFillColor(224,235,255);
        PDF::Cell(100,6,'MONTHLY OPERATING INCOME',1,0,'C',2);
        PDF::Cell(80,6,'AMOUNT',1,0,'L',2);
        PDF::Ln(7);
        PDF::Cell(100,6,'Number Of Registered Units',0,0,'L',0);
        PDF::Cell(80,6,$default['incomes']['total_rooms'],0,0,'L',0);
        PDF::Ln(7);
        PDF::Cell(100,6,'Expected Rent Income',0,0,'L',0);
        PDF::Cell(80,6,number_format($default['incomes']['expected']),0,0,'L',0);
        PDF::Ln(7);
        PDF::Cell(100,6,'Income Received',0,0,'L',0);
        PDF::Cell(80,6,number_format($default['incomes']['paid']),0,0,'L',0);
        PDF::Ln(7);
        PDF::Cell(100,6,'Total Property Expenses',0,0,'L',0);
        PDF::Cell(80,6,number_format($default['expenses']['total']),0,0,'L',0);
        PDF::Ln(5);
        PDF::Cell(189,0,'---------------------------------------------------------------------------------------------------------------------------------------------------------',0,0,'L',0);
        PDF::Ln(5);
        PDF::SetFont('helvetica', 'B', 10);
        PDF::Cell(100,6,'Gross Monthly Operating Income',0,0,'L',0);
        PDF::Cell(80,6,number_format(((float) $default['incomes']['paid'])-((float) $default['expenses']['total'])),0,0,'L',0);
        PDF::SetFont('helvetica', '', 10);
        PDF::Ln(7);
        PDF::Cell(189,0,'---------------------------------------------------------------------------------------------------------------------------------------------------------',0,0,'L',0);
        PDF::Ln(10);
        PDF::SetFont('helvetica', 'B', 11);
        PDF::Cell(40,6,'OPERATING EXPENSES',0,1,'L');
        PDF::Ln(7);
        PDF::SetFont('helvetica', '', 10);
        PDF::SetFillColor(224,235,255);
        PDF::Cell(20,6,'#',1,0,'C',2);
        PDF::Cell(100,6,'EXPENSE DESCRIPTION',1,0,'L',2);
        PDF::Cell(60,6,'AMOUNT',1,0,'L',2);
        PDF::Ln(10);
        PDF::SetFillColor(247, 247, 247);
        PDF::SetFont('helvetica', '', 9);;
        foreach ($default['expenses']['expenses'] as $key => $value) {
         
            PDF::Cell(20,6,$key+=1,0,0,'C',1);
            PDF::Cell(100,6,$value->category->description,0,0,'L',1);
            PDF::Cell(60,6,number_format($value->amount),0,0,'L',1);
            PDF::Ln(7);
        }
        PDF::SetFont('helvetica', 'B', 10);
        PDF::Cell(20,6,'',0,0,'C',0);
        PDF::Cell(100,6,'Total Expenses',0,0,'C',0);
        PDF::Cell(60,6,number_format($default['expenses']['total']),0,0,'L',0);
        PDF::Ln(7);
        PDF::SetFont('helvetica', 'B', 9);
        PDF::Cell(20,6,'',0,0,'C',0);
  

        // PDF::Cell(30,6,number_format($total),0,0,'C',0);

        // PDF::SetTextColor(255,255,255);
        PDF::Ln(20);
        PDF::Cell(189,6,'NOTE: The figures displayed are set in '. config('settings.currency').' currency code',0,0,'L',0);
        PDF::setFooterCallback(function($pdf) {
            $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    
        });

        //Close and output PDF document
        PDF::Output('Report.pdf', 'I');
    }
}
