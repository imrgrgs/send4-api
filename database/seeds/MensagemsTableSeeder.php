<?php

use App\Mensagem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MensagemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Limpar a tabela mensagems
        Mensagem::truncate();

        $faker = \Faker\Factory::create();

        $contato_id = 1;

        // Gerar 10 mensagens para cada contato em contatos
        for ($contato_id = 1; $contato_id < 5; $contato_id++) {
            for ($i = 0; $i < 10; $i++) {
                Mensagem::create([
                    'descricao' => Str::random(350),

                    'contato_id' => $contato_id,
                ]);
            }
        }
    }
}
