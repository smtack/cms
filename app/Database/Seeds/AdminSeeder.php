<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => password_hash('admin', PASSWORD_BCRYPT),
        ];

        $this->db->table('users')->insert($data);
    }
}
