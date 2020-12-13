<?php

namespace Database\Seeders;

use App\Models\Endereco;
use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Endereco::create([
            'cep' => '69050000',
            'logradouro' => 'Rua A',
            'numero' => '1A',
            'complemento' => 'Beco da poeira',
            'bairro' => 'Bocada',
            'estado_id' => 3,
            'cidade_id' => 1,
        ]);
    }
}
