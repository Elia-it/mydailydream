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
          ],[
            'name' => 'acqua',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'fuoco',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'php',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'html',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'festa',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'macchina',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'vacanza',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'ospedale',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'rubare',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'cane',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'gatto',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'padre',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'madre',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'fratello',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'sorella',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'nonno',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'nonna',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'cugino',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'fidanzata',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'fidanzato',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'moglie',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'marito',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'vincere',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'perdere',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'montagna',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'freddo',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'caldo',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'inverno',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'estate',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'autunno',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'primavera',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'figlio',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'figlia',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'scuola',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'lavoro',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'università',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'sole',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'pioggia',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'tempesta',
            'created_at' => date('Y-m-d H:i:s')
          ],[
            'name' => 'neve',
            'created_at' => date('Y-m-d H:i:s')
          ]
        ]);
    }
}
