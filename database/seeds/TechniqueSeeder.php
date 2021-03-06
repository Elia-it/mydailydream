<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechniqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('techniques')->insert([
          [
            'name' => 'MILD',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'WILD',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Intent',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'Mnemonic induction',
            'created_at' => date('Y-m-d H:i:s')
          ]
        ]);
    }
}
