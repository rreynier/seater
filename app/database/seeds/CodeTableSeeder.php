<?php

class CodeTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('codes')->truncate();

        // for($i = 0; $i < 100; $i++) {
        //     Code::create(array(
        //         'email' => $faker->email
        //     ));
        // }

    }

}