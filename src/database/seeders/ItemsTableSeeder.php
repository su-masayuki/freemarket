<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param =[
            'item_name' => '腕時計',
            'price' => 15000,
            'item_describe' => 'スタイリッシュなデザインのメンズ腕時計',
            'item_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Armani+Mens+Clock.jpg',
            'item_condition' => '良好',
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_name' => 'HDD',
            'price' => 5000,
            'item_describe' => '高速で信頼性の高いハードディスク',
            'item_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/HDD+Hard+Disk.jpg',
            'item_condition' => '目立った傷や汚れなし',
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_name' => '玉ねぎ3束',
            'price' => 300,
            'item_describe' => '新鮮な玉ねぎ3束のセット',
            'item_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/iLoveIMG+d.jpg',
            'item_condition' => 'やや傷や汚れあり',
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_name' => '革靴',
            'price' => 4000,
            'item_describe' => 'クラシックなデザインの革靴',
            'item_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Leather+Shoes+Product+Photo.jpg',
            'item_condition' => '状態が悪い',
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_name' => 'ノートPC',
            'price' => 45000,
            'item_describe' => '高性能なノートパソコン',
            'item_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Living+Room+Laptop.jpg',
            'item_condition' => '良好',
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_name' => 'マイク',
            'price' => 8000,
            'item_describe' => '高音質のレコーディング用マイク',
            'item_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Music+Mic+4632231.jpg',
            'item_condition' => '目立った傷や汚れなし',
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_name' => 'ショルダーバッグ',
            'price' => 3500,
            'item_describe' => 'おしゃれなショルダーバッグ',
            'item_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Purse+fashion+pocket.jpg',
            'item_condition' => 'やや傷や汚れあり',
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_name' => 'タンブラー',
            'price' => 500,
            'item_describe' => '使いやすいタンブラー',
            'item_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Tumbler+souvenir.jpg',
            'item_condition' => '状態が悪い',
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_name' => 'コーヒーミル',
            'price' => 4000,
            'item_describe' => '手動のコーヒーミル',
            'item_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Waitress+with+Coffee+Grinder.jpg',
            'item_condition' => '',
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_name' => 'メイクセット',
            'price' => 2500,
            'item_describe' => '便利なメイクアップセット',
            'item_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/%E5%A4%96%E5%87%BA%E3%83%A1%E3%82%A4%E3%82%AF%E3%82%A2%E3%83%83%E3%83%95%E3%82%9A%E3%82%BB%E3%83%83%E3%83%88.jpg',
            'item_condition' => '目立った傷や汚れなし',
        ];
        DB::table('items')->insert($param);

    }
}
