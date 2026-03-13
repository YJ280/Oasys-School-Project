<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = DB::table('roles')
            ->where('name', 'admin')
            ->first();

        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Super Admin',
            'email' => 'admin@oasys.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'role_id' => $adminRole->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}