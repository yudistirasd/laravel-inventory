<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class UsersTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 4 ; $i++) {
          if ($i == 1) {
            $username = 'manajer';
            $level    = 1;
          }elseif($i == 2){
            $username = 'gudang';
            $level  = 2;
          }elseif($i == 3){
            $username = 'suplier';
            $level    = 3;
          }else{
            $username = 'admin';
            $level    = 0;
          }

          DB::table('users')->insert([
              'name' => $faker->name,
              'username' => $username,
              'level'    => $level,
              'password' => bcrypt('secret'),
              'status'   => 1,
          ]);
        }
    }
}
