<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'password' => bcrypt('admin!23'),
                'is_admin' => 1
            ]
        );
    }
}
