<?php

namespace Database\Seeders;

use App\Models\Cidade;
use App\Models\Estado;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
//        $this->call(EstadoSeeder::class);
//        $this->call(CidadeSeeder::class);
//        $this->call(EnderecoSeeder::class);
    }
}
