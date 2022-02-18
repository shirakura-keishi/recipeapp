<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '牛肉と野菜の五目辛煮',
            'user_id' => 1,
            'ingredient' => "4人前
            牛こま切れ肉…150ｇ
            ごぼう…150ｇ
            にんじん…200ｇ
            れんこん…200ｇ
            ゆでたけのこ…200ｇ
            干しじいたけ…4～5枚
            ピーマン…３個
            こんにゃく…1丁
            赤とうがらし…1～2本
            油…大さじ3
            調味料…塩・酒・みりん・佐藤・醤油・酢",
            'description' => "①ごぼうは皮をこそげ、4cm長さに切り縦4～6つに割りにし、水に20分つけてざるに上げる。にんじん、たけのこは4cm長さ7mm核の拍子木切り、れんこんは7mm角の拍子木に切り、うすい酢水につけておく。ピーマン、もどしたしいたけも7mm幅に切る。
            ②こんにゃくは塩ゆでもみ、ザっと洗って厚みを半分に切り、7mm幅に切る。
            ③中華鍋に油を熱し、種を抜き、斜め二つ切りの赤とうがらしをサッといため、牛肉を加えて炒め、色が変わったらピーマン以外の材料全部を加え、強火で炒める。れんこんの周りが透き通ったら酒、みりん角大さじ3～4を加え砂糖が溶けたら、しょうゆ大さじ3を加えふたをし、時々かき混ぜながら中火で煮る。
            ④ごぼうやニンジンが柔らかくなったら、しょうゆ大さじ1～2とピーマンを加え、ふたをせずに強火にしてかき混ぜながら、煮汁がなくなるまで照りよく煮る。",            
        ];
        DB::table('recipes')->insert($param);

        $param = [
            'name' => 'ずぼらなべ',
            'user_id' => 2,
            'ingredient' => "4人前
            牛すね肉…400ｇ
            じゃがいも…（中）4個
            にんじん…300ｇ
            たまねぎ…（大）2個
            キャベツ…（小）1個
            セロリ…1本
            さやえんどう…少々
            固形スープの素…3個
            トマトピューレ…カップ1
            サラダ油・バター…各大さじ2
            調味料…塩・こしょう・酒・しょうゆ",
            'description' => "①すね肉は4㎝角に切り、塩、こしょうをすりこみ、サラダ油大さじ2を熱し、全体に薄く焦げ色がつくまで焼く。
            ②じゃがいもは皮をむき、大きいものは二つ切りにし、ニンジンも大きめの乱切り、たまねぎは縦4つ割り、キャベツは軸をつけたまま縦4つ割りにし、セロリは太いところは半分にし、4㎝長さに切る。
            ③深鍋に肉と水カップ12を入れてひにかけ、スープの素を加えて中火以下の火でコトコト約1時間煮込んでから、野菜とセロリの葉も加え、ひと煮立ちしたらトマトピューレ、酒大さじ2、しょうゆ大さじ1を加えてさらに火を弱め、野菜が柔らかくなるまで煮、塩で味を整える。
            ④煮上がりにバター大さじ2を加え、色よくゆでたさやえんどうを青味に散らす。好みで粉チーズをふりかけてもよい。",
        ];
        DB::table('recipes')->insert($param);

        $param = [
            'name' => 'レンジで時短♫　簡単美味！　楽うま豚丼♡',
            'user_id' => 3,
            'ingredient' => "温かいご飯丼１杯分
            豚肉(こま切れ)１５０ｇ
            玉ねぎ(スライス)１/４個
            ■ 調味料
            めんつゆ（2倍濃縮）大さじ２
            醤油大さじ１
            砂糖大さじ１",
            'description' => "①耐熱容器に調味料を混ぜ入れる。豚肉と玉葱を入れ、ふんわりラップをかけ、レンジ７００Wで２分３０秒加熱する。
            ②一旦取出し、混ぜ、再度ふんわりラップをかけ、１分３０秒加熱する。熱いので、やけどに気を付けてね！
            ③丼にご飯を盛り、２をのせて、出来上がり♪",
        ];
        DB::table('recipes')->insert($param);
    }
}