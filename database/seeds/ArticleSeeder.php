<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $width=800;
        $height=400;
        for($i=0;$i<4;$i++)
        {
            $title=$faker->sentence(6);

            DB::table('articles')->insert([
               'category_id'=>rand(1,6),
                'title'=>$title,
                'image'=>$faker->imageUrl($width, $height, 'cats', true), // 'http://lorempixel.com/800/400/cats/Faker'
                'content'=>$faker->paragraph(6),
                'slug'=>str::slug($title),
                'created_at'=>$faker->dateTime('now'),
                'updated_at'=>now(),
            ]);
        }
    }
}
