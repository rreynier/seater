<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        $user = User::create(array(
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret'),
            'role' => 'admin'
        ));
    }

}