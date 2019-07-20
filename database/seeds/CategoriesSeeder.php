<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $json = File::get("database/data/categories.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Category::create(array(
              'id' => $obj->id,
              'name' => $obj->name,
              'created_at' => $obj->created_at,
              'updated_at' => $obj->updated_at
            ));
          }
    }
}
