<?php

use Illuminate\Database\Seeder;

class SnsInitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("sns")->insert([
            "sns_id" => 0,
            "sns_name" => "twitter",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
        ]);
        DB::table("sns")->insert([
            "sns_id" => 1,
            "sns_name" => "Instagram",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
        ]);
        DB::table("sns")->insert([
            "sns_id" => 2,
            "sns_name" => "Youtube",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
        ]);
        DB::table("sns")->insert([
            "sns_id" => 3,
            "sns_name" => "メルカリ",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
        ]);
        DB::table("sns")->insert([
            "sns_id" => 4,
            "sns_name" => "Base",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
        ]);
        DB::table("sns")->insert([
            "sns_id" => 5,
            "sns_name" => "食べログ",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
        ]);
        DB::table("sns")->insert([
            "sns_id" => 6,
            "sns_name" => "Retty",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
        ]);
        DB::table("sns")->insert([
            "sns_id" => 7,
            "sns_name" => "Amazon",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
        ]);
        DB::table("sns")->insert([
            "sns_id" => 8,
            "sns_name" => "SHOWROOM",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
        ]);
        DB::table("sns")->insert([
            "sns_id" => 9,
            "sns_name" => "Facebook",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
        ]);
        DB::table("sns")->insert([
            "sns_id" => 1000,
            "sns_name" => "その他",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
        ]);
    }
}
