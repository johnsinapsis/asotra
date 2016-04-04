<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name' => 'John jairo González Rodríguez',
            'login' => 'johnsinapsis',
            'email' => 'johnsinapsis@gmail.com',
            'id_role' => '1',
            'password' => bcrypt('123456')
            ]);
    }
}
