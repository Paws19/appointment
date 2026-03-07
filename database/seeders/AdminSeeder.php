<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin\AccountModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AccountModel::create([
            'name' => 'Ms.Charms',
            'email' => 'admin@mda.edu.ph',
            'password' => Hash::make('ilovemdaforever123'),
        ]);
    }
}
