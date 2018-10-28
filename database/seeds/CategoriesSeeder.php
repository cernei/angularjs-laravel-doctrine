<?php

use Illuminate\Database\Seeder;
use LaravelDoctrine\ORM\Facades\EntityManager;
use App\Entities\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EntityManager::persist(new Category('IT'));
        EntityManager::persist(new Category('Healthcare'));
        EntityManager::persist(new Category('Construction'));
        EntityManager::persist(new Category('Management'));
        EntityManager::persist(new Category('Science'));


        EntityManager::flush();
    }
}
