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
            'name' => 'Enjoyable',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Unpleasant',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Charming',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Significant',
            'created_at' => date('Y-m-d H:i:s')
          ]
        ]);
    }
}
