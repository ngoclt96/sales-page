<?php

/*
 * Return config acl for
 * admin and employee
 * root is granted all permission
 * employee and teacher accept only mypage
 */

return [
    'admin' => [
        'title' => 'Module admin',
        'function' => [
            'index' => [
                'title' => 'Index of admin module',
                'privilege' => ['root', 'admin']
            ],
            'edit' => [
                'title' => 'Index of admin module',
                'privilege' => ['root']
            ],
            'form' => [
                'title' => 'Form of admin module',
                'privilege' => ['root']
            ],
            'confirm' => [
                'title' => 'Confirm of admin module',
                'privilege' => ['root']
            ],
            'complete' => [
                'title' => 'Complete of admin module',
                'privilege' => ['root']
            ],
            'delete' => [
                'title' => 'Delete of admin module',
                'privilege' => ['root']
            ]
        ]
    ],
    'users' => [
        'title' => 'Module users',
        'function' => [
            'index' => [
                'title' => 'Index of users module',
                'privilege' => ['root', 'admin']
            ],
            'edit' => [
                'title' => 'Index of users module',
                'privilege' => ['root']
            ],
            'form' => [
                'title' => 'Form of users module',
                'privilege' => ['root']
            ],
            'confirm' => [
                'title' => 'Confirm of users module',
                'privilege' => ['root']
            ],
            'complete' => [
                'title' => 'Complete of users module',
                'privilege' => ['root']
            ],
            'delete' => [
                'title' => 'Delete of users module',
                'privilege' => ['root']
            ],
            'setting' => [
                'title' => 'Setting table view column',
                'privilege' => ['root']
            ],
            'register' => [
                'title' => 'Register table view column',
                'privilege' => ['root']
            ],
            'show' => [
                'title' => 'show code table view column',
                'privilege' => ['root']
            ],
            'ajustpoint' => [
                'title' => 'Ajust point to member',
                'privilege' => ['root']
            ]
        ]
    ],
    'home' => [
        'title' => 'Module home pages',
        'function' => [
            'index' => [
                'title' => 'Show home page index',
                'privilege' => ['root', 'admin', 'employee']
            ]
        ]
    ],
    'login' => [
        'title' => 'Login module',
        'function' => [
            'logout' => [
                'title' => 'Logout users',
                'privilege' => ['root', 'admin', 'employee']
            ]
        ]
    ],
    'categories' => [
    'title' => 'Module categories',
    'function' => [
        'index' => [
            'title' => 'Index of categories module',
            'privilege' => ['root', 'admin']
        ],
        'form' => [
            'title' => 'Form of categories module',
            'privilege' => ['root', 'admin']
        ],
        'edit' => [
            'title' => 'Index of categories module',
            'privilege' => ['root']
        ],
        'confirm' => [
            'title' => 'Confirm of categories module',
            'privilege' => ['root', 'admin']
        ],
        'complete' => [
            'title' => 'Complete of categories module',
            'privilege' => ['root', 'admin']
        ],
        'setting' => [
            'title' => 'Index of categories module',
            'privilege' => ['root', 'admin']
        ],
        'delete' => [
            'title' => 'Delete categories module',
            'privilege' => ['root']
        ],
    ]
],
    'orders' => [
        'title' => 'Module orders',
        'function' => [
            'index' => [
                'title' => 'Index of orders module',
                'privilege' => ['root', 'admin']
            ],
            'form' => [
                'title' => 'Form of orders module',
                'privilege' => ['root', 'admin']
            ],
            'edit' => [
                'title' => 'Index of orders module',
                'privilege' => ['root']
            ],
            'confirm' => [
                'title' => 'Confirm of orders module',
                'privilege' => ['root', 'admin']
            ],
            'complete' => [
                'title' => 'Complete of orders module',
                'privilege' => ['root', 'admin']
            ],
            'setting' => [
                'title' => 'Index of orders module',
                'privilege' => ['root', 'admin']
            ],
            'delete' => [
                'title' => 'Delete of orders module',
                'privilege' => ['root']
            ],
        ]
    ],
    'products' => [
        'title' => 'Module products',
        'function' => [
            'index' => [
                'title' => 'Index of products module',
                'privilege' => ['root', 'admin']
            ],
            'form' => [
                'title' => 'Form of products module',
                'privilege' => ['root', 'admin']
            ],
            'edit' => [
                'title' => 'Index of products module',
                'privilege' => ['root']
            ],
            'confirm' => [
                'title' => 'Confirm of products module',
                'privilege' => ['root', 'admin']
            ],
            'complete' => [
                'title' => 'Complete of products module',
                'privilege' => ['root', 'admin']
            ],
            'setting' => [
                'title' => 'Index of products module',
                'privilege' => ['root', 'admin']
            ],
            'delete' => [
                'title' => 'Delete of products module',
                'privilege' => ['root']
            ],
        ]
    ],
    'profile' => [
        'title' => 'Module profiles',
        'function' => [
            'index' => [
                'title' => 'Index of profiles module',
                'privilege' => ['root', 'admin']
            ],
            'form' => [
                'title' => 'Form of profiles module',
                'privilege' => ['root', 'admin']
            ],
            'edit' => [
                'title' => 'Index of profiles module',
                'privilege' => ['root']
            ],
            'confirm' => [
                'title' => 'Confirm of profiles module',
                'privilege' => ['root', 'admin']
            ],
            'complete' => [
                'title' => 'Complete of profiles module',
                'privilege' => ['root', 'admin']
            ],
            'setting' => [
                'title' => 'Index of profiles module',
                'privilege' => ['root', 'admin']
            ],
            'delete' => [
                'title' => 'Delete of profiles module',
                'privilege' => ['root']
            ],
        ]
    ],
    'transactions' => [
        'title' => 'Module transactions',
        'function' => [
            'index' => [
                'title' => 'Index of transactions module',
                'privilege' => ['root', 'admin']
            ],
            'form' => [
                'title' => 'Form of transactions module',
                'privilege' => ['root', 'admin']
            ],
            'edit' => [
                'title' => 'Index of transactions module',
                'privilege' => ['root']
            ],
            'confirm' => [
                'title' => 'Confirm of transactions module',
                'privilege' => ['root', 'admin']
            ],
            'complete' => [
                'title' => 'Complete of transactions module',
                'privilege' => ['root', 'admin']
            ],
            'setting' => [
                'title' => 'Index of transactions module',
                'privilege' => ['root', 'admin']
            ],
            'delete' => [
                'title' => 'Delete of transactions module',
                'privilege' => ['root']
            ],
        ]
    ]
];

