<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Govind',
            'email'          => 'govind@gmail.com',
            'password'       => '$2y$10$A.ldxaCmrAy7p69zwS6o5eo6R.xDMLEFvZ9ycDXSBb.QL6gV/xQx6',
            'remember_token' => null,
            'created_at'     => '2022-02-18 09:24:33',
            'updated_at'     => '2022-02-18 09:24:33',
        ]];

        if (!User::where('email', $users[0]['email'])->exists()) {
            User::insert($users);
        }
    }
}
