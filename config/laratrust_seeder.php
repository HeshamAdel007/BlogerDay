<?php

return [
    'role_structure' => [
        'owner' => [
            'users'    => 'c,r,u,d',
            'post'     => 'c,r,u,d',
            'category' => 'c,r,u,d',
            'tag'      => 'c,r,u,d',
            'gallery'  => 'c,r,u,d',
            'setting'  => 'r,u',
            'profile'  => 'r,u',
            'contact'  => 'r,d',
        ],
        'super_admin' => [
        ],
        'admin' => [
        ],
        'user' => [
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];

