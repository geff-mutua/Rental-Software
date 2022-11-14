<?php

return [
    'config'=>'',

    'default_business'=>'',

    'month'=>date( 'F'),

    'last_month'=>date( 'F',strtotime('last month' ) ),
    'next_month'=>date( 'F',strtotime('next month' ) ),

    'year'=>date( 'Y' ),

    'day'=>date('d'),

    'company'=>'',

    'payment_details'=>'',

    'properties'=>'',

    'default_coupon' => '0',

    'invoice_type' =>'Auto',#Auto/Manual

    'system_type' => 'default',#default#custom

    'currency'=>'Ksh',

    'setup_printing'=>'', #default = No existing records to print.. 

    'appSettings'=>''


];