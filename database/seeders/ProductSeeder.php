<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('products')->insert([
        //     [
        //         'name' => 'Roti Sosis Keju',
        //         'price' => '12000',
        //         'stock' => '22',
        //         'category_id' => 1
        //     ],
        //     [
        //         'name' => 'Croissant',
        //         'price' => '12500',
        //         'stock' => '19',
        //         'category_id' => 2
        //     ],
        //     [
        //         'name' => 'Blueberry Cheesecake',
        //         'price' => '42000',
        //         'stock' => '7',
        //         'category_id' => 3
        //     ],
        // ]);
        Product::factory()->count(7)->create();
    }
}
