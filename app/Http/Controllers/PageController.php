<?php

namespace App\Http\Controllers;

use App\Models\projet;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;

class PageController extends Controller
{


    public function home()
    {

        $resultat = USER::get();
        /* dd($resultat); */

        return view('home');
    }

    public function contact()
    {
        return view('home');
    }
    public function adminView()
    {
        return view('admin_views.dashboard');
    }
    public function admin_galleryView()
    {
        return view('admin_views.admin_gallery');
    }
    public function projectView($id)
    {
        $project = Projet::find($id);
        $images = [
            'image_1' => $project->image_1,
            'image_2' => $project->image_2,
            'image_3' => $project->image_3,
        ];
        return view('projet', compact('project', 'images'));
    }
    public function admin_addProject()
    {
        return view('admin_views.admin_project_form');
    }
    public function admin_editProject($id)
    {
        $project = Projet::find($id);
        return view('admin_views.edit_project_form', ['project' => $project]);
    }
}
