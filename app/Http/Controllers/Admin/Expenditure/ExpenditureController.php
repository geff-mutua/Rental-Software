<?php

namespace App\Http\Controllers\Admin\Expenditure;

use PDF;
use App\Models\Expense;
use App\Models\Category;
use App\Helpers\PrintPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class ExpenditureController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Expenses"]
        ];
        $categories=Category::where('property_id',config('settings.default_property')->id)->get();
        $month=config('settings.month');
        $year=config('settings.year');


        $expenses=Expense::where('property_id',config('settings.default_property')->id)->where('month',$month)->where('year',$year)->get();

        return \view('content.admin.expenses.index')->with(compact('breadcrumbs','categories','expenses','month','year'));
    }
    public function categoryIndex()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Expenses Category"]
        ];
        $categories=Category::where('property_id',config('settings.default_property')->id)->get();

        return \view('content.admin.expenses.category.index')->with(compact('breadcrumbs','categories'));
    }
    public function store(Request $request)
    {
        Expense::create([
            'category_id'=>$request->category,
            'month'=>$request->month,
            'amount'=>$request->amount,
            'year'=>config('settings.year'),
            'property_id'=>config('settings.default_property')->id,
        ]);
        session()->flash('message','Created successfully');
        return redirect()->back();
    }
    public function catStore(Request $request)
    {
        Category::create([
            'description'=>$request->name,
            'property_id'=>config('settings.default_property')->id,
        ]);
        session()->flash('message','Created successfully');
        return redirect()->back();
    }
    public function catdel($id)
    {
        Category::find($id)->delete();
        return redirect()->back();
    }
    public function delete($id)
    {
        Expense::find($id)->delete();
        return redirect()->back();
    }

    public function filter(Request $request)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('expenditure.index'), 'name' => "Expenses"]
        ];
        $categories=Category::where('property_id',config('settings.default_property')->id)->get();

        $month=$request->month;
        $year=$request->year;

        $expenses=Expense::where('property_id',config('settings.default_property')->id)->where('month',$month)->where('year',$year)->get();

        return \view('content.admin.expenses.index')->with(compact('breadcrumbs','categories','expenses','month','year'));
    }
    public function print(PrintPDF $pdf,$month,$year)
    {
        $pdf->header();
        // add a page
        PDF::AddPage();
        PDF::SetFont('helvetica', 'B', 11);
        PDF::Ln(20);
        PDF::Cell(40,6,'RECORDED EXPENDITURES',0,1,'L');
        PDF::SetFont('helvetica', '', 10);
        PDF::Cell(130,6,'Property Name: '.config('settings.default_property')->name ,0,0,'L',0);
        PDF::Cell(10,6,'Document Date:',0,0,'L',0);
        PDF::Ln(8);
        PDF::Cell(130,6,'Month of '.$month. '-'.$year,0,0,'L',0);
        PDF::Cell(10,6,Carbon::now(),0,0,'L',0);
        PDF::Ln(10);
        PDF::SetFillColor(185,235,255);
        PDF::Cell(30,6,'#',0,0,'C',2);
        PDF::Cell(60,6,'Description',0,0,'L',1);
        PDF::Cell(50,6,'Amount',0,0,'L',1);
        PDF::Cell(30,6,'Date',0,0,'L',1);


        PDF::Ln(7);


        $business=config('settings.default_property')==null ?'':config('settings.default_property')->id ;

        $payments=Expense::where('year',$year)->where('month',$month)->where('property_id',$business)->get();
        PDF::SetFillColor(247, 247, 247);
        PDF::SetFont('helvetica', '', 9);
       $total=0;
        foreach ($payments as $key => $value) {
         
            PDF::Cell(30,6,$key+=1,0,0,'C',1);
            PDF::Cell(60,6,$value->category->description,0,0,'L',1);
            PDF::Cell(50,6,number_format($value->amount),0,0,'L',1);
            PDF::Cell(30,6,Carbon::Parse($value->created_at)->format('d-m-Y'),0,0,'L',1);

            PDF::Ln(7);

               $total=$total +(float)$value->amount;

        }
        PDF::SetFont('helvetica', 'B', 9);
        PDF::Cell(15,6,'',0,0,'C',0);
        PDF::Cell(75,6,'TOTAL',0,0,'L',0);

        PDF::Cell(15,6,number_format($total),0,0,'L',0);

        // PDF::SetTextColor(255,255,255);
        PDF::Ln(20);
        PDF::Cell(189,6,'NOTE: The figures displayed are set in '. config('settings.currency').' currency code',0,0,'L',0);
        PDF::setFooterCallback(function($pdf) {
            $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    
        });

        //Close and output PDF document
        PDF::Output('statement.pdf', 'I');
    }
}
