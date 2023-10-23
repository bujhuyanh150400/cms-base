<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MakeAdminSeeder extends Seeder
{
    /**
     *  php artisan db:seed --class=MakeAdminSeeder
     */
    public function run(): void
    {
        DB::table('tbl_users')->insert([
            'id'=> 123456789,
            'name' => 'admin',
            'email' => 'bujhuyanh150400@gmail.com',
            'password' => '$2a$12$tp6NEGEQTgGgj5dXqRHS4OfYtbw3FuwKpNmlFZoeojM8m1lemprG6', // admin1234
            'birth' => '1999-12-16 00:00:00',
            'department' => 1,
            'position' => 1,
            'access_login' => 1,
            'phone' => '0917095494',
            'created_at'=> now(),
            'updated_at'=> now(),
            'remember_token'=> null,

        ]);
    }
}
