<?php

namespace Database\Seeders;

use App\Models\SuperAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SuperAdmin::create([
            'username' => 'fless',
            'email' => 'achilleatarmla@gmail.com',
            'password' => Hash::make("fless11"),

        ]);
    }
}
