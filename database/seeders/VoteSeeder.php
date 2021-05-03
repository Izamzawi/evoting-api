<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('votes')->insert([
            [
                'user_id' => 3,
                'election_id' => 1,
                'candidate_id' => 1
            ],
            [
                'user_id' => 4,
                'election_id' => 1,
                'candidate_id' => 1
            ],
            [
                'user_id' => 5,
                'election_id' => 1,
                'candidate_id' => 2
            ],
            [
                'user_id' => 6,
                'election_id' => 1,
                'candidate_id' => 3
            ]
        ]);
    }
}
