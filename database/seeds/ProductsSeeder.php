<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        $json = File::get("database/data/products.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Product::create(array(
              'id' => $obj->id,
              'name' => $obj->name,
              'price' => $obj->price,
              'image' => $obj->image,
              'category_id' => $obj->category_id,
              'sale' => $obj->sale,
              'category_id' => $obj->category_id,
              'created_at' => $obj->created_at,
              'updated_at' => $obj->updated_at
            ));
          }
    }
}
