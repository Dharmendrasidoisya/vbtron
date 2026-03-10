<?php

return [
    [
        'name' => 'Career',
        'flag' => 'plugin.career',
    ],
    [
        'name' => 'Career',
        'flag' => 'career.index',
        'parent_flag' => 'plugin.career',
    ],
    [
        'name' => 'Create',
        'flag' => 'career.create',
        'parent_flag' => 'career.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'career.edit',
        'parent_flag' => 'career.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'career.destroy',
        'parent_flag' => 'career.index',
    ],
    [
        'name' => 'Career Categories',
        'flag' => 'career_category.index',
        'parent_flag' => 'plugin.career',
    ],
    [
        'name' => 'Create',
        'flag' => 'career_category.create',
        'parent_flag' => 'career_category.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'career_category.edit',
        'parent_flag' => 'career_category.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'career_category.destroy',
        'parent_flag' => 'career_category.index',
    ],
    [
        'name' => 'Career Settings',
        'flag' => 'careers.settings',
        'parent_flag' => 'plugin.career',
    ],
];
