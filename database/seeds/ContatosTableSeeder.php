<?php

use App\Contato;
use Illuminate\Database\Seeder;

class ContatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Limpar a tabela contatos
        Contato::truncate();

        $faker = \Faker\Factory::create();

        $user_id = 1;

        // Gerar 10 contatos para cada usuário em users
        for ($user_id = 1; $user_id < 5; $user_id++) {
            for ($i = 0; $i < 10; $i++) {
                Contato::create([
                    'nome' => $faker->name,
                    'sobrenome' => $faker->name,
                    'email' => $faker->email,
                    'telefone' => $faker->phoneNumber,
                    'user_id' => $user_id,
                ]);
            }
        }
    }
}
