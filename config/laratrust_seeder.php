<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'semseters' => 'c,r,u,d',
            'modules' => 'c,r,u,d',
            'lessons' => 'c,r,u,d',
            'exercices' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'moderator' => [
            'profile' => 'r,u',
            'modules' => 'c,r,u',
            'lessons' => 'c,r,u',
            'exercices' => 'c,r,i',
        ],
        'teacher' => [
            'profile' => 'r,u',
        ],
        'student' => [
            'profile' => 'r,u',
        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
