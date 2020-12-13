<?php

namespace Database\Seeders;

use App\Models\Cidade;
use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cidade::create([
            'nome' => 'Manaus',
            'estado_id' => 3
        ]);
        Cidade::create([
            'nome' => 'Manacapurú',
            'estado_id' => 3
        ]);
        Cidade::create([
            'nome' => 'Presidente Figueiredo',
            'estado_id' => 3
        ]);
    }
}
