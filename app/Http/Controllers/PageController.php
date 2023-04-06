<?php

namespace App\Http\Controllers;

use App\Models\projet;
use App\Models\User;
use App\Models\commentaire;
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
        $singleProject = Projet::find($id);
        $comments = commentaire::where('projet_id', $id)->get();
        $images = [
            'image_1' => $singleProject->image_1,
            'image_2' => $singleProject->image_2,
            'image_3' => $singleProject->image_3,
        ];
        return view('projet', compact('comments', 'singleProject', 'images'));
    }
    public function projectViewPublic($id)
    {
        $singleProject = Projet::find($id);
        $comments = commentaire::where('projet_id', $id)->get();
        $images = [
            'image_1' => $singleProject->image_1,
            'image_2' => $singleProject->image_2,
            'image_3' => $singleProject->image_3,
        ];
        return view('projet', compact('comments', 'singleProject', 'images'));
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
    public function addComment($id)
    {
        $singleProject = Projet::find($id);
        return view('add_comment_form', ['project' => $singleProject]);
    }
}
