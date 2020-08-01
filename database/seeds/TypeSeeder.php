<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert([
          [
            'name' => 'Bright',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Lucid',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Appellant',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Premonitory',
            'created_at' => date('Y-m-d H:i:s')
          ]
        ]);
    }
}
