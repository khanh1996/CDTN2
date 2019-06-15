<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
            'code' => 'A25603',
            'name' => 'Văn Bảo Khánh',
            'birthday' => 1996,
            'password' => bcrypt('123456'),
            'gender' => 2,
            'level' => 1,
        ]);
    }
}
