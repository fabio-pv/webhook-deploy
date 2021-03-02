<?php

namespace Database\Seeders;

use App\Models\v1\User;
use Illuminate\Database\Seeder;

class UserDefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userModel = new User();
        $userModel->name = 'Admin';
        $userModel->email = 'admin@app.com';
        $userModel->password = bcrypt('1234');
        $userModel->save();
    }
}
