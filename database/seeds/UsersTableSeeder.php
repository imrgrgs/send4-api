<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Limpar a tabela users
        User::truncate();

        $faker = \Faker\Factory::create();

        $password = Hash::make('send4');

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@test.com',
            'password' => $password,
        ]);

        // Gerar mais 3 usuários
        for ($i = 0; $i < 3; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
