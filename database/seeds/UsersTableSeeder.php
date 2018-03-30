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
          // if ($i == 1) {
          //   $username = 'manajer';
          //   $role    = 1;
          // }elseif($i == 2){
          //   $username = 'gudang';
          //   $role  = 2;
          // }elseif($i == 3){
          //   $username = 'suplier';
          //   $role    = 3;
          // }else{
          //   $username = 'admin';
          //   $role    = 0;
          // }

          $username   = 'suplier'.$i;
          $role       = 3;
          DB::table('users')->insert([
              'name' => $faker->name,
              'username' => $username,
              'role'    => $role,
              'password' => bcrypt('secret'),
              'status'   => 1,
          ]);
        }
    }
}
