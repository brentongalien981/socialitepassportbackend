<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MyAuthUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_auth_users')->insert(['token' => 'ya29.a0AfH6SMB29GVwwOnLwULTkEY7MBu0q_n-WGxjq4Ww2CvVuG2NuwokebINNRZl_3_SirR16RaU1ynJA5Zya5u9XuhxwEUEqrLX-8L0Sq7wNNf5Csx0W8tMIxmqsoHdU_OBYnk-dbzdKXAF5o2SZ1b9Ka0Urw8pxVN_zy7_I4IRkuWf', 'auth_provider' => 'google', 'oauth_provided_user_id' => '113567109223847872471']);
    }
}
