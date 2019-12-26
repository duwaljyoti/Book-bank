<?php

namespace App\Console\Commands;

use App\Models\Book;
use App\Models\Category;
use App\User;
use Faker\Factory;
use Illuminate\Console\Command;

class AddNecessaryDummyData extends Command
{
    private $user;
    private $book;
    private $categoryModel;
    private $fakerFactory;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:dummy_data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds necessary dummy data.';

    public function __construct(
        User $user,
        Book $book,
        Category $category,
        Factory $fakerFactory
    )
    {
        parent::__construct();
        $this->categoryModel = $category;
        $this->fakerFactory = $fakerFactory;
        $this->user = $user;
        $this->book = $book;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $faker = $this->fakerFactory->create();

        if (!$this->categoryModel->count()) {
            $categories = ['Education', 'Comics', 'Health', 'Love Story', 'Fiction'];
            foreach ($categories as $category) {
                $this->categoryModel->create(['name' => $category]);
            }

            dump('Five categories added.');
        }

        if (!$this->user->count()) {
            for($i = 0; $i < 5; $i ++) {
                $this->user->create([
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                ]);
            }
            dump('Five users added.');
        }

        if (!$this->user->count()) {
            for($i = 0; $i < 5; $i ++) {
                $this->user->create([
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                ]);
            }
            dump('Five users added.');
        }

        if (!$this->book->count()) {
            for($i = 0; $i < 5; $i ++) {
                $this->book->create([
                    'name' => "$i th Book",
                    'author' => $faker->name,
                    'user_id' => 1,
                    'category_id' => 1
                ]);
            }
            dump('Five books added.');
        }
    }
}
