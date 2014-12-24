<?php

class SeatTableSeeder extends Seeder {

    public function run()
    {
        DB::table('seats')->truncate();

        // Define rows
        $rows = array('A','B','C','D','E','F','G','H','I','J','K',
            'L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

        // Loop through rows
        for($row = 0; $row <= 19; $row++) {

            // Loop through seat numbers
            for($number = 1; $number <= 23; $number++) {
                Seat::create(array(
                    'row' => $rows[$row],
                    'number' => $number
                ));
            }
        }
    }

}