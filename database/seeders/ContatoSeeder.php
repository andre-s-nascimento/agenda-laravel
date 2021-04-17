<?php

namespace Database\Seeders;

use App\Models\Contato;
use Illuminate\Database\Seeder;

class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contato::factory(20)->create();
        //sail artisan db:seed --class=ContatoSeeder
    }
}
