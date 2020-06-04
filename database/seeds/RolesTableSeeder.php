<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert([
        'name' => 'kind',
        'option' => '1',
      ]);
      DB::table('roles')->insert([
        'name' => 'ouder',
        'option' => '1',
      ]);
      DB::table('roles')->insert([
        'name' => 'new',
        'option' => '0',
      ]);
    }
}
