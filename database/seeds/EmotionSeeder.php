<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('emotions')->insert([
          [
              'name' => 'Felicità',
              'emoticon' => '128513',
              'created_at' => date('Y-m-d H:i:s')
          ],[
              'name' => 'Gioia',
              'emoticon' => '129321',
              'created_at' => date('Y-m-d H:i:s')
          ],[
              'name' => 'Paura',
              'emoticon' => '128561',
              'created_at' => date('Y-m-d H:i:s')
          ]
        ]);
    }
}
