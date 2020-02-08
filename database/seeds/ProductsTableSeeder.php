<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Laptops
        for($i=1; $i<=40; $i++) {
          Product::create([
            'name' => 'Laptop '.$i,
            'slug' => 'laptop-'.$i,
            'details' => '15 inch, 1TB SSD, 16GB RAM',
            'price' => 15000+$i*100,
            'description' => 'Apple MacBook Pro is a Mac laptop with a 13.30-inch display that has a resolution of 2560x1600 pixels. It is powered by a Core i5 processor and it comes with 12GB of RAM. The Apple MacBook Pro packs 512GB of SSD storage.',
          ])->categories()->attach(1);
        }

        $product = Product::find(1);
        $product->categories()->attach(2);

        //Desktops
        for($i=1; $i<=40; $i++) {
          Product::create([
            'name' => 'Desktop '.$i,
            'slug' => 'desktop-'.$i,
            'details' => '32GB, 1TBSSD, R93900',
            'price' => 20000+$i*100,
            'description' => "AMD Ryzen™ desktop processors offer uncompromising features and smooth ... the responsiveness and performance you'd expect from a much pricier PC.",
          ])->categories()->attach(2);
        }

        //Mobile
        for($i=1; $i<=40; $i++) {
          Product::create([
            'name' => 'Mobile '.$i,
            'slug' => 'mobile-'.$i,
            'details' => '4GB, 256GB, SD865',
            'price' => 30000+$i*100,
            'description' => 'A new dual‑camera system captures more of what you see and love. The fastest chip ever in a smartphone and all‑day battery life let you do more and charge less. And the highest‑quality video in a smartphone, so your memories look better than ever.',
          ])->categories()->attach(3);
        }

        //Tablets
        for($i=1; $i<=40; $i++) {
          Product::create([
            'name' => 'Tablet '.$i,
            'slug' => 'tablet-'.$i,
            'details' => '7inch, 4GB, QHD',
            'price' => 30000+$i*100,
            'description' => 'The iPad Air is the first-generation iPad Air tablet computer designed, developed, and marketed by Apple Inc. It was announced on October 22, 2013, and was released on November 1, 2013. The iPad Air features a thinner design with similarities to the contemporaneous iPad Mini 2 with the same 64-bit Apple A7 processor with M7 coprocessor.',
          ])->categories()->attach(4);
        }

        //Monitors
        for($i=1; $i<=40; $i++) {
          Product::create([
            'name' => 'Monitor '.$i,
            'slug' => 'monitor-'.$i,
            'details' => '24inch, FHD, IPS',
            'price' => 20000+$i*100,
            'description' => 'Full HD resolution provides sharp visuals and IPS1 technology lets you see everything clearly from nearly any angle. With Acer eColor Management, you can easily customize your viewing experience by adjusting parameters such as contrast, sharpness, saturation and more.',
          ])->categories()->attach(5);
        }

        //Appliances
        for($i=1; $i<=40; $i++) {
          Product::create([
            'name' => 'Device '.$i,
            'slug' => 'device-'.$i,
            'details' => '24V, 5A, LED',
            'price' => 70000+$i*100,
            'description' => 'Device provides sharp visuals and IPS1 technology lets you see everything clearly from nearly any angle. With Acer eColor Management, you can easily customize your viewing experience by adjusting parameters such as contrast, sharpness, saturation and more.',
          ])->categories()->attach(7);
        }
    }
}
