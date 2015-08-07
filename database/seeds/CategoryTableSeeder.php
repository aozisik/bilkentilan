<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        $categories = [
        	'Duyuru' => [
        		'Etkinlik',
        		'Toplantı',
        		'Konser',
        		'Kayıp',
        		'İstek'
        	],

        	'Elektronik' => [
        		'Cep Telefonu',
        		'Bilgisayar',
        		'Yazıcı/Tarayıcı',
        		'Tablet',
        		'Müzik Çalar',
        		'Diğer'
        	],

        	'Eşya' => [
        		'Ev Eşyası',
        		'Kırtasiye',
        		'Hobi',
        		'Diğer'
        	],

        	'Özel Ders' => [
        		'Bölüm Dersleri',
        		'Yabancı Dil',
        		'Müzik',
        		'Güzel Sanatlar',
        		'Bilgisayar',
        		'Diğer'
        	],

        	'Kitap & Medya' => [
        		'Ders Kitapları',
        		'Kitap',
        		'DVD Filmler',
        		'Blu-Ray Filmler',
        		'Oyun',
        		'Müzik'
        	],

        	'Vasıta' => [
        		'Araba',
        		'Motosiklet',
        		'Bisiklet',
        		'Aksesuar'
        	],
        ];

        foreach($categories as $categoryName => $contents) {
        	$category = Category::create(['name' => $categoryName]);

        	foreach($contents as $subCategory) {
        		Category::create(['name' => $subCategory, 'parent_id' => $category->id]);
        	}
        }

        Cache::forget('categories');
    }
}
