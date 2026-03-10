<?php

return [
    [
        'name' => 'Application',
        'flag' => 'plugins.application',
    ],
    [
        'name' => 'application',
        'flag' => 'applicationposts.index',
        'parent_flag' => 'plugins.application',
    ],
    [
        'name' => 'Create',
        'flag' => 'applicationposts.create',
        'parent_flag' => 'applicationposts.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'applicationposts.edit',
        'parent_flag' => 'applicationposts.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'applicationposts.destroy',
        'parent_flag' => 'applicationposts.index',
    ],

    [
        'name' => 'applicationcategories',
        'flag' => 'applicationcategories.index',
        'parent_flag' => 'plugins.application',
    ],
    [
        'name' => 'Create',
        'flag' => 'applicationcategories.create',
        'parent_flag' => 'applicationcategories.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'applicationcategories.edit',
        'parent_flag' => 'applicationcategories.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'applicationcategories.destroy',
        'parent_flag' => 'applicationcategories.index',
    ],

    [
        'name' => 'applicationtags',
        'flag' => 'applicationtags.index',
        'parent_flag' => 'plugins.application',
    ],
    [
        'name' => 'Create',
        'flag' => 'applicationtags.create',
        'parent_flag' => 'applicationtags.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'applicationtags.edit',
        'parent_flag' => 'applicationtags.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'applicationtags.destroy',
        'parent_flag' => 'applicationtags.index',
    ],
    [
        'name' => 'Application Settings',
        'flag' => 'application.settings',
        'parent_flag' => 'plugins.application',
    ],
];
