<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imagePath = public_path('seeder-pictures');
        $imageFiles = File::files($imagePath);

        $randomImage = fake()->randomElement($imageFiles);
        $image = file_get_contents($randomImage->getPathname());

        return [
            'name' => fake()->firstName,
            'surname' => fake()->lastName,
            'phone_number' => fake()->phoneNumber,
            'email' => fake()->email,
            'address' => fake()->address,
            'picture' => base64_encode($image),
            'birthday_date' => fake()->date,
            'note' => fake()->text,
        ];
    }
}
