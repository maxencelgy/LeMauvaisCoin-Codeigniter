<?php

namespace App\Controllers;

use App\Models\FormModel;

class Annonce extends BaseController
{
    private $categorieModel;
    private $annonceModel;
    public function __construct()
    {
        $this->annonceModel = model('App\Models\AnnonceModel');
        $this->categorieModel = model('App\Models\CategorieModel');
    }

    public function index()
    {
        $categories = $this->categorieModel->getAllCategories();
        $annonces = $this->annonceModel->getAllAnnonces();
        echo view('annonces/index', [
            "categorie" => $categories,
            "annonces" => $annonces
        ]);
    }
    public function handleView($id)
    {
        $annonces = $this->annonceModel->getAnnoncesFromCategorie($id);
        if (is_null($annonces)) {
            return redirect()->to('/');
        }
        echo view('annonces/single', [

            "annonces" => $annonces
        ]);
    }

    public function handleDelete(int $id)
    {
        $this->annonceModel->deleteById($id);
        return redirect()->to('/');
    }

    public function create()
    {
        $annonces = $this->annonceModel->getAllAnnonces();
        $categories = $this->categorieModel->getAllCategories();
        echo view('annonces/add', [
            "annonces" => $annonces,
            "categories" => $categories

        ]);
    }

    private function currentTimeDate()
    {
        return date('Y-m-d');
    }

    public function handlePost()
    {
        $data = $this->generateAnnonceFromPost($this->request);
        $data["createdAt"] = $this->currentTimeDate();
        $this->annonceModel->insertAnnonce($data);

        return redirect()->to('/');
    }

    private function generateAnnonceFromPost($request)
    {
        return [
            "nom_annonce" => $this->request->getPost("nom_annonce"),
            "description_annonce" => $this->request->getPost("description_annonce"),
            "prix_annonce" => $this->request->getPost("prix_annonce"),
            "categorieId" => $request->getPost("categorie"),
        ];
    }

    public function handleModify(int $id)
    {
        $annonce = $this->annonceModel->find($id);

        if (is_null($annonce)) {
            return redirect()->to('/');
        }
        echo view('annonces/modify', [
            "annonce" => $annonce
        ]);
    }

    public function handleModified()
    {
        $data = $this->generateAnnonceFromPost($this->request);
        $data["modifiedAt"] = $this->currentTimeDate();
        $this->annonceModel->update($this->request->getPost("id"), $data);
        return redirect()->to('/');
    }
}
