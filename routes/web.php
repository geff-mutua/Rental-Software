<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Livewire\Admin\MainDashboard;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Sms\SmsController;
use App\Http\Controllers\Admin\Room\RoomController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\Tenants\TenantProfile;
use App\Http\Controllers\API\Payments\MPESAController;
use App\Http\Controllers\Admin\Invoices\TenantInvoices;
use App\Http\Controllers\Admin\Tenants\TenantController;
use App\Http\Controllers\Admin\Company\CompanyController;
use App\Http\Controllers\Admin\Paybill\PaybillController;
use App\Http\Controllers\Admin\Payment\PaymentController;
use App\Http\Controllers\Admin\Property\PropertyController;
use App\Http\Controllers\Admin\Unmapped\UnmappedController;
use App\Http\Controllers\Admin\Unmapped\UnmappedApiPayments;
use App\Http\Controllers\Admin\Statement\StatementController;
use App\Http\Controllers\Admin\Reposts\CustomReportController;
use App\Http\Controllers\Admin\Expenditure\ExpenditureController;
use App\Http\Controllers\Admin\Notifications\NotificationSetting;
use App\Http\Controllers\Admin\Subscription\SubscriptionController;
use App\Http\Controllers\Admin\AppSettings\ApplicationSettingsController;


Route::get('/about', [PageController::class,'about']);
Route::get('/services', [PageController::class,'services']);
Route::get('/pricing', [PageController::class,'pricing']);
Route::get('/contact', [PageController::class,'contact'])->name('contact');

Route::middleware(['auth'])->group(function () {
    // Route::get('/', [PageController::class,'index'])->name('landing');


    Route::get('/',MainDashboard::class)->name('home');

    // Company Settings Routes
    Route::resource('company',CompanyController::class)->names(['company'=>'company.index']);

    // Applicatiuon Settings Routes
    Route::resource('app-settings',ApplicationSettingsController::class)->names(['app-settings'=>'app-settings.index']);

    // User Accounts Routes
    Route::resource('users',UserController::class)->names(['users'=>'users.index']);

    //Property Routes
    Route::resource('property',PropertyController::class)->names(['property'=>'property.index']);

     //Room Routes
     Route::resource('rooms',RoomController::class)->names(['rooms'=>'rooms.index']);

    //Subscription Routes
    Route::resource('subscription',SubscriptionController::class)->names(['subscription'=>'subscription.index']);

     //Tenants Routes
    Route::resource('tenants',TenantController::class)->names(['tenants'=>'tenants.index']);
    Route::get('tenants/{tenant}/profile',[TenantProfile::class,'index'])->name('tenant.profile');
    Route::post('tenants/newRent',[TenantProfile::class,'saveRent'])->name('save-rent');
    Route::get('tenants-left',[TenantProfile::class,'leftTenants'])->name('tenants-left');
    Route::get('tenants-upload',[TenantProfile::class,'tenantUpload'])->name('tenants-upload');
    Route::post('upload-tenants',[TenantProfile::class,'uploadTenants'])->name('upload-tenants');

    //payments controller
    Route::get('payments',[PaymentController::class,'index'])->name('payments.index');
    Route::post('payments-store',[PaymentController::class,'store'])->name('payments.store');
    Route::post('payments-filter',[PaymentController::class,'filter'])->name('payments.filter');
    Route::get('print-payments/{month}/{year}',[PaymentController::class,'print_payments'])->name('payments.print');
    Route::get('print-receipts/{month}/{year}',[PaymentController::class,'generateReceipts'])->name('payments.receipts');

    //unmapped
    Route::get('unmapped',[UnmappedApiPayments::class,'index'])->name('payments.unmapped');
    Route::post('map',[UnmappedApiPayments::class,'map']);

    //Expenditure Routes
    Route::get('expenses-index',[ExpenditureController::class,'index'])->name('expenditure.index');
    Route::post('expenses-store',[ExpenditureController::class,'store'])->name('expenditure.store');
    Route::post('expenses-filter',[ExpenditureController::class,'filter'])->name('expenditure.filter');
    Route::get('expenses-print/{month}/{year}',[ExpenditureController::class,'print'])->name('expenses.print');
    Route::get('expenses-categories',[ExpenditureController::class,'categoryIndex'])->name('expenditure.category');
    Route::post('expenses-categories-store',[ExpenditureController::class,'catStore'])->name('expenditure.catstore');
    Route::get('expenses-categories-del/{id}',[ExpenditureController::class,'catdel'])->name('expenditure.catdel');
    Route::get('expenses-del/{id}',[ExpenditureController::class,'delete'])->name('expenditure.delete');

    // Paybill Configurations & 
    Route::get('paybill',[PaybillController::class,'index'])->name('paybill.index');
    Route::post('register-shortcode',[PaybillController::class,'save']);
    Route::get('remove-shortcode/{id}',[PaybillController::class,'remove']);
    # Sms
    Route::get('sms',[SmsController::class,'index'])->name('sms.index');
    Route::post('update-sms',[SmsController::class,'update']);

    //Statement Controllers
    Route::get('statements',[StatementController::class,'index'])->name('statement.index');
    Route::post('filter',[StatementController::class,'filter'])->name('statement.filter');
    Route::get('get-stament/{month}/{year}',[StatementController::class,'printStatement'])->name('print.statements');

    # Invoices
    Route::get('invoices',[TenantInvoices::class,'index'])->name('invoices');
    Route::get('invoices/print/{id}',[TenantInvoices::class,'printInvoice']);
    Route::get('print-invoice/{id}',[TenantInvoices::class,'getPdf']);


    #Reports
    Route::get('custom-reports',[CustomReportController::class,'index'])->name('custom-reports');
    Route::post('/reporting-date',[CustomReportController::class,'byDate']);
    Route::post('/reporting-month',[CustomReportController::class,'byMonth']);
    Route::post('/reporting-year',[CustomReportController::class,'byYear']);
    Route::get('/print-year/{year}',[CustomReportController::class,'printYear'])->name('print-year');
    Route::get('/print-date/{start}/{end}',[CustomReportController::class,'printDate'])->name('print-date');
    Route::get('/print-month/{month}/{year}',[CustomReportController::class,'printMonth'])->name('print-month');

    #Notifications
    Route::get('system-notification',[NotificationSetting::class,'index'])->name('notifications.index');
    Route::post('update-notifications',[NotificationSetting::class,'update']);

    //Other Routes
    Route::get('switch/biz/{id}',[MainDashboard::class,'switch_biz']);
});

    //Mpesa Routes
    // Route::get('access-token',[MPESAController::class,'accessToken']);
    // Route::get('registerurl',[MPESAController::class,'registerURL']);
    // Route::get('simulate',[MPESAController::class,'simulate']);


    Route::get('mail', function () {
        return view('emails.endpointmail');
    });
require __DIR__.'/auth.php';
