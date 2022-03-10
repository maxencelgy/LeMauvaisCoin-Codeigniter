<?php

namespace App\Models;

use CodeIgniter\Model;

class CategorieModel extends Model
{
    protected $table = 'categorie';
    protected $allowedFields = ['id', 'nom_cat', 'createdAt', 'updatedAt'];


    public function getAllCategories()
    {
        return $this->findAll();
    }

    public function getOneCategories($id)
    {
        return $this->find($id);
    }

    public function insertCategorie(array $data)
    {
        return $this->insert($data);
    }

    public function deleteById(int $id)
    {
        return $this->delete($id);
    }
}
