<?php

namespace App\Http\Controllers\Admin\Payment;

use PDF;
use App\Models\Rent;
use NumberFormatter;
use App\Models\Tenant;
use App\Models\Payment;
use App\Helpers\PrintPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $month=config( 'settings.month' );
        $year=config( 'settings.year' );
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Payments"], ['name' => $month .'-'.$year]
        ];
        
        $property= config( 'settings.default_property')->id;
        $options=[
            'Mpesa'=>'Mpesa'
        ];
        $tenants=Tenant::where('property_id',$property)->get();

        $payments=Payment::where('property_id',$property)->where('month',$month)->where('year',$year)->get();
        return \view('content.admin.payments.index')->with(compact('breadcrumbs','payments','tenants','options','month','year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $month=config('settings.month');

        $year=config('settings.year');

        $business=config( 'settings.default_property' ) == null ? '' : config( 'settings.default_property' )->id ;

        $results=Rent::where( 'tenant_id' , $request->tenant )->where( 'month',$month )->where( 'year',$year )->first();

        if( !is_null( $results ) ){
           
            $paid= ( float ) $results[ 'paid' ];

            $balance=( float ) $results[ 'balance' ];

            $total_paid=( float ) $request->amount + $paid;

            $total_balance= $balance -(float) $request->amount;

            $create=Payment::create( [
                'tenant_id'=>$request->tenant,
                'amount'   =>$request->amount,
                'reference'=>$request->reference,
                'mode'     =>$request->mode,
                'date'=>$request->date,
                'year'     =>$year,
                'month'    =>$month,
                'property_id' =>$business
            ] );
            if($create){
                # Update the tenant balances
                $results['balance']=$total_balance;
                $results['paid']=$total_paid;
                if($total_balance > 0){
                    $results->status = 'Partially Paid';
                }elseif($total_balance=='0'){
                    $results->status = 'Paid';
                }else{
                    $results->status = 'OverPaid';
                }
                $results->save();
                Session::flash('success','The payment has been posted successfully');
                return redirect()->back();
            }
        }else{
            Session::flash('error','Please record the house rent first for the current month and post the new payment.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function filter(Request $request)
    {
        $month=$request->month;
        $year=$request->year;
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Payments"], ['name' => $month .'-'.$year]
        ];
        
        $property= config( 'settings.default_property')->id;
        $options=[
            'Mpesa'=>'Mpesa'
        ];
        $tenants=Tenant::where('property_id',$property)->get();

        $payments=Payment::where('property_id',$property)->where('month',$month)->where('year',$year)->get();
        return \view('content.admin.payments.index')->with(compact('breadcrumbs','payments','tenants','options','month','year'));
    }
    public function print_payments(PrintPDF $pdf,$month,$year){
        $pdf->header();
        // add a page
        PDF::AddPage();
        PDF::SetFont('helvetica', 'B', 11);
        PDF::Ln(20);
        PDF::Cell(35,6,'PAYMENTS RECEIVED',0,1,'L');
        PDF::SetFont('helvetica', '', 10);
        PDF::Cell(130,6,'Property Name: '.config('settings.default_property')->name ,0,0,'L',0);
        PDF::Cell(10,6,'Document Date:',0,0,'L',0);
        PDF::Ln(8);
        PDF::Cell(130,6,'Month of '.$month. '-'.$year,0,0,'L',0);
        PDF::Cell(10,6,Carbon::now()->format('d/M/Y'),0,0,'L',0);
        PDF::Ln(10);
        PDF::SetFillColor(185,235,255);
        PDF::Cell(15,6,'#',0,0,'C',2);
        PDF::Cell(40,6,'Tenant Name',0,0,'L',1);
        PDF::Cell(25,6,'Hse Name',0,0,'L',1);
        PDF::Cell(25,6,'Amount',0,0,'L',1);
        PDF::Cell(20,6,'Mode',0,0,'L',1);
        PDF::Cell(30,6,'Reference',0,0,'L',1);
        PDF::Cell(30,6,'Date Paid',0,0,'L',1);

        PDF::Ln(7);


        $business=config('settings.default_property')==null ?'':config('settings.default_property')->id ;

        $payments=Payment::with('tenant')->where('year',$year)->where('month',$month)->where('property_id',$business)->get();
        PDF::SetFillColor(247, 247, 247);
        PDF::SetFont('helvetica', '', 9);
       $total=0;
        foreach ($payments as $key => $value) {
         
            PDF::Cell(15,6,$key+=1,0,0,'C',1);
            PDF::Cell(40,6,$value->tenant->name,0,0,'L',1);
            PDF::Cell(25,6,$value->tenant->room->name,0,0,'L',1);
            PDF::Cell(25,6,number_format($value->amount),0,0,'L',1);
            PDF::Cell(20,6,$value->mode,0,0,'L',1);
            PDF::Cell(30,6,$value->reference,0,0,'L',1);
            PDF::Cell(30,6,Carbon::Parse($value->date)->format('d-m-Y'),0,0,'L',1);

            PDF::Ln(7);

               $total=$total +(float)$value->amount;

        }
        PDF::SetFont('helvetica', 'B', 9);
        PDF::Cell(15,6,'',0,0,'C',0);
        PDF::Cell(64,6,'TOTAL',0,0,'L',0);

        PDF::Cell(15,6,number_format($total),0,0,'C',0);

        // PDF::SetTextColor(255,255,255);
        PDF::Ln(20);
        PDF::Cell(189,6,'NOTE: The figures displayed are set in '. config('settings.currency').' currency code',0,0,'L',0);
        PDF::setFooterCallback(function($pdf) {
            $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    
        });

        //Close and output PDF document
        PDF::Output('statement.pdf', 'I');
    }

    public function generateReceipts(PrintPdf $pdf, $month,$year)
    {
       
    $business=config('settings.default_property')->id ;
    $payments=Payment::with('tenant')->where('year',$year)->where('month',$month)->where('property_id',$business)->get(); 
      
    $count=0;   
       $r= new NumberFormatter("en", NumberFormatter::SPELLOUT); 
        PDF::AddPage();
        foreach ($payments as $key => $value) {
            
                PDF::Ln(10);
                PDF::SetFont('helvetica', '', 10);
                $image_file = 'assets/images/logo.png';
                // PDF::Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
                PDF::SetFont('helvetica', 'B', 14);
                PDF::Cell(170,20,'SERIAL NO'.' - '.$value->id ,0,1,'C');
                // PDF::Cell(20,6,'Receipt No. '.$value->id,0,0,'R',0);
                PDF::Ln(1);
                PDF::SetFont('helvetica', '', 10);
                PDF::Cell(110,6,'Property Name: '.ucwords(config('settings.default_property')->name ),0,0,'L',0);
                // PDF::SetFont('helvetica', '', 10);
                PDF::Cell(80,6,'Rent Payment for '.$month.', '.$year.' ',0,0,'L',0);
                PDF::Ln(7);
                PDF::Cell(110,6,'Tenant, '.$value->tenant->name,0,0,'L',0);
                PDF::SetFont('helvetica', '', 8);
                // PDF::Ln(7);
                // PDF::Cell(110,6,'',0,0,'L',0);
                PDF::Cell(50,6,'Date Paid. '.$value->date,0,0,'L',0);
                PDF::Ln(3);
                PDF::Cell(189,0,'_________________________________________________________________________________________________________________________',0,0,'L',0);
                PDF::Ln(5);
                PDF::SetFont('helvetica', '', 10);
                PDF::Cell(30,6,'Received From ',0,0,'L',0);
                PDF::SetFont('helvetica', '', 9);
                PDF::Cell(60,6,$value->tenant->name,0,0,'L',0);
                PDF::SetFont('helvetica', 'B', 9);
                PDF::Cell(30,6,'Amount Received',0,0,'L',0);
                PDF::Cell(50,6,'Ksh '.number_format($value->amount),1,0,'L',0);
                PDF::SetFont('helvetica', 'I', 8);
                PDF::Ln(7);
                PDF::Cell(189,6,'Amount in words: '.$r->format($value->amount).' shillings only.',0,0,'L',0);
                PDF::Ln(7);
                PDF::SetFont('helvetica', '', 10);
                PDF::Cell(90,6,'For Payment of Rent '.$month.','.$year,0,0,'L',0);
                PDF::SetFont('helvetica', 'B', 10);
                PDF::Cell(30,6,'New Balance:',0,0,'L',0);
                $bl=Rent::where('tenant_id',$value->tenant->id)->where('month',$month)->where('year',$year)->value('balance');
                PDF::Cell(50,6,'Ksh '.number_format((float) $bl < 0 ?'0.00' : $bl,2),1,0,'L',0);
                PDF::Ln(7);
                PDF::SetFont('helvetica', 'B', 9);
                PDF::Cell(30,6,'Received By',0,0,'L',0);
                PDF::SetFont('helvetica', 'B', 9);
                PDF::Cell(60,6,ucwords(strtolower(config( 'settings.company')[0]->name)),0,0,'L',0);
                PDF::SetFont('helvetica', '', 9);
                PDF::Cell(30,6,'Paid By [*] ',0,0,'L',0);
                PDF::Cell(30,6,$value->mode,0,0,'L',0);
                PDF::Ln(7);
                PDF::Cell(30,6,'',0,0,'L',0);
                PDF::Cell(30,6,config( 'settings.company')[0]->contact,0,0,'L',0);
                PDF::Ln(5);
                PDF::SetFont('helvetica', '', 8);
                PDF::Cell(189,0,'_________________________________________________________________________________________________________________________',0,0,'L',0);
                // PDF::Ln(20);
          
                 $count+=1;
                 if($count==3){

                     PDF::AddPage();
                     $count=0;
                 }
            
            
                // if($count==3){
                //    
                // }
        }
        
        PDF::setFooterCallback(function($pdf) {
            $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
            
        });
        
        PDF::Output('receipts.pdf', 'I');
    }

}
