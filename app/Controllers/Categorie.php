<?php

namespace App\Controllers;

use App\Models\CategorieModel;
use DateTime;

class Categorie extends BaseController
{
    private $categorieModel;

    public function __construct()
    {
        $this->categorieModel = model('App\Models\CategorieModel');
    }

    public function index()
    {
        $categories = $this->categorieModel->getAllCategories();
        echo view('navigation/header');
        echo view('categories/index', [
            "categorie" => $categories
        ]);
    }

    private function currentTimeDate()
    {
        return date('Y-m-d');
    }

    public function handlePost()
    {
        $data = $this->generateCategorieFromPost($this->request);
        $data["createdAt"] = $this->currentTimeDate();
        $this->categorieModel->insertCategorie($data);

        return redirect()->to('/categorie');
    }


    private function generateCategorieFromPost($request)
    {
        return [
            "nom" => $this->request->getPost("nom"),
        ];
    }


    public function handleModify(int $id)
    {
        $categorie = $this->categorieModel->find($id);

        if (is_null($categorie)) {
            return redirect()->to('/categorie');
        }

        echo view('categories/modify', [
            "categorie" => $categorie
        ]);
    }

    public function handleModified()
    {
        $data = $this->generateCategorieFromPost($this->request);
        $data["modifiedAt"] = $this->currentTimeDate();
        $this->categorieModel->update($this->request->getPost("id"), $data);

        return redirect()->to('/categorie');
    }

    public function handleDelete(int $id)
    {
        $this->categorieModel->deleteById($id);
        return redirect()->to('/categorie');
    }

    public function handleView($id)
    {
        $categorie = $this->categorieModel->find($id);

        if (is_null($categorie)) {
            return redirect()->to('/categorie');
        }
        echo view('categories/single', [
            "categorie" => $categorie
        ]);
    }
}
