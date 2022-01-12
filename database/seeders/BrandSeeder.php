<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'b_name' => 'Apple',
                'b_country' => 'USA',
                
            ],
            [
                'b_name' => 'Samsung',
                'b_country' => 'South Korea',
                
            ],
            [
                'b_name' => 'Huawei',
                'b_country' => 'China',
                
            ],
            [
                'b_name' => 'Xiaomi',
                'b_country' => 'China',
                
            ],
            [
                'b_name' => 'Oppo',
                'b_country' => 'China',
                
            ],
            [
                'b_name' => 'Vivo',
                'b_country' => 'China',
                
            ],
        ]);
    }
}
