<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
          'name' => 'Laravel',
          'slug' => 'laravel',
          'user_id' => 1
        ]);
      $category = Category::create([
        'name' => 'Android',
        'slug' => 'android',
        'user_id' => 1
      ]);
      $category = Category::create([
        'name' => 'Vue',
        'slug' => 'vue',
        'user_id' => 1
      ]);
      $category = Category::create([
        'name' => 'React',
        'slug' => 'react',
        'user_id' => 1
      ]);
      $category = Category::create([
        'name' => 'MERN',
        'slug' => 'mern',
        'user_id' => 1
      ]);
    }
}
