<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('candidates')->insert([
            [
                'name' => 'Leon Y Gie',
                'order_no' => '1',
                'vision' => 'BEM UI yang dekat bersahabat',
                'election_id' => '1'
            ],
            [
                'name' => 'Kevin Palma',
                'order_no' => '2',
                'vision' => 'BEM UI bagi semua kalangan',
                'election_id' => '1'
            ],
            [
                'name' => 'Elmy Anada',
                'order_no' => '3',
                'vision' => 'BEM FT UI merangkul semua civitas akademika FT UI',
                'election_id' => '1'
            ],
            // [
            //     'name' => 'Dimas Jan',
            //     'order_no' => '2',
            //     'vision' => 'BEM FT UI unggul',
            //     'election_id' => '2'
            // ]
        ]);
    }
}
