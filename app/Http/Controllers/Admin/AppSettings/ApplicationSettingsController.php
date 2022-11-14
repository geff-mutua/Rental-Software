<?php

namespace App\Http\Controllers\Admin\AppSettings;

use App\Models\Company;
use App\Models\AppSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = AppSetting::with('company')->first();
        return view('content.admin.settings.app.index')->with(\compact('settings'));
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
        $request->validate([
            'type'         => 'required',
            'language'   => 'required',
            'currency'  => 'required',
            'sidebar'    => 'required',
            'header'      => 'required',
            'theme'=>'required',
            'navbar'=>'required'
        ]);
        $file=null;
        $company_id=Company::first();
        $settings = AppSetting::with('company')->first();
        if(!is_null($request->logo)){
            $request->validate([
                'logo' => 'mimes:png,jpg|max:2048'
            ]);
            if(!is_null($settings)){
                if(!\is_null($settings->logo)){

                    \Storage::disk('logo')->delete($settings->logo);
                }
            }
           
            $file = $request->logo->store('/', 'logo');
        }else{
            $file=null;
            if(is_null($settings)){
                $file = null;
            }else{
                $file = $settings->logo;
            }
        }

            AppSetting::updateOrCreate(['company_id'=>$company_id->id],[
                'logo'=> $file,
                'app_type'=>$request->type,
                'currency'=>$request->currency,
                'language'=>$request->language,
                'sidebarCollapsed'=>$request->sidebar,
                'pageHeader'=>$request->header,
                'theme'=>$request->theme,
                'navbar'=>$request->navbar
            ]);
            
      
     

     
        return redirect()->back()->withMessage('Settings Updated Successfully');
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
}
