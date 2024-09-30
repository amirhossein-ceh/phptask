<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    protected $model = Section::class;

    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'content' => $this->faker->paragraph,
        ];
    }
}
