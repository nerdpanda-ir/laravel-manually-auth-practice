<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UsersSeeder extends Seeder
{
    protected static int $count = 15;
    /**
     * Run the database seeds.
     */
    public function run(UserFactory $factory): void
    {
        $factory->modelName()::truncate();
        File::deleteDirectory(public_path('img/users-avatars'));
        mkdir(public_path('img/users-avatars'));
        $factory->nerdPanda()->create();
        $factory->count(self::$count)->create();
    }
}
