<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
 public function run(): void
 {
 Product::insert([
 ['name' => 'Laptop Asus VivoProduct', 'category' => 'Elektronik',
'price' => 8500000, 'stock' => 10],
 ['name' => 'Meja Belajar Minimalis', 'category' => 'Furniture',
'price' => 1200000, 'stock' => 5],
 ['name' => 'Headset Bluetooth', 'category' => 'Elektronik', 'price' =>
350000, 'stock' => 30],
 ['name' => 'Kursi Kantor Ergonomis', 'category' => 'Furniture',
'price' => 2100000, 'stock' => 8],
 ['name' => 'Sepatu Sneakers Putih', 'category' => 'Fashion', 'price'
=> 490000, 'stock' => 15],
 ['name' => 'Kemeja Linen Pria', 'category' => 'Fashion', 'price' =>
310000, 'stock' => 20],
 ['name' => 'Smartphone Android', 'category' => 'Elektronik', 'price'
=> 4500000, 'stock' => 12],
 ['name' => 'Rak Buku Kayu', 'category' => 'Furniture', 'price' =>
750000, 'stock' => 9],
 ['name' => 'Tas Selempang Kulit', 'category' => 'Fashion', 'price' =>
680000, 'stock' => 18],
 ]);
 }
}
