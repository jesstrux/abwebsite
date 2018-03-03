<?php

use Illuminate\Database\Seeder;
use App\Follower;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for($i = 0; $i < 5; $i++) {
        Follower::create([
          'name' => $faker->name,
          'email' => $faker->freeEmail,
        ]);
      }
    }
}
