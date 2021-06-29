<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::factory(2)->create();
        \App\Models\User::factory(15)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Product::factory(30)->create();
        \App\Models\Tag::factory(10)->create();
        \App\Models\ProductTag::factory(15)->create();
        \App\Models\Contact::factory(10)->create();
        \App\Models\Coupon::factory(10)->create();
        \App\Models\CouponDetail::factory(10)->create();
        \App\Models\Event::factory(15)->create();
        \App\Models\Suggest::factory(15)->create();
        \App\Models\Order::factory(15)->create();
        \App\Models\OrderDetail::factory(15)->create();
        \App\Models\Page::factory(15)->create();
        \App\Models\Comment::factory(15)->create();
    }
}
