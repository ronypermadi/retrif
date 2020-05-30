<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $category = [
            [
                'name' => 'Travel Adapter',
                'slug' => 'travel-adapter'],
            [
                'name' => 'Wireless Charger',
                'slug' => 'wireless-charger'],
            ];
            foreach($category as $categories){
                Category::create($categories);
            }
    }
}
