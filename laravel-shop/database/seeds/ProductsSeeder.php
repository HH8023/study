<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *批量创建商品以及对应的SKU
     * @return void
     */
    public function run()
    {
        //创建30个商品
        $products = factory(\App\Models\Product::class, 30)->create();
        foreach ($products as $product) {
            //创建3个SKU，并且每个SKU的'product_id'字段都设为当前循环的商品id
            $sku = factory(\App\Models\ProductSku::class,3)->create(['product_id' => $product->id]);
            //找出价格最低的SKU价格，把商品价格设置为该价格
            $product->update(['price' => $sku->min('price')]);
        }
    }
}