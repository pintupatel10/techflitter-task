<?php

use Illuminate\Database\Seeder;

class UserListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userList = [];
        $faker    = \Faker\Factory::create();
        
        for ($i=1; $i <= 50000; $i++) { 
        	$userList[] = [
                'first_name'  => $faker->firstName,
                'last_name'   => $faker->lastName,
                'email'       => $faker->unique()->email,
                'phone'       => $faker->phoneNumber,
                'created_at'  => now()->toDateTimeString(),
                'updated_at'  => now()->toDateTimeString(),
            ];
        }

        $chunks = array_chunk($userList, 5000);

        foreach ($chunks as $chunk) {
        	\App\UserList::insert($chunk);
        }
    }
}
