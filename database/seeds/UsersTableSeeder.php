<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		if (User::where('email', '=', 'jeremykenedy@gmail.com')->first() === null) {

				User::create([
					'name' => 'Jeremy',
					'email' => 'jeremykenedy@gmail.com',
					'password' => bcrypt('password'),
				]);

		}

        $user = factory(App\User::class, 100)->create();

    }
}