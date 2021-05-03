<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'user_id' => 'adminbemui',
                'firstname' => 'Admin',
                'lastname' => 'Bemui',
                'password' => Hash::make('adminbemui'),
                'role_id' => '2',
                'organizer_id' => '1',
                'election_id' => '1'
            ],
            // [
            //     'user_id' => 'adminftui',
            //     'firstname' => 'Admin',
            //     'lastname' => 'Bemftui',
            //     'password' => 'adminbemftui',
            //     'role_id' => '2',
            //     'organizer_id' => '2',
            //     'election_id' => '2'
            // ],
            [
                'user_id' => 'voter1234',
                'firstname' => 'New',
                'lastname' => 'Voter',
                'password' => Hash::make('voter1234'),
                'role_id' => '1',
                'organizer_id' => '1',
                'election_id' => '1'
            ],
            [
                'user_id' => 'zamzaw11',
                'firstname' => 'Zamza',
                'lastname' => 'Idham',
                'password' => Hash::make('kompor13'),
                'role_id' => '1',
                'organizer_id' => '1',
                'election_id' => '1'
            ],
            [
                'user_id' => 'setian1',
                'firstname' => 'Seti',
                'lastname' => 'Ani',
                'password' => Hash::make('kompor13'),
                'role_id' => '1',
                'organizer_id' => '1',
                'election_id' => '1'
            ],
            // [
            //     'user_id' => 'voter4321',
            //     'firstname' => 'Voter',
            //     'lastname' => 'New',
            //     'password' => 'voter4321',
            //     'role_id' => '1',
            //     'organizer_id' => '2',
            //     'election_id' => '2'
            // ],
            [
                'user_id' => 'ricorpp',
                'firstname' => 'Rico',
                'lastname' => 'Putra',
                'password' => Hash::make('kompor16'),
                'role_id' => '1',
                'organizer_id' => '1',
                'election_id' => '1'
            ],
            [
                'user_id' => 'ammalala',
                'firstname' => 'Amma',
                'lastname' => 'Lala',
                'password' => Hash::make('kompor14'),
                'role_id' => '1',
                'organizer_id' => '1',
                'election_id' => '1'
            ]
        ]);
    }
}
