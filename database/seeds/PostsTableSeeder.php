<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'recipe_id' => 1,
            'comments_count' => 0,
            'access_count' => 0,
            'price' => 0,
        ];
        DB::table('posts')->insert($param);

        $param = [
            'recipe_id' => 2,
            'comments_count' => 0,
            'access_count' => 0,
            'price' => 0,
        ];
        DB::table('posts')->insert($param);

        $param = [
            'recipe_id' => 3,
            'comments_count' => 0,
            'access_count' => 0,
            'price' => 100,
        ];
        DB::table('posts')->insert($param);
    }
}
