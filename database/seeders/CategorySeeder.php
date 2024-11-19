<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'code' => 'BR',
                'name' => 'Bread',
                'description' => 'Bread is a staple food made from flour or meal that is moistened, kneaded into dough, and often fermented using yeast.'
            ],
            [
                'code' => 'PA',
                'name' => 'Pastry',
                'description' => 'Pastries refer to a variety of doughs, often enriched with fat or eggs, as well as the sweet and savory baked goods made from them.'
            ],
            [
                'code' => 'CA',
                'name' => 'Cake',
                'description' => 'Cake is a delightful flour confection made from a mixture of flour, sugar, and other ingredients, usually baked to perfection.'
            ],
        ]);
    }
}
