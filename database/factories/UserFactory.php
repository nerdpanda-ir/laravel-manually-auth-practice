<?php

namespace Database\Factories;

use App\Services\HashGenerator;
use App\Services\UniqueDirectoryMaker;
use App\Services\UniqueDirectoryMakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected  UniqueDirectoryMaker $directoryMaker;
    public function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null, ?Collection $recycle = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection, $recycle);
        $uniqueDirectoryMakerFactory = new UniqueDirectoryMakerFactory();
        $this->directoryMaker = $uniqueDirectoryMakerFactory->make();
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created_at = $this->get_created_at();
        $forward_created_at = $this->forwardDateTime($created_at);
        $updated_at = $this->get_updated_at($forward_created_at);
        $email_verified_at = $this->forwardDateTime($forward_created_at);
        return [

            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'user_id' => $this->faker->unique()->userName() ,
            'password' => Hash::make('user'),
            'remember_token' => $this->get_remember_token(),
            'created_at' => $created_at ,
            'updated_at' => $updated_at ,
            'email_verified_at' => $email_verified_at ,
            'avatar' => $this->get_avatar() ,

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
    public function nerdPanda():self{
        return $this->state(function (array $oldData){
            $avatar = $oldData['avatar'];
            if (!is_null($avatar))
                File::deleteDirectory(
                    public_path(pathinfo($avatar,PATHINFO_DIRNAME))
                );
            $createdAt = Carbon::now()->subYears(4);
            $emailVerified = $this->forwardDateTime($createdAt,60,300);
            $updatedAt = $this->get_updated_at($this->forwardDateTime($createdAt)) ;
            $data = [
                'name' => 'nerd panda' ,
                'email' => 'nerdpanda@gmail.com' ,
                'user_id' => 'nerdpanda' ,
                'password' => Hash::make('nerdpanda') ,
                'avatar' => $this->get_nerdPanda_avatar() ,
                'created_at' => $createdAt ,
                'updated_at' => $updatedAt ,
                'email_verified_at'=> $emailVerified ,
            ];
            return $data;
        });
    }
    protected function get_updated_at(\DateTime $from):null|\DateTime {
        if ($this->faker->boolean)
            return null;
        return $this->faker->dateTimeBetween($from);
    }
    public function get_created_at():\DateTime{
        return $this->faker->dateTimeBetween('-3 years');
    }
    public function get_remember_token():string|null {
        if ($this->faker->boolean)
            return Str::random(10);
        return null;
    }
    public function forwardDateTime(\DateTime $dateTime , int $min = 100 , int $max = 3600):\DateTime {
        $forwarded = new \DateTime();
        $forwarded->setTimestamp($dateTime->getTimestamp()+ rand($min , $max));
        return  $forwarded;
    }
    public function get_avatar():null|string {
        if ($this->faker->boolean)
            return null;
        $destination = public_path('img/users-avatars/');
        $directory = $this->directoryMaker->make($destination);
        $fullDestination = $destination.''.$directory;
        $imagePath = $this->faker->image($fullDestination);
        $imageName = pathinfo($imagePath,PATHINFO_BASENAME);
        return 'img/users-avatars/'.$directory.'/'.$imageName;
    }
    public function get_nerdPanda_avatar():string {
        $avatarDirectory = $this->directoryMaker->make(public_path("img/users-avatars/"));
        copy(
            public_path('img/nerd-panda.png'),
            public_path("img/users-avatars/$avatarDirectory/nerd-panda.png")
        );
        return "img/users-avatars/".$avatarDirectory.'/nerd-panda.png';
    }
}
