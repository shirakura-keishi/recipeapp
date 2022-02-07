<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'post_id' => 1,
            'user_id' => 2,
            'comment' => '試してみました。おいしかったです！',
        ];
        DB::table('comments')->insert($param);

        $param = [
            'post_id' => 1,
            'user_id' => 3,
            'comment' => 'まずかったです。',
        ];
        DB::table('comments')->insert($param);

        $param = [
            'post_id' => 2,
            'user_id' => 1,
            'comment' => '簡単ですね！',
        ];
        DB::table('comments')->insert($param);
    }
}
