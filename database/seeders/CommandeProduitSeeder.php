<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommandeProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('commande_produit')->insert([
            [
                'idCommande' => 1,
                'idProduit' => 2,
                'quantite' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idCommande' => 1,
                'idProduit' => 4,
                'quantite' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idCommande' => 2,
                'idProduit' => 1,
                'quantite' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
