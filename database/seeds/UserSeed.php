<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\RoleUser;
class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', 'superadmin@example.com')->first()) {
            $user = new User();
            $user-> name = 'superadmin';
            $user->email = 'superadmin@example.com';
            $user->password = bcrypt('admin');

            $user->save();

            $roleUser = new RoleUser();
            $roleUser->user_id = $user->id;
            $roleUser->role_id = 1;

            $roleUser->save();
        }
    }
}
