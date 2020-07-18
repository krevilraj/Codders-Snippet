<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      $user = User::create([
        'id' => 1,
        'name' => 'Rajkumar',
        'email' => 'krevilraj@gmail.com',
        'password' => Hash::make('asdfasdf'),
      ]);
      $this->call(CategorySeed::class);
    }
}
