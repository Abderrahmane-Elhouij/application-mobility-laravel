<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function renderView($view)
    {
        if (View::exists("components.doct_dashboard.multi_dash.$view")) {
            return view("components.doct_dashboard.multi_dash.$view");
        } else {
            abort(404);
        }
    }

    public function renderEnsView($view)
    {
        if (View::exists("components.enseignant.ens_dashboard.multi_ens_dash.$view")) {
            return view("components.enseignant.ens_dashboard.multi_ens_dash.$view");
        } else {
            abort(404);
        }
    }
}
