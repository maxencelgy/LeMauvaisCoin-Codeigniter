<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['id', 'users_name', 'users_pw', 'users_email'];
    public function getAllUsers()
    {
        if (!empty($_GET['limit'])) {
            return $this->limit($_GET['limit'])->find();
        } else {
            return $this->findAll();
        }
    }
    public function getSingleUser($id)
    {
        if (empty($id)) {
            return redirect()->to('/');
        } else {
            return $this->select('annonces.*, categories.cat_nom')
                ->where('annonces.id', $id)
                ->join('categories', 'annonces.ann_cat_id = categories.id')
                ->find();
        }
    }
    public function insertUser(array $data)
    {
        return $this->insert($data);
    }
}
