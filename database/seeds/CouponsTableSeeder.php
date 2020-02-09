<?php

use App\Coupon;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Coupon::create([
      'code' => 'TECHMANDU123',
      'type' => 'fixed',
      'value' => 200,
    ]);

    Coupon::create([
      'code' => 'PEROFF25',
      'type' => 'percentage',
      'percent_off' => 25,
    ]);
  }
}
