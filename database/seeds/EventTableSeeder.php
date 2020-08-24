<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('events')->insert([
            [
            'title' => "Marcos Gonçalvez",
            'start' => '2020-08-06 21:30:00',
            'end'   => '2020-08-06 23:00:00',
            'color' => '#ff3827',
            'description' => 'Barbeiro: Bilico'
        ],
          [
            'title' => "Paulo Dener",
            'start' => '2020-08-07 08:00:00',
            'end'   => '2020-08-07 09:30:00',
            'color' => '#1fffcc',
            'description' => 'Barbeiro: Marcos'


            ],
        [
            'title' => "Paulo Dener",
            'start' => '2020-08-07 10:00:00',
            'end'   => '2020-08-07 11:30:00',
            'color' => '#1fffcc',
            'description' => 'Barbeiro: Marcos'
            ]

        ]);

    }
}
