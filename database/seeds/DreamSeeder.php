<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('dreams')->insert([
          [
            'status' => 'draft',
            'user_id' => '2',
            'type_id' => '2',
            'emotion_id' => '1',
            'technique_id' => '3',
            'mood_id' => '2',
            'color_id' => '3',
            'title' => 'First Dream',
            'content' => 'This is the content of the first dream',
            'date' => date('Y-m-d H:i:s'),
            'is_in_first_person' => '1',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'status' => 'publish',
            'user_id' => '2',
            'type_id' => '2',
            'emotion_id' => '1',
            'technique_id' => '1',
            'mood_id' => '1',
            'color_id' => '2',
            'title' => 'Second Dream',
            'content' => 'This is the content of the second dream',
            'date' => date('Y-m-d H:i:s'),
            'is_in_first_person' => '0',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'status' => 'publish',
            'user_id' => '1',
            'type_id' => '1',
            'emotion_id' => '3',
            'technique_id' => '1',
            'mood_id' => '1',
            'color_id' => '1',
            'title' => 'First Dream',
            'content' => 'This is the content of the first dream',
            'date' => date('Y-m-d H:i:s'),
            'is_in_first_person' => '1',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'status' => 'draft',
            'user_id' => '1',
            'type_id' => '3',
            'emotion_id' => '1',
            'technique_id' => '1',
            'mood_id' => '1',
            'color_id' => '4',
            'title' => 'Second Dream',
            'content' => 'This is the content of the second dream',
            'date' => date('Y-m-d H:i:s'),
            'is_in_first_person' => '0',
            'created_at' => date('Y-m-d H:i:s')
          ]
        ]);
    }
}
