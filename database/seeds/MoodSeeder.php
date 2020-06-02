<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('moods')->insert([
          [
            'name' => 'Piacevole',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Spiacevole',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Affascinante',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Significativo',
            'created_at' => date('Y-m-d H:i:s')
          ]
        ]);
    }
}
