<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $categories = ["Véhicules", "Maisons", "Jeux", "Mode", "Loisirs", "Animaux"];

        foreach ($categories as $key) {
            $this->db->table('categorie')->insert([
                'nom_cat' => "$key"
            ]);
        }



    }
}
