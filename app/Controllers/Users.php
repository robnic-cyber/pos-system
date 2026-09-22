<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data['users'] = [
            [
                'username' => 'admin01',
                'full_name' => 'Robnic Del Castillo',
                'role' => 'Administrator'
            ],
            [
                'username' => 'cashier01',
                'full_name' => 'Ana Cruz',
                'role' => 'Cashier'
            ],
            [
                'username' => 'cashier02',
                'full_name' => 'Mark Reyes',
                'role' => 'Cashier'
            ],
            [
                'username' => 'manager01',
                'full_name' => 'Lisa Santos',
                'role' => 'Manager'
            ],
            [
                'username' => 'staff01',
                'full_name' => 'John Garcia',
                'role' => 'Staff'
            ]
        ];

        return view('users', $data);
    }
}