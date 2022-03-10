<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnonceModel extends Model
{
    protected $table = 'annonces';
    protected $allowedFields = ['nom_annonce', 'description_annonce', 'prix_annonce',  'categorieId', 'createdAt', 'modifiedAt'];

    public function getNameCategorie()
    {
        return $this->join('categorie', 'categorie.id = annonces.categorieId')->findAll();
        // return $this->select('annonces.*, category.nom as nomCategorie')
        // ->join('categorie', 'categorie.id = annonces.categorieId')
        // ->findAll();
    }

    // public function getAnnoncesFromCategorie($nomCategorie)
    // {
    //     return $this->join('categorie', 'categorie.id = annonces.categorieId')->findAll();
    //     $this->where("categorie.nom = $nomCategorie")
    //         ->findAll();
    // }

    public function getAnnoncesFromCategorie($id)
    {
        return $this->select('annonces.*, categorie.id as idCategorie, categorie.nom_cat')
            ->where('annonces.id=' . $id)
            ->join('categorie', 'categorie.id = annonces.categorieId')
            ->find();
    }

    public function countActu()
    {
        return $this->countAllResults();
    }

    public function getAllAnnonces()
    {
        return $this->findAll();
    }
    public function getOneAnnonces($id)
    {
        return $this->find($id);
    }

    public function insertAnnonce(array $data)
    {
        return $this->insert($data);
    }

    public function deleteById(int $id)
    {
        return $this->delete($id);
    }
}
