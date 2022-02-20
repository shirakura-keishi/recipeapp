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
        $param = [
            'id' => 1,
            'name' => '竹内海地',
            'email' => 'kaichi@test',
            'password' => Hash::make('kaichi'),
        ];
        DB::table('users')->insert($param);

        $param = [
            'id' => 2,
            'name' => '速水もこみち',
            'email' => 'moco@test',
            'password' => Hash::make('moco'),
        ];
        DB::table('users')->insert($param);

        $param = [
            //'id' => 3,
            'name' => '平野レミ',
            'email' => 'remi@test',
            'password' => Hash::make('remi'),
        ];
        DB::table('users')->insert($param);
    }
}
