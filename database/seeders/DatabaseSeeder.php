<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Alberto',
            'email' => 'alberto@presto.it',
            'password' => Hash::make('ciaociao'),
            'is_revisor' => true,
        ]);

        $categories = [
            'Casa e giardino',
            'Smartphone e tablet',
            'Informatica',
            'Console e videogiochi',
            'Audio, video e fotografia',
            'Sport e tempo libero',
            'Libri, film e musica',
            'Abbigliamento',
            'Motori',
            'Infanzia',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name'=>$category
            ]);
        }

        //Announcement::factory(10)->create();
    }
}
