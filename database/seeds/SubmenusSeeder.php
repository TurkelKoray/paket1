<?php

use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class SubmenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('submenus')->insert(
            [
                [
                    'menu_id' => 3,
                    'name'  => 'MÜKEMMELLİK' ,
                    'slug'  => 'degerlerimiz' ,
                    'title' => "Mükemmelik adına herşey" ,
                    'text2' => "Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur." ,
                    'lang'  => 'tr' ,
                    'type'  => 'hs' ,
                    'sira'  => 2 ,
                ] ,
                [
                    'menu_id' => 7,
                    'name'  => 'VALUES' ,
                    'slug'  => 'values' ,
                    'title' => "Mükemmelik adına herşey" ,
                    'text2' => "Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur." ,
                    'lang'  => 'en' ,
                    'type'  => 'hs' ,
                    'sira'  => 2 ,
                ]

            ]
        );
    }
}
