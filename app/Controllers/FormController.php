<?php

namespace App\Controllers;

use App\Models\FormModel;
use CodeIgniter\Controller;

class FormController extends Controller
{
    public function create()
    {
        echo view('contact_form');
    }

    public function formValidation()
    {
        helper(['form', 'url']);

        $input = $this->validate([
            'nom_annonce' => 'required|min_length[3]',
            'description_annonce' => 'required|valid_description_annonce',
            'prix_annonce' => 'required|numeric|max_length[10]'
        ]);
        $formModel = new FormModel();

        if (!$input) {
            echo view('contact_form', [
                'validation' => $this->validator
            ]);
        } else {
            $formModel->save([
                "nom_annonce" => $this->request->getPost("nom_annonce"),
                "description_annonce" => $this->request->getPost("description_annonce"),
                "prix_annonce" => $this->request->getPost("prix_annonce"),
                "categorieId" => $request->getPost("categorie"),
            ]);
            return $this->response->redirect(site_url('/submit-form'));
        }
    }
}
