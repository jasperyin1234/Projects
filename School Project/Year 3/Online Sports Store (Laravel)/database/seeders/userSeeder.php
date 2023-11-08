<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'Lim_Yin_Tnek',
                'password' => bcrypt('shaveturkey'),
                'email' => 'quota@gmail.com',
                'role' => 'user',
                'contact_num' => '60122170953',
                'address' => '14, Jalan Cenderuh 2, Bandar Ratu, 51200 Kuala Lumpur',
                'created_at' => '2023-04-07',
                'updated_at' => '2023-04-07',
            ],
        ]);

        DB::table('users')->insert([
            [
                'username' => 'Yan_Tang',
                'password' => bcrypt('sufferingstar'),
                'email' => 'majority@gmail.com',
                'role' => 'user',
                'contact_num' => '60182182129',
                'address' => '14, Jalan SS4/17, Petaling Jaya, 47301 Selangor',
                'created_at' => '2023-04-14',
                'updated_at' => '2023-04-14',
            ],
        ]);

        DB::table('users')->insert([
            [
                'username' => 'Abibas',
                'password' => bcrypt('abibas'),
                'email' => 'abibas@gmail.com',
                'role' => 'admin',
                'contact_num' => '0374949546',
                'address' => '19-1, Nucleus Tower. 10, Jalan PJU 7/6 Mutiara Damansara, Bandar Damansara Perdana, 47800 Petaling Jaya, Selangor',
                'created_at' => '2023-03-21',
                'updated_at' => '2023-03-21',
            ],
        ]);
    }
}