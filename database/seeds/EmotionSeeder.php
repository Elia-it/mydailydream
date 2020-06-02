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
              'created_at' => date('Y-m-d H:i:s')
          ],[
              'name' => 'Gioia',
              'created_at' => date('Y-m-d H:i:s')
          ],[
              'name' => 'Paura',
              'created_at' => date('Y-m-d H:i:s')
          ]
        ]);
    }
}
