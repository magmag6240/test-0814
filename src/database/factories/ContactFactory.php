<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $now = Carbon::now();
        return [
            'fullName' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1,2),
            'email' => $this->faker->unique()->safeEmail,
            'zip' => $this->faker->regexify('[1-9]{3}-[0-9]{4}'),
            'address' => $this->faker->address(),
            'building_name' => $this->faker->secondaryAddress,
            'opinion' => $this->faker->realText(120),
            'created_at' => $now,
            'updated_at' => $now,
        ];
    }
}
