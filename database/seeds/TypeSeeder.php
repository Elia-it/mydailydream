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
            'name' => 'Luminoso',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Lucido',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Ricorrente',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Premonitore',
            'created_at' => date('Y-m-d H:i:s')
          ]
        ]);
    }
}
