<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create([
            'uf' => 'AC',
            'nome' => 'Acre',
            'cadastrado_por' => 1
        ]);
        Estado::create([
            'uf' => 'AL',
            'nome' => 'Alagoas',
            'cadastrado_por' => 1
        ]);
        Estado::create([
            'uf' => 'AM',
            'nome' => 'Amazonas',
            'cadastrado_por' => 1
        ]);
        Estado::create([
            'uf' => 'AP',
            'nome' => 'Amapá',
            'cadastrado_por' => 1
        ]);
        Estado::create([
            'uf' => 'BA',
            'nome' => 'Bahia',
            'cadastrado_por' => 1
        ]);
        Estado::create([
            'uf' => 'DF',
            'nome' => 'Distrito Federal',
            'cadastrado_por' => 1
        ]);
        Estado::create([
            'uf' => 'ES',
            'nome' => 'Espírito Santo',
            'cadastrado_por' => 1
        ]);
        Estado::create([
            'uf' => 'GO',
            'nome' => 'Goiás',
            'cadastrado_por' => 1
        ]);
        Estado::create([
            'uf' => 'MA',
            'nome' => 'Maranhão',
            'cadastrado_por' => 1
        ]);
        Estado::create([
            'uf' => 'MA',
            'nome' => 'Maranhão',
            'cadastrado_por' => 1
        ]);
        Estado::create([
            'uf' => 'MA',
            'nome' => 'Maranhão',
            'cadastrado_por' => 1
        ]);
        Estado::create([
            'uf' => 'MA',
            'nome' => 'Maranhão',
            'cadastrado_por' => 1
        ]);
    }
}
