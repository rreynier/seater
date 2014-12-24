<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('users')->truncate();

        // Create base admin
        User::create(array(
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret'),
            'role' => 'admin'
        ));

        for($i = 0; $i < 100; $i++) {
            User::create(array(
                'email' => $faker->email,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'password' => Hash::make('secret'),
                'role' => 'user'
            ));
        }

    }

}