<?php

namespace App\Http\Controllers\Admin\Paybill;

use App\Models\ShortCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaybillController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "System Settings"], ['name' => 'Paybill Configurations']
        ];

        $shortcodes=ShortCode::get();
        
        return \view('content.admin.paybill.index')->with(compact('breadcrumbs','shortcodes'));
    }


    public function save(Request $request){
        $request->validate([
            'shortcode'=>'required|unique:short_codes,shortcode',
            'shortcode_type'=>'required'
        ]);
        ShortCode::create([
            'shortcode'=>$request->shortcode,
            'shortcode_type'=>$request->shortcode_type,
        ]);

        return redirect()->back();
    }

    public function remove($id){
        ShortCode::find($id)->delete();
        return redirect()->back();
    }
}
