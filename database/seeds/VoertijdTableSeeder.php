<?php

use Illuminate\Database\Seeder;

class VoertijdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('families')->insert([
        'id' => 'test',
      ]);

      DB::table('hond')->insert([
        'id' => 7,
        'naam' => 'Bobby',
        'leeftijd' => 66,
        'geslacht' => 'Teef',
        'gewicht' => 5000.00,
        'ras' => 'Vlinderhond',
        'familie' => 'test',
      ]);

      $tijden = ['07:00','12:00','18:00', '22:00'];

      for($i=0; $i<sizeOf($tijden); $i++){
        DB::table('voertijd')->insert([
          'voertijd' => $tijden[$i],
          'voermoment' => 1,
          'hondid' => 7,
          'hoeveel_voer' => '100',
        ]);
      }
    }
}
