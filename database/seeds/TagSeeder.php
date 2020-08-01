<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tags')->insert([
          [
            'name' => 'Home',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Castle',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Water',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Fire',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Php',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Html',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Party',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Car',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Holiday',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Hospital',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'To Stole',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Dog',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Cat',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Father',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Mother',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Brother',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Sister',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Grandfather',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Grandmother',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Cousin',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Girlfriend',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Boyfriend',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Wife',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Husband',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'To win',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'To lose',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Mountain',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Cold',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Hot',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Winter',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Summer',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Autumn',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Spring',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Son',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Daughter',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'School',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Work',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'University',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Sun',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Rain',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Storm',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Snow',
            'created_at' => date('Y-m-d H:i:s')
          ]
        ]);
    }
}
