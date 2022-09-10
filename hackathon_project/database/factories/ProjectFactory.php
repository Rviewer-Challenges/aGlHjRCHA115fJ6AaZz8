<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'title' => 'test',
            'description' => 'test',
            'short_description' => 'test',
            'motivation' => 'test',
            'requirements' => 'test',
            'total_team' => 2,
            'active' => 1,
        ];
    }
}
