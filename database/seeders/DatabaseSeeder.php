<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('roles')->insert([
            [    
                'name' => 'voter'
            ],
            [    
                'name' => 'admin'
            ],
        ]);

        DB::table('organizers')->insert([
            [
                'name' => 'BEM UI'
            ],
            [
                'name' => 'BEM FT UI'
            ]
        ]);

        DB::table('elections')->insert([
            [
                'name' => 'Pemira UI',
                'unique_code' => 'UI012021',
                'election_date' => '2021-04-26',
                'end_date' => '2021-05-28'
            ],
            [
                'name' => 'Pemira FT UI',
                'unique_code' => 'FT3012021',
                'election_date' => '2021-05-03',
                'end_date' => '2021-05-28'
            ]
        ]);

        $this->call([
            CandidateSeeder::class,
            UserSeeder::class,
            VoteSeeder::class
        ]);

    }
}
