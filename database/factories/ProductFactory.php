<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    protected static $foodNames = [
        'Roti Sosis Keju', 'Blueberry Cheesecake', 'Croissant',
        'Apple Pie', 'Chocolate Muffin', 'Bagel',
        'Banana Bread', 'Pecan Pie', 'Scone',
        'French Baguette', 'Buttery Croissant', 'Blueberry Muffin',
        'Vanilla Cupcake', 'Fruit Tart', 'Apple Pie',
        'English Scone', 'Chocolate Biscuit', 'Fudge Brownie',
        'Sugar Cookie', 'Glazed Doughnut', 'Chocolate Eclair',
        'Cinnamon Danish', 'Whole Pita', 'Italian Focaccia',
        'Salted Pretzel', 'Strawberry Cheesecake', 'Lemon Pound Cake',
        'Walnut Banana Bread', 'Sweet Cornbread', 'Maple Cinnamon Roll',
        'Sugar Churro', 'Almond Macaron', 'Scottish Shortbread',
        'Christmas Panettone', 'Soft Brioche', 'Apple Strudel',
        'Caramel Flan', 'Chocolate Soufflé', 'French Crepe'
    ];
    protected static $usedNames = [];

    public function definition()
    {
        $categories = Category::pluck('id')->toArray();
        // Memastikan nama unik
        $name = $this->getUniqueName();
        return [
            'name' => $name,
            'price' => $this->faker->numberBetween(10, 80) * 1000, // Harga dalam ribuan
            'stock' => $this->faker->numberBetween(1, 100),
            'category_id' => $this->faker->randomElement($categories),
            'original_filename' => null,
            'encrypted_filename' => null,
        ];
    }

    private function getUniqueName()
    {
        $remainingNames = array_diff(self::$foodNames, self::$usedNames);
        if (empty($remainingNames)) {
            throw new \Exception('No unique food names left to assign.');
        }
        $name = $this->faker->randomElement($remainingNames);
        self::$usedNames[] = $name;
        return $name;
    }
}
