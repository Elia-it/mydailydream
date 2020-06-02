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
            'name' => 'casa',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'castello',
            'created_at' => date('Y-m-d H:i:s')
          ]
        ]);
    }
}
