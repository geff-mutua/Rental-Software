<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Setting;
use App\Models\Property;
use App\Models\AppSetting;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Factory $cache, Setting $settings)
    {
        $settings = $cache->remember('settings',0, function() use ($settings){
          
            return $settings->first();
        });
        
        config()->set('settings.config', $settings);
        config()->set('settings.appSettings', AppSetting::with('company')->first());
       
        config()->set('settings.default_property', Property::where('id',$settings?$settings->default_business:1)->first());
        
        config()->set('settings.company', Company::all());
        // config()->set('settings.payment_details', PaymentDetail::where('id',1)->first());
        // config()->set('settings.setup_printing', InitSetupPrint::where('house_id',config('settings.default_business')->id)->value('print_type'));
        config()->set('settings.properties',Property::all());
        
    }
}
