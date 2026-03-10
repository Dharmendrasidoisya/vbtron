<?php

return [
    [
        'name' => 'Products',
        'flag' => 'plugins.products',
    ],
    [
        'name' => 'products',
        'flag' => 'productsposts.index',
        'parent_flag' => 'plugins.products',
    ],
    [
        'name' => 'Create',
        'flag' => 'productsposts.create',
        'parent_flag' => 'productsposts.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'productsposts.edit',
        'parent_flag' => 'productsposts.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'productsposts.destroy',
        'parent_flag' => 'productsposts.index',
    ],

    [
        'name' => 'productscategories',
        'flag' => 'productscategories.index',
        'parent_flag' => 'plugins.products',
    ],
    [
        'name' => 'Create',
        'flag' => 'productscategories.create',
        'parent_flag' => 'productscategories.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'productscategories.edit',
        'parent_flag' => 'productscategories.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'productscategories.destroy',
        'parent_flag' => 'productscategories.index',
    ],

    [
        'name' => 'productstags',
        'flag' => 'productstags.index',
        'parent_flag' => 'plugins.products',
    ],
    [
        'name' => 'Create',
        'flag' => 'productstags.create',
        'parent_flag' => 'productstags.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'productstags.edit',
        'parent_flag' => 'productstags.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'productstags.destroy',
        'parent_flag' => 'productstags.index',
    ],
    [
        'name' => 'Products Settings',
        'flag' => 'products.settings',
        'parent_flag' => 'plugins.products',
    ],
];
