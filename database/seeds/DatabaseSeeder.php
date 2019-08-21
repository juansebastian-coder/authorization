<?php

use Illuminate\Database\Seeder;
use Symfony\Component\HttpKernel\Profiler\Profile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class)->create(['profile'=>'Administrador']);
    }
}
