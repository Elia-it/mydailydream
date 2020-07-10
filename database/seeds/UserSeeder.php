<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
          [
              'role_id' => '1',
              'email' => 'admin@admin.com',
              'password' => Hash::make('admin0000'),
              'first_name' => 'admin',
              'last_name' => 'admin',
              'gender' => 'male',
              'newsletter' => '0',
              'created_at' => date('Y-m-d H:i:s')
          ],[
            'role_id' => '2',
            'email' => 'guest@guest.com',
            'password' => Hash::make('guest0000'),
            'first_name' => 'guest',
            'last_name' => 'guest',
            'gender' => 'prefer_not_to_say',
            'newsletter' => '1',
            'created_at' => date('Y-m-d H:i:s')
          ]
        ]);
    }
}
