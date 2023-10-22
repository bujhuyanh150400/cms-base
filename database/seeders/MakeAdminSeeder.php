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
            'user_id'=> 123456789,
            'user_name' => 'admin',
            'user_email' => 'bujhuyanh150400@gmail.com',
            'user_password' => '$2a$12$tp6NEGEQTgGgj5dXqRHS4OfYtbw3FuwKpNmlFZoeojM8m1lemprG6', // admin1234
            'user_birth' => '1999-12-16 00:00:00',
            'user_department' => 1,
            'user_position' => 1,
            'user_phone' => '0917095494',
            'created_at'=> now(),
            'updated_at'=> now(),
            'remember_token'=> null,

        ]);
    }
}
