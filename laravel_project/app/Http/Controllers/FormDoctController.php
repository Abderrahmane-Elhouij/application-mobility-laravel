<?php

namespace App\Http\Controllers;

use App\Models\Doctorant;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormDoctController extends Controller
{
    public function submitForm(Request $request)
    {
        $data = $request->all();

        if (
            isset($data['nomc']) &&
            isset($data['prenomc']) &&
            isset($data['structurec']) &&
            isset($data['etablissementc']) &&
            isset($data['cedc']) &&
            isset($data['formationc']) &&
            isset($data['emailc']) &&
            isset($data['titre_thesec']) &&
            isset($data['nom_encadrantc']) &&
            isset($data['prenom_encadrantc']) &&
            isset($data['date_inscriptionc']) &&
            isset($data['description_sujetc']) &&
            isset($data['description_travauxc']) &&
            isset($data['pertinence_impactc']) &&
            isset($data['universite_accueil']) &&
            isset($data['ville_accueil']) &&
            isset($data['pays_accueil']) &&
            isset($data['date_debut_sejour']) &&
            isset($data['date_fin_sejour']) &&
            isset($data['cadre_mob'])
        ) {
            $doctorant = Doctorant::where('nom', $data['nomc'])
                ->where('prenom', $data['prenomc'])
                ->where('email', $data['emailc'])
                ->where('ced', $data['cedc'])
                ->first();

            if ($doctorant) {
                $condidatController = new CondidatController();
                return $condidatController->store($request);
            } else {
                return redirect()->back()->withErrors(["error" => "Un ou plusieurs des champs suivants : nom, prénom, ced ou E-mail sont incorrects"]);
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Veuillez remplir tous les champs requis']);
        }
    }

    public function submitEnsForm(Request $request)
    {
        $data = $request->all();
        if (isset($data['nom']) && isset($data['prenom']) && isset($data['structure_de_recherche']) && isset($data['etablissement']) && isset($data['email']) && isset($data['telephone']) && isset($data['description_traveaux']) && isset($data['pertinence_impact']) && isset($data['universite_accueil']) && isset($data['ville']) && isset($data['pays']) && isset($data['date_debut']) && isset($data['date_fin']) && isset($data['carte_mobilite']) && isset($data['joindre_justicatif']) && isset($data['document'])) {
            $enseignant = Enseignant::where('nom', $data['nom'])
                ->where('prenom', $data['prenom'])
                ->where('email', $data['email'])
                ->first();
            if ($enseignant) {
                $condidatController = new CondidatEnsController();
                return $condidatController->store($request);
            } else {
                return redirect()->back()->withErrors(["error" => "Un ou plusieurs des champs suivants : nom, prénom, ced ou E-mail sont incorrects"]);
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Veuillez remplir tous les champs requis']);
        }

    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Vous avez été déconnecté');
    }
}
