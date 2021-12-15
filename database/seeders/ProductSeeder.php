<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'p_name' => 'Iphone 12 pro max',
                'price' => '121212',
                'specs' => 'RAM ROM GPU BAR NYAR',
                'qty' => '121',
                'p_image' => 'iphone13.jpg',
                'stock' => true,
                'b_id' => 1,
                'created_at' => '2020-02-17 10:00:00',
            ],
            [
                'p_name' => 'Xiaomi 5 pro',
                'price' => '121212',
                'specs' => 'RAM ROM GPU BAR NYAR',
                'qty' => '121',
                'p_image' => 'iphone13.jpg',
                'stock' => true,
                'b_id' => 4,
                'created_at' => '2020-02-17 10:00:00',
            ],
            [
                'p_name' => 'Iphone 13 pro max',
                'price' => '121212',
                'specs' => 'RAM ROM GPU BAR NYAR',
                'qty' => '121',
                'p_image' => 'iphone13.jpg',
                'stock' => true,
                'b_id' => 1,
                'created_at' => '2020-02-17 10:00:00',
            ],
            [
                'p_name' => 'Iphone 13 pro max',
                'price' => '121212',
                'specs' => 'RAM ROM GPU BAR NYAR',
                'qty' => '121',
                'p_image' => 'iphone13.jpg',
                'stock' => true,
                'b_id' => 1,
                'created_at' => '2020-02-17 10:00:00',
            ],
            [
                'p_name' => 'Iphone 13 pro max',
                'price' => '121212',
                'specs' => 'RAM ROM GPU BAR NYAR',
                'qty' => '121',
                'p_image' => 'iphone13.jpg',
                'stock' => true,
                'b_id' => 1,
                'created_at' => '2020-02-17 10:00:00',
            ],
            [
                'p_name' => 'Xiaomi 5 pro',
                'price' => '121212',
                'specs' => 'RAM ROM GPU BAR NYAR',
                'qty' => '121',
                'p_image' => 'iphone13.jpg',
                'stock' => true,
                'b_id' => 4,
                'created_at' => '2020-02-17 10:00:00',
            ],
            [
                'p_name' => 'Xiaomi 5 pro',
                'price' => '121212',
                'specs' => 'RAM ROM GPU BAR NYAR',
                'qty' => '121',
                'p_image' => 'iphone13.jpg',
                'stock' => true,
                'b_id' => 4,
                'created_at' => '2020-02-17 10:00:00',
            ],
            [
                'p_name' => 'Xiaomi 5 pro',
                'price' => '121212',
                'specs' => 'RAM ROM GPU BAR NYAR',
                'qty' => '121',
                'p_image' => 'iphone13.jpg',
                'stock' => true,
                'b_id' => 4,
                'created_at' => '2020-02-17 10:00:00',
            ],
            [
                'p_name' => 'Xiaomi 5 pro',
                'price' => '121212',
                'specs' => 'RAM ROM GPU BAR NYAR',
                'qty' => '121',
                'p_image' => 'iphone13.jpg',
                'stock' => true,
                'b_id' => 4,
                'created_at' => '2020-02-17 10:00:00',
            ],
            [
                'p_name' => 'Xiaomi 5 pro',
                'price' => '121212',
                'specs' => 'RAM ROM GPU BAR NYAR',
                'qty' => '121',
                'p_image' => 'iphone13.jpg',
                'stock' => true,
                'b_id' => 4,
                'created_at' => '2020-02-17 10:00:00',
            ],
            [
                'p_name' => 'Xiaomi 5 pro',
                'price' => '121212',
                'specs' => 'RAM ROM GPU BAR NYAR',
                'qty' => '121',
                'p_image' => 'iphone13.jpg',
                'stock' => true,
                'b_id' => 4,
                'created_at' => '2020-02-17 10:00:00',
            ],
        ]);
    }
}
