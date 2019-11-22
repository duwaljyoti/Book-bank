<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' =>'Art'],
            ['name' =>'Autobiography'],
            ['name'=>'Textbook'],
            ['name'=>'Science'],
            ['name'=>'Biography'],
            ['name'=>'Travel'],
            ['name'=>'Math'],
            ['name'=>'Crime'],
            ['name'=>"Children's"],
            ['name'=>'History'],
        ]);
    }
}
