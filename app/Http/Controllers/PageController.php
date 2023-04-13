<?php

namespace App\Http\Controllers;

use App\Models\projet;
use App\Models\tag;
use App\Models\categorie;
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
    public function admin_galleryView(Request $request, $id)
    {

        $projet = Projet::find($id);
        $projet->addTags($request->input('tags'));
        $projet->addCategory($request->input('mission'));
        return view('admin_views.admin_gallery');
    }
    public function projectView(Request $request, $id)
    {
        $singleProject = Projet::find($id);

        $comments = commentaire::where('projet_id', $id)->where('status', 1)->get();
        $images = [
            'image_1' => $singleProject->image_1,
            'image_2' => $singleProject->image_2,
            'image_3' => $singleProject->image_3,
        ];

        // dd($images);

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
        $categorie = categorie::all();
        $tags = Tag::all();
        return view('admin_views.admin_project_form', ['tags' => $tags, 'categorie' => $categorie]);
    }
    public function admin_editProject($id)
    {
        $project = Projet::find($id);
        $categorie = categorie::all();
        $tags = Tag::all();
        return view('admin_views.edit_project_form', ['project' => $project, 'tags' => $tags, 'categorie' => $categorie]);
    }
    public function addComment($id)
    {
        $singleProject = Projet::find($id);
        return view('add_comment_form', ['project' => $singleProject]);
    }
    public function moderationView()
    {
        $comments = commentaire::where('status', 0)->get();;
        return view('admin_views.moderation_dashboard', ['comment' => $comments]);
    }
    public function moderateCommentView()
    {
        $comments = commentaire::where('status', 0)->get();;
        return view('admin_views.comment_moderation', ['comment' => $comments]);
    }
}
