<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;

class Common extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Customer $customer, Product $product, Order $order)
    {
        $customer->create(['name'=>'Jean']);
        $customer->create(['name'=>'Renan']);
        $customer->create(['name'=>'Wuerike']);
        $customer->create(['name'=>'Kairan']);
        $customer->create(['name'=>'Rodrigo']);
        $customer->create(['name'=>'Leandro']);
        $customer->create(['name'=>'Gustavo']);
        $customer->create(['name'=>'Carol']);
        $customer->create(['name'=>'Beatriz']);
        $customer->create(['name'=>'Andressa']);
        $customer->create(['name'=>'Amanda']);
        $customer->create(['name'=>'Sibele']);
        $customer->create(['name'=>'Natasha']);
        $customer->create(['name'=>'Bruna']);

        $product->create(['name'=>'banana', 'price'=>5.98]);
        $product->create(['name'=>'laranja', 'price'=>7.44]);
        $product->create(['name'=>'abacaxi', 'price'=>2.67]);
        $product->create(['name'=>'uva', 'price'=>4.73]);
        $product->create(['name'=>'aipim', 'price'=>3.25]);
        
        $order->create(['customer_id'=>1]);
        $order->create(['customer_id'=>3]);
        $order->create(['customer_id'=>5]);

        DB::table('order_product')->insert(['order_id'=>1, 'product_id'=>1, 'amount'=>1]);
        DB::table('order_product')->insert(['order_id'=>1, 'product_id'=>2, 'amount'=>2]);
        DB::table('order_product')->insert(['order_id'=>1, 'product_id'=>3, 'amount'=>3]);

        DB::table('order_product')->insert(['order_id'=>2, 'product_id'=>1, 'amount'=>1]);
        DB::table('order_product')->insert(['order_id'=>2, 'product_id'=>2, 'amount'=>2]);
        DB::table('order_product')->insert(['order_id'=>2, 'product_id'=>3, 'amount'=>3]);
        DB::table('order_product')->insert(['order_id'=>2, 'product_id'=>4, 'amount'=>4]);

        DB::table('order_product')->insert(['order_id'=>3, 'product_id'=>1, 'amount'=>1]);
        DB::table('order_product')->insert(['order_id'=>3, 'product_id'=>2, 'amount'=>2]);
        DB::table('order_product')->insert(['order_id'=>3, 'product_id'=>3, 'amount'=>3]);
        DB::table('order_product')->insert(['order_id'=>3, 'product_id'=>4, 'amount'=>4]);
        DB::table('order_product')->insert(['order_id'=>3, 'product_id'=>5, 'amount'=>5]);
    }
}
