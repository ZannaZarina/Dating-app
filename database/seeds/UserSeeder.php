<?php

use App\Picture;
use App\Reaction;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = factory(User::class, 200)->make();

        foreach ($users as $user) {
            $user->save();
            $this->generatePictures($user, rand(1, 15));
        }
    }

    private function generatePictures(User $user, int $amount = 1)
    {
        factory(Picture::class, $amount)->make()
            ->each(function (Picture $picture) use ($user) {
                $picture->user()->associate($user);
                $picture->save();
            });
    }

}
