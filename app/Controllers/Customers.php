<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $data['customers'] = [
            [
                'full_name' => 'Juan Dela Cruz',
                'email' => 'juan@example.com',
                'phone' => '0917-000-0001'
            ],
            [
                'full_name' => 'Maria Santos',
                'email' => 'maria@example.com',
                'phone' => '0917-000-0002'
            ],
            [
                'full_name' => 'Carlo Reyes',
                'email' => 'carlo@example.com',
                'phone' => '0917-000-0003'
            ],
            [
                'full_name' => 'Angela Garcia',
                'email' => 'angela@example.com',
                'phone' => '0917-000-0004'
            ],
            [
                'full_name' => 'Paolo Mendoza',
                'email' => 'paolo@example.com',
                'phone' => '0917-000-0005'
            ]
        ];

        return view('customers', $data);
    }
}