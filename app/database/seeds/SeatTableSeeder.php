<?php

class SeatTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('seats')->truncate();

        // Define rows
        $rows = array('A','B','C','D','E','F','G','H','I','J','K',
            'L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

        // Get users & codes
        $users = DB::table('users')->where('role', 'user')->get();
        $codes = DB::table('codes')->get();

        // Loop through rows
        for($row = 0; $row <= 19; $row++) {

            // Loop through seat numbers
            for($number = 1; $number <= 23; $number++) {
                $seat = Seat::create(array(
                    'row' => $rows[$row],
                    'number' => $number
                ));

                if(rand(1,6) ==1) {
                    $user_winner = array_rand($users);
                    $user = $users[$user_winner];
                    $seat->user_id = $user->id;
                    $seat->claimed_at = $faker->dateTime;
                    unset($users[$user_winner]);

                    $code_winner = array_rand($codes);
                    $code = $codes[$code_winner];
                    $seat->code_id = $code->id;
                    unset($codes[$code_winner]);

                    $seat->save();
                }
            }
        }
    }

}