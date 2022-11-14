<?php
namespace App\Helpers;

class Menu
{

    public static function getMenu()
    {
        return $menu = [
            [
                "name" => "Dashboard",
                "badge" => "",
                "badgeClass" => "badge badge-light-warning badge-pill ml-auto mr-1",
                "icon" => "home",
                "slug" => "home",
                'route' => 'home',
                'color'=>'text-info'
            ],
            [
                'navheader' => 'Management',
                
            ],
            [
                'name'=>'Tenants Management',
                'icon'=>'user',
                'slug' => 'tenants.index',
                'color'=>'text-success',
                // 'route'=>'tenants.index',
                'submenu'=>[
                    [
                    "name" => "Active Tenants",
                    "icon" => "circle",
                    "slug" => "tenants.index",
                    'route'=>'tenants.index'
                    ],
                    [
                        "name" => "New Tenant",
                        "icon" => "circle",
                        "slug" => "tenants.create",
                        'route'=>'tenants.create'
                    ],
                    [
                        "name" => "Left Tenants",
                        "icon" => "circle",
                        "slug" => "tenants-left",
                        'route'=>'tenants-left'
                    ]
                ],
            ],
            [
                'name'=>'Room Management',
                'icon'=>'home',
                'slug' => 'rooms.index',
                'route'=>'rooms.index',
                'color'=>'text-danger',
                'submenu'=>[
                    [
                    "name" => "Manage Rooms",
                    "icon" => "circle",
                    "slug" => "rooms.index",
                    'route'=>'rooms.index'
                    ]
                ],
            ],
            
            [
                'name'=>'Payments',
                'icon'=>'database',
                'slug' => 'payments.index',
                'route'=>'payments.index',
                'color'=>'text-warning',
                'submenu'=>[
                    [
                        "name" => "All Payments",
                        "icon" => "circle",
                        "slug" => "payments.index",
                        'route'=>'payments.index'
                    ],
                    [
                        "name" => "Unmapped Payments",
                        "icon" => "circle",
                        "slug" => "payments.unmapped",
                        'route'=>'payments.unmapped'
                    ]
                ],
            ],
            [
                'name'=>'Expenditures',
                'icon'=>'book',
                'slug' => 'expenditure.index',
                'route'=>'expenditure.index',
                'color'=>'text-primary',
                'submenu'=>[
                    [
                        "name" => "Expenditures",
                        "icon" => "circle",
                        "slug" => "expenditure.index",
                        'route'=>'expenditure.index'
                    ],
                    [
                        "name" => "Expenditure Categories",
                        "icon" => "circle",
                        "slug" => "expenditure.category",
                        'route'=>'expenditure.category'
                    ]
                ],
            ],
           
            [
                'name'=>'Reports',
                'icon'=>'file',
                'slug' => 'statement.index',
                'route'=>'statement.index',
                'color'=>'text-info',
                'submenu'=>[
                    [
                        "name" => "Tenant Statements",
                        "icon" => "circle",
                        "slug" => "statement.index",
                        'route'=>'statement.index'
                    ],
                    [
                        "name" => "Invoices",
                        "icon" => "circle",
                        "slug" => "invoices",
                        'route'=>'invoices'
                    ],
                    [
                        "name" => "Custom Report",
                        "icon" => "circle",
                        "slug" => "custom-reports",
                        'route'=>'custom-reports'
                    ]
                ],
            ],
            // [
            //     'name'=>'Reports',
            //     'slug' => '',
            // ],
            [
                'navheader' => 'System Settings',
                
            ],
            [
                "name" => "Settings",
                "icon" => "settings",
                "slug" => "",
                'color'=>'text-secondary',
                "submenu" => [
                    [
                        "name" => "System Settings",
                        "icon" => "cpu",
                        "slug" => "",
                        "submenu" => [
                            [
                                "name" => "Company Settings",
                                "slug" => "company.index",
                                'route' => 'company.index',
                                "icon" => "circle",

                            ],
                            [
                                "name" => "App Settings",
                                "slug" => "app-settings.index",
                                "icon" => "circle",
                                'route' => 'app-settings.index',
                            ],
                            
                        ],

                    ],
                    [
                        'name' => 'User Accounts',
                        'icon' => 'user',
                        'slug' => '',
                        "submenu" => [
                            [
                                "name" => "Manage Users",
                                "slug" => "users.index",
                                "icon" => "circle",
                                'route'=>'users.index'
                            ],
                            [
                                "name" => "Add User",
                                "slug" => "users.create",
                                "icon" => "circle",
                                'route'=>'users.create'
                            ],

                        ],
                    ],

                    [
                        'name' => 'Property Settings',
                        'icon' => 'dribbble',
                        'slug' => '',
                        "submenu" => [
                            [
                                "name" => "Manage Properties",
                                "slug" => "property.index",
                                "icon" => "circle",
                                'route'=>'property.index'
                            ],
                          
                        ],
                    ],

                    // [
                    //     'name' => 'Subscription',
                    //     'icon' => 'user',
                    //     'slug' => '',
                    //     "submenu" => [
                    //         [
                    //             "name" => "Package Subscription",
                    //             "slug" => "subscription.index",
                    //             "icon" => "circle",
                    //             'route'=>'subscription.index'
                    //         ],
                           

                    //     ],
                    // ],
                     [
                        'name' => 'Notifications',
                        'icon' => 'bell',
                        'slug' => '',
                        "submenu" => [
                            [
                                "name" => "System Notifications",
                                "slug" => "notifications.index",
                                "icon" => "circle",
                                'route'=>'notifications.index'
                            ],
                           

                        ],
                    ],
                    [
                        'name' => 'Configurations',
                        'icon' => 'feather',
                        'slug' => 'paybill.index',
                        "submenu" => [
                            [
                                "name" => "Paybill Configurations",
                                "slug" => "paybill.index",
                                "icon" => "circle",
                                'route'=>'paybill.index'
                            ],
                            [
                                "name" => "Sms Configurations",
                                "slug" => "sms.index",
                                "icon" => "circle",
                                'route'=>'sms.index'
                            ],

                        ],
                    ],

                ],
            ],

        ];
    }
}
