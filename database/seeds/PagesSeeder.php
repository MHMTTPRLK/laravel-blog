<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages=['Hakkında','Kariyer','Vizyon','Misyon'];
        $count=0;
        foreach ($pages as $pages)
        {
            $count++;
            DB::table('pages')->insert([
                'title'=>$pages,
                'slug'=>str::slug($pages),
                'image'=>'https://sunedison.in/wp-content/uploads/2020/01/Physics-and-business-1.jpg',
                'order'=>$count,
                'content'=>'Lorem Ipsum, dizgi ve baskı endüstrisinde
                            kullanılan mıgır metinlerdir. Lorem Ipsum, adı
                            bilinmeyen bir matbaacının bir hurufat numune kitabı
                            oluşturmak üzere bir yazı galerisini alarak karıştırdığı
                            1500\'lerden beri endüstri standardı sahte metinler olarak
                            kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış aynı zam',


                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
