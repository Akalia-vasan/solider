<?php
return [
    'main' => [
        [
            'text'  => 'Dashboard',
            'route' => 'admin.dashboard',
            'icon'  => 'i-Bar-Chart'
        ],
        [
            'text'  => 'Products',
            'route' => 'product.index',
            'icon'  => 'i-Add-Cart',
            'submenu' => [
                [
                    'text'  => 'Add Product',
                    'route' => 'product.create',
                    'icon'  => 'i-Bag-Items',
                ],
                [
                    'text'  => 'Product List',
                    'route' => 'product.index',
                    'icon'  => 'i-Bar-Chart',
                ],

            ]
        ],
        [
            'text'  => 'Admin',
            'route' => 'admin.index',
            'icon'  => 'i-Administrator',
            'submenu' => [
                [
                    'text'  => 'Add Admin',
                    'route' => 'admin.create',
                    'icon'  => 'i-Add',
                ],
                [
                    'text'  => 'Admin List',
                    'route' => 'admin.index',
                    'icon'  => 'i-Add-User',
                ],

            ]
        ],

    ],


];
