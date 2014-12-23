<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        $user = User::create(array(
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret')
        ));
    }

}