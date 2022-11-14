<?php

namespace App\View\Composers;

use App\Models\AppSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SystemConfigComposer
{
    public function compose(View $view)
    {
        if (Auth::check()) {
            $settings = AppSetting::with('company')->first();
            $logo = 'logo.png';
            if (!is_null($settings)) {
                $pageConfigs = [
                    'pageHeader' => $settings->pageHeader == 1 ? true : false,
                    'sidebarCollapsed' => $settings->sidebarCollapsed == 1 ? true : false,
                    'theme'=>$settings->theme,
                    'verticalMenuNavbarType'=>$settings->navbar
                ];
                if (!is_null($settings->logo)) {
                    $logo = $settings->logo;
                }
                config()->set('sysconfig', $pageConfigs);
            } else {
                config()->set('sysconfig',
                    [
                        'pageHeader' => true,
                        'sidebarCollapsed' => false,
                        'theme'=>'dark',
                        'verticalMenuNavbarType'=>'floating'
                    ]);
            }
            $pageConfigs = \config('sysconfig');
        
            $view->with(\compact('pageConfigs', 'logo'));
        }
    }
}
