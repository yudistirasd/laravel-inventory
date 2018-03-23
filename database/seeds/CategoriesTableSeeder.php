<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 4 ; $i++) {
        if ($i == 1) {
          $name = 'Makanan';
        }elseif($i == 2){
          $name = 'Minuman';
        }elseif($i == 3){
          $name = 'Shampo ';
        }else{
          $name = 'Sabun';
        }

        DB::table('categories')->insert([
            'name' => $name
        ]);
      }

    }
}
