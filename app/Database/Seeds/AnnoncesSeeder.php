<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnnoncesSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents("data/annonces.json");
        $annonces = json_decode($json);

        foreach ($annonces as $annonce) {
            $this->db->table('annonces')->insert([
                "nom_annonce" => $annonce->nom,
                "prix_annonce" => $annonce->prix,
                "description_annonce" => $annonce->description,
            
                "createdAt" => $annonce->createdAt,
                "categorieId" => $annonce->categoriesId,
            ]);
        }
    }
}
