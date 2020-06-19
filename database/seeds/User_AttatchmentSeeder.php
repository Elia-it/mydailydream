<?php

use Illuminate\Database\Seeder;

class User_AttatchmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users_attatchments')->insert([
          [
            'user_id' => '1',
            'path_avatar' => 'male.png',
            'background_type' => 'hex',
            'background' => '#de5f1f',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'user_id' => '2',
            'path_avatar' => 'no_gender.png',
            'background_type' => 'hex',
            'background' => '#4838d9',
            'created_at' => date('Y-m-d H:i:s')
          ]
        ]);
    }
}
