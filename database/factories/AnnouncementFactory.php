<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit',
            'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium reprehenderit quidem, autem praesentium odio aliquam corporis perspiciatis, enim adipisci, iste necessitatibus delectus nulla. Ullam quidem illum odio, dolore vero modi.',
            'price'=>rand(0, 999999)/100,
            'category_id'=>random_int(1, 10),
            'user_id'=>1,
        ];
    }
}
