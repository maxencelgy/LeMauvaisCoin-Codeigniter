<?php

namespace App\Models;

use CodeIgniter\Model;

class FormModel extends Model
{
    protected $table = 'annonces';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nom_annonce', 'description_annonce', 'prix_annonce',  'categorieId', 'createdAt', 'modifiedAt'];
}
