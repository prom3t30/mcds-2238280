<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string-
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
/*         return [
            'fullname'          => $this->faker->name,
            'email'             => $this->faker->unique()->safeEmail,
            'phone'             => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'birthdate'         => $this->faker->date,
            'gender'            => $this->faker->randomElement($array = array('Female', 'Male')),
            'address'           => $this->faker->streetAddress,
            'role'              => 'Editor',
            'email_verified_at' => now(),
            'password'          => bcrypt('editor'),
            'remember_token'    => Str::random(10),
        ];
 */

        $gender = $this->faker->randomElement(['male', 'female']);

        return [
            'fullname'          => $this->faker->firstName($gender),
            'email'             => $this->faker->unique()->safeEmail,
            'phone'             => $this->faker->numberBetween($min = 3101000000 , $max = 3202000000),
            'birthdate'         => $this->faker->dateTimeBetween($startDate = '1960', $endDate = '1990', $timezone = null),
            'gender'            => $gender,
            'address'           => $this->faker->streetAddress,
            'photo'              =>$this->faker->imageUrl($width = 640, $height = 480),
            'role'              => 'Editor',
            'email_verified_at' => now(),
            'password'          => bcrypt('editor'),
            'remember_token'    => Str::random(10),
        ];
    }
}
