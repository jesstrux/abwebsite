<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name' => env('ADMIN_NAME'),
          'email' => env('ADMIN_EMAIL'),
          'username' => env('ADMIN_USERNAME'),
          'password' => bcrypt(env('ADMIN_PASSWORD')),
        ]);

        User::create([
          'name' => env('OTHER_ADMIN_NAME'),
          'email' => env('OTHER_ADMIN_EMAIL'),
          'username' => env('OTHER_ADMIN_USERNAME'),
          'password' => bcrypt(env('OTHER_ADMIN_PASSWORD')),
        ]);
    }
}
