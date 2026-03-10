<?php

return [
    [
        'name' => 'Services',
        'flag' => 'plugins.services',
    ],
    [
        'name' => 'services',
        'flag' => 'servicesposts.index',
        'parent_flag' => 'plugins.services',
    ],
    [
        'name' => 'Create',
        'flag' => 'servicesposts.create',
        'parent_flag' => 'servicesposts.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'servicesposts.edit',
        'parent_flag' => 'servicesposts.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'servicesposts.destroy',
        'parent_flag' => 'servicesposts.index',
    ],

    [
        'name' => 'servicescategories',
        'flag' => 'servicescategories.index',
        'parent_flag' => 'plugins.services',
    ],
    [
        'name' => 'Create',
        'flag' => 'servicescategories.create',
        'parent_flag' => 'servicescategories.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'servicescategories.edit',
        'parent_flag' => 'servicescategories.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'servicescategories.destroy',
        'parent_flag' => 'servicescategories.index',
    ],

    [
        'name' => 'servicestags',
        'flag' => 'servicestags.index',
        'parent_flag' => 'plugins.services',
    ],
    [
        'name' => 'Create',
        'flag' => 'servicestags.create',
        'parent_flag' => 'servicestags.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'servicestags.edit',
        'parent_flag' => 'servicestags.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'servicestags.destroy',
        'parent_flag' => 'servicestags.index',
    ],
    [
        'name' => 'Services Settings',
        'flag' => 'services.settings',
        'parent_flag' => 'plugins.services',
    ],
];
