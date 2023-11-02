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
            'id'=> 15042000,
            'name' => 'Bùi Huy Anh',
            'email' => 'bujhuyanh150400@gmail.com',
            'password' => '$2a$12$tp6NEGEQTgGgj5dXqRHS4OfYtbw3FuwKpNmlFZoeojM8m1lemprG6', // admin1234
            'birth' => '2000-04-15 00:00:00',
            'address' => 'VN',
            'gender' => 1,
            'role' => 1,
            'access_login' => 1,
            'phone' => '0917095494',
            'created_at'=> now(),
            'updated_at'=> now(),
            'updated_by'=> 15042000,
            'remember_token'=> null,

        ]);
    }
}
