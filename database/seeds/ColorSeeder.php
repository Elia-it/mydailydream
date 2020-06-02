<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('colors')->insert([
          [
            'name' => 'Blue',
            'hex' => '#4f82f7',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Orange',
            'hex' => '#f7d84f',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Red',
            'hex' => '#f74f4f',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Black',
            'hex' => '#000000',
            'created_at' => date('Y-m-d H:i:s')
          ]
        ]);
    }
}
