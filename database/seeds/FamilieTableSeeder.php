<?php

use Illuminate\Database\Seeder;

class FamilieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('families')->insert([
        'id' => '0',
      ]);
    }
}
