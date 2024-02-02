<?php

use Illuminate\Database\Seeder;
use App\Http\Model\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "victor.programador";
        $user->email = "programadorvictor@gmail.com";
        $user->password = md5("123456");
        $user->save();
    }
}
